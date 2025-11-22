<?php
header('Content-type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

include '../Database/conexion.php';

function sendResponse($statusCode, $data) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    sendResponse(405, [
        'status' => false,
        'message' => "Método no permitido"
    ]);
}

try {
    $conexion = new Conexion();
    
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        sendResponse(400, [
            'status' => false,
            'message' => 'Email y contraseña son requeridos'
        ]);
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // PRIMERO: Verificar si el usuario existe y está activo
    $query = $conexion->prepare("SELECT id_usuario, nombre, contraseña, activo FROM usuarios WHERE email = ?");
    $query->execute([$email]);
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$usuario) {
        sendResponse(401, [
            'status' => false,
            'message' => "Credenciales incorrectas"
        ]);
    }

    if ($usuario['contraseña'] !== $password) {
        sendResponse(401, [
            'status' => false,
            'message' => "Credenciales incorrectas"
        ]);
    }
    
    // VERIFICAR SI EL USUARIO ESTÁ ACTIVO
    if (!$usuario['activo']) {
        sendResponse(403, [
            'status' => false,
            'message' => "Usuario inactivo"
        ]);
    }
    
    // LLAMAR AL PROCEDIMIENTO ALMACENADO
    $query = $conexion->prepare('CALL sp_verificar_usuario_privilegios(?, ?)');
    $query->execute([$email, $usuario['contraseña']]); // Usar la contraseña de la BD
    
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($resultados) > 0) {
        $session = $resultados[0];
        
        sendResponse(200, [
            'status' => true,
            'message' => "Login exitoso",
            'id' => $usuario['id_usuario'],
            'user' => $session['email'],       
            'rol' => $session['nombre_rol'],     
            'name' => $session['nombre'],     
            'privilegios' => $session['privilegios'],
            'token' => 'token123'
            
        ]);
    } else {
        sendResponse(401, [
            'status' => false,
            'message' => "No se encontraron privilegios para el usuario"
        ]);
    }
    
} catch(Exception $e) {
    sendResponse(500, [
        'status' => false,
        'message' => "Error en el servidor: " . $e->getMessage()
    ]);
}
?>