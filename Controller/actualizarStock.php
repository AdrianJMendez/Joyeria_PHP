<?php
// VERSIÓN CORREGIDA - SOLO TABLA usuarios_rol
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Manejar preflight CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Iniciar log
error_log("=== ACTUALIZAR STOCK INICIADO ===");

// OBTENER DATOS
$input_data = file_get_contents('php://input');
parse_str($input_data, $datos);

// Usar datos del input stream o de $_POST
$usuario_id = $datos['usuario_id'] ?? $_POST['usuario_id'] ?? null;
$id_joya = $datos['id_joya'] ?? $_POST['id_joya'] ?? null;
$stock = $datos['stock'] ?? $_POST['stock'] ?? null;

// LOG PARA DEBUG
error_log("Datos recibidos - Usuario ID: " . $usuario_id);
error_log("Datos recibidos - ID Joya: " . $id_joya);
error_log("Datos recibidos - Stock: " . $stock);

try {
    // VALIDACIONES BÁSICAS
    if (!$usuario_id) {
        throw new Exception('No autorizado: usuario no identificado');
    }

    if (!$id_joya || $stock === null) {
        throw new Exception('Datos incompletos: id_joya y stock son requeridos');
    }

    // Validar que el stock sea numérico
    if (!is_numeric($stock) || $stock < 0) {
        throw new Exception('Stock inválido: debe ser un número mayor o igual a 0');
    }

    // INCLUIR CONEXIÓN
    include '../Database/conexion.php';
    
    // VERIFICAR SI LA CONEXIÓN FUNCIONA
    $conexion = new Conexion();
    error_log("Conexión a BD establecida");

    // VERIFICAR ADMIN - SOLO CON usuarios_rol
    $query = $conexion->prepare("SELECT id_rol FROM usuarios_rol WHERE id_usuario = ? AND id_rol = 1");
    $query->execute([$usuario_id]);
    $rol = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$rol) {
        throw new Exception('No tiene permisos de administrador. Usuario ID: ' . $usuario_id);
    }
    error_log("Usuario es administrador");

    // VERIFICAR QUE EL PRODUCTO EXISTA
    $query = $conexion->prepare("SELECT id_joya, nombre, stock FROM Joyas WHERE id_joya = ?");
    $query->execute([$id_joya]);
    $producto = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$producto) {
        throw new Exception('Producto no encontrado con ID: ' . $id_joya);
    }
    error_log("Producto encontrado: " . $producto['nombre'] . " (Stock anterior: " . $producto['stock'] . ")");

    // ACTUALIZAR STOCK
    if ($stock == 0) {
        $query = $conexion->prepare("UPDATE Joyas SET stock = ?, agotado_en = NOW() WHERE id_joya = ?");
    } else {
        $query = $conexion->prepare("UPDATE Joyas SET stock = ?, agotado_en = NULL WHERE id_joya = ?");
    }

    $resultado = $query->execute([$stock, $id_joya]);
    
    if ($resultado) {
        error_log("Stock actualizado en BD: " . $stock . " unidades para " . $producto['nombre']);
        
        echo json_encode([
            'success' => true,
            'message' => 'Stock actualizado correctamente para ' . $producto['nombre'] . 
                        ' (Anterior: ' . $producto['stock'] . ' → Nuevo: ' . $stock . ')',
            'stock_anterior' => $producto['stock'],
            'stock_nuevo' => $stock
        ]);
    } else {
        $errorInfo = $query->errorInfo();
        throw new Exception('Error al ejecutar la actualización: ' . $errorInfo[2]);
    }

} catch (Exception $e) {
    error_log("ERROR: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

error_log("=== ACTUALIZAR STOCK FINALIZADO ===");
?>