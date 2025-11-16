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
    echo json_encode(['success' => false, 'message' => 'Solicitud inválida.']);
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


// -------------------------------------------------
// A) PRIMERA VEZ QUE SE DETECTA AGOTADO
// -------------------------------------------------
if ($stockActual <= 0 && $agotadoEn === null) {

    $marca = $pdo->prepare("UPDATE Joyas SET agotado_en = NOW() WHERE id_joya = :id");
    $marca->bindValue(':id', $id_joya);
    $marca->execute();

    echo json_encode([
        'success' => false,
        'message' => "El producto está agotado, se verificará disponibilidad en otras sucursales. Intente nuevamente más tarde."
    ]);
    exit;
}


// -------------------------------------------------
// B) EL PRODUCTO YA ESTÁ EN ESTADO AGOTADO
// -------------------------------------------------
if ($agotadoEn !== null) {

    $fechaAgotado   = strtotime($agotadoEn);
    $minutosPasados = (time() - $fechaAgotado) / 60;

    // ⛔ NO HAN PASADO 5 MINUTOS → seguir mostrando agotado
    if ($minutosPasados < 5) {

        // Bloquear compra dejando stock = 0 mientras se esperan los 5 min
        $stockActual = 0;

        echo json_encode([
            'success' => false,
            'message' => "El producto continúa en verificación. Intente nuevamente en unos minutos."
        ]);
        exit;
    }

    // ✔️ YA PASARON 5 MINUTOS → reponer stock
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


// -------------------------------------------------
// C) VERIFICACIÓN NORMAL DE STOCK
// -------------------------------------------------
if ($stockActual < $cantidad) {
    echo json_encode([
        'success' => false,
        'message' => "Solo hay $stockActual unidades disponibles."
    ]);
    exit;
}


// -------------------------------------------------
// D) DESCONTAR STOCK Y COMPLETAR COMPRA
// -------------------------------------------------
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
