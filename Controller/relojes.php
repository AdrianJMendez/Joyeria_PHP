<?php
    include '../Database/conexion.php';
    $pdo = new Conexion();

    // Manejar solicitudes GET
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['id'])){
            // Obtener un reloj específico por id
            $sql = $pdo->prepare("SELECT * FROM Relojes WHERE id_reloj = :id");
            $sql->bindValue(':id', $_GET['id']);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200 OK");
            echo json_encode($sql->fetchAll());
            exit;
        } else {
            // Obtener todos los relojes
            $sql = $pdo->prepare("SELECT * FROM Relojes");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200 OK");
            echo json_encode($sql->fetchAll());
            exit;
        }
    }

    // Manejar solicitudes POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Leer el cuerpo del request
        $entityBody = json_decode(file_get_contents('php://input'), true); // Convertir el JSON a un array

        // Insertar un nuevo reloj
        $sql = "INSERT INTO Relojes (marca, modelo, precio, imagen_url) 
                VALUES (:marca, :modelo, :precio, :imagen_url);";   
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':marca', $entityBody['marca']);
        $stmt->bindValue(':modelo', $entityBody['modelo']);
        $stmt->bindValue(':precio', $entityBody['precio']);
        $stmt->bindValue(':imagen_url', $entityBody['imagen_url']);
        $stmt->execute();

        // Obtener el último ID insertado
        $idPost = $pdo->lastInsertId();

        if($idPost){
            // Respuesta exitosa
            header("HTTP/1.1 200 OK");
            $response = ['Registro Creado' => $idPost, 'Resultado' => 'Success'];
            echo json_encode($response);
        } else {
            // Respuesta de error
            header("HTTP/1.1 500 Error");
            $response = ['Resultado' => 'Error en el procesamiento'];
            echo json_encode($response);
        }
        exit;
    }
?>
