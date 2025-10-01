<?php
include '../Database/conexion.php';
$pdo = new Conexion();

// Manejar solicitudes GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_usuario'])) {
        // Obtener una tarjeta específica por id_usuario
        $sql = $pdo->prepare("SELECT * FROM Tarjetas_de_Credito WHERE id_usuario = :id_usuario");
        $sql->bindValue(':id_usuario', $_GET['id_usuario']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    } else {
        // Respuesta de error si no se proporciona id_usuario
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(['error' => 'id_usuario es requerido']);
        exit;
    }
}
?>
