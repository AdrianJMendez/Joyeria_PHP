<?php
require_once 'includes/conexion.php';
$conexion = new Conexion();

// Obtener el id de la categoría desde la URL
$id_categoria = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar el nombre de la categoría
$sqlCategoria = $conexion->prepare("SELECT nombre_categoria FROM Categoria WHERE id_categoria = ?");
$sqlCategoria->execute([$id_categoria]);
$categoria = $sqlCategoria->fetch(PDO::FETCH_ASSOC);

// Consultar las joyas de esa categoría
$sqlJoyas = $conexion->prepare("SELECT * FROM Joyas WHERE id_categoria = ?");
$sqlJoyas->execute([$id_categoria]);
$joyas = $sqlJoyas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo $categoria ? $categoria['nombre_categoria'] : 'Categoría'; ?> | Joyería</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
  <h2 class="text-center mb-4">
    <?php echo $categoria ? htmlspecialchars($categoria['nombre_categoria']) : 'Productos'; ?>
  </h2>

  <div class="row">
    <?php if (count($joyas) > 0): ?>
      <?php foreach ($joyas as $joya): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="<?php echo $joya['imagen_url'] ?? 'img/default.jpg'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($joya['nombre']); ?>">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo htmlspecialchars($joya['nombre']); ?></h5>
              <p class="text-muted mb-1"><?php echo htmlspecialchars($joya['material']); ?></p>
              <p class="fw-bold text-dark">$<?php echo number_format($joya['precio'], 2); ?></p>
              <p class="small"><?php echo htmlspecialchars($joya['detalle']); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12 text-center">
        <h4>No hay productos disponibles en esta categoría.</h4>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="js/bootstrap.js"></script>
</body>
</html>
