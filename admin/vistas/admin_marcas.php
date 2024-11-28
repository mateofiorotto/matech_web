<?php
$marcas = Marca::listado_de_marcas();
?>

<section id="administrar-marcas" class="container d-flex justify-content-center p-5">
    <div class="row my-5">
        <div class="col">
            <h2 class="text-center mb-5">Administrar Marcas</h2>

            <div>
                <?= Alerta::obtener_alertas(); ?>
            </div>

            <div class="mb-5 text-center">
                <a href="index.php?seccion=agregar_marca" class="btn btn-success mt-3 mb-3 bold">Cargar Nueva Marca</a>
            </div>

            <div class="row mb-5 d-flex align-items-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imágen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nombre Url</th>
                            <th class="th-desc" scope="col">Descripción</th>
                            <th scope="col">Fundación</th>
                            <th scope="col">Origen</th>
                            <th class="th-acc"><i class="bi bi-hammer"><span>Acciones</span></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($marcas as $m) { ?>
                            <tr>
                                <td><?= $m->getId() ?></td>
                                <td><img src="../elementos-graficos/marcas/<?= $m->getImagen() ?>" alt="<?= $m->getNombre() ?>" width="100"></td>
                                <td><?= $m->getNombre() ?></td>
                                <td><?= $m->getNombre_url() ?></td>
                                <td><?= $m->getDescripcion() ?></td>
                                <td><?= $m->getFundacion() ?></td>
                                <td><?= $m->getOrigen() ?></td>
                                <td>
                                    <a href="index.php?seccion=editar_marca&id=<?= $m->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-primary mb-1"><i class="bi bi-pen-fill"><span>Editar</span></i></a>
                                    <a href="index.php?seccion=borrar_marca&id=<?= $m->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-danger"><i class="bi bi-trash-fill"><span>Borrar</span></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
