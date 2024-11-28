<?php
//Agrego la comprobación para que id sea entero SIEMPRE, sino si no le paso id en el GET tira error de PHP (y no 404)
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$marca = Marca::marca_por_id($id);

//Si la marca existe, obtengo sus componentes, esto para mostrar sus productos
$listado = !empty($marca) ? Componente::componentes_por_marca($id) : [];
?>

<!-- SECCIÓN 4: Página de detalle -->
<?php if (!empty($marca)) { ?>
<section id="detalle-marca" class="container">
    <div class="row pb-4 pt-4 justify-content-center align-items-center">
        <!-- CARGAMOS los datos de c/u de los productos con los métodos para obtener atributos privados de la clase -->
        <div class="col-lg-4 col-md-12">
            <img class="img-fluid" src="elementos-graficos/marcas/<?php echo $marca->getImagen(); ?>" alt="<?php echo 'Imágen de '. $marca->getNombre(); ?>" class="img-fluid">
        </div>

        <div class="col-lg-7 col-md-12">
            <h2 class="pb-2"><?php echo $marca->getNombre(); ?></h2>
            <p><strong><i class="bi bi-info-circle-fill"><span>Descripción (información)</span> </i></strong><?php echo $marca->getDescripcion(); ?></p>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p class="info-detalle pb-2 pt-2"><strong><i class="bi bi-geo-alt-fill"><span>Pin (ubicación)</span> </i>Origen: </strong><?php echo $marca->getOrigen(); ?></p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p class="info-detalle pb-2 pt-2"><strong><i class="bi bi-calendar-fill"><span>Fecha (calendario)</span> </i>Fundación: </strong><?php echo $marca->getFundacion(); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="productos-items">
        <h3 class="text-center mb-5 mt-5">Componentes de la marca</h3>
       
    <?php if (empty($listado)) : ?>
        <!-- Mensaje cuando no hay productos -->
        <p class="text-center">Esta marca no tiene productos</p>
    <?php else : ?>
        <!-- Lista de productos -->
        <ul class='list-unstyled row justify-content-center align-items-center'>
            <?php foreach ($listado as $componente) : ?>
                <li class='componente-de-la-marca pastilla-item col-xl-4 col-lg-6 col-sm-12 mb-5 item'>
                    <img class='pb-4 img-fluid w-75 m-auto d-block' src='elementos-graficos/productos/<?= $componente->getImagen(); ?>' alt='<?= $componente->getNombre(); ?>' />
                    <h4 class='bold'><?= $componente->getNombre(); ?></h4>
                    <p class='bold precio'><?= $componente->precio_formateado(); ?></p>
                    <p class='descripcion'><?= $componente->descripcion_reducida(); ?></p>
                    <div class="mt-4 row m-auto justify-content-md-center align-items-md-center justify-content-lg-start align-items-lg-start">
                        <a class="ver-detalles col-lg-5 col-md-10 text-center me-3 mb-3" href='index.php?seccion=detalle&id=<?= $componente->getId(); ?>'>Ver detalles</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    </div>
</section>
<?php } else { ?>
    <section id="error-404">
        <div class="container text-center">
            <h2>Error 404</h2>
            <p class="text-center">No se encontró la marca</p>
            <i id="error-404-icono" class="bi bi-emoji-frown"></i>
            <a class="volver" href="index.php?seccion=home">Volver al inicio</a>
        </div>
    </section>
<?php } ?>
