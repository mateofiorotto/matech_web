<?php
$componentes = Componente::listado_de_productos();
?>

<section id="administrar-componentes" class="container d-flex justify-content-center p-5">
    <div class="row my-5">
        <div class="col">
            <h2 class="text-center mb-5">Administrar Componentes</h2>

            <div>
                <?= Alerta::obtener_alertas(); ?>
            </div>

            <div class="mb-5 text-center">
                <!-- boton para ir a la vista agregar_componente y cargar un nuevo comp en la bd -->
                <a href="index.php?seccion=agregar_componente" class="btn btn-success mt-3 mb-3 bold">Cargar Nuevo Producto</a>
            </div>

            <div class="row mb-5 d-flex align-items-center">
                <table class="table">
                    <thead>
                        <!-- cols -->
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imágen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th class="th-desc" scope="col">Descripción</th>
                            <th scope="col">Fecha de Lanzamiento</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Dimensiones</th>
                            <th scope="col">Etiquetas</th>
                            <th><i class="bi bi-hammer"><span>Acciones</span></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($componentes as $c) { ?>
                            <tr>
                                <!-- info de c/u de los prod cargados -->
                                <td><?= $c->getId() ?></td>
                                <td><img src="../elementos-graficos/productos/<?= $c->getImagen() ?>" alt="<?= $c->getNombre() ?>" width="100"></td>
                                <td><?= $c->getNombre() ?></td>
                                <td><?= $c->getPrecio() ?></td>
                                <td class="td-desc"><?= $c->getDescripcion() ?></td>
                                <td><?= $c->getFechaLanzamiento() ?></td>
                                <td><?= $c->getMarca()->getNombre() ?></td>
                                <td><?= $c->getCategoria()->getNombre() ?></td>
                                <td><?= $c->getDimension() ?></td>
                                <td>
                                    <!-- cargo las etiquetas -->
                                    <?PHP
                                    foreach ($c->getEtiquetas() as $e) {
                                        echo $e->getNombre() . ", ";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!-- botones para ir a la vista editar y borrar -->
                                    <a href="index.php?seccion=editar_componente&id=<?= $c->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-primary mb-1"><i class="bi bi-pen-fill"><span>Editar</span></i></a>
                                    <a href="index.php?seccion=borrar_componente&id=<?= $c->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-danger"><i class="bi bi-trash-fill"><span>Borrar</span></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>