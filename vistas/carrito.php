<?php 
//obtener carrito
$items = Carrito::get_carrito(); 
?>

<section id="carrito" class="container justify-content-center">
    <form action="admin/actions/actualizar_cantidades_acc.php" method="POST">
        <div class="pt-5 pb-5">
            <div class="mb-2 d-lg-flex d-block justify-content-between align-items-center col-9 carrito-header">
                <h2 class="me-auto">Carrito</h2>

                <div class="d-flex mb-4 mt-4">
                    <!-- este submit manda a actualizar cantidades -->
                    
                        <button type="submit" class="btn bold me-2 ms-2 recargar-cantidades">
                            <i class="bi bi-arrow-clockwise me-2 d-block d-lg-inline-block"><span>Icono recargar</span></i>Actualizar
                        </button>

                    <!-- llamo al acc de vaciar -->
                    <a class="btn bold me-2 ms-2 vaciar-carrito d-inline-block" href="admin/actions/vaciar_carrito_acc.php"><i class="bi bi-trash-fill me-2 d-block d-lg-inline-block"><span>Icono basura</span></i>Vaciar Carrito</a>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <?php
                    
                    if (empty($items)) {
                    ?>
                        <p class="mt-5">No hay productos en el carrito.</p>
                        <div class="mb-5 mt-3">
                            <a class="fs-4 agrega-aca" href="index.php?seccion=productos">Empezá a agregar acá</a>
                        </div>
                        <?php
                    } else {
                        echo "<ul class='list-unstyled'>";
                        //mando la key $id y el valor $item
                        foreach ($items as $id => $item) {
                        ?>
                            
                                <li>
                                    <div class="row mb-4 border-bottom producto-en-carrito pb-3">
                                        <div class="col-md-3 col-lg-3">
                                            <img class="img-carrito w-100 img-fluid" src="elementos-graficos/productos/<?= $item['imagen'] ?>" alt="Imagen del producto">
                                        </div>
                                        <div class="col-md-6 col-lg-6">

                                            <h3 class="nombre-producto"><?= $item['nombre'] ?></h3>
                                            <p class="precio bold">$<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") . " - <span class='fs-6'>" . $item['precio'] . " c/u</span>" ?></p>
                                            
                                                <div class="col-12 d-flex align-items-center">
                                                    <label for="q_<?= $id ?>" class="fw-bold pe-3 cantidad">Cantidad:</label>
                                                    <input type="number" class="p-2 m-3 form-control cantidad-input"
                                                    id="q_<?= $id ?>" value="<?= $item['cantidad'] ?>" name="q[<?= $id ?>]">
                                                </div>
                                    
                                            <!-- llamo a borrar item individual -->
                                            <a class="btn bold borrar-del-carrito" href="admin/actions/borrar_item_acc.php?id=<?= $id ?>"><i class="bi bi-trash-fill"><span>Icono basura</span></i></a>

                                        </div>
                                    </div>
                                </li>
                           
                    <?php
                        }
                        echo  "</ul>";
                    } ?>
                </div>
                <div class="col-lg-3 total-container">
                    <h3 class="mb-3">Total</h3>
                    <p class="precio bold">$<?= number_format(Carrito::precio_total(), 2, ",", "."); ?></p>
                    
                    <?php 
                         if (empty($items)) { 
                            //si no hay items, bloquear boton para proceder al checkout, igual esta validado desde back?>
                            <a href="#" class="btn btn-primary w-100 bold p-3 boton-deshabilitado"><i class="me-2 bi bi-cart-fill"><span>Icono carrito</span></i>PROCEDER AL PAGO</a>
                         <?php } else { 
                            //si hay items "habilitar" boton?>
                            <a href="index.php?seccion=checkout" class="proceder-al-pago btn btn-primary w-100 bold p-3"><i class="me-2 bi bi-cart-fill"><span>Icono carrito</span></i>PROCEDER AL PAGO</a>
                         <?php } ?>

                </div>
            </div>
        </div>
    </form>
</section>