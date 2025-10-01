<?php
include '../Database/conexion.php';
$pdo = new Conexion();

// Manejar solicitudes POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Leer el cuerpo del request
    $entityBody = json_decode(file_get_contents('php://input'), true); // Convertir el JSON a un array

    // Validar que los campos necesarios estén presentes
    if (isset($entityBody['id_orden']) && isset($entityBody['fecha_emision'])) {
        // Insertar una nueva factura
        $sql = "INSERT INTO Factura (id_orden, fecha_emision) VALUES (:id_orden, :fecha_emision)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_orden', $entityBody['id_orden']);
        $stmt->bindValue(':fecha_emision', $entityBody['fecha_emision']);
        $stmt->execute();

        // Obtener el último ID insertado
        $idFactura = $pdo->lastInsertId();

        if ($idFactura) {
            // Respuesta exitosa
            header("HTTP/1.1 200 OK");
            $response = ['Registro Creado' => $idFactura, 'Resultado' => 'Success'];
            echo json_encode($response);
        } else {
            // Respuesta de error
            header("HTTP/1.1 500 Error");
            $response = ['Resultado' => 'Error en el procesamiento'];
            echo json_encode($response);
        }
    } else {
        // Respuesta de error si faltan campos
        header("HTTP/1.1 400 Bad Request");
        $response = ['Resultado' => 'Faltan campos requeridos'];
        echo json_encode($response);
    }
    exit;
}
?>
