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
    
    <style>
        .btn-admin {
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
            color: white;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 1.5rem;
        }

        .admin-quick-card {
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .admin-quick-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-color: #8B4513;
        }

        .btn-outline-joyas {
            border: 1px solid #8B4513;
            color: #8B4513;
            background: transparent;
        }

        .btn-outline-joyas:hover {
            background: #8B4513;
            color: white;
        }
    </style>
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

    // Funciones para el panel de administración
    function verEstadisticas() {
        // Redirigir al panel de admin y enfocar en estadísticas
        window.location.href = 'admin.php#estadisticas';
    }

    function gestionarUsuarios() {
        alert('Funcionalidad de gestión de usuarios en desarrollo');
        // Aquí podrías redirigir a una página de gestión de usuarios
        // window.location.href = 'gestion_usuarios.php';
    }

    function verReportes() {
        alert('Funcionalidad de reportes en desarrollo');
        // window.location.href = 'reportes.php';
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
                    { id: 'admin', icon: 'fa-cog', text: 'Panel de Administración' },
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

        // Contenido para administradores
        let adminContent = '';
        if (rol === 'administrador') {
            adminContent = `
                <div class="tab-pane fade" id="admin">
                    <div class="profile-card">
                        <div class="card-header bg-white border-0 py-4">
                            <h4 class="mb-0"><i class="fas fa-cog me-2"></i>Panel de Administración</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="admin-quick-card text-center p-4 rounded">
                                        <div class="mb-3">
                                            <i class="fas fa-shopping-bag fa-2x text-joyas"></i>
                                        </div>
                                        <h5>Gestión de Pedidos</h5>
                                        <p class="text-muted small mb-3">Administra todos los pedidos del sistema</p>
                                        <a href="admin.php" class="btn btn-admin btn-sm">Gestionar Pedidos</a>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="admin-quick-card text-center p-4 rounded">
                                        <div class="mb-3">
                                            <i class="fas fa-boxes fa-2x text-joyas"></i>
                                        </div>
                                        <h5>Control de Stock</h5>
                                        <p class="text-muted small mb-3">Gestiona el inventario de productos</p>
                                        <a href="admin.php" class="btn btn-admin btn-sm">Gestionar Stock</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 pt-3 border-top">
                                <h5 class="mb-3">Acceso Rápido</h5>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="admin.php" class="btn btn-outline-joyas">
                                        <i class="fas fa-tachometer-alt me-2"></i>Panel Principal
                                    </a>
                                    <button class="btn btn-outline-joyas" onclick="verEstadisticas()">
                                        <i class="fas fa-chart-bar me-2"></i>Ver Estadísticas
                                    </button>
                                    <button class="btn btn-outline-joyas" onclick="gestionarUsuarios()">
                                        <i class="fas fa-users me-2"></i>Gestionar Usuarios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // Actualizar contenido principal
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
            ${adminContent}
        `;

        // Tarjetas adicionales según el rol
        let additionalCards = '';
        if (rol === 'administrador') {
            additionalCards = `
                <div class="profile-card">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto" style="background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h5 class="mb-3">Panel de Administración</h5>
                        <p class="text-muted small mb-4">Gestiona pedidos y controla el inventario del sistema</p>
                        <a href="admin.php" class="btn btn-admin btn-sm w-100">
                            <i class="fas fa-cog me-2"></i>Gestionar Sistema
                        </a>
                    </div>
                </div>
                
                <div class="profile-card mt-3">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto" style="background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="mb-3">Estadísticas</h5>
                        <p class="text-muted small mb-4">Monitorea el rendimiento del negocio</p>
                        <button class="btn btn-outline-success btn-sm w-100" onclick="verEstadisticas()">
                            <i class="fas fa-chart-bar me-2"></i>Ver Reportes
                        </button>
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