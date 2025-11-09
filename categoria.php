<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría | Joyería</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Header -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
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
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>

							<li class="nav-item submenu dropdown">
							<a class="nav-link" href="cart.php">Cart</a></li>
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

    <!-- Breadcrumb -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container text-center">
            <div class="breadcrumb-text">
                <p>Descubre nuestra selección</p>
                <h1 id="titulo_categoria">Categoría</h1>
            </div>
        </div>
    </div>

    <!-- Productos por categoría -->
    <section class="product-area mt-5 mb-5">
        <div class="container">
            <div class="row" id="joyas_categoria">
                <h3 class="text-center w-100">Cargando productos...</h3>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-area section_gap">
        <div class="container text-center">
            <p>&copy; <script>document.write(new Date().getFullYear());</script> Joyería Elegance. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script>
        // 1️⃣ Obtener id_categoria de la URL
        const params = new URLSearchParams(window.location.search);
        const id_categoria = params.get('id_categoria');

        // 2️⃣ Cargar joyas de esa categoría
        async function cargarJoyasPorCategoria() {
            try {
                const url = `http://localhost/Joyeria/Controller/joyas.php?id_categoria=${id_categoria}`;
                const res = await fetch(url);
                const joyas = await res.json();

                mostrarJoyas(joyas);
            } catch (error) {
                console.error('Error al obtener joyas:', error);
                document.getElementById('joyas_categoria').innerHTML =
                    '<h3 class="text-center w-100 text-danger">Error al cargar los productos</h3>';
            }
        }

        // 3️⃣ Mostrar joyas
        function mostrarJoyas(joyas) {
            const contenedor = document.getElementById('joyas_categoria');
            contenedor.innerHTML = '';

            if (joyas.length === 0) {
                contenedor.innerHTML = '<h4 class="text-center w-100">No hay productos en esta categoría</h4>';
                return;
            }

            joyas.forEach(joya => {
                const card = document.createElement('div');
                card.classList.add('col-lg-4', 'col-sm-6', 'mb-4');
                card.innerHTML = `
                    <div class="card h-100 shadow-sm">
                        <img src="${joya.imagen_url}" class="card-img-top" alt="${joya.nombre}">
                        <div class="card-body text-center">
                            <h5 class="card-title">${joya.nombre}</h5>
                            <p class="card-text text-muted">${joya.material || ''}</p>
                            <h6 class="text-warning">$${parseFloat(joya.precio).toFixed(2)}</h6>
                            <button 
                                class="btn btn-outline-warning add-to-cart" 
                                data-id="${joya.id_joya}" 
                                data-nombre="${joya.nombre}" 
                                data-precio="${joya.precio}" 
                                data-imagen="${joya.imagen_url}">
                                <i class="bi bi-cart"></i> Agregar al carrito
                            </button>
                        </div>
                    </div>
                `;
                contenedor.appendChild(card);
            });
        }

        // 4️⃣ Inicializar carga
        cargarJoyasPorCategoria();
    </script>
</body>
</html>

