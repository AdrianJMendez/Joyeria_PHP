<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos - Joyas Charly's</title>
    
    <!-- CSS -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/perfil.css">
    
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
    <style>
       
        .pedidos-container {
            padding: 100px 0 50px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }
        
        .page-header {
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            color: white;
            padding: 60px 0 40px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .page-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .back-to-profile {
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-top: 15px;
        }
        
        .back-to-profile:hover {
            color: #ffd700;
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1><i class="fas fa-shopping-bag me-3"></i>Mis Pedidos</h1>
            <p>Revisa el estado y detalles de todas tus compras</p>
            <a href="perfil.php" class="back-to-profile">
                <i class="fas fa-arrow-left me-2"></i>Volver al Perfil
            </a>
        </div>
    </div>

    <!-- Pedidos Section -->
    <div class="pedidos-container">
        <div class="container">
            <!-- Filtros y búsqueda -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" id="buscarPedidos" placeholder="Buscar pedido...">
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-select" id="filtroEstado">
                        <option value="todos">Todos los estados</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="confirmado">Confirmado</option>
                        <option value="procesando">Procesando</option>
                        <option value="enviado">Enviado</option>
                        <option value="entregado">Entregado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>
            </div>

            <!-- Estadísticas rápidas -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="profile-card">
                        <div class="profile-stats">
                            <div class="row text-center" id="estadisticas-pedidos">
                                <div class="col-4">
                                    <div class="stat-item">
                                        <span class="stat-number">0</span>
                                        <span class="stat-label">Total Pedidos</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-item">
                                        <span class="stat-number">0</span>
                                        <span class="stat-label">En Proceso</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-item">
                                        <span class="stat-number">0</span>
                                        <span class="stat-label">Entregados</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lista de pedidos -->
            <div id="lista-pedidos">
                <div class="text-center py-5">
                    <div class="spinner-border text-joyas" role="status">
                        <span class="visually-hidden">Cargando pedidos...</span>
                    </div>
                    <p class="mt-3 text-muted">Cargando tus pedidos...</p>
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
    // Función para cargar los pedidos del usuario
    function cargarPedidosUsuario() {
        const usuario = JSON.parse(localStorage.getItem('usuario'));
        
       
        if (!usuario || !usuario.id) {
            console.error('Usuario no tiene ID');
            mostrarError('No se pudo identificar al usuario. Por favor, inicia sesión nuevamente.');
            return;
        }
        
       
        document.getElementById('lista-pedidos').innerHTML = `
            <div class="text-center py-5">
                <div class="spinner-border text-joyas" role="status">
                    <span class="visually-hidden">Cargando pedidos...</span>
                </div>
                <p class="mt-3 text-muted">Cargando tus pedidos...</p>
            </div>
        `;
        
        
        const url = `Controller/pedidosController.php?id_usuario=${usuario.id}`;
        
        
        fetch(url)
            .then(response => {
                
                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                
                if (data.success) {
                    mostrarPedidos(data.pedidos);
                    actualizarEstadisticas(data.pedidos);
                } else {
                    
                    mostrarError('Error al cargar pedidos: ' + data.message);
                }
            })
            .catch(error => {
               
                mostrarError('No se pudieron cargar los pedidos. Verifica que el servidor esté funcionando.');
            });
    }

    // Función para actualizar estadísticas
    function actualizarEstadisticas(pedidos) {
        const totalPedidos = pedidos.length;
        const enProceso = pedidos.filter(p => 
            ['pendiente', 'confirmado', 'procesando', 'enviado'].includes(p.estado)
        ).length;
        const entregados = pedidos.filter(p => p.estado === 'entregado').length;
        
        document.getElementById('estadisticas-pedidos').innerHTML = `
            <div class="col-4">
                <div class="stat-item">
                    <span class="stat-number">${totalPedidos}</span>
                    <span class="stat-label">Total Pedidos</span>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-item">
                    <span class="stat-number">${enProceso}</span>
                    <span class="stat-label">En Proceso</span>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-item">
                    <span class="stat-number">${entregados}</span>
                    <span class="stat-label">Entregados</span>
                </div>
            </div>
        `;
    }

    // Función para mostrar errores
    function mostrarError(mensaje) {
        document.getElementById('lista-pedidos').innerHTML = `
            <div class="text-center py-5">
                <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                <h5 class="text-danger">Error</h5>
                <p class="text-muted">${mensaje}</p>
                <button class="btn btn-joyas mt-2" onclick="cargarPedidosUsuario()">
                    <i class="fas fa-redo me-1"></i>Reintentar
                </button>
            </div>
        `;
    }

    // Función para mostrar los pedidos en la interfaz
    function mostrarPedidos(pedidos) {
        const container = document.getElementById('lista-pedidos');
        
        if (pedidos.length === 0) {
            container.innerHTML = `
                <div class="text-center py-5">
                    <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No tienes pedidos realizados</h5>
                    <p class="text-muted">Cuando realices tu primera compra, aparecerá aquí.</p>
                    <a href="Shop.php" class="btn btn-joyas mt-2">Explorar Productos</a>
                </div>
            `;
            return;
        }
        
        let html = '';
        
        pedidos.forEach(pedido => {
            const estadoClass = `estado-${pedido.estado}`;
            const estadoTexto = obtenerTextoEstado(pedido.estado);
            
            html += `
                <div class="pedido-card mb-4">
                    <div class="pedido-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h6 class="mb-1">Pedido #${pedido.id}</h6>
                                <small class="text-muted">Realizado el ${formatearFecha(pedido.fecha)}</small>
                            </div>
                            <div class="col-md-3 text-md-end">
                                <span class="estado-pedido ${estadoClass}">${estadoTexto}</span>
                            </div>
                            <div class="col-md-3 text-md-end">
                                <strong>L ${pedido.total.toFixed(2)}</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pedido-body">
                        ${generarTimeline(pedido.timeline)}
                        
                        <div class="mt-4">
                            <h6 class="mb-3">Productos:</h6>
                            ${pedido.productos.map(producto => `
                                <div class="producto-pedido">
                                    <img src="${producto.imagen || 'img/placeholder-producto.jpg'}" 
                                         alt="${producto.nombre}" 
                                         class="producto-imagen"
                                         onerror="this.src='img/placeholder-producto.jpg'">
                                    <div class="producto-info">
                                        <div class="producto-nombre">${producto.nombre}</div>
                                        <div class="d-flex justify-content-between">
                                            <span class="producto-precio">L ${producto.precio.toFixed(2)}</span>
                                            <span class="text-muted">Cantidad: ${producto.cantidad}</span>
                                        </div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <small class="text-muted">Información de pago:</small>
                                <p class="mb-0">${pedido.metodoPago}</p>
                                ${pedido.fecha_pago ? `<small class="text-muted">Pagado el: ${formatearFecha(pedido.fecha_pago)}</small>` : ''}
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Factura:</small>
                                <p class="mb-0">${pedido.fecha_emision ? `Emitida el ${formatearFecha(pedido.fecha_emision)}` : 'Pendiente de emisión'}</p>
                            </div>
                        </div>
                        
                        <div class="pedido-acciones">
                            <button class="btn btn-outline-primary btn-sm me-2" onclick="verDetallePedido(${pedido.id_orden})">
                                <i class="fas fa-eye me-1"></i>Ver Detalle
                            </button>
                            ${pedido.estado === 'entregado' ? `
                                <button class="btn btn-outline-success btn-sm me-2" onclick="volverAComprar(${pedido.id_orden})">
                                    <i class="fas fa-redo me-1"></i>Volver a Comprar
                                </button>
                            ` : ''}
                            ${pedido.estado === 'pendiente' || pedido.estado === 'confirmado' ? `
                                <button class="btn btn-outline-danger btn-sm" onclick="cancelarPedido(${pedido.id_orden})">
                                    <i class="fas fa-times me-1"></i>Cancelar Pedido
                                </button>
                            ` : ''}
                            <button class="btn btn-outline-secondary btn-sm float-end" onclick="imprimirFacturaPedido(${pedido.id_orden}, ${JSON.stringify(pedido).replace(/"/g, '&quot;')})">
                                <i class="fas fa-download me-1"></i>Descargar Factura
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });
        
        container.innerHTML = html;
    }

    // Genera la linea de tiempo del pedido
    function generarTimeline(timeline) {
        const estados = ['pendiente', 'confirmado', 'procesando', 'enviado', 'entregado'];
        
        let html = `
            <div class="timeline-pedido">
        `;
        
        estados.forEach(estado => {
            const paso = timeline.find(p => p.estado === estado);
            let clasePaso = '';
            
            if (paso) {
                clasePaso = paso.completado ? 'paso-completado' : '';
                if (paso.estado === timeline.find(p => p.completado === true && !timeline.find(p2 => p2.estado === estados[estados.indexOf(estado)+1]?.completado))?.estado) {
                    clasePaso = 'paso-activo';
                }
            }
            
            const icono = obtenerIconoEstado(estado);
            const texto = obtenerTextoEstado(estado);
            
            html += `
                <div class="paso-timeline ${clasePaso}">
                    <div class="paso-icono">
                        <i class="fas ${icono}"></i>
                    </div>
                    <div class="paso-label">${texto}</div>
                    ${paso && paso.fecha ? `<small class="text-muted">${formatearFechaCorta(paso.fecha)}</small>` : ''}
                </div>
            `;
        });
        
        html += `</div>`;
        
        return html;
    }

    function obtenerTextoEstado(estado) {
        const estados = {
            'pendiente': 'Pendiente',
            'confirmado': 'Confirmado',
            'procesando': 'Procesando',
            'enviado': 'Enviado',
            'entregado': 'Entregado',
            'cancelado': 'Cancelado'
        };
        
        return estados[estado] || estado;
    }

    function obtenerIconoEstado(estado) {
        const iconos = {
            'pendiente': 'fa-clock',
            'confirmado': 'fa-check-circle',
            'procesando': 'fa-cog',
            'enviado': 'fa-shipping-fast',
            'entregado': 'fa-box-open'
        };
        
        return iconos[estado] || 'fa-question-circle';
    }

    function formatearFecha(fechaStr) {
        const opciones = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(fechaStr).toLocaleDateString('es-ES', opciones);
    }

    function formatearFechaCorta(fechaStr) {
        const opciones = { month: 'short', day: 'numeric' };
        return new Date(fechaStr).toLocaleDateString('es-ES', opciones);
    }

    // ========== FUNCIÓN PARA IMPRIMIR FACTURA ==========
    function imprimirFacturaPedido(idOrden, pedido) {
       
        
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // ======== ESTILOS ========
        const tituloColor = "#333333";
        const textoColor = "#555555";
        const lineaColor = "#DDDDDD";

        doc.setFont("helvetica", "normal");

        // Logo
        doc.addImage('img/instagram/profile.png', 'PNG', 150, 10, 40, 40);

        // ====== TÍTULO ======
        doc.setFontSize(22);
        doc.setTextColor(tituloColor);
        doc.text("Factura de Compra - Joyas Charly's", 14, 25);

        doc.setFontSize(12);
        doc.setTextColor(textoColor);
        doc.text(`Pedido #${pedido.id}`, 14, 32);

        // Línea suave
        doc.setDrawColor(lineaColor);
        doc.line(14, 36, 196, 36);

        // ======= DATOS DEL CLIENTE =======
        doc.setFontSize(14);
        doc.setTextColor("#000000");
        doc.text("Datos del cliente", 14, 48);

        doc.setFontSize(11);
        doc.setTextColor(textoColor);

        
        let datosEnvio = null;
        
        //Buscar en datos específicos de la orden
        datosEnvio = JSON.parse(localStorage.getItem(`pagoData_${idOrden}`));
        
        //Si no existe, buscar en el historial
        if (!datosEnvio) {
            const historial = JSON.parse(localStorage.getItem('historialPedidos')) || {};
            datosEnvio = historial[idOrden];
        }
        
        //Si no existe, usar datos generales
        if (!datosEnvio) {
            datosEnvio = JSON.parse(localStorage.getItem('pagoData'));
        }
        
        const usuario = JSON.parse(localStorage.getItem('usuario'));
        
        // Usar datos encontrados o valores por defecto
        const nombreCliente = datosEnvio ? datosEnvio.nombre : (usuario ? usuario.name : 'Cliente');
        const correoCliente = datosEnvio ? datosEnvio.correo : (usuario ? usuario.email : 'No especificado');
        const telefonoCliente = datosEnvio ? datosEnvio.telefono : 'No especificado';
        const direccionCliente = datosEnvio ? datosEnvio.direccion : 'No especificada';
        
        let metodoPago = 'No especificado';
        if (datosEnvio) {
            metodoPago = datosEnvio.cardType ? `${datosEnvio.cardType} ****${datosEnvio.cardLast4}` : 'No especificado';
        } else if (pedido.metodoPago) {
            metodoPago = pedido.metodoPago;
        }

        doc.text(`Nombre: ${nombreCliente}`, 14, 58);
        doc.text(`Correo: ${correoCliente}`, 14, 66);
        doc.text(`Teléfono: ${telefonoCliente}`, 14, 74);
        doc.text(`Dirección: ${direccionCliente}`, 14, 82);

        doc.text(`Método de pago: ${metodoPago}`, 14, 90);
        doc.text(`Estado: ${obtenerTextoEstado(pedido.estado)}`, 14, 98);

        const fecha = new Date(pedido.fecha);
        doc.text(`Fecha del pedido: ${fecha.toLocaleDateString()}`, 14, 106);

        // Línea divisoria
        doc.line(14, 112, 196, 112);

        // ======= TABLA DE PRODUCTOS =======
        let y = 122;

        doc.setFontSize(14);
        doc.setTextColor("#000000");
        doc.text("Detalle de la compra", 14, y);

        y += 10;

        doc.setFontSize(11);
        doc.setTextColor(textoColor);

        doc.setDrawColor(lineaColor);
        doc.line(14, y, 196, y);

        y += 8;

        let subtotal = 0;

        // Iteramos sobre los productos del pedido
        pedido.productos.forEach(p => {
            const totalProd = p.precio * p.cantidad;
            subtotal += totalProd;

            doc.text(`${p.nombre} (x${p.cantidad})`, 14, y);
            doc.text(`$ ${totalProd.toFixed(2)}`, 180, y, { align: "right" });

            y += 8;

            if (y > 260) {
                doc.addPage();
                y = 20;
            }
        });

        // Línea antes de totales
        doc.line(14, y, 196, y);

        // ======= TOTALES =======
        y += 10;
        doc.setFontSize(12);
        doc.setTextColor("#000000");

        doc.text("Subtotal:", 140, y);
        doc.text(`$ ${subtotal.toFixed(2)}`, 196, y, { align: "right" });

        y += 8;
        doc.text("Envío:", 140, y);
        doc.text("$ 50.00", 196, y, { align: "right" });

        y += 8;
        doc.setFontSize(14);
        doc.text("TOTAL:", 140, y);
        doc.text(`$ ${pedido.total.toFixed(2)}`, 196, y, { align: "right" });

        // Mensaje final
        y += 20;
        doc.setFontSize(12);
        doc.setTextColor(textoColor);
        doc.text("¡Gracias por tu compra en Joyas Charly's!", 14, y);
        y += 8;
        doc.text("Para cualquier consulta, contáctanos al +504 9971-7820", 14, y);

        
        doc.save(`Factura_JoyasCharly_${pedido.id}.pdf`);
    }

    // Detectar tipo de tarjeta (función auxiliar si se necesita)
    function detectCardType(cardNumber) {
        const patterns = {
            visa: /^4/,
            mastercard: /^5[1-5]/,
            amex: /^3[47]/,
            discover: /^6(?:011|5)/
        };
        
        for (const [type, pattern] of Object.entries(patterns)) {
            if (pattern.test(cardNumber)) {
                return type.charAt(0).toUpperCase() + type.slice(1);
            }
        }
        return 'Desconocida';
    }

    
    function verDetallePedido(idOrden) {
       
        
        window.location.href = `cart.php?id=${idOrden}`;
    }

    function cancelarPedido(idOrden) {
        if (confirm('¿Estás seguro de que quieres cancelar este pedido?')) {
            fetch(`Controller/cancelarPedidoController.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id_orden: idOrden
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Pedido cancelado exitosamente');
                    cargarPedidosUsuario();
                } else {
                    alert('Error al cancelar el pedido: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al cancelar el pedido');
            });
        }
    }

    function volverAComprar(idOrden) {
         window.location.href = `Shop.php`;
    }

    // Filtros y búsqueda
    function inicializarFiltros() {
        const filtroEstado = document.getElementById('filtroEstado');
        if (filtroEstado) {
            filtroEstado.addEventListener('change', function() {
                console.log('Filtrando por estado:', this.value);
            });
        }
        
        const buscarPedidos = document.getElementById('buscarPedidos');
        if (buscarPedidos) {
            buscarPedidos.addEventListener('input', function() {
                console.log('Buscando:', this.value);
            });
        }
    }

    // Cargar pedidos cuando la página esté lista
    document.addEventListener('DOMContentLoaded', function() {
        
        
        // Verificar sesión
        if (!localStorage.getItem('usuario')) {
            
            window.location.href = 'login.php';
            return;
        }
        
        // Actualizar navbar
        if (typeof SessionManager !== 'undefined') {
            SessionManager.actualizarNavbar();
        }

        // Cargar pedidos
        cargarPedidosUsuario();
        
        // Inicializar filtros
        inicializarFiltros();
    });
    </script>
</body>
</html>