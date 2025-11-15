<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Noticia completa - JoyasCharlys">
    
    <title>Noticia - JoyasCharlys</title>
    
    <!-- Todos tus estilos existentes -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        .news-detail-section {
            padding: 80px 0;
        }
        .news-header {
            margin-bottom: 40px;
            text-align: center;
        }
        .news-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }
        .news-meta {
            color: #666;
            font-size: 1rem;
            margin-bottom: 30px;
        }
        .news-meta span {
            margin: 0 15px;
        }
        .news-featured-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 40px;
        }
        .news-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }
        .news-content p {
            margin-bottom: 25px;
        }
        .news-content h3 {
            color: #333;
            margin: 40px 0 20px 0;
            font-weight: 600;
        }
        .news-content ul {
            margin-bottom: 25px;
            padding-left: 20px;
        }
        .news-content li {
            margin-bottom: 10px;
        }
        .back-to-news {
            display: inline-flex;
            align-items: center;
            color: #ff6b6b;
            font-weight: 600;
            text-decoration: none;
            margin-top: 40px;
            transition: all 0.3s ease;
        }
        .back-to-news:hover {
            color: #ff5252;
            transform: translateX(-5px);
        }
        .related-news {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 2px solid #f0f0f0;
        }
        .related-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
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
    
    <!-- Header Area -->
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
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">Carrito</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contacto</a></li>
                            <li class="nav-item active"><a class="nav-link" href="News.php">Noticias</a></li>
                            <li class="nav-item"><a class="nav-link" href="Shop.php">Productos</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Iniciar sesión</a></li>
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
                        <p>Descubre las últimas novedades en joyería</p>
                        <h1>Noticia Completa</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- News Detail Section -->
    <div class="news-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <?php
                    // Simulamos el contenido de las noticias
                    $news_id = isset($_GET['id']) ? intval($_GET['id']) : 1;
                    
                    $noticias_completas = [
                        1 => [
                            'titulo' => 'Tendencias de Joyería 2024: Lo que viene',
                            'imagen' => 'img/noticias/Tendencias-2024.png',
                            'fecha' => '15 Enero, 2024',
                            'autor' => 'Admin',
                            'categoria' => 'Tendencias',
                            'contenido' => '
                                <p>El mundo de la joyería está en constante evolución, y 2024 promete traer consigo una ola de innovación y estilo que marcará un antes y un después en la industria. Los diseñadores más prestigiosos han comenzado a revelar sus colecciones, y podemos observar patrones fascinantes que definirán el año.</p>
                                
                                <h3>Los Colores que Dominarán</h3>
                                <p>El oro rosa continúa su reinado, pero con un giro interesante: ahora se combina con piedras semipreciosas en tonos tierra. Los verdes oliva, los azules profundos y los rosas sutiles están ganando popularidad entre las casas de joyería más exclusivas.</p>
                                
                                <h3>Materiales Sostenibles</h3>
                                <p>La conciencia ecológica ha llegado para quedarse en la joyería. Marcas líderes están implementando:</p>
                                <ul>
                                    <li>Oro reciclado con certificación</li>
                                    <li>Diamantes de laboratorio</li>
                                    <li>Materiales de origen ético</li>
                                    <li>Embalajes biodegradables</li>
                                </ul>
                                
                                <h3>Diseños Personalizados</h3>
                                <p>La joyería personalizada sigue en auge, con un enfoque en piezas que cuentan historias personales. Los clientes buscan creaciones únicas que reflejen su identidad y momentos significativos de sus vidas.</p>
                                
                                <p>En JoyasCharlys estamos emocionados de incorporar estas tendencias en nuestras nuevas colecciones, siempre manteniendo nuestra esencia de calidad y elegancia que nos caracteriza.</p>
                            '
                        ],
                        2 => [
                            'titulo' => 'Joyería Personalizada: Crea tu estilo único',
                            'imagen' => 'img/noticias/Joyeria-personalizada.png',
                            'fecha' => '10 Enero, 2024',
                            'autor' => 'Admin',
                            'categoria' => 'Novedades',
                            'contenido' => '
                                <p>En JoyasCharlys entendemos que cada persona es única, y por eso hemos desarrollado un servicio exclusivo de joyería personalizada que permite a nuestros clientes crear piezas que reflejen su estilo y personalidad.</p>
                                
                                <h3>¿Cómo Funciona Nuestro Servicio?</h3>
                                <p>Nuestro proceso de personalización es sencillo pero detallado:</p>
                                <ul>
                                    <li><strong>Consulta Inicial:</strong> Nuestros diseñadores se reúnen contigo para entender tu visión</li>
                                    <li><strong>Diseño Conceptual:</strong> Creamos bocetos digitales de tu pieza ideal</li>
                                    <li><strong>Selección de Materiales:</strong> Eliges entre oro, plata, platino y piedras preciosas</li>
                                    <li><strong>Fabricación Artesanal:</strong> Nuestros artesanos dan vida a tu diseño</li>
                                    <li><strong>Entrega y Ajustes:</strong> Te presentamos la pieza final y realizamos ajustes si es necesario</li>
                                </ul>
                                
                                <h3>Ocasiones Especiales</h3>
                                <p>Nuestras piezas personalizadas son perfectas para:</p>
                                <ul>
                                    <li>Bodas y aniversarios</li>
                                    <li>Regalos de compromiso</li>
                                    <li>Celebraciones familiares</li>
                                    <li>Logros profesionales</li>
                                    <li>Momentos especiales que merecen ser recordados</li>
                                </ul>
                                
                                <h3>Testimonios de Clientes</h3>
                                <p>"Creé un collar con las iniciales de mis hijos y es mi posesión más preciada. El equipo de JoyasCharlys captó exactamente lo que quería." - María G.</p>
                                
                                <p>¿Tienes una idea en mente? Contáctanos y hagámosla realidad juntos.</p>
                            '
                        ],
                        3 => [
                            'titulo' => 'Guía para el cuidado de tus joyas',
                            'imagen' => 'img/noticias/Cuidado-de-joyas.png',
                            'fecha' => '5 Enero, 2024',
                            'autor' => 'Admin',
                            'categoria' => 'Consejos',
                            'contenido' => '
                                <p>Las joyas son inversiones que, con el cuidado adecuado, pueden durar generaciones. Te compartimos nuestra guía completa para mantener tus piezas siempre radiantes.</p>
                                
                                <h3>Cuidado Diario Básico</h3>
                                <p>Sigue estos simples pasos para mantener el brillo de tus joyas:</p>
                                <ul>
                                    <li><strong>Última en ponerte, primera en quitarte:</strong> Colócate las joyas después de aplicar maquillaje y perfumes</li>
                                    <li><strong>Evita productos químicos:</strong> Quita tus joyas al usar limpiadores, cloro o piscinas</li>
                                    <li><strong>Almacenamiento adecuado:</strong> Guarda cada pieza por separado para evitar rayones</li>
                                    <li><strong>Limpieza regular:</strong> Usa un paño suave para eliminar residuos de piel y polvo</li>
                                </ul>
                                
                                <h3>Limpieza por Material</h3>
                                <p><strong>Oro:</strong> Limpia con agua tibia y jabón neutro, seca inmediatamente con paño suave.</p>
                                <p><strong>Plata:</strong> Usa pasta de plata específica o paños de limpieza especializados.</p>
                                <p><strong>Diamantes:</strong> Sumerge en agua con amoníaco diluido y cepilla suavemente con cepillo de dientes suave.</p>
                                <p><strong>Perlas:</strong> Limpia con paño húmedo inmediatamente después de usarlas.</p>
                                
                                <h3>Mantenimiento Profesional</h3>
                                <p>Recomendamos traer tus joyas a JoyasCharlys cada 6 meses para:</p>
                                <ul>
                                    <li>Limpieza profesional ultrasónica</li>
                                    <li>Revisión de engarces y cierres</li>
                                    <li>Pulido y revitalización</li>
                                    <li>Ajuste de tallas si es necesario</li>
                                </ul>
                                
                                <p>Recuerda: el cuidado preventivo es la mejor manera de preservar el valor y belleza de tus joyas.</p>
                            '
                        ],
                        4 => [
                            'titulo' => 'El oro rosa regresa con fuerza',
                            'imagen' => 'img/noticias/Oro-rosa.png',
                            'fecha' => '28 Diciembre, 2023',
                            'autor' => 'Admin',
                            'categoria' => 'Tendencias',
                            'contenido' => '
                                <p>El oro rosa, con su tono cálido y romántico, está experimentando un resurgimiento notable en el mundo de la joyería. Esta aleación de oro que combina oro amarillo con cobre está conquistando los corazones de los amantes de las joyas.</p>
                                
                                <h3>¿Por qué el Oro Rosa?</h3>
                                <p>El oro rosa ofrece una alternativa elegante al oro tradicional. Su tono rosado:</p>
                                <ul>
                                    <li>Complementa todo tipo de tonos de piel</li>
                                    <li>Transmite calidez y sofisticación</li>
                                    <li>Es versátil para uso diario y ocasiones especiales</li>
                                    <li>Combina perfectamente con diamantes y otras piedras preciosas</li>
                                </ul>
                                
                                <h3>Combinaciones Modernas</h3>
                                <p>Los diseñadores están innovando con el oro rosa al combinarlo con:</p>
                                <ul>
                                    <li>Esmeraldas para un look vibrante</li>
                                    <li>Zafiros rosados para armonía tonal</li>
                                    <li>Diamantes negros para contraste dramático</li>
                                    <li>Perlas para elegancia clásica</li>
                                </ul>
                                
                                <h3>En JoyasCharlys</h3>
                                <p>Hemos expandido nuestra colección de oro rosa con piezas que van desde anillos delicados hasta collares statement. Cada pieza es fabricada con los más altos estándares de calidad.</p>
                                
                                <p>Ven a descubrir por qué el oro rosa se ha convertido en la elección favorita para quienes buscan piezas atemporales pero contemporáneas.</p>
                            '
                        ],
                        5 => [
                            'titulo' => 'Cómo elegir diamantes perfectos',
                            'imagen' => 'img/noticias/Diamantes-perfectos.png',
                            'fecha' => '20 Diciembre, 2023',
                            'autor' => 'Especialista',
                            'categoria' => 'Consejos',
                            'contenido' => '
                                <p>Elegir el diamante perfecto puede ser abrumador, pero entender las 4 C (Cut, Color, Clarity, Carat) te ayudará a tomar la mejor decisión. Te guiamos paso a paso en este proceso.</p>
                                
                                <h3>Las 4 C del Diamante</h3>
                                <p><strong>Corte (Cut):</strong> El corte determina el brillo del diamante. Un buen corte maximiza la reflexión de la luz. Busca cortes Excellent o Very Good.</p>
                                <p><strong>Color (Color):</strong> La escala va de D (incoloro) a Z (amarillo). Para la mayoría, las categorías G-J ofrecen el mejor balance entre calidad y precio.</p>
                                <p><strong>Claridad (Clarity):</strong> Se refiere a las inclusiones internas. VS1-VS2 son excelentes opciones donde las inclusiones no son visibles a simple vista.</p>
                                <p><strong>Quilates (Carat):</strong> El peso del diamante. Recuerda que el tamaño no lo es todo - la calidad del corte es igual de importante.</p>
                                
                                <h3>Consejos Prácticos</h3>
                                <ul>
                                    <li>Establece un presupuesto antes de comenzar</li>
                                    <li>Prioriza el corte sobre el tamaño</li>
                                    <li>Pide siempre un certificado GIA o AGS</li>
                                    <li>Compara diamantes en persona cuando sea posible</li>
                                    <li>Considera la forma que mejor se adapte al estilo personal</li>
                                </ul>
                                
                                <h3>Formas Populares</h3>
                                <p>Desde el clásico round brilliant hasta el moderno cushion cut, cada forma tiene su encanto único. En JoyasCharlys te asesoramos para encontrar la forma perfecta para ti.</p>
                                
                                <p>¿Listo para encontrar tu diamante perfecto? Agenda una cita con nuestros especialistas.</p>
                            '
                        ],
                        6 => [
                            'titulo' => 'Nuestra apuesta por la joyería sostenible',
                            'imagen' => 'img/noticias/Joyeria-sostenible.png',
                            'fecha' => '15 Diciembre, 2023',
                            'autor' => 'Director',
                            'categoria' => 'JoyasCharlys',
                            'contenido' => '
                                <p>En JoyasCharlys creemos que la belleza y la responsabilidad pueden ir de la mano. Por eso hemos implementado un programa integral de sostenibilidad que transforma nuestra manera de crear joyas.</p>
                                
                                <h3>Nuestros Compromisos</h3>
                                <p><strong>Materiales Responsables:</strong> Utilizamos oro reciclado con certificación y diamantes de laboratorio que reducen significativamente el impacto ambiental.</p>
                                <p><strong>Cadena de Suministro Transparente:</strong> Conocemos el origen de cada material y trabajamos solo con proveedores que comparten nuestros valores.</p>
                                <p><strong>Producción Local:</strong> El 90% de nuestras piezas son fabricadas en nuestros talleres locales, apoyando la economía de nuestra comunidad.</p>
                                
                                <h3>Innovaciones Sostenibles</h3>
                                <ul>
                                    <li>Sistema de recuperación de metales preciosos</li>
                                    <li>Embalajes 100% biodegradables</li>
                                    <li>Energía solar en nuestras instalaciones</li>
                                    <li>Programa de reciclaje de joyas antiguas</li>
                                </ul>
                                
                                <h3>Certificaciones que Avalan Nuestro Trabajo</h3>
                                <p>Estamos orgullosos de contar con:</p>
                                <ul>
                                    <li>Certificación de Comercio Justo para metales preciosos</li>
                                    <li>Sello de Producción Responsable</li>
                                    <li>Certificación Carbon Neutral para nuestras operaciones</li>
                                </ul>
                                
                                <p>Cada pieza que creamos no solo es hermosa, sino también ética y responsable. Juntos, estamos construyendo un futuro más brillante para la joyería.</p>
                            '
                        ],
                        7 => [
                            'titulo' => 'Plata 925: La elección perfecta para joyería diaria',
                            'imagen' => 'img/noticias/Plata-925.png',
                            'fecha' => '10 Diciembre, 2023',
                            'autor' => 'Especialista',
                            'categoria' => 'Consejos',
                            'contenido' => '
                                <p>La plata 925, también conocida como plata esterlina, es el estándar de excelencia en joyería de plata. Con un 92.5% de plata pura y 7.5% de cobre, ofrece la durabilidad perfecta para el uso diario.</p>
                                
                                <h3>¿Por qué Plata 925?</h3>
                                <ul>
                                    <li><strong>Durabilidad:</strong> Resistente pero maleable para diseños detallados</li>
                                    <li><strong>Brillo:</strong> Reflectividad excepcional que realza cualquier piedra</li>
                                    <<li><strong>Hipoalergénica:</strong> Ideal para pieles sensibles</li>
                                    <li><strong>Accesible:</strong> Excelente relación calidad-precio</li>
                                </ul>
                                
                                <h3>Cuidado y Mantenimiento</h3>
                                <p>Para mantener el brillo de tu plata 925:</p>
                                <ul>
                                    <li>Guárdala en bolsas anti-oxidación cuando no la uses</li>
                                    <li>Límpiala con paños especiales para plata</li>
                                    <li>Evita el contacto con productos químicos</li>
                                    <li>Úsala frecuentemente - el uso natural ayuda a prevenir el oscurecimiento</li>
                                </ul>
                                
                                <h3>Nuestra Colección Plata 925</h3>
                                <p>En JoyasCharlys ofrecemos una amplia gama de piezas en plata 925:</p>
                                <ul>
                                    <li>Anillos con diseños contemporáneos</li>
                                    <li>Collares con detalles artesanales</li>
                                    <li>Pendientes que combinan tradición y modernidad</li>
                                    <li>Pulseras con acabados perfectos</li>
                                </ul>
                                
                                <p>Descubre por qué la plata 925 sigue siendo la elección preferida para joyería de uso diario que combina elegancia y practicidad.</p>
                            '
                        ],
                        8 => [
                            'titulo' => 'Nueva colección Primavera-Verano 2024',
                            'imagen' => 'img/noticias/Nueva-coleccion.png',
                            'fecha' => '5 Diciembre, 2023',
                            'autor' => 'Admin',
                            'categoria' => 'JoyasCharlys',
                            'contenido' => '
                                <p>Nos complace presentar nuestra nueva colección Primavera-Verano 2024, una celebración de la renovación y la alegría que caracterizan estas estaciones. Cada pieza está inspirada en la frescura y vitalidad de la naturaleza en su máximo esplendor.</p>
                                
                                <h3>Inspiración y Diseño</h3>
                                <p>La colección se inspira en:</p>
                                <ul>
                                    <li>Los colores vibrantes de los jardines en flor</li>
                                    <li>La suavidad de las brisas primaverales</li>
                                    <li>La energía renovadora del verano</li>
                                    <li>Las formas orgánicas de la naturaleza</li>
                                </ul>
                                
                                <h3>Piezas Destacadas</h3>
                                <p><strong>"Floración Eterna":</strong> Collar con diamantes en forma de pétalos que capturan la luz de manera única.</p>
                                <p><strong>"Brisa Marina":</strong> Conjunto de plata y turquesa que evoca la frescura del océano.</p>
                                <p><strong>"Atardecer Dorado":</strong> Anillos que combinan oro amarillo y citrinos en degradé.</p>
                                <p><strong>"Rocío Matutino":</strong> Pendientes con perlas de agua dulce y diamantes.</p>
                                
                                <h3>Técnicas Innovadoras</h3>
                                <p>Esta colección incorpora:</p>
                                <ul>
                                    <li>Esmalte translúcido para efectos acuosos</li>
                                    <li>Engastes invisibles para piedras flotantes</li>
                                    <li>Grabado láser con motivos naturales</li>
                                    <li>Combinaciones inusuales de metales</li>
                                </ul>
                                
                                <p>Visita nuestra tienda y descubre cómo estas piezas pueden ser el complemento perfecto para tu estilo primaveral-veraniego.</p>
                            '
                        ],
                        9 => [
                            'titulo' => 'Joyas para bodas: Lo que debes saber',
                            'imagen' => 'img/noticias/Joyas-bodas.png',
                            'fecha' => '30 Noviembre, 2023',
                            'autor' => 'Admin',
                            'categoria' => 'Consejos',
                            'contenido' => '
                                <p>Tu boda es uno de los días más importantes de tu vida, y las joyas que elijas deben realzar tu belleza sin opacar el momento. Te guiamos en la selección perfecta de joyas para tu gran día.</p>
                                
                                <h3>Coordinación con el Vestido</h3>
                                <p><strong>Escote:</strong> Joyas que complementen el escote de tu vestido:</p>
                                <ul>
                                    <li>Escote corazón: Collares en forma de V o Y</li>
                                    <li>Escote barco: Aretes statement o collares cortos</li>
                                    <li>Escote illusion: Piezas delicadas que sigan las líneas del encaje</li>
                                </ul>
                                
                                <h3>Elección por Estilo de Boda</h3>
                                <p><strong>Boda Formal:</strong> Diamantes y perlas para elegancia atemporal</p>
                                <p><strong>Boda Rústica:</strong> Joyas orgánicas con piedras naturales</p>
                                <p><strong>Boda Playa:</strong> Turquesas y plata para un look fresco</p>
                                <p><strong>Boda Vintage:</strong> Joyas con detalles Art Decó o Victoriano</p>
                                
                                <h3>Consejos de Expertos</h3>
                                <ul>
                                    <li>Prueba las joyas con el peinado y maquillaje de prueba</li>
                                    <li>Considera la iluminación del lugar de la boda</li>
                                    <li>Elije piezas que puedas usar después de la boda</li>
                                    <li>No olvides asegurar tus joyas para el gran día</li>
                                    <li>Coordina con las joyas de tu pareja si es posible</li>
                                </ul>
                                
                                <h3>Servicio de Asesoría para Novias</h3>
                                <p>En JoyasCharlys ofrecemos asesoría personalizada para novias. Te ayudamos a:</p>
                                <ul>
                                    <li>Seleccionar piezas que complementen tu vestuario</li>
                                    <li>Crear joyas personalizadas para tu boda</li>
                                    <li>Coordinar las joyas de toda la bridal party</li>
                                    <li>Planificar con meses de anticipación</li>
                                </ul>
                                
                                <p>Tu día perfecto merece joyas perfectas. Agenda tu cita de asesoría hoy mismo.</p>
                            '
                        ]
                    ];
                    
                    // Si la noticia no existe, mostramos la primera
                    if (!isset($noticias_completas[$news_id])) {
                        $news_id = 1;
                    }
                    
                    $noticia = $noticias_completas[$news_id];
                    ?>
                    
                    <article>
                        <div class="news-header">
                            <h1 class="news-title"><?php echo $noticia['titulo']; ?></h1>
                            <div class="news-meta">
                                <span><i class="fas fa-user"></i> <?php echo $noticia['autor']; ?></span>
                                <span><i class="fas fa-calendar"></i> <?php echo $noticia['fecha']; ?></span>
                                <span><i class="fas fa-tag"></i> <?php echo $noticia['categoria']; ?></span>
                            </div>
                        </div>
                        
                        <img src="<?php echo $noticia['imagen']; ?>" alt="<?php echo $noticia['titulo']; ?>" class="news-featured-img">
                        
                        <div class="news-content">
                            <?php echo $noticia['contenido']; ?>
                        </div>
                        
                        <a href="News.php" class="back-to-news">
                            <i class="fas fa-arrow-left"></i> Volver a Noticias
                        </a>
                    </article>
                    
                    <!-- Noticias Relacionadas -->
                    <div class="related-news">
                        <h3 class="related-title">Noticias Relacionadas</h3>
                        <div class="row">
                            <?php
                            // Mostramos 3 noticias relacionadas (excluyendo la actual)
                            $related_count = 0;
                            foreach($noticias_completas as $id => $related_news) {
                                if ($id != $news_id && $related_count < 3) {
                                    echo '
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-latest-news">
                                            <div class="latest-news-bg" style="background-image: url(\'' . $related_news['imagen'] . '\')"></div>
                                            <div class="news-text-box">
                                                <h4><a href="single-news.php?id=' . $id . '">' . $related_news['titulo'] . '</a></h4>
                                                <p class="blog-meta">
                                                    <span class="date"><i class="fas fa-calendar"></i> ' . $related_news['fecha'] . '</span>
                                                </p>
                                                <a href="single-news.php?id=' . $id . '" class="read-more-btn">leer más <i class="fas fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>';
                                    $related_count++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End News Detail Section -->

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

</body>
</html>