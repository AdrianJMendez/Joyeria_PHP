<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

date_default_timezone_set('America/Tegucigalpa');

require_once __DIR__ . "/Database/conexion.php";
$pdo = new Conexion();

$id_joya  = $_POST['id_joya'] ?? null;
$cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 0;

if (!$id_joya || $cantidad <= 0) {
    echo json_encode(['success' => false, 'message' => 'Solicitud invalida.']);
    exit;
}

// Obtener stock + fecha agotado
$sql = $pdo->prepare("SELECT stock, agotado_en FROM Joyas WHERE id_joya = :id");
$sql->bindValue(':id', $id_joya, PDO::PARAM_INT);
$sql->execute();
$producto = $sql->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
    exit;
}

$stockActual = (int)$producto['stock'];
$agotadoEn   = $producto['agotado_en'];


// ======================================================
// 1) Producto agotado por PRIMERA VEZ >> se marca fecha
// La dinamica es esta, cuando el stock es 0 y no hay fecha, entonces
// se marca la fecha actual y se informa al usuario que se está verificando, o que estamos viendo si hay en otra sucursal
// ======================================================

if ($stockActual <= 0 && $agotadoEn === null) {

    $marca = $pdo->prepare("UPDATE Joyas SET agotado_en = NOW() WHERE id_joya = :id");
    $marca->bindValue(':id', $id_joya);
    $marca->execute();

    echo json_encode([
        'success' => false,
        'message' => "El producto esta agotado, se verificara disponibilidad en otras sucursales. Intente nuevamente mas tarde."
    ]);
    exit;
}

// El producto sigue agotado pero ya hay fecha
//    Verificar si PASARON 5 MINUTOS
if ($agotadoEn !== null) {

    $fechaAgotado   = strtotime($agotadoEn);
    $minutosPasados = (time() - $fechaAgotado) / 60;

    // Como no han pasado 5 minutos sigue estando agotado
    if ($minutosPasados < 5) {

        
        $stockActual = 0;

        echo json_encode([
            'success' => false,
            'message' => "El producto continúa en verificacion. Intente nuevamente en unos minutos."
        ]);
        exit;
    }

    // Ya pasaron 5 minutos, ahora si se repone automáticamente
    $reposicion = rand(1, 10);

    $repo = $pdo->prepare("UPDATE Joyas SET stock = :stock, agotado_en = NULL WHERE id_joya = :id");
    $repo->bindValue(':stock', $reposicion, PDO::PARAM_INT);
    $repo->bindValue(':id', $id_joya, PDO::PARAM_INT);
    $repo->execute();

    echo json_encode([
        'success' => false,
        'message' => "Las sucursales confirmaron disponibilidad. El stock fue actualizado.",
        'stock_nuevo' => $reposicion
    ]);
    exit;
}


// Verifiación normal de stock
if ($stockActual < $cantidad) {
    echo json_encode([
        'success' => false,
        'message' => "Solo hay $stockActual unidades disponibles."
    ]);
    exit;
}


// Descontar stock y completar compra
$nuevoStock = $stockActual - $cantidad;

$update = $pdo->prepare("UPDATE Joyas SET stock = :stock WHERE id_joya = :id");
$update->bindValue(':stock', $nuevoStock);
$update->bindValue(':id', $id_joya);
$update->execute();

echo json_encode([
    'success' => true,
    'message' => 'Producto agregado al carrito.',
    'stock_restante' => $nuevoStock
]);
exit;
?>
