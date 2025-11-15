<!DOCTYPE html>
<html lang="zxx" class="no-js">

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
	<link rel="stylesheet" href="css/loginNavbar.css">
	<link rel="stylesheet" href="css/login.css">
	
	<!-- Bootstrap 5 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
							<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
							<li class="nav-item"><a class="nav-link" href="cart.php">Carrito</a></li>
							<li class="nav-item"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contacto</a></li>
							<li class="nav-item"><a class="nav-link" href="News.php">Noticias</a></li>
							<li class="nav-item"><a class="nav-link" href="Shop.php">Productos</a></li>
							<li id="auth-nav-item" class="nav-item active"><a class="nav-link" href="login.php">Iniciar sesion</a></li>
							<!--li class="nav-item" id="auth-nav-item">Se carga dinámicamente con JavaScript --></li-->
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->



<!-- div login -->
<section class="login-section" style="background-color: #f8f9fa;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card login-card login-compact" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/webfonts/imgLogin.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-gem fa-2x me-3" style="color: #8B4513;"></i>
                    <span class="h1 fw-bold mb-0" style="color: #8B4513;">Joyas Charly's</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; color: #8B4513;">Inicia sesión en tu cuenta</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="emailSesion" class="form-control form-control-lg" />
                    <label class="form-label" for="emailSesion">Correo electrónico</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="pasSesion" class="form-control form-control-lg" />
                    <label class="form-label" for="pasSesion">Contraseña</label>
					<p id="ErrorCredenciales" class="" style="color:red"></p>
                  </div>
				
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="rememberMe" />
                    <label class="form-check-label" for="rememberMe">
                      Recordar mis datos
                    </label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button id = "btnSesion" class="btn btn-login btn-lg btn-block text-white w-100" type="button">Iniciar sesión</button>
                  </div>

                  <div class="login-links">
                    <a class="small" href="#!">¿Olvidaste tu contraseña?</a>
                    <p class="mb-4" style="color: #393f81;">¿No tienes una cuenta? 
                      <a href="#!" style="color: #8B4513;">Regístrate aquí</a>
                    </p>
                    <div class="d-flex justify-content-between small">
                      <a href="#!">Términos de uso</a>
                      <a href="#!">Políticas de privacidad</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="toast" style="position: fixed; top: 100px; right: 20px; z-index: 9999;" role="alert" aria-live="assertive" aria-atomic="true" id="modalError" >
      <div class="toast-header bg-info">
        <img src="assets/webfonts/error.png" hspace="20px" height="20px" class="rounded me-2" alt="...">
        <strong class="me-auto">Error</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <h5 id="textError"></h5>
      </div>
    </div>
</section>
<!-- end login -->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Mas Informacion:</h6>
						<p style="color: #666;">
						“Descubre la elegancia y el lujo con nuestra exclusiva colección de joyería de las mejores marcas. Cada pieza está diseñada para resaltar tu belleza y estilo, ofreciendo calidad y sofisticación en cada detalle. Tu destino definitivo para joyas que marcan la diferencia en cada ocasión.”
						</p>
					</div>
					<div>
				<p class="footer-text m-0" style="color: #666;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
				</div>
		
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<!-- Scripts -->
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>

	<script src="js/validator.js"></script>
	<script src="js/sessionManager.js"></script>
	<script src="js/login.js"></script>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>