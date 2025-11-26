<?php
session_start();
header('Content-Type: application/json');

include '../Database/conexion.php';

function sendResponse($success, $message = '', $data = []) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

try {
    $conexion = new Conexion();
    
    // Obtener usuario_id del request
    $input = json_decode(file_get_contents('php://input'), true);
    $usuario_id = $input['usuario_id'] ?? null;
    
    if (!$usuario_id) {
        sendResponse(false, 'No autorizado: debe iniciar sesión');
    }
    
    // Verificar si el usuario es administrador usando la tabla usuarios_rol
    $query = $conexion->prepare("
        SELECT u.id_usuario, u.nombre, u.email, ur.id_rol 
        FROM usuarios u 
        INNER JOIN usuarios_rol ur ON u.id_usuario = ur.id_usuario
        WHERE u.id_usuario = ? AND ur.id_rol = 1
    ");
    $query->execute([$usuario_id]);
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$usuario) {
        sendResponse(false, 'Acceso denegado: se requieren privilegios de administrador');
    }
    
    sendResponse(true, 'Usuario autorizado', $usuario);
    
} catch(Exception $e) {
    sendResponse(false, 'Error en el servidor: ' . $e->getMessage());
}
?>