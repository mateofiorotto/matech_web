<?php
$categorias = Categoria::listado_de_categorias();
?>

<section id="administrar-categorias" class="container d-flex justify-content-center p-5">
    <div class="row my-5">
        <div class="col">
            <h2 class="text-center mb-5">Administrar Categorias</h2>

            <div>
                <?= Alerta::obtener_alertas(); ?>
            </div>

            <div class="mb-5 text-center">
                <!--ir al form de agregar_categoria.php-->
                <a href="index.php?seccion=agregar_categoria" class="btn btn-success mt-3 mb-3 bold">Cargar Nueva Categoria</a>
            </div>

            <div class="row mb-5 d-flex align-items-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nombre Url</th>
                            <th class="th-acc"><i class="bi bi-hammer"><span>Acciones</span></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorias as $c) { ?>
                            <tr>
                                <td><?= $c->getId() ?></td>
                                <td><?= $c->getNombre() ?></td>
                                <td><?= $c->getNombre_url() ?></td>
                                <td>
                                    <a href="index.php?seccion=editar_categoria&id=<?= $c->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-primary mb-1"><i class="bi bi-pen-fill"><span>Editar</span></i></a>
                                    <a href="index.php?seccion=borrar_categoria&id=<?= $c->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-danger"><i class="bi bi-trash-fill"><span>Borrar</span></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
