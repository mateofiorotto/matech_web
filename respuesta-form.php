<!--SECCION 5: RECIBIR DATOS FORM-->
<?php 
require_once "funciones/autoload.php";
$userData = $_SESSION['loggedIn'] ?? FALSE;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>En Breve te Ayudamos | Matech</title>
    <link rel="icon" type="image/x-icon" href="elementos-graficos/otros/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
<header id="header">
        <h1>En breve te ayudamos | Matech</h1>
        <!--defino nav con bootstrap-->
        <nav id="barra-nav" class="container navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand mb-2 mt-2" id="logo-matech" href="index.php?seccion=home">Matech</a>
                <button id="boton-navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navegacion-navbar" aria-controls="navegacion-navbar" aria-expanded="false" aria-label="Activar / desactivar navegación">
                    <i id="icono-navbar-toggle" class="bi bi-list"><span>Boton hamburguesa</span></i>
                </button>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navegacion-navbar">
                <ul class="navbar-nav justify-content-start align-items-start justify-content-lg-center align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?seccion=home">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="secciones-desplegable-btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Secciones
                        </a>
                        <ul class="dropdown-menu secciones-desplegable" aria-labelledby="secciones-desplegable-btn">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?seccion=productos">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?seccion=marcas">Marcas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?seccion=ayuda">Ayuda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?seccion=alumno">Alumno</a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?seccion=carrito"><i class="bi bi-cart-fill"><span>Carrito de compras</span></i></a>
                    </li>

                    <?PHP if ($userData) { ?>
                        <li class="nav-item fw-bold nav-link text-light rounded me-2 d-flex align-items-center justify-content-center" style="white-space: nowrap;">
                            <a class="text-decoration-none" href="index.php?seccion=panel_usuario">
                            <i class="align-middle fs-3 me-3 bi bi-person-circle"><span>Icono usuario</span></i>
                            <span class="usuario-nombre"><?= $userData['nombre_completo'] ?? "" ?></span></a>
                        </li>
                    <?PHP } ?>

                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link" href="index.php?seccion=login"><i class="vertical-middle fs-2 bi bi-box-arrow-in-right"><span>Icono login</span></i></a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="admin/actions/auth_logout.php"><span class="fw-light"><i class="vertical-middle fs-2 bi bi-box-arrow-in-left"><span>Icono logout</span></i></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //acá verifico si el usuario ingresó algo o no
            //si no lo hizo, devolver "No proporcionado"
            //obtengo los datos mandados por POST
            $email = isset($_POST['email']) ? $_POST['email'] : 'No proporcionado';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'No proporcionado';
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : 'No proporcionado';
            $producto = isset($_POST['producto']) && $_POST['producto'] !== 'Selecciona' ? $_POST['producto'] : 'No proporcionado';
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : 'No proporcionado';

            //num ticket random con funcion nativa php
            $ticket = rand(100000, 999999);
        ?>

            <section class='m-auto mt-4 mb-4 container' id='rta-seccion'>
                <h2 class='mb-4'>Su formulario ha sido enviado con éxito</h2>
                <p>En breve te contactaremos por mail. Asegurate de revisar <strong>la casilla de spam</strong>.</p>
                <p><span class='bold'>N° de Ticket:</span> <?= "#" . $ticket; ?></p>
                <p><span class='bold'>Correo electrónico:</span> <?= $email ?></p>
                <p><span class='bold'>Nombre Completo:</span> <?= $nombre ?></p>
                <p><span class='bold'>Teléfono:</span> <?= $telefono ?></p>
                <p><span class='bold'>Tipo de Producto:</span> <?= $producto ?></p>
                <p><span class='bold'>Descripción del Problema:</span> <?= $descripcion ?></p>
                <a class='volver' href='index.php'>Volver al inicio</a>
            </section>

        <?php } else { ?>
            <section id="error-404">
                <div class="container text-center">
                    <h2>Error 404</h2>
                    <p class="text-center">No hay datos enviados</p>
                    <i id="error-404-icono" class="bi bi-emoji-frown"></i>
                    <a class="volver" href="index.php?seccion=home">Volver al inicio</a>
                </div>
            </section>
        <?php }; ?>
    </main>

    <footer class="p-4">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="p-4 col-lg-4 col-md-12">
                    <a id="logo-footer" class="img-fluid" href="index.php?seccion=home">Matech</a>
                    <p id="frase-footer">Mejorá <strong>tu equipo</strong>, mejorá <strong>tu trabajo</strong>.</p>
                    <p><a id="mail-footer" class="links-navs" href="mailto:mateo.fiorotto@davinci.edu.ar">mateo.fiorotto@davinci.edu.ar</a></p>
                </div>
                <div id="explorar-footer" class="d-flex flex-column justify-content-lg-center justify-content-md-start align-items-md-start align-items-lg-center mb-1 mt-4 p-4 col-lg-4 col-md-12">
                    <h2 class="text-start">Explora</h2>
                    <ul class="links-footer text-start">
                        <li>
                            <a href="index.php?seccion=home">Home</a>
                        </li>
                        <li>
                            <a href="index.php?seccion=productos">Productos</a>
                        </li>
                        <li>
                            <a href="index.php?seccion=marcas">Marcas</a>
                        </li>
                        <li>
                            <a href="index.php?seccion=ayuda">Ayuda</a>
                        </li>
                        <li>
                            <a href="index.php?seccion=alumno">Alumno</a>
                        </li>
                    </ul>
                </div>
                <div class="mb-1 p-4 col-lg-4 col-md-12 justify-content-center align-items-center">
                    <h2 class="text-lg-center text-md-start">Redes</h2>
                    <ul class="redes d-flex flex-row justify-content-lg-center justify-content-md-start">
                        <li><a target="_blank" rel="noopener noreferrer" href="https://instagram.com/mateo.fiorotto_"><i
                                    class="links-footer bi bi-instagram"><span>Instagram</span></i></a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/@matewav"><i
                                    class="links-footer bi bi-youtube"><span>YouTube</span></i></a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://tiktok.com/@elmatecs"><i
                                    class="links-footer bi bi-tiktok"><span>TikTok</span></i></a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://x.com/mateo_fiorotto_"><i
                                    class="links-footer bi bi-twitter-x"><span>X</span></i></a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/mateo-fiorotto"><i
                                    class="links-footer bi bi-linkedin"><span>LinkedIn</span></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>