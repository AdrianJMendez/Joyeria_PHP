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
		<style>
			.navbar-nav.menu_nav.ml-auto {
				margin-left: auto !important;
				margin-right: auto !important;
				justify-content: center !important;
			}

			.navbar-nav.menu_nav {
				width: auto !important;
				display: flex !important;
				justify-content: center !important;
			}

			.main_menu .navbar-collapse {
				justify-content: center !important;
			}

			.navbar-nav {
				flex-direction: row !important;
				justify-content: center !important;
			}
	</style>
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
                      <a href="#!" style="color: #8B4513;" data-bs-toggle="modal" data-bs-target="#modalRegistro">Regístrate aquí</a>
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
  
  <!-- Toast para errores -->
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
  
  <!-- Modal de Registro -->
  <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%); color: white;">
          <h5 class="modal-title" id="modalRegistroLabel">
            <i class="fas fa-user-plus me-2"></i>Crear Cuenta
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formRegistro">
            <div class="mb-3">
              <label for="nombreRegistro" class="form-label">Nombre completo</label>
              <input type="text" class="form-control" id="nombreRegistro" placeholder="Ingresa tu nombre completo" required>
              <div class="invalid-feedback">Por favor ingresa tu nombre completo</div>
            </div>
            
            <div class="mb-3">
              <label for="emailRegistro" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="emailRegistro" placeholder="ejemplo@correo.com" required>
              <div class="invalid-feedback">Por favor ingresa un correo válido</div>
            </div>
            
            <div class="mb-3">
              <label for="passwordRegistro" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="passwordRegistro" placeholder="Mínimo 6 caracteres" minlength="6" required>
              <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres</div>
            </div>
            
            <div class="mb-3">
              <label for="confirmarPassword" class="form-label">Confirmar contraseña</label>
              <input type="password" class="form-control" id="confirmarPassword" placeholder="Repite tu contraseña" required>
              <div class="invalid-feedback">Las contraseñas no coinciden</div>
            </div>
            
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="terminosRegistro" required>
              <label class="form-check-label small" for="terminosRegistro">
                Acepto los <a href="#!" style="color: #8B4513;">términos y condiciones</a> y las <a href="#!" style="color: #8B4513;">políticas de privacidad</a>
              </label>
              <div class="invalid-feedback">Debes aceptar los términos y condiciones</div>
            </div>
            
            <div class="d-grid">
              <button type="submit" class="btn btn-joyas btn-lg">
                <i class="fas fa-user-plus me-2"></i>Crear Cuenta
              </button>
            </div>
          </form>
          
          <div class="text-center mt-3">
            <p class="small mb-0">¿Ya tienes cuenta? 
              <a href="#" style="color: #8B4513;" data-bs-dismiss="modal">Inicia sesión</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end login -->

	<!-- start footer Area -->
	<footer style="background: #1a1a1a; padding: 20px 0; text-align: center;">
		<div class="container">
			<p style="color: #cccccc; margin: 0; font-size: 14px;">
				&copy; <?php echo date('Y'); ?> Joyería Charly's - Sistema de acceso
			</p>
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
	
	<!-- Script para manejar el registro -->
	<script>
	// Manejar el formulario de registro
	document.addEventListener('DOMContentLoaded', function() {
		const formRegistro = document.getElementById('formRegistro');
		const passwordRegistro = document.getElementById('passwordRegistro');
		const confirmarPassword = document.getElementById('confirmarPassword');
		
		// Validar que las contraseñas coincidan
		function validarPassword() {
			if (passwordRegistro.value !== confirmarPassword.value) {
				confirmarPassword.setCustomValidity('Las contraseñas no coinciden');
				return false;
			} else {
				confirmarPassword.setCustomValidity('');
				return true;
			}
		}
		
		passwordRegistro.addEventListener('change', validarPassword);
		confirmarPassword.addEventListener('keyup', validarPassword);
		
		// Manejar el envío del formulario
		formRegistro.addEventListener('submit', function(e) {
			e.preventDefault();
			
			if (!validarPassword()) {
				return;
			}
			
			if (formRegistro.checkValidity()) {
				// Preparar datos para enviar
				const datosRegistro = {
					nombre: document.getElementById('nombreRegistro').value,
					email: document.getElementById('emailRegistro').value,
					password: document.getElementById('passwordRegistro').value
				};
				
				console.log('📝 Enviando registro:', datosRegistro);
				registrarUsuario(datosRegistro);
			} else {
				formRegistro.classList.add('was-validated');
			}
		});
		
		// Función para registrar usuario
		function registrarUsuario(datos) {
			// Mostrar loading
			const btnSubmit = formRegistro.querySelector('button[type="submit"]');
			const originalText = btnSubmit.innerHTML;
			btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Registrando...';
			btnSubmit.disabled = true;
			
			// Enviar datos al servidor
			fetch('Controller/registroController.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
				},
				body: JSON.stringify(datos)
			})
			.then(response => response.json())
			.then(data => {
				if (data.status) {
					// Registro exitoso
					mostrarMensajeExito('¡Cuenta creada exitosamente! Redirigiendo...');
					
					// Cerrar modal después de 2 segundos
					setTimeout(() => {
						const modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistro'));
						modal.hide();
						
						// Limpiar formulario
						formRegistro.reset();
						formRegistro.classList.remove('was-validated');
						
						// Redirigir a login o autologin
						setTimeout(() => {
							window.location.href = 'login.php';
						}, 1000);
					}, 2000);
				} else {
					// Error en registro
					mostrarErrorRegistro(data.message);
				}
			})
			.catch(error => {
				console.error('Error:', error);
				mostrarErrorRegistro('Error de conexión. Intenta nuevamente.');
			})
			.finally(() => {
				// Restaurar botón
				btnSubmit.innerHTML = originalText;
				btnSubmit.disabled = false;
			});
		}
		
		function mostrarMensajeExito(mensaje) {
			// Puedes usar el toast existente o crear uno nuevo para éxito
			const toast = new bootstrap.Toast(document.getElementById('modalError'));
			const toastHeader = document.querySelector('#modalError .toast-header');
			const toastBody = document.querySelector('#modalError .toast-body h5');
			
			toastHeader.className = 'toast-header bg-success text-white';
			toastHeader.querySelector('strong').textContent = 'Éxito';
			toastBody.textContent = mensaje;
			
			toast.show();
		}
		
		function mostrarErrorRegistro(mensaje) {
			const toast = new bootstrap.Toast(document.getElementById('modalError'));
			const toastHeader = document.querySelector('#modalError .toast-header');
			const toastBody = document.querySelector('#modalError .toast-body h5');
			
			toastHeader.className = 'toast-header bg-danger text-white';
			toastHeader.querySelector('strong').textContent = 'Error';
			toastBody.textContent = mensaje;
			
			toast.show();
		}
	});
	</script>
</body>
</html>