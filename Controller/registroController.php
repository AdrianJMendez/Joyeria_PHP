<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Manejar CORS preflight
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    // Obtener datos
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        throw new Exception('Datos JSON inválidos');
    }

    // Validaciones básicas
    $required = ['nombre', 'email', 'password'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            throw new Exception("El campo {$field} es requerido");
        }
    }

    // Validar email
    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("El formato del email no es válido");
    }

    // Validar contraseña
    if (strlen($input['password']) < 6) {
        throw new Exception("La contraseña debe tener al menos 6 caracteres");
    }

    // USAR LA MISMA CONEXIÓN QUE loginController.php
    include_once '../Database/conexion.php';
    $conexion = new Conexion();

    // Verificar si el email ya existe
    $query = $conexion->prepare("SELECT id_usuario FROM Usuarios WHERE email = ?");
    $query->execute([$input['email']]);
    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        throw new Exception("El email ya está registrado");
    }

    // Iniciar transacción para asegurar que ambas operaciones se completen
    $conexion->beginTransaction();

    try {
        // 1. Insertar nuevo usuario en la tabla Usuarios (SOLO campos básicos)
        $query = $conexion->prepare("INSERT INTO Usuarios (nombre, email, contraseña, activo) 
                  VALUES (?, ?, ?, 1)");

        if (!$query->execute([$input['nombre'], $input['email'], $input['password']])) {
            throw new Exception("Error al registrar usuario");
        }

        // 2. Obtener el ID del usuario recién insertado
        $id_usuario = $conexion->lastInsertId();

        // 3. Asignar rol de cliente (id_rol = 2) en la tabla Usuarios_rol
        $query = $conexion->prepare("INSERT INTO Usuarios_rol (id_usuario, id_rol) 
                  VALUES (?, 2)");

        if (!$query->execute([$id_usuario])) {
            throw new Exception("Error al asignar rol al usuario");
        }

        // Confirmar la transacción
        $conexion->commit();

        $response = [
            'status' => true,
            'message' => 'Usuario registrado exitosamente',
            'user_id' => $id_usuario,
            'rol_asignado' => 'cliente (id_rol = 2)'
        ];

        echo json_encode($response);

    } catch (Exception $e) {
        // Si algo falla, revertir la transacción
        $conexion->rollBack();
        throw $e;
    }

} catch (Exception $e) {
    echo json_encode([
        'status' => false,
        'message' => $e->getMessage()
    ]);
}
?>