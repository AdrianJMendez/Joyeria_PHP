<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../Config/conexion.php'; // Ajusta la ruta según tu estructura

// Verificamos que se haya enviado el correo
if (!isset($_GET['email'])) {
    echo json_encode(['success' => false, 'message' => 'Correo no proporcionado']);
    exit;
}

$email = $_GET['email'];

// Consulta del usuario por correo
$query = $conexion->prepare("SELECT nombre, email, direccion, telefono FROM usuarios WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    echo json_encode(['success' => true, 'data' => $usuario]);
} else {
    echo json_encode(['success' => false, 'message' => 'Usuario no encontrado']);
}

$query->close();
$conexion->close();
?>
