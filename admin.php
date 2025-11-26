<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Joyas Charly's</title>
    
    <!-- CSS -->
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
     <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/perfil.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        .admin-container {
            padding: 100px 0 50px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }
        
        .page-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 60px 0 40px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .admin-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            border: none;
            transition: transform 0.3s ease;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
        }
        
        .admin-card .card-header {
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
            font-weight: 600;
        }
        
        .stat-card {
            text-align: center;
            padding: 25px 15px;
            border-radius: 10px;
            color: white;
            margin-bottom: 20px;
        }
        
        .stat-card.total-pedidos { background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); }
        .stat-card.pendientes { background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); }
        .stat-card.entregados { background: linear-gradient(135deg, #27ae60 0%, #229954 100%); }
        .stat-card.stock-bajo { background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            display: block;
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .tabla-admin {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }
        
        .tabla-admin th {
            background: #34495e;
            color: white;
            border: none;
            padding: 15px;
            font-weight: 600;
        }
        
        .tabla-admin td {
            padding: 12px 15px;
            vertical-align: middle;
            border-color: #f8f9fa;
        }
        
        .badge-estado {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .badge-pendiente { background: #fff3cd; color: #856404; }
        .badge-confirmado { background: #d1ecf1; color: #0c5460; }
        .badge-procesando { background: #d1ecf1; color: #0c5460; }
        .badge-enviado { background: #d1ecf1; color: #0c5460; }
        .badge-entregado { background: #d4edda; color: #155724; }
        .badge-cancelado { background: #f8d7da; color: #721c24; }
        
        .stock-bajo {
            background: #fff5f5 !important;
            color: #e53e3e;
            font-weight: 600;
        }
        
        .btn-admin {
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }
        
        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
            color: white;
        }

        .stock-bajo {
            background: #fff5f5 !important;
        }

        .table-warning {
            background-color: #fff3cd !important;
        }

        .table-info {
            background-color: #d1ecf1 !important;
        }

        .table-secondary {
            background-color: #f8f9fa !important;
        }

        .badge.bg-success { background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important; }
        .badge.bg-warning { background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%) !important; }
        .badge.bg-danger { background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%) !important; }
        .badge.bg-secondary { background: linear-gradient(135deg, #6c757d 0%, #495057 100%) !important; }
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
            <h1><i class="fas fa-crown me-3"></i>Panel de Administración</h1>
            <p>Gestión de pedidos y control de inventario</p>
        </div>
    </div>

    <!-- Admin Section -->
    <div class="admin-container">
        <div class="container">
            <!-- Estadísticas rápidas -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="stat-card total-pedidos">
                        <span class="stat-number" id="total-pedidos">0</span>
                        <span class="stat-label">Total Pedidos</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card pendientes">
                        <span class="stat-number" id="pedidos-pendientes">0</span>
                        <span class="stat-label">Pendientes</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card entregados">
                        <span class="stat-number" id="pedidos-entregados">0</span>
                        <span class="stat-label">Entregados</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card stock-bajo">
                        <span class="stat-number" id="stock-bajo">0</span>
                        <span class="stat-label">Stock Bajo</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Gestión de Pedidos -->
                <div class="col-lg-6">
                    <div class="admin-card">
                        <div class="card-header">
                            <i class="fas fa-shopping-bag me-2"></i>Gestión de Pedidos
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table tabla-admin">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Fecha</th>
                                            <th>Total</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla-pedidos-admin">
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <div class="spinner-border text-joyas" role="status">
                                                    <span class="visually-hidden">Cargando...</span>
                                                </div>
                                                <p class="mt-2 text-muted">Cargando pedidos...</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gestión de Stock -->
                <div class="col-lg-6">
                    <div class="admin-card">
                        <div class="card-header">
                            <i class="fas fa-boxes me-2"></i>Control de Stock y Disponibilidad
                        </div>
                        <div class="card-body">
                            <!-- Filtros rápidos -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <select class="form-select form-select-sm" id="filtroDisponibilidad" onchange="filtrarStock()">
                                        <option value="todos">Todos los productos</option>
                                        <option value="alta">Alta disponibilidad</option>
                                        <option value="media">Disponibilidad media</option>
                                        <option value="baja">Baja disponibilidad</option>
                                        <option value="agotado">Agotados</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-sm" id="buscarProducto" placeholder="Buscar producto..." onkeyup="filtrarStock()">
                                </div>
                            </div>
                            
                            <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                <table class="table tabla-admin">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Disponibilidad</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla-stock-admin">
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <div class="spinner-border text-joyas" role="status">
                                                    <span class="visually-hidden">Cargando...</span>
                                                </div>
                                                <p class="mt-2 text-muted">Cargando inventario...</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Resumen de stock -->
                            <div class="row mt-3 text-center">
                                <div class="col-3">
                                    <div class="border rounded p-2 bg-success bg-opacity-10">
                                        <div class="fw-bold text-success" id="contador-alta">0</div>
                                        <small class="text-muted">Alta</small>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="border rounded p-2 bg-warning bg-opacity-10">
                                        <div class="fw-bold text-warning" id="contador-media">0</div>
                                        <small class="text-muted">Media</small>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="border rounded p-2 bg-danger bg-opacity-10">
                                        <div class="fw-bold text-danger" id="contador-baja">0</div>
                                        <small class="text-muted">Baja</small>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="border rounded p-2 bg-secondary bg-opacity-10">
                                        <div class="fw-bold text-secondary" id="contador-agotado">0</div>
                                        <small class="text-muted">Agotado</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar pedido -->
    <div class="modal fade" id="modalEditarPedido" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Pedido #<span id="modalPedidoId"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarPedido">
                        <input type="hidden" id="editPedidoId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Estado del Pedido</label>
                                    <select class="form-select" id="editEstadoPedido">
                                        <option value="pendiente">Pendiente</option>
                                        <option value="confirmado">Confirmado</option>
                                        <option value="procesando">Procesando</option>
                                        <option value="enviado">Enviado</option>
                                        <option value="entregado">Entregado</option>
                                        <option value="cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Total</label>
                                    <input type="number" class="form-control" id="editTotalPedido" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notas del Pedido</label>
                            <textarea class="form-control" id="editNotasPedido" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-admin" onclick="guardarCambiosPedido()">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

   <!-- Modal para editar stock - VERSIÓN CORREGIDA -->
<div class="modal fade" id="modalEditarStock" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarStock">
                    <input type="hidden" id="editProductoId">
                    <div class="mb-3">
                        <label class="form-label">Producto</label>
                        <input type="text" class="form-control" id="editProductoNombre" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Actual</label> <!-- CORREGIDO: "Stock" no "tock" -->
                        <input type="number" class="form-control" id="editStockActual" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nuevo Stock</label>
                        <input type="number" class="form-control" id="editNuevoStock" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-admin" onclick="guardarCambiosStock()">Actualizar Stock</button>
            </div>
        </div>
    </div>
</div>
    <!-- Scripts -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
    // Variables globales para el stock
    let productosCompletos = [];
    let productosFiltrados = [];

    // Función de debug para verificar el estado del usuario
    function debugUsuario() {
        const usuario = JSON.parse(localStorage.getItem('usuario'));
        return usuario;
    }

    // Función mejorada para verificar admin
    function verificarAdmin() {
        const usuario = debugUsuario();
        
        if (!usuario || !usuario.id) {
            alert('No autorizado: debe iniciar sesión');
            window.location.href = 'login.php';
            return;
        }
        
        
        
        // Verificar directamente si es admin basado en los datos del localStorage
        if (usuario.rol && usuario.rol.toLowerCase() === 'administrador') {
            cargarDatosAdmin(usuario.id);
            return;
        }
        
        // Si no está claro en localStorage, verificar con el servidor
        fetch('Controller/verifyAdmin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                usuario_id: usuario.id
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualizar el rol en localStorage
                usuario.rol = 'administrador';
                localStorage.setItem('usuario', JSON.stringify(usuario));
                cargarDatosAdmin(usuario.id);
            } else {
                alert(data.message || 'No tiene permisos de administrador');
                window.location.href = 'index.php';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Si hay error de conexión pero el localStorage dice que es admin, permitir acceso
            if (usuario.rol && usuario.rol.toLowerCase() === 'administrador') {
                cargarDatosAdmin(usuario.id);
            } else {
                alert('Error de conexión al verificar permisos');
                window.location.href = 'index.php';
            }
        });
    }

    // Cargar todos los datos del panel admin
    function cargarDatosAdmin(usuarioId) {
        cargarPedidosAdmin(usuarioId);
        cargarStockAdmin(usuarioId);
        cargarEstadisticas(usuarioId);
    }

    // Cargar pedidos para administración
    function cargarPedidosAdmin(usuarioId) {
        fetch(`Controller/obtenerTodosPedidos.php?usuario_id=${usuarioId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    mostrarPedidosAdmin(data.pedidos);
                } else {
                    console.error('Error pedidos:', data.message);
                    mostrarErrorPedidos('Error al cargar pedidos: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarErrorPedidos('Error de conexión al cargar pedidos');
            });
    }

    // Cargar stock para administración
    function cargarStockAdmin(usuarioId) {
        fetch(`Controller/obtenerStockAdmin.php?usuario_id=${usuarioId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    
                    mostrarStockAdmin(data.productos);
                } else {
                    console.error('Error stock:', data.message);
                    mostrarErrorStock('Error al cargar stock: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarErrorStock('Error de conexión al cargar stock');
            });
    }

    // Cargar estadísticas
    function cargarEstadisticas(usuarioId) {
           fetch(`Controller/obtenerEstadisticasAdmin.php?usuario_id=${usuarioId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('total-pedidos').textContent = data.estadisticas.total_pedidos;
                    document.getElementById('pedidos-pendientes').textContent = data.estadisticas.pedidos_pendientes;
                    document.getElementById('pedidos-entregados').textContent = data.estadisticas.pedidos_entregados;
                    document.getElementById('stock-bajo').textContent = data.estadisticas.stock_bajo;
                } else {
                    console.error('Error estadísticas:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Mostrar pedidos en la tabla
    function mostrarPedidosAdmin(pedidos) {
        const tbody = document.getElementById('tabla-pedidos-admin');
        
        if (pedidos.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <i class="fas fa-inbox fa-2x text-muted mb-3"></i>
                        <p class="text-muted">No hay pedidos registrados</p>
                    </td>
                </tr>
            `;
            return;
        }

        let html = '';
        pedidos.forEach(pedido => {
            const badgeClass = `badge-estado badge-${pedido.estado}`;
            const estadoTexto = obtenerTextoEstado(pedido.estado);
            
            html += `
                <tr>
                    <td><strong>#${pedido.id_orden}</strong></td>
                    <td>
                        <div>${pedido.nombre_cliente || 'Cliente'}</div>
                        <small class="text-muted">${pedido.email_cliente || ''}</small>
                    </td>
                    <td>${formatearFecha(pedido.fecha)}</td>
                    <td><strong>$ ${parseFloat(pedido.total).toFixed(2)}</strong></td>
                    <td><span class="${badgeClass}">${estadoTexto}</span></td>
                    <td>
                        <button class="btn btn-admin btn-sm" onclick="editarPedido(${pedido.id_orden})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-info btn-sm" onclick="verDetallePedidoAdmin(${pedido.id_orden})">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = html;
    }

    // Función mejorada para mostrar stock
    function mostrarStockAdmin(productos) {
        productosCompletos = productos;
        productosFiltrados = [...productos];
        
        const tbody = document.getElementById('tabla-stock-admin');
        
        if (productos.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-4">
                        <i class="fas fa-boxes fa-2x text-muted mb-3"></i>
                        <p class="text-muted">No hay productos registrados</p>
                    </td>
                </tr>
            `;
            return;
        }

        // Actualizar contadores
        actualizarContadoresStock(productos);
        
        // Mostrar productos
        mostrarProductosFiltrados();
    }

    // Función para mostrar productos filtrados
    function mostrarProductosFiltrados() {
        const tbody = document.getElementById('tabla-stock-admin');
        let html = '';
        
        productosFiltrados.forEach(producto => {
            const disponibilidad = obtenerBadgeDisponibilidad(producto.stock, producto.estado_disponibilidad);
            const precio = producto.precio ? `$ ${parseFloat(producto.precio).toFixed(2)}` : '-';
            
            html += `
                <tr class="${getClaseFilaStock(producto.stock)}">
                    <td>
                        <div class="fw-bold">${producto.nombre}</div>
                        <small class="text-muted">
                            ${producto.material || 'Material no especificado'}
                            ${producto.talla ? ` • Talla: ${producto.talla}` : ''}
                        </small>
                    </td>
                    <td>${precio}</td>
                    <td>
                        <span class="fw-bold ${producto.stock <= 5 ? 'text-danger' : ''}">
                            ${producto.stock} unidades
                        </span>
                    </td>
                    <td>${disponibilidad}</td>
                    <td>
                        <button class="btn btn-admin btn-sm" onclick="editarStock(${producto.id_joya}, '${producto.nombre.replace(/'/g, "\\'")}', ${producto.stock})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-info btn-sm" onclick="verDetalleProducto(${producto.id_joya})" title="Ver detalles">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = html;
    }

    // Función para obtener badge de disponibilidad
    function obtenerBadgeDisponibilidad(stock, estado) {
        const estados = {
            'alta': { class: 'bg-success', text: 'Alta Disponibilidad', icon: 'fa-check' },
            'media': { class: 'bg-warning', text: 'Disponibilidad Media', icon: 'fa-exclamation' },
            'baja': { class: 'bg-danger', text: 'Stock Bajo', icon: 'fa-exclamation-triangle' },
            'agotado': { class: 'bg-secondary', text: 'Agotado', icon: 'fa-times' }
        };
        
        const info = estados[estado] || estados['agotado'];
        
        return `
            <span class="badge ${info.class} py-2 px-3">
                <i class="fas ${info.icon} me-1"></i>${info.text}
            </span>
        `;
    }

    // Función para obtener clase de fila según stock
    function getClaseFilaStock(stock) {
        if (stock === 0) return 'table-secondary';
        if (stock <= 5) return 'table-warning';
        if (stock <= 10) return 'table-info';
        return '';
    }

    // Función para actualizar contadores
    function actualizarContadoresStock(productos) {
        const contadores = {
            alta: 0,
            media: 0,
            baja: 0,
            agotado: 0
        };
        
        productos.forEach(producto => {
            contadores[producto.estado_disponibilidad]++;
        });
        
        document.getElementById('contador-alta').textContent = contadores.alta;
        document.getElementById('contador-media').textContent = contadores.media;
        document.getElementById('contador-baja').textContent = contadores.baja;
        document.getElementById('contador-agotado').textContent = contadores.agotado;
    }

    // Función para filtrar stock
    function filtrarStock() {
        const filtro = document.getElementById('filtroDisponibilidad').value;
        const busqueda = document.getElementById('buscarProducto').value.toLowerCase();
        
        productosFiltrados = productosCompletos.filter(producto => {
            // Filtro por disponibilidad
            if (filtro !== 'todos' && producto.estado_disponibilidad !== filtro) {
                return false;
            }
            
            // Filtro por búsqueda
            if (busqueda && !producto.nombre.toLowerCase().includes(busqueda) && 
                !(producto.material && producto.material.toLowerCase().includes(busqueda))) {
                return false;
            }
            
            return true;
        });
        
        mostrarProductosFiltrados();
    }

    // Funciones para errores
    function mostrarErrorPedidos(mensaje) {
        document.getElementById('tabla-pedidos-admin').innerHTML = `
            <tr>
                <td colspan="6" class="text-center py-4 text-danger">
                    <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                    <p>${mensaje}</p>
                    <button class="btn btn-admin btn-sm" onclick="cargarPedidosAdmin()">Reintentar</button>
                </td>
            </tr>
        `;
    }

    function mostrarErrorStock(mensaje) {
        document.getElementById('tabla-stock-admin').innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-4 text-danger">
                    <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                    <p>${mensaje}</p>
                    <button class="btn btn-admin btn-sm" onclick="cargarStockAdmin()">Reintentar</button>
                </td>
            </tr>
        `;
    }

    // Funciones de utilidad
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

    function formatearFecha(fechaStr) {
        const opciones = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(fechaStr).toLocaleDateString('es-ES', opciones);
    }

    function formatearFechaHora(fechaStr) {
        if (!fechaStr) return 'No disponible';
        const fecha = new Date(fechaStr);
        return fecha.toLocaleDateString('es-ES', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    // Funciones de edición
    function editarPedido(idPedido) {
        document.getElementById('modalPedidoId').textContent = idPedido;
        document.getElementById('editPedidoId').value = idPedido;
        
        const modal = new bootstrap.Modal(document.getElementById('modalEditarPedido'));
        modal.show();
    }

    function editarStock(idProducto, nombre, stockActual) {
        console.log('✏️ Editando stock:', { idProducto, nombre, stockActual });
        
        document.getElementById('editProductoId').value = idProducto;
        document.getElementById('editProductoNombre').value = nombre;
        document.getElementById('editStockActual').value = stockActual;
        document.getElementById('editNuevoStock').value = stockActual;
        
        // Establecer el mínimo en 0
        document.getElementById('editNuevoStock').min = 0;
        
        const modal = new bootstrap.Modal(document.getElementById('modalEditarStock'));
        modal.show();
    }

    // FUNCIÓN CORREGIDA - SIN ERRORES
    // FUNCIÓN CORREGIDA - VERSIÓN MEJORADA
function guardarCambiosStock() {
    const idProducto = document.getElementById('editProductoId').value;
    const nuevoStock = parseInt(document.getElementById('editNuevoStock').value);
    
    // Validaciones básicas
    if (isNaN(nuevoStock) || nuevoStock < 0) {
        Swal.fire({
            title: 'Error',
            text: 'El stock debe ser un número válido mayor o igual a 0',
            icon: 'error',
            confirmButtonColor: '#8B4513'
        });
        return;
    }
    
    // Obtener usuario del localStorage
    const usuario = JSON.parse(localStorage.getItem('usuario'));
    
    if (!usuario || !usuario.id) {
        Swal.fire({
            title: 'Error de sesión',
            text: 'No hay usuario identificado. Por favor, inicie sesión nuevamente.',
            icon: 'error',
            confirmButtonColor: '#8B4513'
        });
        return;
    }
    
    

    // Crear FormData
    const formData = new FormData();
    formData.append('id_joya', idProducto);
    formData.append('stock', nuevoStock);
    formData.append('usuario_id', usuario.id);

    fetch('Controller/actualizarStock.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
       
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        
        if (data.success) {
            // CERRAR MODAL - FORMA MÁS ROBUSTA PARA BOOTSTRAP 5
            const modalElement = document.getElementById('modalEditarStock');
            if (modalElement) {
                // Método 1: Usar getOrCreateInstance (Bootstrap 5.1+)
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal && bootstrap.Modal.getOrCreateInstance) {
                    const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
                    modal.hide();
                }
                // Método 2: Usar data-bs-dismiss de forma programática
                else if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    const modal = new bootstrap.Modal(modalElement);
                    modal.hide();
                }
                // Método 3: Fallback manual
                else {
                    modalElement.classList.remove('show');
                    modalElement.style.display = 'none';
                    document.body.classList.remove('modal-open');
                    const backdrop = document.querySelector('.modal-backdrop');
                    if (backdrop) backdrop.remove();
                }
            }
            
            // Mostrar mensaje de éxito
            Swal.fire({
                title: '¡Éxito!',
                text: data.message,
                icon: 'success',
                confirmButtonColor: '#8B4513',
                timer: 2000
            });
            
            // Recargar datos después de un breve delay
            setTimeout(() => {
                const usuario = JSON.parse(localStorage.getItem('usuario'));
                if (usuario && usuario.id) {
                    cargarStockAdmin(usuario.id);
                    cargarEstadisticas(usuario.id);
                }
            }, 500);
            
        } else {
            throw new Error(data.message || 'Error desconocido del servidor');
        }
    })
    .catch(error => {
        console.error('Error completo:', error);
        Swal.fire({
            title: 'Error',
            text: error.message || 'No se pudo conectar con el servidor',
            icon: 'error',
            confirmButtonColor: '#8B4513'
        });
    });
}
    function guardarCambiosPedido() {
        alert('Funcionalidad de guardar cambios del pedido en desarrollo');
    }

    function verDetallePedidoAdmin(idPedido) {
        window.open(`pedidos.php?admin_view=${idPedido}`, '_blank');
    }

    function verDetalleProducto(idProducto) {
        const producto = productosCompletos.find(p => p.id_joya === idProducto);
        if (!producto) return;
        
        const detalles = `
            <strong>Nombre:</strong> ${producto.nombre}<br>
            <strong>Material:</strong> ${producto.material || 'No especificado'}<br>
            <strong>Precio:</strong> ${producto.precio ? `$ ${parseFloat(producto.precio).toFixed(2)}` : 'No especificado'}<br>
            <strong>Stock:</strong> ${producto.stock} unidades<br>
            <strong>Talla:</strong> ${producto.talla || 'No especificada'}<br>
            <strong>Detalles:</strong> ${producto.detalle || 'No hay detalles adicionales'}<br>
            ${producto.agotado_en ? `<strong>Agotado desde:</strong> ${formatearFechaHora(producto.agotado_en)}` : ''}
        `;
        
        Swal.fire({
            title: `Producto #${producto.id_joya}`,
            html: detalles,
            icon: 'info',
            confirmButtonText: 'Cerrar',
            confirmButtonColor: '#8B4513'
        });
    }

    // Inicializar cuando la página cargue
    document.addEventListener('DOMContentLoaded', function() {
        
        verificarAdmin();
        
        // Recargar datos cada 30 segundos
        setInterval(() => {
            const usuario = JSON.parse(localStorage.getItem('usuario'));
            if (usuario && usuario.id) {
                cargarDatosAdmin(usuario.id);
            }
        }, 30000);
    });
    </script>
</body>
</html>