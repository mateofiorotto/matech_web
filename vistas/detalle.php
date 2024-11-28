<?php

//agrego la comprobacion para que id sea entero SIEMPRE, sino si no le paso id en el get tira error de php (y no 404)
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$componente = Componente::producto_por_id($id);
//obtengo la etiqueta desde la clase compleja

?>


<!-- SECCION 4: Pagina de detalle -->
<?php if (!empty($componente)) {
    $etiquetas = $componente->getEtiquetas();
?>
    <section id="detalle-producto" class="container">
        <div class="row pb-4 pt-4 justify-content-center align-items-center">
            <!--CARGAMOS los datos de c/u de los productos con los metodos para obtener atributos privados de la clase-->
            <div class="col-lg-4 col-md-12">
                <img class="img-fluid" src="elementos-graficos/productos/<?php echo $componente->getImagen(); ?>" alt="<?php echo $componente->getNombre(); ?>" class="img-fluid">
            </div>

            <div class="col-lg-7 col-md-12">
                <h2><?php echo $componente->getNombre(); ?></h2>
                <p class="precio bold pt-2"><?php echo $componente->precio_formateado(); ?></p>
                <p><strong><i class="bi bi-info-circle-fill"><span>Descripción (información)</span> </i></strong><?php echo $componente->getDescripcion(); ?></p>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p class="pt-2 pb-2 info-detalle"><strong><i class="bi bi-aspect-ratio-fill"><span>Dimensiones (medidas)</span> </i>Dimensión: </strong><?php echo $componente->getDimension(); ?></p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p class="pt-2 pb-2 info-detalle"><strong><i class="bi bi-tag-fill me-2"><span>Marca (etiqueta)</span> </i>Marca: </strong><?php echo $componente->getMarca()->getNombre(); ?></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p class="pt-2 pb-2 info-detalle"><strong><i class="bi bi-funnel-fill me-2"><span>Filtro</span> </i>Categoria: </strong><?php echo $componente->getCategoria()->getNombre(); ?></p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p class="pt-2 pb-2 info-detalle"><strong><i class="bi bi-calendar-fill me-2"><span>Fecha (calendario)</span> </i>Lanzamiento: </strong><?php echo $componente->getFechaLanzamiento(); ?></p>
                        </div>
                    </div>

                    <?php if (!empty($etiquetas)) { ?>
                        <div class="pb-2 pt-2 mt-2">
                            <p><strong><i class="bi bi-tags-fill me-2"><span>Etiquetas:</span> </i></strong>
                                <?php
                                //cuento el total de etiquetas
                                $totalEtiquetas = count($etiquetas);
                                $contador = 1;

                                //x cada etiqueta sumo una coma, la ultima se representa con un .
                                foreach ($etiquetas as $etiqueta) {
                                    echo $etiqueta->getNombre();
                                    echo ($contador < $totalEtiquetas) ? ", " : ".";
                                    $contador++;
                                }
                                ?>
                            </p>
                        </div>
                    <?php } ?>

                    <div class="mt-3 row m-auto">
                            <!-- mandar al acc de agregar-->
                        <form action="admin/actions/agregar_item_acc.php" method="GET" class="row">
                            <div class="col-lg-6 col-md-12 d-flex align-items-center">
                                <label for="q" class="fw-bold pe-3 cantidad">Cantidad:</label>
                                <input type="number" class="p-3 form-control cantidad-input" value="1" name="q" id="q">
                            </div>
                            <div class="col-lg-6 col-md-12 pt-3 pt-lg-0">
                                <input type="submit" value="AGREGAR A CARRITO" class="btn agregar-carrito w-100 fw-bold">
                                <!--meto la id-->
                                <input type="hidden" value="<?= $id ?>" name="id" id="id">
                            </div>
                        </form>
                        
                    </div>
                <?php } else { ?>
                    <section id="error-404">
                        <div class="container text-center">
                            <h2>Error 404</h2>
                            <p class="text-center">No se encontro el producto</p>
                            <i id="error-404-icono" class="bi bi-emoji-frown"></i>
                            <a class="volver" href="index.php?seccion=home">Volver al inicio</a>
                        </div>
                    </section>
                <?php } ?>
                </div>
            </div>
    </section>