<!--INDEX ADMIN-->
<?php
require_once "../funciones/autoload.php";

//esto es para que no se cargue el login de ADMIN en caso de que la BD no este conectada, ya que no llamo a ninguna clase en el index
//igual no es necesario para el lado backend, pero me gustaria agregarlo
Conexion::conectar();

//seccion por default = home
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'dashboard';

//indico las secciones validas (whitelist) + 404. Le paso el titulo para cargarlo en el header.php
$secciones_validas = [
    '404' => [
        'titulo' => 'Pagina no encontrada | Matech',
        'restringido' => 0,
    ],
    'dashboard' => [
        'titulo' => "Dashboard | Matech",
        'restringido' => 2,
    ],
    'login' => [
        'titulo' => 'Iniciar Sesión | Matech',
        'restringido' => 0,
    ],

    //componentes
    'admin_componentes' => [
        'titulo' => 'Administrar Componentes | Matech',
        'restringido' => 2,
    ],
    'agregar_componente' => [
        'titulo' => 'Agregar Componente | Matech',
        'restringido' => 2,
    ],
    'editar_componente' => [
        'titulo' => 'Editar Componente | Matech',
        'restringido' => 2,
    ],
    'borrar_componente' => [
        'titulo' => 'Borrar Componente | Matech',
        'restringido' => 2,
    ],

    //marcas
    'admin_marcas' => [
        'titulo' => 'Administrar Marcas | Matech',
        'restringido' => 2,
    ],
    'agregar_marca' => [
        'titulo' => 'Agregar Marca | Matech',
        'restringido' => 2,
    ],
    'editar_marca' => [
        'titulo' => 'Editar Marca | Matech',
        'restringido' => 2,
    ],
    'borrar_marca' => [
        'titulo' => 'Borrar Marca | Matech',
        'restringido' => 2,
    ],

    //categorias
    'admin_categorias' => [
        'titulo' => 'Administrar Categorias | Matech',
        'restringido' => 2,
    ],
    'agregar_categoria' => [
        'titulo' => 'Agregar Categoria | Matech',
        'restringido' => 2,
    ],
    'editar_categoria' => [
        'titulo' => 'Editar Categoria | Matech',
        'restringido' => 2,
    ],
    'borrar_categoria' => [
        'titulo' => 'Borrar Categoria | Matech',
        'restringido' => 2,
    ],

    //etiquetas
    'admin_etiquetas' => [
        'titulo' => 'Administrar Etiquetas | Matech',
        'restringido' => 2,
    ],
    'agregar_etiqueta' => [
        'titulo' => 'Agregar Etiqueta | Matech',
        'restringido' => 2,
    ],
    'editar_etiqueta' => [
        'titulo' => 'Editar Etiqueta | Matech',
        'restringido' => 2,
    ],
    'borrar_etiqueta' => [
        'titulo' => 'Borrar Etiqueta | Matech',
        'restringido' => 2,
    ],

    //usuarios (opcional)
    'admin_usuarios' => [
        'titulo' => 'Administrar Usuarios | Matech',
        'restringido' => 2,
    ],
    'agregar_usuario' => [
        'titulo' => 'Agregar Usuario | Matech',
        'restringido' => 2,
    ],
    'editar_usuario' => [
        'titulo' => 'Editar Usuario | Matech',
        'restringido' => 2,
    ],
    'borrar_usuario' => [
        'titulo' => 'Borrar Usuario | Matech',
        'restringido' => 2,
    ],

];

//si la key del array no existe entonces mandarlo a 404
if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = '404';
} else {
    $vista = $seccion;

    if ($secciones_validas[$seccion]['restringido']) {
        $nivel = $secciones_validas[$seccion]['restringido'] ?? 0;
        Autenticacion::verificar($nivel);
    }
}

$userData = $_SESSION['loggedIn'] ?? FALSE;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Le paso el titulo desde el index.php -->
    <title> <?php echo $secciones_validas[$vista]['titulo']; ?></title>
    <link rel="icon" type="image/x-icon" href="../elementos-graficos/otros/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
    <header id="header">
        <h1>Matech - Admin | <?php echo $secciones_validas[$vista]['titulo']; ?></h1>
        <!--defino nav con bootstrap-->
        <nav id="barra-nav" class="container navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand mb-2 mt-2" id="logo-matech" href="index.php?seccion=dashboard">Matech</a>
                <button id="boton-navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navegacion-navbar" aria-controls="navegacion-navbar" aria-expanded="false" aria-label="Activar / desactivar navegación">
                    <i id="icono-navbar-toggle" class="bi bi-list"><span>Boton hamburguesa</span></i>
                </button>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navegacion-navbar">
                <ul class="navbar-nav justify-content-start align-items-start justify-content-lg-center align-items-lg-center">

                    <!--Hago esta comparacion para mostrarle lo que se puede administrar solo en caso de ser admin / superadmin
                    Si no esta logeado, o es usuario que no se le muestre nada -->
                    <?PHP if ($userData && ($userData['rol'] === 'admin' || $userData['rol'] === 'superadmin')) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?seccion=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="administrar-desplegable-btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administrar
                            </a>
                            <ul class="dropdown-menu administrar-desplegable" aria-labelledby="administrar-desplegable-btn">
                                <li><a class="dropdown-item" href="index.php?seccion=admin_componentes">Componentes</a></li>
                                <li><a class="dropdown-item" href="index.php?seccion=admin_marcas">Marcas</a></li>
                                <li><a class="dropdown-item" href="index.php?seccion=admin_categorias">Categorías</a></li>
                                <li><a class="dropdown-item" href="index.php?seccion=admin_etiquetas">Etiquetas</a></li>
                                <li><a class="dropdown-item" href="index.php?seccion=admin_usuarios">Usuarios</a></li>
                            </ul>
                        </li>

                        <li class="nav-item fw-bold nav-link text-light rounded me-2 d-flex align-items-center justify-content-center" style="white-space: nowrap;">
                            <a class="text-decoration-none" href="../index.php?seccion=panel_usuario">
                            <i class="align-middle fs-3 me-3 bi bi-person-circle"><span>Icono usuario</span></i>
                            <span class="usuario-nombre"><?= $userData['nombre_completo'] ?? "" ?></span></a>
                        </li>
                    <?php } ?>

                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link" href="index.php?seccion=login"><i class="vertical-middle fs-2 bi bi-box-arrow-in-right"><span>Icono login</span></i></a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="actions/auth_logout.php"><span class="fw-light"><i class="vertical-middle fs-2 bi bi-box-arrow-in-left"><span>Icono logout</span></i></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>

        <?php
        require_once "vistas/$vista.php";
        ?>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>