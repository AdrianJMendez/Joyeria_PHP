<?php
include '../Database/conexion.php';
$pdo = new Conexion();

// Manejar solicitudes POST para crear una nueva orden
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['id_usuario'], $input['total'])) {
        try {
            $sql = "INSERT INTO Orden_de_Compra (id_usuario, fecha, total) 
                    VALUES (:id_usuario, NOW(), :total)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(':id_usuario', $input['id_usuario']);
            $stmt->bindValue(':total', $input['total']);

            if ($stmt->execute()) {
                $idOrden = $pdo->lastInsertId();
                
                header("HTTP/1.1 200 OK");
                echo json_encode([
                    'success' => true,
                    'message' => 'Orden creada exitosamente',
                    'id_orden' => $idOrden
                ]);
            } else {
                header("HTTP/1.1 500 Internal Server Error");
                echo json_encode(['success' => false, 'message' => 'Error al crear la orden']);
            }
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(['success' => false, 'message' => 'Faltan parámetros requeridos']);
    }
    exit;
}

// También puedes añadir GET para obtener órdenes si es necesario
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_usuario'])) {
        $sql = "SELECT * FROM Orden_de_Compra WHERE id_usuario = :id_usuario ORDER BY fecha DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_usuario', $_GET['id_usuario']);
        $stmt->execute();
        $ordenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['success' => true, 'ordenes' => $ordenes]);
    }
}
?>