<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar los datos del formulario
    $titulo = trim($_POST['titulo'] ?? '');
    $categoria = $_POST['categoria'] ?? '';
    $contenido = trim($_POST['contenido'] ?? '');
    $autor = trim($_POST['autor'] ?? '');
    $fecha = $_POST['fecha'] ?? '';
    $resumen = trim($_POST['resumen'] ?? '');
    
    // Validaciones básicas
    if (empty($titulo) || empty($categoria) || empty($contenido) || empty($autor) || empty($fecha)) {
        die("Error: Todos los campos obligatorios deben ser completados.");
    }
    
    // LISTA DE IMÁGENES QUE SABEMOS QUE EXISTEN
    $imagenes_disponibles = [
        'img/noticias/Tendencias-2024.png',
        'img/noticias/Joyeria-personalizada.png',
        'img/noticias/Cuidado-de-joyas.png',
        'img/noticias/Oro-rosa.png',
        'img/noticias/Diamantes-perfectos.png',
        'img/noticias/Joyeria-sostenible.png',
        'img/noticias/Plata-925.png',
        'img/noticias/Nueva-coleccion.png',
        'img/noticias/Joyas-bodas.png'
    ];
    
    // Usar una imagen aleatoria de las disponibles
    $imagen = $imagenes_disponibles[array_rand($imagenes_disponibles)];
    
    // OPCIONAL: Si quieres permitir subir imágenes, descomenta esto:
    /*
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'img/noticias/';
        
        // Crear directorio si no existe
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Generar nombre único para la imagen
        $fileExtension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $fileName = 'noticia-' . time() . '-' . uniqid() . '.' . $fileExtension;
        $uploadFile = $uploadDir . $fileName;
        
        // Validar tipo de archivo
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array(strtolower($fileExtension), $allowedTypes)) {
            die("Error: Solo se permiten archivos JPG, JPEG, PNG, GIF y WEBP.");
        }
        
        // Validar tamaño (2MB máximo)
        if ($_FILES['imagen']['size'] > 2 * 1024 * 1024) {
            die("Error: La imagen es demasiado grande. El tamaño máximo permitido es 2MB.");
        }
        
        // Mover archivo subido
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadFile)) {
            $imagen = $uploadFile;
        }
    }
    */
    
    // Leer noticias existentes
    $newsFile = 'news-data.json';
    $noticias = [];
    
    if (file_exists($newsFile)) {
        $jsonData = file_get_contents($newsFile);
        $noticias = json_decode($jsonData, true) ?? [];
    }
    
    // Generar nuevo ID (empezar desde 1000 para evitar conflictos con noticias estáticas)
    $nuevo_id = 1000;
    if (!empty($noticias)) {
        $ids = array_column($noticias, 'id');
        $nuevo_id = max($ids) + 1;
    }
    
    // Crear nueva noticia
    $nueva_noticia = [
        'id' => $nuevo_id,
        'titulo' => $titulo,
        'categoria' => $categoria,
        'imagen' => $imagen,
        'fecha' => $fecha,
        'autor' => $autor,
        'contenido' => $contenido,
        'resumen' => $resumen ?: substr($contenido, 0, 150) . '...'
    ];
    
    // Agregar nueva noticia al array
    $noticias[] = $nueva_noticia;
    
    // Guardar en el archivo JSON
    if (file_put_contents($newsFile, json_encode($noticias, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        // Redireccionar a news.php con mensaje de éxito
        header("Location: News.php?success=1");
        exit();
    } else {
        die("Error: No se pudo guardar la noticia.");
    }
} else {
    header("Location: crear-noticia.php");
    exit();
}
?>