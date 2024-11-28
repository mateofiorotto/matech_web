<?php
//obtener carrito
$items = Carrito::get_carrito();
?>

<section id="checkout">
    <div class="container pt-5 pb-5">
        <h2 class="mb-5">Resumen de compra</h2>
        <div class="row">
            <div class="col-lg-9">
                <?php
                $items = Carrito::get_carrito();

                if (empty($items)) {
                ?>
                    <p>No hay productos en el checkout.</p>
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
                            <div class="col-md-3">
                                <img class="img-carrito w-100 img-fluid" src="elementos-graficos/productos/<?= $item['imagen'] ?>" alt="Imagen del producto">
                            </div>
                            <div class="col-md-6">
                                <h3 class="nombre-producto"><?= $item['nombre'] ?></h3>
                                <p class="precio bold">$<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") . " - <span class='fs-6'>" . $item['precio'] . " c/u</span>" ?></p>
                                <p><span class="bold azul-osc">Cantidad:</span> <?= $item['cantidad']?></p>
                            </div>
                        </div>
                        </li>
                <?php
                    }
                    echo "</ul>";
                } ?>
            </div>
        </div>

        <div class="col-lg-3 total-container mt-4 d-flex flex-column justify-content-center align-items-center justify-content-lg-start align-items-lg-start">
            <h3 class="mb-3 bold">Total</h3>
            <p class="fs-3 precio bold">$<?= number_format(Carrito::precio_total(), 2, ",", "."); ?></p>
            <!-- mandar al checkout -->
            <a href="admin/actions/checkout_acc.php" class="mt-3 btn btn-primary w-50 bold p-2"><i class="me-2 bi bi-cart-fill"><span>Icono carrito</span></i>COMPRAR</a>
        </div>
</section>