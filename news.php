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
			padding: 25px;
		}
		.news-text-box h3 a {
			color: #333;
			text-decoration: none;
			font-weight: 700;
			line-height: 1.4;
		}
		.news-text-box h3 a:hover {
			color: #ff6b6b;
		}
		.blog-meta {
			color: #666;
			font-size: 14px;
			margin-bottom: 15px;
		}
		.blog-meta span {
			margin-right: 15px;
		}
		.excerpt {
			color: #555;
			line-height: 1.6;
			margin-bottom: 20px;
		}
		.read-more-btn {
			color: #ff6b6b;
			font-weight: 600;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			transition: all 0.3s ease;
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

							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="login.php">Iniciar sesion</a></li>
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

			<div class="row" id="news-container">
				<?php
				// Simulamos las noticias por página
				$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
				$noticias_por_pagina = 3;
				
				// Todas las noticias (9 noticias totales)
				$todas_noticias = [
					// Página 1
					[
						'id' => 1, 'titulo' => 'Tendencias de Joyería 2024: Lo que viene', 
						'categoria' => 'tendencias', 'imagen' => 'img/noticias/Tendencias-2024.png',
						'fecha' => '15 Enero, 2024', 'autor' => 'Admin'
					],
					[
						'id' => 2, 'titulo' => 'Joyería Personalizada: Crea tu estilo único', 
						'categoria' => 'novedades', 'imagen' => 'img/noticias/Joyeria-personalizada.png',
						'fecha' => '10 Enero, 2024', 'autor' => 'Admin'
					],
					[
						'id' => 3, 'titulo' => 'Guía para el cuidado de tus joyas', 
						'categoria' => 'consejos', 'imagen' => 'img/noticias/Cuidado-de-joyas.png',
						'fecha' => '5 Enero, 2024', 'autor' => 'Admin'
					],
					// Página 2
					[
						'id' => 4, 'titulo' => 'El oro rosa regresa con fuerza', 
						'categoria' => 'tendencias', 'imagen' => 'img/noticias/Oro-rosa.png',
						'fecha' => '28 Diciembre, 2023', 'autor' => 'Admin'
					],
					[
						'id' => 5, 'titulo' => 'Cómo elegir diamantes perfectos', 
						'categoria' => 'consejos', 'imagen' => 'img/noticias/Diamantes-perfectos.png',
						'fecha' => '20 Diciembre, 2023', 'autor' => 'Especialista'
					],
					[
						'id' => 6, 'titulo' => 'Nuestra apuesta por la joyería sostenible', 
						'categoria' => 'empresa', 'imagen' => 'img/noticias/Joyeria-sostenible.png',
						'fecha' => '15 Diciembre, 2023', 'autor' => 'Director'
					],
					// Página 3
					[
						'id' => 7, 'titulo' => 'Plata 925: La elección perfecta para joyería diaria', 
						'categoria' => 'consejos', 'imagen' => 'img/noticias/Plata-925.png',
						'fecha' => '10 Diciembre, 2023', 'autor' => 'Especialista'
					],
					[
						'id' => 8, 'titulo' => 'Nueva colección Primavera-Verano 2024', 
						'categoria' => 'empresa', 'imagen' => 'img/noticias/Nueva-coleccion.png',
						'fecha' => '5 Diciembre, 2023', 'autor' => 'Admin'
					],
					[
						'id' => 9, 'titulo' => 'Joyas para bodas: Lo que debes saber', 
						'categoria' => 'consejos', 'imagen' => 'img/noticias/Joyas-bodas.png',
						'fecha' => '30 Noviembre, 2023', 'autor' => 'Admin'
					]
				];
				
				// Calculamos qué noticias mostrar
				$total_noticias = count($todas_noticias);
				$total_paginas = ceil($total_noticias / $noticias_por_pagina);
				$inicio = ($current_page - 1) * $noticias_por_pagina;
				$noticias_pagina = array_slice($todas_noticias, $inicio, $noticias_por_pagina);
				
				// Generamos TODAS las noticias pero controlamos visibilidad
				foreach($todas_noticias as $index => $noticia) {
					$categoria_texto = [
						'tendencias' => 'Tendencias',
						'consejos' => 'Consejos', 
						'novedades' => 'Novedades',
						'empresa' => 'JoyasCharlys'
					][$noticia['categoria']];
					
					// Determinamos si la noticia está en la página actual
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
									<span class="date"><i class="fas fa-calendar"></i> '.$noticia['fecha'].'</span>
								</p>
								<p class="excerpt">'.substr($noticia['titulo'], 0, 80).'... Descubre más sobre este interesante tema en nuestra nota completa.</p>
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
	</script>

</body>
</html>