<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Habilitar reporte de errores para debug
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

include '../Database/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Log para debug
    error_log("Datos recibidos en guardarOrdenController: " . print_r($input, true));
    
    // Validar datos requeridos
    if (!isset($input['id_usuario']) || !isset($input['productos']) || empty($input['productos'])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Datos incompletos: id_usuario y productos son requeridos']);
        exit;
    }

    try {
        $pdo = new Conexion();
        $pdo->beginTransaction();

        //Insertar en Orden_de_Compra 
        $sqlOrden = "INSERT INTO Orden_de_Compra (id_usuario, fecha, total, estado) VALUES (:id_usuario, CURDATE(), :total, :estado)";
        $stmtOrden = $pdo->prepare($sqlOrden);
        $stmtOrden->bindValue(':id_usuario', (int)$input['id_usuario'], PDO::PARAM_INT);
        $stmtOrden->bindValue(':total', (float)$input['total'], PDO::PARAM_STR);
        $stmtOrden->bindValue(':estado', $input['estado'] ?? 'pendiente', PDO::PARAM_STR);
        
        if (!$stmtOrden->execute()) {
            throw new Exception("Error al insertar en Orden_de_Compra");
        }
        
        $idOrden = $pdo->lastInsertId();
        error_log("Orden creada con ID: " . $idOrden);

        //Insertar en Detalle_de_Orden
        $sqlDetalle = "INSERT INTO Detalle_de_Orden (id_orden, id_joya, cantidad) VALUES (:id_orden, :id_joya, :cantidad)";
        $stmtDetalle = $pdo->prepare($sqlDetalle);

        foreach ($input['productos'] as $index => $producto) {
            
            if (!isset($producto['id_joya'])) {
                throw new Exception("Producto en posición $index no tiene id_joya. Datos: " . json_encode($producto));
            }
            
            if (!isset($producto['cantidad'])) {
                throw new Exception("Producto en posición $index no tiene cantidad. Datos: " . json_encode($producto));
            }
            
            // Convertir a enteros
            $id_joya = (int)$producto['id_joya'];
            $cantidad = (int)$producto['cantidad'];
            
            // Validar que sean números válidos
            if ($id_joya <= 0) {
                throw new Exception("Producto en posición $index tiene id_joya inválido: " . $producto['id_joya']);
            }
            
            if ($cantidad <= 0) {
                throw new Exception("Producto en posición $index tiene cantidad inválida: " . $producto['cantidad']);
            }
            
            $stmtDetalle->bindValue(':id_orden', $idOrden, PDO::PARAM_INT);
            $stmtDetalle->bindValue(':id_joya', $id_joya, PDO::PARAM_INT);
            $stmtDetalle->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
            
            if (!$stmtDetalle->execute()) {
                throw new Exception("Error al insertar detalle para producto $id_joya");
            }
            
            error_log("Producto insertado: ID $id_joya, Cantidad $cantidad");
        }

        // Insertar en Factura
        $sqlFactura = "INSERT INTO Factura (id_orden, fecha_emision) VALUES (:id_orden, CURDATE())";
        $stmtFactura = $pdo->prepare($sqlFactura);
        $stmtFactura->bindValue(':id_orden', $idOrden, PDO::PARAM_INT);
        
        if (!$stmtFactura->execute()) {
            throw new Exception("Error al crear factura");
        }

        $idFactura = $pdo->lastInsertId();
        error_log("Factura creada con ID: " . $idFactura);

        $pdo->commit();

        echo json_encode([
            'success' => true, 
            'message' => 'Orden guardada exitosamente',
            'id_orden' => $idOrden,
            'id_factura' => $idFactura
        ]);

    } catch (Exception $e) {
        if (isset($pdo)) {
            $pdo->rollBack();
        }
        error_log("Error en guardarOrdenController: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error al guardar la orden: ' . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>