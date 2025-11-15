<!DOCTYPE html>

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Joyeria</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

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
							<li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>

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


							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="News.php">Noticias</a></li>
							</li>

							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="Shop.php">Productos</a></li>
							</li>

							
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->



	<!--================Form Box Area =================-->
	<section class="login_box_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login_form_inner text-center">
                    <h3>Confirmar Pago</h3>
                    <form class="row login_form" action="procesar_pago.php" method="post" id="paymentForm" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <label for="id_usuario">ID de Usuario:</label>
                            <input type="text" class="form-control" id="id_usuario" name="id_usuario" readonly>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="numero_tarjeta">Número de Tarjeta:</label>
                            <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" readonly>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="total">Total a Pagar:</label>
                            <input type="text" class="form-control" id="total" name="total" readonly>
                        </div>
                        <div class="col-md-12 form-group">
						<button type="submit" class="primary-btn" onclick="aceptarPago()" >
						<a href="index.php">Aceptar Pago</a>
						</button>
                            <button type="reset" class="btn btn-default" onclick="window.location.href='index.php';">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




	<!--================End Form Box Area =================-->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Mas Informacion:</h6>
						<p>
						“Descubre la elegancia y el lujo con nuestra exclusiva colección de joyería de las mejores marcas. Cada pieza está diseñada para resaltar tu belleza y estilo, ofreciendo calidad y sofisticación en cada detalle. Tu destino definitivo para joyas que marcan la diferencia en cada ocasión.”
						</p>
					</div>
					<div>
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
				</div>
		
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<script src="js/script_shop2.js" type="text/javascript"></script>
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>