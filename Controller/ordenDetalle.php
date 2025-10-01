<?php
    include '../Database/conexion.php';  // Asegúrate de que la conexión a la base de datos está incluida
    $pdo = new Conexion();

    // Manejar solicitudes POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Leer el cuerpo del request y convertir el JSON a un array
        $entityBody = json_decode(file_get_contents('php://input'), true); 

        // Validar que se envían los parámetros necesarios
        if(isset($entityBody['id_orden']) && isset($entityBody['id_reloj']) && isset($entityBody['cantidad'])) {
            
            // Insertar un nuevo detalle de orden
            $sql = "INSERT INTO Detalle_de_Orden (id_orden, id_reloj, cantidad) 
                    VALUES (:id_orden, :id_reloj, :cantidad);";   
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id_orden', $entityBody['id_orden']);
            $stmt->bindValue(':id_reloj', $entityBody['id_reloj']);
            $stmt->bindValue(':cantidad', $entityBody['cantidad']);
            
            if($stmt->execute()){
                // Respuesta exitosa
                header("HTTP/1.1 200 OK");
                $response = ['Resultado' => 'Success', 'Mensaje' => 'Detalle de orden creado correctamente'];
                echo json_encode($response);
            } else {
                // Error en la inserción
                header("HTTP/1.1 500 Internal Server Error");
                $response = ['Resultado' => 'Error', 'Mensaje' => 'Error al crear el detalle de la orden'];
                echo json_encode($response);
            }
        } else {
            // Respuesta de error si faltan parámetros
            header("HTTP/1.1 400 Bad Request");
            $response = ['Resultado' => 'Error', 'Mensaje' => 'Faltan parámetros'];
            echo json_encode($response);
        }
        exit;
    }

    // Si no es una solicitud POST, devolver error
    header("HTTP/1.1 405 Method Not Allowed");
    $response = ['Resultado' => 'Error', 'Mensaje' => 'Método no permitido'];
    echo json_encode($response);
?>
