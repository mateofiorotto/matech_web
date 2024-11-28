<?php 
//cargo el id del usuario y llamo al metodo del historial para mostrar las compras realizadas
$idUsuario = $_SESSION['loggedIn']['id'];
$historial = Compra::historial_compras($idUsuario);
?>
<section id="panel-usuario">
    <div class="container pt-5 pb-5">
        <h2 class="text-center">Perfil</h2>
        <p class="text-center mt-4">¡Bienvenido/a <?= $_SESSION['loggedIn']['nombre_completo']; ?>!</p>

        <div>
            <?= Alerta::obtener_alertas(); ?>
        </div>

        <h3 class="pt-5 pb-5 text-center">Historial de compras</h3>
    
        <?php if (empty($historial)) { 
            // si no hay compras entonces mostrar: ?> 
            <p class="text-center">No hay compras realizadas.</p>
            <div class="mb-5 mt-4 text-center">
                <a class="fs-4 agrega-aca" href="index.php?seccion=productos">Empezá a comprar acá</a>
            </div>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="azul-osc-borde table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Importe</th>
                            <th scope="col">Productos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historial as $compra) { ?>
                            <tr>
                            <td><span class="m-2"><?= $compra['id'] ?></span></td>
                                <td><?= $compra['fecha'] ?></td>
                                <td><?= $compra['importe'] ?></td>
                                <td><?= $compra['detalle'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</section>
