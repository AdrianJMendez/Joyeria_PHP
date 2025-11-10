<?php
header('Content-Type: application/json');

// Cargar el archivo stock.json
$stockFile = 'stock.json';
if (!file_exists($stockFile)) {
    echo json_encode(['success' => false, 'message' => 'Archivo de stock no encontrado.']);
    exit;
}

$stockData = json_decode(file_get_contents($stockFile), true);

// Leer los datos del producto desde la solicitud POST
$id_joya = $_POST['id_joya'] ?? null;
$cantidad = $_POST['cantidad'] ?? 0;

// Validar datos
if (!$id_joya || $cantidad <= 0) {
    echo json_encode(['success' => false, 'message' => 'Datos inválidos.']);
    exit;
}

// Verificar el stock
if (!isset($stockData[$id_joya])) {
    echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
    exit;
}

if ($stockData[$id_joya] >= $cantidad) {
   
    $stockData[$id_joya] -= $cantidad;
    file_put_contents($stockFile, json_encode($stockData, JSON_PRETTY_PRINT));

    echo json_encode([
        'success' => true,
        'message' => 'Producto agregado al carrito con éxito.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Lo sentimos, solo hay ' . $stockData[$id_joya] . ' unidades disponibles en stock.'
    ]);
}
?>
