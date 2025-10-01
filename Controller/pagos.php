<?php
include '../Database/conexion.php';
$pdo = new Conexion();

// Manejar solicitudes POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Leer el cuerpo del request
    $entityBody = json_decode(file_get_contents('php://input'), true); // Convertir el JSON a un array

    // Validar que los campos necesarios estén presentes
    if (isset($entityBody['id_factura']) && isset($entityBody['id_tarjeta']) && isset($entityBody['fecha_pago']) && isset($entityBody['monto_pagado'])) {
        // Insertar un nuevo pago
        $sql = "INSERT INTO Pagos (id_factura, id_tarjeta, fecha_pago, monto_pagado) VALUES (:id_factura, :id_tarjeta, :fecha_pago, :monto_pagado)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_factura', $entityBody['id_factura']);
        $stmt->bindValue(':id_tarjeta', $entityBody['id_tarjeta']);
        $stmt->bindValue(':fecha_pago', $entityBody['fecha_pago']);
        $stmt->bindValue(':monto_pagado', $entityBody['monto_pagado']);
        $stmt->execute();

        // Obtener el último ID insertado
        $idPago = $pdo->lastInsertId();

        if ($idPago) {
            // Respuesta exitosa
            header("HTTP/1.1 200 OK");
            $response = ['Registro Creado' => $idPago, 'Resultado' => 'Success'];
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
