<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Crear nueva noticia - JoyasCharlys">

    <!-- title -->
    <title>Crear Noticia - JoyasCharlys</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
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
        
        .create-news-form {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            margin: 30px 0;
            border: 1px solid #eef2f7;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafbfc;
        }
        .form-control:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 0.3rem rgba(255, 107, 107, 0.15);
            background: white;
            transform: translateY(-2px);
        }
        .form-label {
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
            font-size: 16px;
            display: block;
        }
        .btn-submit {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            border: none;
            padding: 15px 40px;
            border-radius: 30px;
            color: white;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
            background: linear-gradient(135deg, #ff5252, #ff6b6b);
        }
        .btn-back {
            background: #6c757d;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-right: 15px;
            box-shadow: 0 3px 15px rgba(108, 117, 125, 0.3);
        }
        .btn-back:hover {
            background: #5a6268;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(108, 117, 125, 0.4);
        }
        .image-preview {
            max-width: 100%;
            max-height: 300px;
            margin-top: 15px;
            border-radius: 12px;
            display: none;
            border: 3px dashed #e9ecef;
            padding: 10px;
        }
        .form-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 4px solid #ff6b6b;
        }
        .form-section h5 {
            color: #2d3748;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .required-field::after {
            content: " *";
            color: #ff6b6b;
        }
        .character-count {
            font-size: 12px;
            color: #6c757d;
            text-align: right;
            margin-top: 5px;
        }
        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .form-header h2 {
            color: #2d3748;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .form-header p {
            color: #6c757d;
            font-size: 16px;
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
                    <a class="navbar-brand logo_h" href="index.php">
                        <img src="img/fav.png" alt="JoyasCharlys" style="height: 40px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">Carrito</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contacto</a></li>
                            <li class="nav-item active"><a class="nav-link" href="News.php">Noticias</a></li>
                            <li class="nav-item"><a class="nav-link" href="Shop.php">Productos</a></li>
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

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Crear nueva publicación</p>
                        <h1>Crear Noticia</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- Acceso denegado (se mostrará si no es administrador) -->
    <div id="acceso-denegado" style="display: none;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="alert alert-danger text-center">
                        <h4><i class="fas fa-exclamation-triangle"></i> Acceso Denegado</h4>
                        <p>No tienes permisos para acceder a esta página.</p>
                        <a href="News.php" class="btn btn-primary">Volver a Noticias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- create news form -->
    <div class="create-news-section mt-150 mb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="create-news-form">
                        <div class="form-header">
                            <h2><i class="fas fa-plus-circle text-success me-2"></i>Crear Nueva Noticia</h2>
                            <p>Completa el formulario para publicar una nueva noticia en el sitio</p>
                        </div>
                        
                        <form id="createNewsForm" action="procesar-noticia.php" method="POST" enctype="multipart/form-data">
                            
                            <!-- Sección Información Básica -->
                            <div class="form-section">
                                <h5><i class="fas fa-info-circle me-2"></i>Información Básica</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titulo" class="form-label required-field">Título de la Noticia</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" 
                                                placeholder="Ingresa un título llamativo" required
                                                oninput="updateCharacterCount('titulo', 'titulo-count', 100)">
                                            <div class="character-count" id="titulo-count">0/100 caracteres</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="categoria" class="form-label required-field">Categoría</label>
                                            <select class="form-control" id="categoria" name="categoria" required>
                                                <option value="">Seleccionar categoría</option>
                                                <option value="tendencias">📈 Tendencias</option>
                                                <option value="consejos">💡 Consejos</option>
                                                <option value="novedades">🆕 Novedades</option>
                                                <option value="empresa">🏢 JoyasCharlys</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sección Imagen -->
                            <div class="form-section">
                                <h5><i class="fas fa-image me-2"></i>Imagen de la Noticia</h5>
                                <div class="form-group">
                                    <label for="imagen" class="form-label required-field">Imagen Principal</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" 
                                        accept="image/*" required onchange="previewImage(this)">
                                    <small class="form-text text-muted">Formatos recomendados: JPG, PNG. Tamaño máximo: 2MB</small>
                                    <img id="imagePreview" class="image-preview" src="#" alt="Vista previa de la imagen">
                                </div>
                            </div>

                            <!-- Sección Contenido -->
                            <div class="form-section">
                                <h5><i class="fas fa-edit me-2"></i>Contenido de la Noticia</h5>
                                <div class="form-group">
                                    <label for="contenido" class="form-label required-field">Contenido Completo</label>
                                    <textarea class="form-control" id="contenido" name="contenido" rows="10" 
                                            placeholder="Escribe el contenido completo de la noticia aquí..." 
                                            required oninput="updateCharacterCount('contenido', 'contenido-count', 2000)"></textarea>
                                    <div class="character-count" id="contenido-count">0/2000 caracteres</div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="resumen" class="form-label">Resumen (opcional)</label>
                                    <textarea class="form-control" id="resumen" name="resumen" rows="3" 
                                            placeholder="Breve resumen que aparecerá en la lista de noticias..."
                                            oninput="updateCharacterCount('resumen', 'resumen-count', 200)"></textarea>
                                    <div class="character-count" id="resumen-count">0/200 caracteres</div>
                                </div>
                            </div>

                            <!-- Sección Metadatos -->
                            <div class="form-section">
                                <h5><i class="fas fa-user me-2"></i>Información de Publicación</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="autor" class="form-label required-field">Autor</label>
                                            <input type="text" class="form-control" id="autor" name="autor" 
                                                placeholder="Nombre del autor" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha" class="form-label required-field">Fecha de Publicación</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="form-group text-center mt-5">
                                <a href="News.php" class="btn btn-back">
                                    <i class="fas fa-arrow-left me-2"></i> Volver a Noticias
                                </a>
                                <button type="submit" class="btn btn-submit">
                                    <i class="fas fa-paper-plane me-2"></i> Publicar Noticia
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end create news form -->

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
    <!-- main js -->
    <script src="assets/js/main.js"></script>

    <script>
    // Verificar permisos al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        const usuario = SessionManager.obtenerUsuario();
        const accesoDenegado = document.getElementById('acceso-denegado');
        const contenidoPrincipal = document.querySelector('.create-news-section');
        
        if (!usuario || usuario.rol !== 'Administrador') {
            if (accesoDenegado) accesoDenegado.style.display = 'block';
            if (contenidoPrincipal) contenidoPrincipal.style.display = 'none';
            // También ocultar breadcrumb y header
            document.querySelector('.breadcrumb-section').style.display = 'none';
        } else {
            if (accesoDenegado) accesoDenegado.style.display = 'none';
            // Auto-completar el campo autor con el nombre del usuario
            document.getElementById('autor').value = usuario.name || '';
        }
        
        // Inicializar contadores de caracteres
        updateCharacterCount('titulo', 'titulo-count', 100);
        updateCharacterCount('contenido', 'contenido-count', 2000);
        updateCharacterCount('resumen', 'resumen-count', 200);
    });

    // Vista previa de imagen
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const file = input.files[0];
        
        if (file) {
            // Validar tamaño (2MB máximo)
            if (file.size > 2 * 1024 * 1024) {
                alert('La imagen es demasiado grande. El tamaño máximo permitido es 2MB.');
                input.value = '';
                preview.style.display = 'none';
                return;
            }
            
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }

    // Contador de caracteres
    function updateCharacterCount(fieldId, countId, maxLength) {
        const field = document.getElementById(fieldId);
        const count = document.getElementById(countId);
        const currentLength = field.value.length;
        
        count.textContent = `${currentLength}/${maxLength} caracteres`;
        
        if (currentLength > maxLength) {
            count.style.color = '#ff6b6b';
        } else if (currentLength > maxLength * 0.8) {
            count.style.color = '#ffa726';
        } else {
            count.style.color = '#6c757d';
        }
    }

    // Establecer fecha actual por defecto
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('fecha').value = today;
    });

    // Validación del formulario
    document.getElementById('createNewsForm').addEventListener('submit', function(e) {
        const titulo = document.getElementById('titulo').value.trim();
        const contenido = document.getElementById('contenido').value.trim();
        const autor = document.getElementById('autor').value.trim();
        const categoria = document.getElementById('categoria').value;
        const imagen = document.getElementById('imagen').files[0];
        
        let isValid = true;
        let errorMessage = '';
        
        if (titulo.length < 5) {
            isValid = false;
            errorMessage += '• El título debe tener al menos 5 caracteres\n';
        }
        
        if (titulo.length > 100) {
            isValid = false;
            errorMessage += '• El título no puede tener más de 100 caracteres\n';
        }
        
        if (contenido.length < 50) {
            isValid = false;
            errorMessage += '• El contenido debe tener al menos 50 caracteres\n';
        }
        
        if (contenido.length > 2000) {
            isValid = false;
            errorMessage += '• El contenido no puede tener más de 2000 caracteres\n';
        }
        
        if (autor.length < 2) {
            isValid = false;
            errorMessage += '• El autor debe tener al menos 2 caracteres\n';
        }
        
        if (!categoria) {
            isValid = false;
            errorMessage += '• Debes seleccionar una categoría\n';
        }
        
        if (!imagen) {
            isValid = false;
            errorMessage += '• Debes seleccionar una imagen\n';
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Por favor corrige los siguientes errores:\n\n' + errorMessage);
            return false;
        }
        
        // Mostrar loading
        const submitBtn = this.querySelector('.btn-submit');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Publicando...';
        submitBtn.disabled = true;
    });
</script>

    <!--Script necesarios para login-->
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/sessionManager.js"></script>
</body>
</html>