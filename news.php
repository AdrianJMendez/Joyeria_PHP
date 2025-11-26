<?php
session_start();

// Función para formatear el excerpt
function formatearExcerpt($texto, $longitud = 120) {
    // Limpiar el texto de HTML tags
    $texto_limpio = strip_tags($texto);
    
    // Recortar a la longitud deseada
    if (strlen($texto_limpio) > $longitud) {
        $texto_limpio = substr($texto_limpio, 0, $longitud) . '...';
    }
    
    // Asegurar saltos de línea
    $texto_limpio = nl2br($texto_limpio);
    
    return $texto_limpio;
}

// Verificar si el usuario está logueado y es administrador
$mostrarBoton = isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Noticias y tendencias sobre joyería - JoyasCharlys">

	<!-- title -->
	<title>Noticias de Joyería - JoyasCharlys</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
	<!-- Font Awesome actualizado para TikTok -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!--css necesarios para cambiar btn-login-->
	<link rel="stylesheet" href="css/loginNavbar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		.news-categories {
			margin-bottom: 30px;
		}
		.news-categories .btn {
			margin: 5px;
			border-radius: 20px;
			border: 2px solid #ff6b6b;
			color: #ff6b6b;
			font-weight: 600;
			transition: all 0.3s ease;
		}
		.news-categories .btn:hover,
		.news-categories .btn.active {
			background: #ff6b6b;
			color: white;
			transform: translateY(-2px);
			box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
		}
		.single-latest-news {
			transition: transform 0.3s ease;
			border-radius: 15px;
			overflow: hidden;
			box-shadow: 0 8px 25px rgba(0,0,0,0.1);
			margin-bottom: 30px;
			background: white;
		}
		.single-latest-news:hover {
			transform: translateY(-10px);
			box-shadow: 0 15px 35px rgba(0,0,0,0.15);
		}
		.latest-news-bg {
			height: 250px;
			background-size: cover;
			background-position: center;
			position: relative;
		}
		.news-tag {
			position: absolute;
			top: 15px;
			right: 15px;
			background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
			color: white;
			padding: 6px 15px;
			border-radius: 20px;
			font-size: 12px;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 0.5px;
		}
		.news-text-box {
			min-height: 280px;
			display: flex;
			flex-direction: column;
			flex-shrink: 0;
			flex-grow: 1;
			flex-shrink: 0;
    		margin-top: auto;
		}
		.news-text-box h3 a {
			color: #333;
			text-decoration: none;
			font-weight: 700;
			line-height: 1.4;
			min-height: 70px;
    		display: flex;
    		align-items: center;
		}
		.news-text-box h3 a:hover {
			color: #ff6b6b;
		}
		.blog-meta {
			color: #666;
			font-size: 14px;
			margin-bottom: 15px;
			flex-shrink: 0;
		}
		.blog-meta span {
			margin-right: 15px;
		}
		.excerpt {
			color: #555;
			line-height: 1.6;
			margin-bottom: 20px;
			flex-grow: 1;
			word-wrap: break-word !important;
			overflow-wrap: break-word !important;
			white-space: normal !important;
			line-height: 1.5 !important;
			height: 60px;
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
		}
		.read-more-btn {
			color: #ff6b6b;
			font-weight: 600;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			transition: all 0.3s ease;
			flex-shrink: 0;
    		margin-top: auto;
		}
		.read-more-btn:hover {
			color: #ff5252;
			transform: translateX(5px);
		}
		
		/* Paginación mejorada */
		.pagination-wrap {
			margin-top: 50px;
		}
		.pagination-wrap ul {
			display: flex;
			justify-content: center;
			list-style: none;
			padding: 0;
			margin: 0;
		}
		.pagination-wrap ul li {
			margin: 0 5px;
		}
		.pagination-wrap ul li a {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 45px;
			height: 45px;
			border: 2px solid #e0e0e0;
			border-radius: 50%;
			color: #666;
			text-decoration: none;
			font-weight: 600;
			transition: all 0.3s ease;
		}
		.pagination-wrap ul li a:hover,
		.pagination-wrap ul li a.active {
			background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
			color: white;
			border-color: #ff6b6b;
			transform: translateY(-3px);
			box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
		}
		.pagination-wrap ul li a.disabled {
			opacity: 0.5;
			pointer-events: none;
			cursor: not-allowed;
		}
		
		/* Ocultar paginación cuando se filtra */
		.pagination-wrap.hidden {
			display: none;
		}
		
		/* Para noticias ocultas inicialmente */
		.news-item.hidden-by-page {
			display: none !important;
		}

		
	</style>
</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/fav.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>

							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="cart.php">Carrito</a></li>
							</li>

							<!--
							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="404.php">404 Page</a></li>
							</li>
							-->

							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="about.php">Sobre Nosotros</a></li>
							</li>

							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="contact.php">Contacto</a></li>
							</li>


							<li class="nav-item active submenu dropdown">
							<a class="nav-link" href="News.php">Noticias</a></li>
							</li>

							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="Shop.php">Productos</a></li>
							</li>

							<li class="nav-item" id="auth-nav-item">
								<!-- SessionManager.js se encargará de poner "Iniciar sesión" o el nombre del usuario -->
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Las últimas tendencias y novedades en joyería</p>
						<h1>Noticias de Joyería</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- Mensaje de éxito -->
	<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fas fa-check-circle"></i> ¡Noticia creada exitosamente!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			
			<!-- Categorías -->
			<div class="row news-categories">
				<div class="col-lg-12 text-center">
					<button class="btn btn-outline-primary active" data-filter="all">Todas</button>
					<button class="btn btn-outline-primary" data-filter="tendencias">Tendencias</button>
					<button class="btn btn-outline-primary" data-filter="consejos">Consejos</button>
					<button class="btn btn-outline-primary" data-filter="novedades">Novedades</button>
					<button class="btn btn-outline-primary" data-filter="empresa">JoyasCharlys</button>
				</div>
			</div>

			<!-- Botón Crear Noticia (se mostrará/ocultará con JavaScript) -->
			<div class="row mb-4" id="crear-noticia-container" style="display: none;">
				<div class="col-lg-12 text-center">
					<a href="crear-noticia.php" class="btn btn-success btn-lg">
						<i class="fas fa-plus-circle"></i> Crear Nueva Noticia
					</a>
				</div>
			</div>

			<div class="row" id="news-container">
    <?php
    // Configuración de noticias estáticas
    $todas_noticias = [
        // Página 1
        [
            'id' => 1, 
            'titulo' => 'Tendencias de Joyería 2024: Lo que viene', 
            'categoria' => 'tendencias', 
            'imagen' => 'img/noticias/Tendencias-2024.png',
            'fecha' => '2024-01-15', 
            'autor' => 'Admin',
            'contenido' => 'Descubre las últimas tendencias en joyería para el 2024. Este año veremos un regreso a los diseños clásicos con un toque moderno.', 
            'resumen' => 'Las tendencias de joyería para 2024 incluyen diseños minimalistas y piezas personalizadas.'
        ],
        [
            'id' => 2, 
            'titulo' => 'Joyería Personalizada: Crea tu estilo único', 
            'categoria' => 'novedades', 
            'imagen' => 'img/noticias/Joyeria-personalizada.png',
            'fecha' => '2024-01-10', 
            'autor' => 'Admin',
            'contenido' => 'La joyería personalizada permite crear piezas únicas que reflejan tu personalidad y estilo. En JoyasCharlys ofrecemos servicio de diseño personalizado.',
            'resumen' => 'Aprende sobre las ventajas de la joyería personalizada y cómo crear tu estilo único.'
        ],
        [
            'id' => 3, 
            'titulo' => 'Guía para el cuidado de tus joyas', 
            'categoria' => 'consejos', 
            'imagen' => 'img/noticias/Cuidado-de-joyas.png',
            'fecha' => '2024-01-05', 
            'autor' => 'Admin',
            'contenido' => 'Aprende cómo cuidar tus joyas para que duren toda la vida. Tips prácticos para mantenimiento y limpieza.',
            'resumen' => 'Consejos prácticos para el mantenimiento y cuidado de tus joyas.'
        ],
        // Página 2
        [
            'id' => 4, 
            'titulo' => 'El oro rosa regresa con fuerza', 
            'categoria' => 'tendencias', 
            'imagen' => 'img/noticias/Oro-rosa.png',
            'fecha' => '2023-12-28', 
            'autor' => 'Admin',
            'contenido' => 'El oro rosa está regresando con fuerza en las tendencias de joyería. Descubre cómo incorporarlo en tu colección.',
            'resumen' => 'Descubre por qué el oro rosa está resurgiendo en la joyería contemporánea.'
        ],
        [
            'id' => 5, 
            'titulo' => 'Cómo elegir diamantes perfectos', 
            'categoria' => 'consejos', 
            'imagen' => 'img/noticias/Diamantes-perfectos.png',
            'fecha' => '2023-12-20', 
            'autor' => 'Especialista',
            'contenido' => 'Aprende a elegir diamantes perfectos considerando las 4 C: corte, color, claridad y quilates.',
            'resumen' => 'Guía completa para seleccionar diamantes de calidad.'
        ],
        [
            'id' => 6, 
            'titulo' => 'Nuestra apuesta por la joyería sostenible', 
            'categoria' => 'empresa', 
            'imagen' => 'img/noticias/Joyeria-sostenible.png',
            'fecha' => '2023-12-15', 
            'autor' => 'Director',
            'contenido' => 'En JoyasCharlys nos comprometemos con la joyería sostenible y prácticas responsables.',
            'resumen' => 'Nuestro compromiso con prácticas sostenibles en joyería.'
        ],
        // Página 3
        [
            'id' => 7, 
            'titulo' => 'Plata 925: La elección perfecta para joyería diaria', 
            'categoria' => 'consejos', 
            'imagen' => 'img/noticias/Plata-925.png',
            'fecha' => '2023-12-10', 
            'autor' => 'Especialista',
            'contenido' => 'La plata 925 es ideal para joyería de uso diario por su durabilidad y belleza.',
            'resumen' => 'Por qué la plata 925 es perfecta para joyas de uso cotidiano.'
        ],
        [
            'id' => 8, 
            'titulo' => 'Nueva colección Primavera-Verano 2024', 
            'categoria' => 'empresa', 
            'imagen' => 'img/noticias/Nueva-coleccion.png',
            'fecha' => '2023-12-05', 
            'autor' => 'Admin',
            'contenido' => 'Presentamos nuestra nueva colección Primavera-Verano 2024 con diseños exclusivos.',
            'resumen' => 'Descubre nuestra exclusiva colección para la temporada.'
        ],
        [
            'id' => 9, 
            'titulo' => 'Joyas para bodas: Lo que debes saber', 
            'categoria' => 'consejos', 
            'imagen' => 'img/noticias/Joyas-bodas.png',
            'fecha' => '2023-11-30', 
            'autor' => 'Admin',
            'contenido' => 'Todo lo que necesitas saber sobre joyas para bodas: desde la elección hasta el cuidado.',
            'resumen' => 'Consejos para elegir las joyas perfectas para tu boda.'
        ]
    ];

    // Leer noticias adicionales del archivo JSON si existe
    $newsFile = 'news-data.json';
    if (file_exists($newsFile)) {
        $jsonData = file_get_contents($newsFile);
        $noticias_json = json_decode($jsonData, true) ?? [];
        
        // Combinar noticias estáticas con las del JSON
        if (!empty($noticias_json)) {
            $todas_noticias = array_merge($noticias_json, $todas_noticias);
        }
    }
    
    // Ordenar noticias por fecha (más recientes primero)
    usort($todas_noticias, function($a, $b) {
        return strtotime($b['fecha']) - strtotime($a['fecha']);
    });
    
    // Configuración de paginación
    $current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $noticias_por_pagina = 3;
    $total_noticias = count($todas_noticias);
    $total_paginas = ceil($total_noticias / $noticias_por_pagina);
    $inicio = ($current_page - 1) * $noticias_por_pagina;
    $noticias_pagina = array_slice($todas_noticias, $inicio, $noticias_por_pagina);
    
    // Generar las noticias
    foreach($todas_noticias as $index => $noticia) {
        $categoria_texto = [
            'tendencias' => 'Tendencias',
            'consejos' => 'Consejos', 
            'novedades' => 'Novedades',
            'empresa' => 'JoyasCharlys'
        ][$noticia['categoria']];
        
        // Formatear fecha para mostrar
        $fecha_formateada = date('d F, Y', strtotime($noticia['fecha']));
        
        // Determinar si la noticia está en la página actual
        $is_current_page = in_array($noticia, $noticias_pagina);
        $hidden_class = $is_current_page ? '' : 'hidden-by-page';
        
        echo '
		<div class="col-lg-4 col-md-6 news-item ' . $hidden_class . '" data-category="'.$noticia['categoria'].'" data-page="'.ceil(($index + 1) / $noticias_por_pagina).'">
			<div class="single-latest-news">
				<div class="latest-news-bg" style="background-image: url(\''.$noticia['imagen'].'\')"></div>
				<span class="news-tag">'.$categoria_texto.'</span>
				<div class="news-text-box">
					<h3><a href="single-news.php?id='.$noticia['id'].'">'.$noticia['titulo'].'</a></h3>
					<p class="blog-meta">
						<span class="author"><i class="fas fa-user"></i> '.$noticia['autor'].'</span>
						<span class="date"><i class="fas fa-calendar"></i> '.$fecha_formateada.'</span>
					</p>
					<p class="excerpt">'.($noticia['resumen'] ?? formatearExcerpt($noticia['contenido'], 120)).'</p>
					<a href="single-news.php?id='.$noticia['id'].'" class="read-more-btn">leer más <i class="fas fa-angle-right"></i></a>
				</div>
			</div>
		</div>';
    }
    ?>
</div>

			<!-- Paginación funcional -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap" id="pagination">
                        <ul>
                            <?php
                            // Botón Anterior
                            if($current_page > 1) {
                                echo '<li><a href="News.php?page='.($current_page - 1).'"><i class="fas fa-chevron-left"></i></a></li>';
                            } else {
                                echo '<li><a href="#" class="disabled"><i class="fas fa-chevron-left"></i></a></li>';
                            }
                            
                            // Números de página
                            for($i = 1; $i <= $total_paginas; $i++) {
                                if($i == $current_page) {
                                    echo '<li><a href="News.php?page='.$i.'" class="active">'.$i.'</a></li>';
                                } else {
                                    echo '<li><a href="News.php?page='.$i.'">'.$i.'</a></li>';
                                }
                            }
                            
                            // Botón Siguiente
                            if($current_page < $total_paginas) {
                                echo '<li><a href="News.php?page='.($current_page + 1).'"><i class="fas fa-chevron-right"></i></a></li>';
                            } else {
                                echo '<li><a href="#" class="disabled"><i class="fas fa-chevron-right"></i></a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- start footer Area -->
	<footer class="footer-area section_gap" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);">
		<div class="container">
			<div class="row">
				<!-- Información de la empresa -->
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-footer-widget">
						<div class="footer-logo">
							<img src="img/fav.png" alt="Joyas Charly's" style="height: 50px; margin-bottom: 15px;">
						</div>
						<h6 style="color: #ffd700; margin-bottom: 20px;">Joyería Charly's</h6>
						<p style="color: #cccccc; line-height: 1.8;">
							"Descubre la elegancia y el lujo con nuestra exclusiva colección de joyería. Cada pieza está diseñada para resaltar tu belleza y estilo, ofreciendo calidad y sofisticación en cada detalle."
						</p>
												<div class="footer-social" style="margin-top: 20px;">
    <a href="#" style="color: #cccccc; margin-right: 15px; text-decoration: none;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
        </svg>
    </a>
    <a href="https://www.instagram.com/joyas.charlys/" style="color: #cccccc; margin-right: 15px; text-decoration: none;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
    </a>
    <a href="#" style="color: #cccccc; margin-right: 15px; text-decoration: none;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893-.001-3.189-1.262-6.187-3.55-8.444"/>
        </svg>
    </a>
      <a href="#" style="color: #cccccc; text-decoration: none; display: inline-block; transition: all 0.3s ease;">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" style="vertical-align: middle;">
            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
        </svg>
    </a>
</div>
					</div>
				</div>

				<!-- Enlaces rápidos -->
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 style="color: #ffd700; margin-bottom: 20px;">Enlaces Rápidos</h6>
						<ul class="footer-list" style="list-style: none; padding: 0;">
							<li><a href="index.php" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Inicio</a></li>
							<li><a href="Shop.php" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Productos</a></li>
							<li><a href="about.php" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Sobre Nosotros</a></li>
							<li><a href="News.php" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Noticias</a></li>
						</ul>
					</div>
				</div>

				<!-- Servicios -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 style="color: #ffd700; margin-bottom: 20px;">Nuestros Servicios</h6>
						<ul class="footer-list" style="list-style: none; padding: 0;">
							<li><a href="#" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Joyería Personalizada</a></li>
							<li><a href="#" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Engaste de Piedras</a></li>
							<li><a href="#" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Limpieza Profesional</a></li>
							<li><a href="#" style="color: #cccccc; text-decoration: none; line-height: 2.5;">Valuación de Joyas</a></li>
						</ul>
					</div>
				</div>

				<!-- Contacto -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 style="color: #ffd700; margin-bottom: 20px;">Contacto</h6>
						<div class="contact-info" style="color: #cccccc;">
							<p style="margin-bottom: 10px; color: #cccccc"><i class="fas fa-map-marker-alt" style="color: #ffd700; margin-right: 10px;"></i> Bo. El Centro, Ave Máximo Jerez <br> Casa 820 Tegucigalpa, Honduras</p>
							<p style="margin-bottom: 10px; color: #cccccc"><i class="fas fa-phone" style="color: #ffd700; margin-right: 10px;"></i> +504 9971-7820 <br>+504 9833-2595</p>
							<p style="margin-bottom: 10px; color: #cccccc"><i class="fas fa-envelope" style="color: #ffd700; margin-right: 10px;"></i> joyascharlys@gmail.com</p>
							<p style="margin-bottom: 10px; color: #cccccc"><i class="fas fa-clock" style="color: #ffd700; margin-right: 10px;"></i> Lun - Vie: 9:00 - 18:00 <br>SÁB: 10:00 AM a 6:00 PM <br>DOM: 11:00 AM a 4:00 PM</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #444;">
				<div class="col-lg-6 col-md-6">
					<p class="footer-text m-0" style="color: #cccccc;">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Joyería Charly's - Todos los derechos reservados
					</p>
				</div>
				<div class="col-lg-6 col-md-6 text-right">
					<p class="footer-text m-0" style="color: #cccccc;">
						Diseñado con <i class="fas fa-heart" style="color: #ff6b6b;"></i> para nuestros clientes
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

	<!-- JavaScript para funcionalidad MEJORADO -->
	<script>
		// Filtrado por categorías - VERSIÓN MEJORADA
		document.addEventListener('DOMContentLoaded', function() {
			const filterButtons = document.querySelectorAll('.news-categories .btn');
			const pagination = document.getElementById('pagination');
			let currentFilter = 'all';
			
			filterButtons.forEach(button => {
				button.addEventListener('click', function() {
					// Remover active de todos los botones
					filterButtons.forEach(btn => btn.classList.remove('active'));
					// Agregar active al botón clickeado
					this.classList.add('active');
					
					const filter = this.getAttribute('data-filter');
					currentFilter = filter;
					const newsItems = document.querySelectorAll('.news-item');
					
					// Contador para saber si hay resultados
					let visibleCount = 0;
					
					newsItems.forEach(item => {
						if (filter === 'all') {
							// Para "Todas", mostramos solo las de la página actual
							const itemPage = parseInt(item.getAttribute('data-page'));
							const currentPage = <?php echo $current_page; ?>;
							
							if (itemPage === currentPage) {
								item.classList.remove('hidden-by-page');
								visibleCount++;
							} else {
								item.classList.add('hidden-by-page');
							}
						} else {
							// Para categorías específicas, mostramos todas de esa categoría
							const itemCategory = item.getAttribute('data-category');
							if (itemCategory === filter) {
								item.classList.remove('hidden-by-page');
								visibleCount++;
							} else {
								item.classList.add('hidden-by-page');
							}
						}
					});
					
					// Mostrar u ocultar paginación
					if (filter === 'all') {
						pagination.classList.remove('hidden');
					} else {
						pagination.classList.add('hidden');
					}
					
					// Si no hay resultados, mostrar mensaje
					if (visibleCount === 0) {
						const noResults = document.getElementById('no-results');
						if (!noResults) {
							const noResultsMsg = document.createElement('div');
							noResultsMsg.id = 'no-results';
							noResultsMsg.className = 'col-12 text-center';
							noResultsMsg.innerHTML = '<p style="font-size: 1.2rem; color: #666; margin-top: 50px;">No se encontraron noticias en esta categoría.</p>';
							document.getElementById('news-container').appendChild(noResultsMsg);
						}
					} else {
						const noResults = document.getElementById('no-results');
						if (noResults) {
							noResults.remove();
						}
					}
				});
			});
			
			// Al cargar la página, aplicar el filtro actual si existe
			const activeFilter = document.querySelector('.news-categories .btn.active');
			if (activeFilter) {
				activeFilter.click();
			}
		});

		
		// Verificar si el usuario es administrador y mostrar botón
		document.addEventListener('DOMContentLoaded', function() {
			const usuario = SessionManager.obtenerUsuario();
			const crearNoticiaContainer = document.getElementById('crear-noticia-container');
			
			if (usuario && usuario.rol === 'Administrador' && crearNoticiaContainer) {
				crearNoticiaContainer.style.display = 'block';
			}
		});

	</script>
	<!--Script necesarios para login-->
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/sessionManager.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>