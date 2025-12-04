<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

include '../Database/conexion.php';

function sendResponse($statusCode, $data) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $conexion = new Conexion();
        
        if (!isset($_GET['id_usuario'])) {
            sendResponse(400, [
                'success' => false,
                'message' => 'ID de usuario requerido'
            ]);
        }
        
        $id_usuario = $_GET['id_usuario'];
        
        // Primero, verificar si existe el campo estado, si no existe, crearlo
        try {
            $checkColumn = $conexion->prepare("SHOW COLUMNS FROM Orden_de_Compra LIKE 'estado'");
            $checkColumn->execute();
            $columnExists = $checkColumn->fetch(PDO::FETCH_ASSOC);
            
            if (!$columnExists) {
                $alterQuery = $conexion->prepare("ALTER TABLE Orden_de_Compra ADD COLUMN estado VARCHAR(20) DEFAULT 'pendiente'");
                $alterQuery->execute();
                
                // Actualizar algunos estados de ejemplo
                $updateQuery = $conexion->prepare("UPDATE Orden_de_Compra SET estado = 'entregado' WHERE id_orden = 1");
                $updateQuery->execute();
                
                $updateQuery = $conexion->prepare("UPDATE Orden_de_Compra SET estado = 'enviado' WHERE id_orden = 2");
                $updateQuery->execute();
                
                $updateQuery = $conexion->prepare("UPDATE Orden_de_Compra SET estado = 'procesando' WHERE id_orden = 3");
                $updateQuery->execute();
            }
        } catch (Exception $e) {
            // Ignorar errores de columna ya existente
        }
        
        // Obtener órdenes del usuario con detalles completos
        $query = $conexion->prepare("
            SELECT 
                oc.id_orden,
                oc.fecha,
                oc.total,
                COALESCE(oc.estado, 'pendiente') as estado,
                f.fecha_emision,
                p.fecha_pago,
                p.monto_pagado,
                tc.nombre_titular,
                tc.numero_tarjeta,
                GROUP_CONCAT(
                    CONCAT(
                        j.nombre, '|', 
                        COALESCE(j.imagen_url, 'img/placeholder-producto.jpg'), '|', 
                        j.precio, '|', 
                        do.cantidad
                    ) SEPARATOR ';'
                ) as productos
            FROM Orden_de_Compra oc
            LEFT JOIN Factura f ON oc.id_orden = f.id_orden
            LEFT JOIN Pagos p ON f.id_factura = p.id_factura
            LEFT JOIN Tarjetas_de_Credito tc ON p.id_tarjeta = tc.id_tarjeta
            LEFT JOIN Detalle_de_Orden do ON oc.id_orden = do.id_orden
            LEFT JOIN Joyas j ON do.id_joya = j.id_joya
            WHERE oc.id_usuario = ?
            GROUP BY oc.id_orden
            ORDER BY oc.fecha DESC
        ");
        
        $query->execute([$id_usuario]);
        $ordenes = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Si no hay órdenes, devolver array vacío
        if (empty($ordenes)) {
            sendResponse(200, [
                'success' => true,
                'pedidos' => []
            ]);
        }
        
        // Formatear la respuesta
        $pedidosFormateados = [];
        foreach ($ordenes as $orden) {
            $productos = [];
            if (!empty($orden['productos'])) {
                $productosArray = explode(';', $orden['productos']);
                foreach ($productosArray as $productoStr) {
                    $partes = explode('|', $productoStr);
                    if (count($partes) >= 4) {
                        list($nombre, $imagen, $precio, $cantidad) = $partes;
                        $productos[] = [
                            'nombre' => $nombre,
                            'imagen' => $imagen,
                            'precio' => floatval($precio),
                            'cantidad' => intval($cantidad)
                        ];
                    }
                }
            }
            
            $pedidosFormateados[] = [
                'id' => 'JC-' . $orden['id_orden'],
                'id_orden' => $orden['id_orden'],
                'fecha' => $orden['fecha'],
                'total' => floatval($orden['total']),
                'estado' => $orden['estado'],
                'productos' => $productos,
                'fecha_emision' => $orden['fecha_emision'],
                'fecha_pago' => $orden['fecha_pago'],
                'metodoPago' => $orden['nombre_titular'] ? 'Tarjeta terminada en ' . substr($orden['numero_tarjeta'], -4) : 'No especificado',
                'timeline' => generarTimelineDesdeBD($orden['estado'], $orden['fecha'])
            ];
        }
        
        sendResponse(200, [
            'success' => true,
            'pedidos' => $pedidosFormateados
        ]);
        
    } catch(Exception $e) {
        sendResponse(500, [
            'success' => false,
            'message' => "Error en el servidor: " . $e->getMessage()
        ]);
    }
}

// Función para generar timeline basado en el estado
function generarTimelineDesdeBD($estado, $fechaOrden) {
    $estados = ['pendiente', 'confirmado', 'procesando', 'enviado', 'entregado'];
    $estadoIndex = array_search($estado, $estados);
    
    // Si no encuentra el estado, usar pendiente
    if ($estadoIndex === false) {
        $estadoIndex = 0;
    }
    
    $timeline = [];
    foreach ($estados as $index => $estadoItem) {
        $timeline[] = [
            'estado' => $estadoItem,
            'completado' => $index <= $estadoIndex,
            'fecha' => $index <= $estadoIndex ? 
                date('Y-m-d', strtotime($fechaOrden . " + $index days")) : 
                null
        ];
    }
    
    return $timeline;
}
?>