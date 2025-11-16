<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Joyas Charly's</title>
    
    <!-- CSS -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/perfil.css">
</head>
<body>
    
    <!-- PreLoader -->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    
    <!-- Header -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <a class="navbar-brand logo_h" href="index.php">
                        <img src="img/fav.png" alt="Joyas Charly's" style="height: 40px;">
                    </a>
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
                            <li class="nav-item"><a class="nav-link" href="News.php">Noticias</a></li>
                            <li class="nav-item"><a class="nav-link" href="Shop.php">Productos</a></li>
                            <li id="auth-nav-item" class="nav-item">
                                <!-- Se carga dinámicamente con JavaScript -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Profile Section -->
    <div class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Sidebar del perfil - SERÁ DINÁMICO -->
                    <div class="profile-card">
                        <div class="profile-header" id="profile-header">
                            <!-- Se llena dinámicamente con JavaScript -->
                        </div>
                        
                        <div class="profile-stats" id="profile-stats">
                            <!-- Se llena dinámicamente con JavaScript -->
                        </div>
                        
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column" id="profile-menu">
                                <!-- Se llena dinámicamente con JavaScript -->
                            </ul>
                            
                            <div class="mt-4">
                                <button type="button" onclick="cerrarSesionPerfil()" class="btn btn-outline-danger w-100 py-2">
                                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjetas adicionales según el rol -->
                    <div id="additional-cards">
                        <!-- Se llena dinámicamente con JavaScript -->
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <!-- Contenido principal dinámico -->
                    <div class="tab-content" id="profile-content">
                        <!-- Se llena dinámicamente con JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Scripts -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/sessionManager.js"></script>

    <script>
    // Función para cerrar sesión
    function cerrarSesionPerfil() {
        if (typeof SessionManager !== 'undefined' && SessionManager.cerrarSesion) {
            SessionManager.cerrarSesion();
        } else {
            if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
                localStorage.removeItem('usuario');
                localStorage.removeItem('token');
                window.location.href = 'login.php';
            }
        }
    }

    // Función principal para cargar el perfil según el rol
    function cargarPerfilSegunRol(usuario) {
        const rol = usuario.rol.toLowerCase();
        
        // Configuración según el rol
        const config = {
            'administrador': {
                colorHeader: 'linear-gradient(135deg, #8B4513 0%, #D2691E 100%)',
                colorBadge: 'linear-gradient(135deg, #ffd700 0%, #ffed4e 100%)',
                icono: 'fa-crown',
                stats: [
                    { numero: '3', label: 'Pedidos' },
                    { numero: '12', label: 'Favoritos' },
                    { numero: '2', label: 'Direcciones' }
                ],
                menu: [
                    { id: 'info', icon: 'fa-user', text: 'Información Personal' },
                    { id: 'pedidos', icon: 'fa-shopping-bag', text: 'Mis Pedidos' },
                    { id: 'favoritos', icon: 'fa-heart', text: 'Mis Favoritos' },
                    { id: 'direcciones', icon: 'fa-map-marker-alt', text: 'Direcciones' },
                    { id: 'seguridad', icon: 'fa-lock', text: 'Seguridad' }
                ]
            },
            'cliente': {
                colorHeader: 'linear-gradient(135deg, #2c5aa0 0%, #4a7bc8 100%)',
                colorBadge: 'linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%)',
                icono: 'fa-user',
                stats: [
                    { numero: '5', label: 'Pedidos' },
                    { numero: '8', label: 'Favoritos' },
                    { numero: '1', label: 'Direcciones' }
                ],
                menu: [
                    { id: 'info', icon: 'fa-user', text: 'Información Personal' },
                    { id: 'pedidos', icon: 'fa-shopping-bag', text: 'Mis Compras' },
                    { id: 'favoritos', icon: 'fa-heart', text: 'Mis Favoritos' },
                    { id: 'direcciones', icon: 'fa-map-marker-alt', text: 'Mis Direcciones' }
                ]
            },
            'empleado': {
                colorHeader: 'linear-gradient(135deg, #6b46c1 0%, #9f7aea 100%)',
                colorBadge: 'linear-gradient(135deg, #9C27B0 0%, #E91E63 100%)',
                icono: 'fa-user-tie',
                stats: [
                    { numero: '15', label: 'Ventas' },
                    { numero: '8', label: 'Clientes' },
                    { numero: '25', label: 'Productos' }
                ],
                menu: [
                    { id: 'info', icon: 'fa-user', text: 'Información Personal' },
                    { id: 'ventas', icon: 'fa-chart-line', text: 'Mis Ventas' },
                    { id: 'clientes', icon: 'fa-users', text: 'Clientes' },
                    { id: 'inventario', icon: 'fa-boxes', text: 'Inventario' }
                ]
            }
        };

        const rolConfig = config[rol] || config['cliente']; // Default a cliente si no existe

        // Actualizar header del perfil
        document.getElementById('profile-header').innerHTML = `
            <div class="profile-avatar" style="background: ${rolConfig.colorBadge};">
                <i class="fas ${rolConfig.icono}"></i>
            </div>
            <h3 data-user="name" style="position: relative;">${usuario.name}</h3>
            <p class="mb-2" data-user="email">${usuario.email}</p>
            <span class="membership-badge" style="background: ${rolConfig.colorBadge} !important;">${usuario.rol}</span>
        `;

        // Aplicar color al header
        document.querySelector('.profile-header').style.background = rolConfig.colorHeader;

        // Actualizar stats
        document.getElementById('profile-stats').innerHTML = `
            <div class="row text-center">
                ${rolConfig.stats.map(stat => `
                    <div class="col-4">
                        <div class="stat-item">
                            <span class="stat-number">${stat.numero}</span>
                            <span class="stat-label">${stat.label}</span>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;

        // Actualizar menú
        document.getElementById('profile-menu').innerHTML = rolConfig.menu.map((item, index) => `
            <li class="nav-item">
                <a class="nav-link ${index === 0 ? 'active' : ''}" href="#${item.id}" data-bs-toggle="pill">
                    <i class="fas ${item.icon} me-2"></i>${item.text}
                </a>
            </li>
        `).join('');

        // Actualizar contenido principal (aquí puedes expandir según cada rol)
        document.getElementById('profile-content').innerHTML = `
            <div class="tab-pane fade show active" id="info">
                <div class="profile-card">
                    <div class="card-header bg-white border-0 py-4">
                        <h4 class="mb-0"><i class="fas fa-user me-2"></i>Información Personal</h4>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <span class="info-label"><i class="fas fa-user-tag me-2"></i>Nombre completo</span>
                                </div>
                                <div class="col-sm-8">
                                    <span class="info-value">${usuario.name}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <span class="info-label"><i class="fas fa-envelope me-2"></i>Email</span>
                                </div>
                                <div class="col-sm-8">
                                    <span class="info-value">${usuario.email}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <span class="info-label"><i class="fas fa-shield-alt me-2"></i>Rol</span>
                                </div>
                                <div class="col-sm-8">
                                    <span class="info-value">
                                        <span class="badge bg-primary py-2 px-3">${usuario.rol}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-top">
                            <button class="btn btn-joyas me-3">
                                <i class="fas fa-edit me-2"></i>Editar Perfil
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Tarjetas adicionales según el rol
        let additionalCards = '';
        if (rol === 'administrador') {
            additionalCards = `
                <div class="profile-card">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h5 class="mb-3">Miembro Premium</h5>
                        <p class="text-muted small mb-4">Disfruta de beneficios exclusivos y descuentos especiales</p>
                        <button class="btn btn-joyas btn-sm">Ver Beneficios</button>
                    </div>
                </div>
            `;
        } else if (rol === 'cliente') {
            additionalCards = `
                <div class="profile-card">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto" style="background: linear-gradient(135deg, #2c5aa0 0%, #4a7bc8 100%);">
                            <i class="fas fa-award"></i>
                        </div>
                        <h5 class="mb-3">Cliente VIP</h5>
                        <p class="text-muted small mb-4">Acumula puntos y obtén descuentos especiales</p>
                        <button class="btn btn-joyas btn-sm" style="background: linear-gradient(135deg, #2c5aa0 0%, #4a7bc8 100%);">Ver Puntos</button>
                    </div>
                </div>
            `;
        }

        document.getElementById('additional-cards').innerHTML = additionalCards;
    }

    // Cargar perfil cuando la página esté lista
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🔄 Iniciando carga del perfil...');
        
        // Verificar sesión
        if (!localStorage.getItem('usuario')) {
            console.log('❌ No hay sesión activa, redirigiendo...');
            window.location.href = 'login.php';
            return;
        }
        
        // Obtener datos del usuario
        const usuario = JSON.parse(localStorage.getItem('usuario'));
        console.log('✅ Usuario encontrado:', usuario);
        
        // Cargar perfil según el rol
        cargarPerfilSegunRol(usuario);
        
        // Actualizar navbar
        if (typeof SessionManager !== 'undefined') {
            SessionManager.actualizarNavbar();
        }
    });
    </script>
</body>
</html>