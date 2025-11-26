<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Noticia completa - JoyasCharlys">
    
    <title>Noticia - JoyasCharlys</title>
    
    <!-- Todos tus estilos existentes -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"> <!-- Corregida ruta -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    
    <!-- Solo una versión de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        /* Asegurar que el header sea visible */
        .header_area {
            background: #fff !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 9999;
        }
        
        .sticky-header {
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 9999;
        }
        
        .main_menu {
            background: #fff !important;
        }
        
        .navbar-light .navbar-nav .nav-link {
            color: #333 !important;
            font-weight: 500;
        }
        
        .navbar-light .navbar-nav .nav-link:hover {
            color: #ff6b6b !important;
        }

        .news-detail-section {
            padding: 80px 0;
            margin-top: 20px; /* Espacio para el header sticky */
        }
        
        .news-header {
            margin-bottom: 40px;
            text-align: center;
        }
        
        .news-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }
        
        .news-meta {
            color: #666;
            font-size: 1rem;
            margin-bottom: 30px;
        }
        
        .news-meta span {
            margin: 0 15px;
        }
        
        .news-featured-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 40px;
        }
        
        .news-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }
        
        .news-content p {
            margin-bottom: 25px;
        }
        
        .news-content h3 {
            color: #333;
            margin: 40px 0 20px 0;
            font-weight: 600;
        }
        
        .news-content ul {
            margin-bottom: 25px;
            padding-left: 20px;
        }
        
        .news-content li {
            margin-bottom: 10px;
        }
        
        .back-to-news {
            display: inline-flex;
            align-items: center;
            color: #ff6b6b;
            font-weight: 600;
            text-decoration: none;
            margin-top: 40px;
            transition: all 0.3s ease;
        }
        
        .back-to-news:hover {
            color: #ff5252;
            transform: translateX(-5px);
        }
        
        .related-news {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 2px solid #f0f0f0;
        }
        
        .related-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
        }

        /* Estilos para las noticias relacionadas */
        .single-latest-news {
            margin-bottom: 30px;
        }
        
        .latest-news-bg {
            height: 200px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        
        .news-text-box h4 a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
        }
        
        .news-text-box h4 a:hover {
            color: #ff6b6b;
        }
        
        .read-more-btn {
            color: #ff6b6b;
            font-weight: 600;
            text-decoration: none;
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
    
    <!-- Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Logo corregido -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="img/fav.png" alt="Joyas Charly's" style="height: 40px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">Carrito</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contacto</a></li>
                            <li class="nav-item active"><a class="nav-link" href="News.php">Noticias</a></li>
                            <li class="nav-item"><a class="nav-link" href="Shop.php">Productos</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Iniciar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header Area -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Descubre las últimas novedades en joyería</p>
                        <h1>Noticia Completa</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- News Detail Section -->
    <div class="news-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <?php
                    // Simulamos el contenido de las noticias
                    $news_id = isset($_GET['id']) ? intval($_GET['id']) : 1;
                    
                    $noticias_completas = [
                        1 => [
                            'titulo' => 'Tendencias de Joyería 2024: Lo que viene',
                            'imagen' => 'img/noticias/Tendencias-2024.png',
                            'fecha' => '15 Enero, 2024',
                            'autor' => 'Admin',
                            'categoria' => 'Tendencias',
                            'contenido' => '
                                <p>El mundo de la joyería está en constante evolución, y 2024 promete traer consigo una ola de innovación y estilo que marcará un antes y un después en la industria. Los diseñadores más prestigiosos han comenzado a revelar sus colecciones, y podemos observar patrones fascinantes que definirán el año.</p>
                                
                                <h3>Los Colores que Dominarán</h3>
                                <p>El oro rosa continúa su reinado, pero con un giro interesante: ahora se combina con piedras semipreciosas en tonos tierra. Los verdes oliva, los azules profundos y los rosas sutiles están ganando popularidad entre las casas de joyería más exclusivas.</p>
                                
                                <h3>Materiales Sostenibles</h3>
                                <p>La conciencia ecológica ha llegado para quedarse en la joyería. Marcas líderes están implementando:</p>
                                <ul>
                                    <li>Oro reciclado con certificación</li>
                                    <li>Diamantes de laboratorio</li>
                                    <li>Materiales de origen ético</li>
                                    <li>Embalajes biodegradables</li>
                                </ul>
                                
                                <h3>Diseños Personalizados</h3>
                                <p>La joyería personalizada sigue en auge, con un enfoque en piezas que cuentan historias personales. Los clientes buscan creaciones únicas que reflejen su identidad y momentos significativos de sus vidas.</p>
                                
                                <p>En JoyasCharlys estamos emocionados de incorporar estas tendencias en nuestras nuevas colecciones, siempre manteniendo nuestra esencia de calidad y elegancia que nos caracteriza.</p>
                            '
                        ],
                        // ... (el resto de tus noticias permanecen igual)
                        2 => [
                            'titulo' => 'Joyería Personalizada: Crea tu estilo único',
                            'imagen' => 'img/noticias/Joyeria-personalizada.png',
                            'fecha' => '10 Enero, 2024',
                            'autor' => 'Admin',
                            'categoria' => 'Novedades',
                            'contenido' => '
                                <p>En JoyasCharlys entendemos que cada persona es única, y por eso hemos desarrollado un servicio exclusivo de joyería personalizada que permite a nuestros clientes crear piezas que reflejen su estilo y personalidad.</p>
                                
                                <h3>¿Cómo Funciona Nuestro Servicio?</h3>
                                <p>Nuestro proceso de personalización es sencillo pero detallado:</p>
                                <ul>
                                    <li><strong>Consulta Inicial:</strong> Nuestros diseñadores se reúnen contigo para entender tu visión</li>
                                    <li><strong>Diseño Conceptual:</strong> Creamos bocetos digitales de tu pieza ideal</li>
                                    <li><strong>Selección de Materiales:</strong> Eliges entre oro, plata, platino y piedras preciosas</li>
                                    <li><strong>Fabricación Artesanal:</strong> Nuestros artesanos dan vida a tu diseño</li>
                                    <li><strong>Entrega y Ajustes:</strong> Te presentamos la pieza final y realizamos ajustes si es necesario</li>
                                </ul>
                                
                                <h3>Ocasiones Especiales</h3>
                                <p>Nuestras piezas personalizadas son perfectas para:</p>
                                <ul>
                                    <li>Bodas y aniversarios</li>
                                    <li>Regalos de compromiso</li>
                                    <li>Celebraciones familiares</li>
                                    <li>Logros profesionales</li>
                                    <li>Momentos especiales que merecen ser recordados</li>
                                </ul>
                                
                                <h3>Testimonios de Clientes</h3>
                                <p>"Creé un collar con las iniciales de mis hijos y es mi posesión más preciada. El equipo de JoyasCharlys captó exactamente lo que quería." - María G.</p>
                                
                                <p>¿Tienes una idea en mente? Contáctanos y hagámosla realidad juntos.</p>
                            '
                        ]
                    ];
                    
                    // Si la noticia no existe, mostramos la primera
                    if (!isset($noticias_completas[$news_id])) {
                        $news_id = 1;
                    }
                    
                    $noticia = $noticias_completas[$news_id];
                    ?>
                    
                    <article>
                        <div class="news-header">
                            <h1 class="news-title"><?php echo $noticia['titulo']; ?></h1>
                            <div class="news-meta">
                                <span><i class="fas fa-user"></i> <?php echo $noticia['autor']; ?></span>
                                <span><i class="fas fa-calendar"></i> <?php echo $noticia['fecha']; ?></span>
                                <span><i class="fas fa-tag"></i> <?php echo $noticia['categoria']; ?></span>
                            </div>
                        </div>
                        
                        <img src="<?php echo $noticia['imagen']; ?>" alt="<?php echo $noticia['titulo']; ?>" class="news-featured-img">
                        
                        <div class="news-content">
                            <?php echo $noticia['contenido']; ?>
                        </div>
                        
                        <a href="News.php" class="back-to-news">
                            <i class="fas fa-arrow-left"></i> Volver a Noticias
                        </a>
                    </article>
                    
                    <!-- Noticias Relacionadas -->
                    <div class="related-news">
                        <h3 class="related-title">Noticias Relacionadas</h3>
                        <div class="row">
                            <?php
                            // Mostramos 3 noticias relacionadas (excluyendo la actual)
                            $related_count = 0;
                            foreach($noticias_completas as $id => $related_news) {
                                if ($id != $news_id && $related_count < 3) {
                                    echo '
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-latest-news">
                                            <div class="latest-news-bg" style="background-image: url(\'' . $related_news['imagen'] . '\')"></div>
                                            <div class="news-text-box">
                                                <h4><a href="single-news.php?id=' . $id . '">' . $related_news['titulo'] . '</a></h4>
                                                <p class="blog-meta">
                                                    <span class="date"><i class="fas fa-calendar"></i> ' . $related_news['fecha'] . '</span>
                                                </p>
                                                <a href="single-news.php?id=' . $id . '" class="read-more-btn">leer más <i class="fas fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>';
                                    $related_count++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End News Detail Section -->

    <!-- Footer (igual que tenías) -->
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

</body>
</html>