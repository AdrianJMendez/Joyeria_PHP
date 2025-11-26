<?php
session_start();
header('Content-Type: application/json');
include '../Database/conexion.php';

try {
    $conexion = new Conexion();
    
    // Obtener usuario_id de múltiples fuentes
    $usuario_id = null;
    
    if (isset($_GET['usuario_id'])) {
        $usuario_id = $_GET['usuario_id'];
    } else if (isset($_POST['usuario_id'])) {
        $usuario_id = $_POST['usuario_id'];
    } else if (isset($_SESSION['usuario_id'])) {
        $usuario_id = $_SESSION['usuario_id'];
    } else {
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['usuario_id'])) {
            $usuario_id = $input['usuario_id'];
        }
    }
    
    if (!$usuario_id) {
        echo json_encode(['success' => false, 'message' => 'No autorizado: usuario no identificado']);
        exit;
    }
    
    // Verificar si es administrador
    $query = $conexion->prepare("
        SELECT ur.id_rol 
        FROM usuarios_rol ur 
        WHERE ur.id_usuario = ? AND ur.id_rol = 1
    ");
    $query->execute([$usuario_id]);
    $rol = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$rol) {
        echo json_encode(['success' => false, 'message' => 'Se requieren privilegios de administrador']);
        exit;
    }
    
    // Obtener estadísticas
    $stats = [];
    
    // Total pedidos
    $query = $conexion->prepare("SELECT COUNT(*) as total FROM Orden_de_Compra");
    $query->execute();
    $stats['total_pedidos'] = $query->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Pedidos pendientes
    $query = $conexion->prepare("SELECT COUNT(*) as total FROM Orden_de_Compra WHERE estado IN ('pendiente', 'confirmado')");
    $query->execute();
    $stats['pedidos_pendientes'] = $query->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Pedidos entregados
    $query = $conexion->prepare("SELECT COUNT(*) as total FROM Orden_de_Compra WHERE estado = 'entregado'");
    $query->execute();
    $stats['pedidos_entregados'] = $query->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Productos con stock bajo (<= 5)
    $query = $conexion->prepare("SELECT COUNT(*) as total FROM Joyas WHERE stock <= 5");
    $query->execute();
    $stats['stock_bajo'] = $query->fetch(PDO::FETCH_ASSOC)['total'];
    
    echo json_encode(['success' => true, 'estadisticas' => $stats]);
    
} catch(Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>