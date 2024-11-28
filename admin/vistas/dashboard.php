<section class="mb-5 mt-5 text-center" id="panel-dashboard">
    <h2>PANEL DE ADMINISTRACIÓN</h2>
    <p class="pt-4 text-center" id="subtitulo-dashboard">¡Bienvenido/a <?= $nombre_completo = $_SESSION['loggedIn']['nombre_completo']; ?>!</p>

    <h3 class="pt-5">¿Qué deseas administrar?</h3>
    <ul id="lista-dashboard" class="d-flex flex-row list-unstyled justify-content-center align-items-center gap-5 pt-5 pb-5">
        <li><a href="index.php?seccion=admin_componentes"><i class="bi bi-pc"><span>Icono PC</span></i> Componentes</a></li>
        <li><a href="index.php?seccion=admin_marcas"><i class="bi bi-tag-fill"><span>Icono Etiqueta</span></i> Marcas</a></li>
        <li><a href="index.php?seccion=admin_categorias"><i class="bi bi-funnel-fill"><span>Icono Filtro</span></i> Categorías</a></li>
        <li><a href="index.php?seccion=admin_etiquetas"><i class="bi bi-tags-fill"><span>Icono doble etiqueta</span></i> Etiquetas</a></li>
        <li><a href="index.php?seccion=admin_usuarios"><i class="bi bi-person-fill"><span>Icono persona</span></i> Usuarios</a></li>
    </ul>

    <a class="volver" href="../index.php?seccion=home">Volver a la página principal</a>

</section>