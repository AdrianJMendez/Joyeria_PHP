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
							<a href="#" style="color: #cccccc; margin-right: 15px; font-size: 20px;"><i class="fab fa-facebook-f"></i></a>
							<a href="https://www.instagram.com/joyas.charlys/" style="color: #cccccc; margin-right: 15px; font-size: 20px;"><i class="fab fa-instagram"></i></a>
							<a href="#" style="color: #cccccc; margin-right: 15px; font-size: 20px;"><i class="fab fa-whatsapp"></i></a>
							<a href="#" style="color: #cccccc; font-size: 20px;"><i class="fab fa-tiktok"></i></a>
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