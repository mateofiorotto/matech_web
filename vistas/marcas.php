<?php
$listado = Marca::listado_de_marcas();
$contador = 0;
?>

<!-- SECCION 2: Totalidad de productos-->
<section class="container" id="marcas">
    <h2 class="text-center">Nuestras marcas</h2>
    <p class="pb-3 text-center subtitulo">¡Trabajamos con lo mejor que hay!</p>
    <div class="productos-items">
        <ul class='list-unstyled row justify-content-center align-items-center'>
            <?php
            foreach ($listado as $marca) {
            ?>
                <!--muestro los productos en el ul-->
                <li class='pastilla-item col-xl-4 col-lg-6 col-sm-12 mb-5 item'>
                    <img class='pb-4 img-fluid w-75 m-auto d-block' src='elementos-graficos/marcas/<?= $marca->getImagen(); ?>' alt='<?=  ": " . $marca->getNombre(); ?>' />
                    <h3 class='bold'><?= $marca->getNombre(); ?></h3>
                    <p class='descripcion'><?= $marca->descripcion_reducida(); ?></p>
                    <div class="mt-4 row m-auto justify-content-md-center align-items-md-center justify-content-lg-start align-items-lg-start">
                        <a class="ver-detalles col-lg-5 col-md-10 text-center me-3 mb-3" href='index.php?seccion=marca_detalle&id=<?= $marca->getId(); ?>'>Ver detalles</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>
