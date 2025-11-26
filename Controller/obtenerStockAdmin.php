<?php
session_start();
header('Content-Type: application/json');
include '../Database/conexion.php';

try {
    $conexion = new Conexion();
    
    // Obtener usuario_id de múltiples fuentes
    $usuario_id = null;
    
    if (isset($_GET['usuario_id'])) {
        $usuario_id = $_GET['usuario_id'];
    } else if (isset($_POST['usuario_id'])) {
        $usuario_id = $_POST['usuario_id'];
    } else if (isset($_SESSION['usuario_id'])) {
        $usuario_id = $_SESSION['usuario_id'];
    } else {
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['usuario_id'])) {
            $usuario_id = $input['usuario_id'];
        }
    }
    
    if (!$usuario_id) {
        echo json_encode(['success' => false, 'message' => 'No autorizado: usuario no identificado']);
        exit;
    }
    
    // Verificar si es administrador
    $query = $conexion->prepare("
        SELECT ur.id_rol 
        FROM usuarios_rol ur 
        WHERE ur.id_usuario = ? AND ur.id_rol = 1
    ");
    $query->execute([$usuario_id]);
    $rol = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$rol) {
        echo json_encode(['success' => false, 'message' => 'Se requieren privilegios de administrador']);
        exit;
    }
    
    // Obtener stock de productos con toda la información
    $query = $conexion->prepare("
        SELECT 
            id_joya,
            nombre,
            material,
            precio,
            stock,
            agotado_en,
            imagen_url,
            talla,
            detalle,
            -- Calcular estado de disponibilidad
            CASE 
                WHEN stock > 10 THEN 'alta'
                WHEN stock BETWEEN 1 AND 10 THEN 'media' 
                WHEN stock = 0 THEN 'agotado'
                ELSE 'baja'
            END as estado_disponibilidad
        FROM Joyas 
        ORDER BY 
            CASE 
                WHEN stock = 0 THEN 0
                WHEN stock BETWEEN 1 AND 5 THEN 1
                WHEN stock BETWEEN 6 AND 10 THEN 2
                ELSE 3
            END,
            nombre ASC
    ");
    $query->execute();
    $productos = $query->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['success' => true, 'productos' => $productos]);
    
} catch(Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>