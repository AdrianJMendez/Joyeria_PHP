<?php
session_start();
header('Content-Type: application/json');
include '../Database/conexion.php';

function verificarAdmin($conexion) {
    $usuario_id = null;
    
    if (isset($_SESSION['usuario_id'])) {
        $usuario_id = $_SESSION['usuario_id'];
    } else if (isset($_GET['usuario_id'])) {
        $usuario_id = $_GET['usuario_id'];
    } else {
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['usuario_id'])) {
            $usuario_id = $input['usuario_id'];
        }
    }
    
    if (!$usuario_id) {
        return false;
    }
    
    $query = $conexion->prepare("
        SELECT ur.id_rol 
        FROM usuarios_rol ur 
        WHERE ur.id_usuario = ? AND ur.id_rol = 1
    ");
    $query->execute([$usuario_id]);
    $rol = $query->fetch(PDO::FETCH_ASSOC);
    
    return $rol ? true : false;
}

try {
    $conexion = new Conexion();
    
    // Verificar admin
    if (!verificarAdmin($conexion)) {
        echo json_encode(['success' => false, 'message' => 'Se requieren privilegios de administrador']);
        exit;
    }
    
    // Obtener todos los pedidos
    $query = $conexion->prepare("
        SELECT 
            oc.id_orden,
            oc.fecha,
            oc.total,
            oc.estado,
            u.nombre as nombre_cliente,
            u.email as email_cliente
        FROM Orden_de_Compra oc
        LEFT JOIN usuarios u ON oc.id_usuario = u.id_usuario
        ORDER BY oc.fecha DESC
    ");
    $query->execute();
    $pedidos = $query->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['success' => true, 'pedidos' => $pedidos]);
    
} catch(Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>