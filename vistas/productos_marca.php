<?php
//cargo la marca (marca_url)
$marcaSeleccionada  = isset($_GET['marca']) ? $_GET['marca'] : false;
$listado = Componente::listado_por_marca($marcaSeleccionada);

?>

<!-- SECCION 3 (filtro tres): filtro x marca -->
<?php if (!empty($listado)){ ?>
<section class="container" id="productos-por-marca">
<h2 class="text-center">Nuestros productos</h2>
    <p class="pb-3 text-center subtitulo">¡Lo último del mercado para vos!</p>
    
    <div class="mb-5 row justify-content-center align-items-center">
            <div class="col-lg-2">
                <div class="text-center">
                    <button type="button" class="btn-filtros mb-5 mb-lg-0" data-bs-toggle="modal" data-bs-target="#filtroModal">
                        <i class="bi bi-funnel me-2"><span>Filtrar</span></i> Filtrar
                    </button>
                </div>

                <div class="modal fade" id="filtroModal" aria-labelledby="filtroModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between align-items-center">
                                <h3 class="modal-title bold" id="filtroModalLabel">Filtrar Productos</h3>
                                <button class="btn-cerrar" type="button" data-bs-dismiss="modal" aria-label="Cerrar">
                                    <i class="bi bi-x-square-fill"><span>Cerrar (cruz)</span></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <h4>Categorías</h4>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><a href="index.php?seccion=productos" class="dropdown-item sin-filtro">Sin Filtro</a></li>
                                                <?php foreach ($categorias as $categoria): ?>
                                                    <li class="mb-2"><a href="index.php?seccion=productos_categoria&categoria=<?= $categoria->getNombre_url() ?>" class="dropdown-item"><?= $categoria->getNombre() ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <h4>Marcas</h4>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><a href="index.php?seccion=productos" class="dropdown-item sin-filtro">Sin Filtro</a></li>
                                                <?php foreach ($marcas as $marca): ?>
                                                    <li class="mb-2"><a href="index.php?seccion=productos_marca&marca=<?= $marca->getNombre_url() ?>" class="dropdown-item"><?= $marca->getNombre() ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="col-lg-4 col-md-12 mb-3">
                                        <h4>Precios</h4>
                                        <form method="POST" action="index.php?seccion=productos">
                                            <button type="submit" class="btn-orden fs-6 btn btn-secondary d-block w-100 mt-3" name="orden" value="asc">Ascendente<i class="bi bi-arrow-up fs-5 ms-2"><span>Icono flecha para arriba</span></i></button>
                                            <button type="submit" class="btn-orden fs-6 btn btn-secondary d-block w-100 mt-3 mb-4" name="orden" value="desc">Descendente<i class="bi bi-arrow-down fs-5 ms-2"><span>Icono flecha para abajo</span></i></button>
                                        </form>

                                        <form method="POST" action="index.php?seccion=productos">
                                            <div class="input-group mb-3">
                                                <input type="number" name="precio_min" class="input-min ms-2 form-control" placeholder="Minimo">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="number" name="precio_max" class="input-max ms-2 form-control" placeholder="Maximo">
                                            </div>
                                            <button class="btn btn-primary d-block w-100 mt-4" type="submit">Filtrar</button>
                                        </form>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10">
                <form class="d-flex col-lg-6" role="search" action="index.php?seccion=productos" method="POST">
                    <input class="form-control me-2" type="search" name="busqueda" placeholder="Buscar..." aria-label="Buscar">
                    <button id="boton-buscador" type="submit"><i class="bi bi-search ms-2"><span>Buscar</span></i></button>
                </form>
            </div>
        </div>

    <div class="productos-items">
        <ul class='list-unstyled row justify-content-center align-items-center'>
            <?php
            foreach ($listado as $componente) {
            ?>
                <!--muestro los productos en el ul-->
                <li class='pastilla-item col-xl-4 col-lg-6 col-sm-12 mb-5 item'>
                    <img class='pb-4 img-fluid w-75 m-auto d-block' src='elementos-graficos/productos/<?= $componente->getImagen(); ?>' alt='<?=$componente->getNombre(); ?>' />

                    <h3 class='bold'><?= $componente->getNombre(); ?></h3>
                    <p class='bold precio'><?= $componente->precio_formateado(); ?></p>
                    <p class='descripcion'><?= $componente->descripcion_reducida(); ?></p>
                    <div class="mt-4 row m-auto justify-content-md-center align-items-md-center justify-content-lg-start align-items-lg-start">
                        <a class="ver-detalles col-lg-5 col-md-10 text-center me-3 mb-3" href='index.php?seccion=detalle&id=<?= $componente->getId(); ?>'>Ver detalles</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>
<?php  } else { ?>
    <section id="error-404">
    <div class="container text-center">
        <h2>Error 404</h2>
        <p class="text-center">No se encontro la marca/productos de esa marca</p>
        <i id="error-404-icono" class="bi bi-emoji-frown mb-5 mt-5"></i>
        <a class="volver" href="index.php?seccion=home">Volver al inicio</a>
    </div>
    </section>
<?php } 