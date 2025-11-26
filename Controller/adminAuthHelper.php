<?php
function verificarAdministrador($conexion) {
    session_start();
    
    $usuario_id = null;
    
    // Intentar obtener de diferentes fuentes
    if (isset($_SESSION['usuario_id'])) {
        $usuario_id = $_SESSION['usuario_id'];
    } else if (isset($_GET['usuario_id'])) {
        $usuario_id = $_GET['usuario_id'];
    } else if (isset($_POST['usuario_id'])) {
        $usuario_id = $_POST['usuario_id'];
    } else {
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['usuario_id'])) {
            $usuario_id = $input['usuario_id'];
        }
    }
    
    if (!$usuario_id) {
        return false;
    }
    
    $query = $conexion->prepare("
        SELECT ur.id_rol 
        FROM usuarios_rol ur 
        WHERE ur.id_usuario = ? AND ur.id_rol = 1
    ");
    $query->execute([$usuario_id]);
    $rol = $query->fetch(PDO::FETCH_ASSOC);
    
    return $rol ? true : false;
}

function obtenerUsuarioId() {
    session_start();
    
    if (isset($_SESSION['usuario_id'])) {
        return $_SESSION['usuario_id'];
    } else if (isset($_GET['usuario_id'])) {
        return $_GET['usuario_id'];
    } else if (isset($_POST['usuario_id'])) {
        return $_POST['usuario_id'];
    } else {
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['usuario_id'])) {
            return $input['usuario_id'];
        }
    }
    
    return null;
}
?>