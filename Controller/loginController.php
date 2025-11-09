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
    
    $query = $conexion->prepare("SELECT nombre, contraseña FROM usuarios WHERE email = ? AND contraseña = ?");
    $query->execute([$email, $password]);
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($usuario) {
        sendResponse(200, [
            'status' => true,
            'message' => "Login exitoso",
            'user' => $usuario['nombre']
        ]);
    } else {
        sendResponse(401, [
            'status' => false,
            'message' => "Credenciales incorrectas"
        ]);
    }
    
} catch(Exception $e) {
    sendResponse(500, [
        'status' => false,
        'message' => "Error en el servidor"
    ]);
}
?>

/**
SELECT privilegios.nombre_privilegio, rol.nombre_rol, usuarios.nombre, usuarios.email, usuarios.activo
FROM privilegios
INNER JOIN privilegios_rol
ON privilegios.id_privilegio = privilegios_rol.id_privilegio
INNER JOIN rol
ON privilegios_rol.id_rol = rol.id_rol
INNER JOIN usuarios_rol
ON rol.id_rol = usuarios_rol.id_rol
INNER JOIN usuarios
ON usuarios.id_usuario = usuarios_rol.id_usuario;
*/