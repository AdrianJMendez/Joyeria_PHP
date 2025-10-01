<?php
    include '../Database/conexion.php';  // Asegúrate de que el archivo de conexión esté en la ubicación correcta.
    $pdo = new Conexion();

    // Manejar solicitudes POST para crear una nueva orden
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Leer el cuerpo del request (asumimos que el contenido es JSON)
        $entityBody = json_decode(file_get_contents('php://input'), true);

        // Validar que se reciban los parámetros esperados
        if (isset($entityBody['id_usuario'], $entityBody['fecha'], $entityBody['total'])) {
            // Preparar la consulta SQL para insertar la nueva orden
            $sql = "INSERT INTO Orden_de_Compra (id_usuario, fecha, total) 
                    VALUES (:id_usuario, :fecha, :total)";
            $stmt = $pdo->prepare($sql);
            
            // Asignar los valores
            $stmt->bindValue(':id_usuario', $entityBody['id_usuario']);
            $stmt->bindValue(':fecha', $entityBody['fecha']);
            $stmt->bindValue(':total', $entityBody['total']);

            // Ejecutar la consulta y comprobar si se inserta correctamente
            if ($stmt->execute()) {
                // Obtener el ID de la nueva orden insertada
                $idOrden = $pdo->lastInsertId();

                // Respuesta exitosa con el ID de la nueva orden
                header("HTTP/1.1 200 OK");
                echo json_encode([
                    'message' => 'Orden creada exitosamente',
                    'id_orden' => $idOrden
                ]);
            } else {
                // Si ocurre algún error durante la inserción
                header("HTTP/1.1 500 Internal Server Error");
                echo json_encode(['message' => 'Error al crear la orden']);
            }
        } else {
            // Si faltan parámetros requeridos
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(['message' => 'Faltan parámetros requeridos']);
        }
        exit;
    }
?>
