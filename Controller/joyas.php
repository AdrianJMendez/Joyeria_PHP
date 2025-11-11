<?php
// HABILITAR CORS 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Verifica si la solicitud es una verificación previa 
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}
include '../Database/conexion.php';
$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        // Obtener una joya específica
        $sql = $pdo->prepare("SELECT * FROM Joyas WHERE id_joya = :id");
        $sql->bindValue(':id', $_GET['id']);
    } elseif (isset($_GET['id_categoria'])) {
        // Obtener joyas por categoría
        $sql = $pdo->prepare("SELECT * FROM Joyas WHERE id_categoria = :id_categoria");
        $sql->bindValue(':id_categoria', $_GET['id_categoria']);
 
    } else {
        // Obtener todas las joyas
        $sql = $pdo->prepare("SELECT * FROM Joyas");
       
    }

    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll());
    exit;
}


// Insertar una nueva joya
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entityBody = json_decode(file_get_contents('php://input'), true);

    $sql = "INSERT INTO Joyas (nombre, material, id_categoria, imagen_url, talla, precio, detalle)
            VALUES (:nombre, :material, :id_categoria, :imagen_url, :talla, :precio, :detalle)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nombre', $entityBody['nombre']);
    $stmt->bindValue(':material', $entityBody['material']);
    $stmt->bindValue(':id_categoria', $entityBody['id_categoria']);
    $stmt->bindValue(':imagen_url', $entityBody['imagen_url']);
    $stmt->bindValue(':talla', $entityBody['talla']);
    $stmt->bindValue(':precio', $entityBody['precio']);
    $stmt->bindValue(':detalle', $entityBody['detalle']);
    $stmt->execute();

    $idPost = $pdo->lastInsertId();

    if ($idPost) {
        header("HTTP/1.1 200 OK");
        echo json_encode(['Registro Creado' => $idPost, 'Resultado' => 'Success']);
    } else {
        header("HTTP/1.1 500 Error");
        echo json_encode(['Resultado' => 'Error en el procesamiento']);
    }
    exit;
}
?>
