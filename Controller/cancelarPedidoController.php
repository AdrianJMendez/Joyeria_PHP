<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include '../Database/conexion.php';

function sendResponse($statusCode, $data) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $conexion = new Conexion();
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!isset($input['id_orden'])) {
            sendResponse(400, [
                'success' => false,
                'message' => 'ID de orden requerido'
            ]);
        }
        
        $id_orden = $input['id_orden'];
        
        // Verificar que el pedido puede ser cancelado
        $query = $conexion->prepare("SELECT estado FROM Orden_de_Compra WHERE id_orden = ?");
        $query->execute([$id_orden]);
        $orden = $query->fetch(PDO::FETCH_ASSOC);
        
        if (!$orden) {
            sendResponse(404, [
                'success' => false,
                'message' => 'Orden no encontrada'
            ]);
        }
        
        if (!in_array($orden['estado'], ['pendiente', 'confirmado'])) {
            sendResponse(400, [
                'success' => false,
                'message' => 'No se puede cancelar un pedido en estado: ' . $orden['estado']
            ]);
        }
        
        // Actualizar estado a cancelado
        $query = $conexion->prepare("UPDATE Orden_de_Compra SET estado = 'cancelado' WHERE id_orden = ?");
        $query->execute([$id_orden]);
        
        sendResponse(200, [
            'success' => true,
            'message' => 'Pedido cancelado exitosamente'
        ]);
        
    } catch(Exception $e) {
        sendResponse(500, [
            'success' => false,
            'message' => "Error en el servidor: " . $e->getMessage()
        ]);
    }
}
?>