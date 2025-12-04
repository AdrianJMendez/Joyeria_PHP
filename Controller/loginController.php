<?php
header('Content-type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

include '../Database/conexion.php';
include 'AuthHelper.php';

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
    // Validar que los parámetros requeridos estén presentes
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        sendResponse(400, [
            'status' => false,
            'message' => 'Email y contraseña son requeridos'
        ]);
    }
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Validar que no estén vacíos
    if (empty($email) || empty($password)) {
        sendResponse(400, [
            'status' => false,
            'message' => 'Email y contraseña no pueden estar vacíos'
        ]);
    }
    
    // Crear conexión y helper de autenticación
    $conexion = new Conexion();
    $authHelper = new AuthHelper($conexion);
    
    // Validar usuario completo (autenticación + rol + privilegios)
    $datosUsuario = $authHelper->validarUsuarioCompleto($email, $password);
    

    session_start();
    $_SESSION['usuario_id'] = $datosUsuario['id_usuario'];
    $_SESSION['usuario_email'] = $datosUsuario['email'];
    $_SESSION['usuario_nombre'] = $datosUsuario['nombre'];
    $_SESSION['usuario_rol'] = $datosUsuario['rol'];
    $_SESSION['usuario_id_rol'] = $datosUsuario['id_rol'];
    $_SESSION['usuario_privilegios'] = $datosUsuario['privilegios'];
    
    sendResponse(200, [
        'status' => true,
        'message' => "Login exitoso",
        'data' => [
            'id' => $datosUsuario['id_usuario'],
            'nombre' => $datosUsuario['nombre'],
            'email' => $datosUsuario['email'],
            'rol' => $datosUsuario['rol'],
            'id_rol' => $datosUsuario['id_rol'],
            'privilegios' => $datosUsuario['privilegios'],
            'activo' => $datosUsuario['activo'],
            'token' => 'token123'  
        ]
    ]);
    
} catch(Exception $e) {
    $mensajeError = $e->getMessage();
    
    if (strpos($mensajeError, 'Credenciales incorrectas') !== false) {
        sendResponse(401, [
            'status' => false,
            'message' => $mensajeError
        ]);
    } elseif (strpos($mensajeError, 'Usuario inactivo') !== false) {
        sendResponse(403, [
            'status' => false,
            'message' => $mensajeError
        ]);
    } elseif (strpos($mensajeError, 'No se encontró') !== false) {
        sendResponse(401, [
            'status' => false,
            'message' => $mensajeError
        ]);
    } else {
        sendResponse(500, [
            'status' => false,
            'message' => "Error en el servidor: " . $mensajeError
        ]);
    }
}
?>