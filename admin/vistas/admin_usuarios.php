<?php
$usuarios = Usuario::listado_de_usuarios();
?>

<section id="administrar-usuarios" class="container d-flex justify-content-center p-5">
    <div class="row my-5">
        <div class="col">
            <h2 class="text-center mb-5">Administrar Usuarios</h2>

            <div>
                <?= Alerta::obtener_alertas(); ?>
            </div>

            <div class="mb-5 text-center">
                <a href="index.php?seccion=agregar_usuario" class="btn btn-success mt-3 mb-3 bold">Cargar Nuevo Usuario</a>
                <p class="bold fs-6 text-center mt-5 mb-5">* La contraseña no se muestra en el CRUD por seguridad (por más que este hasheada), solo se puede introducir al generar un usuario.</p>
            </div>

            <div class="row mb-5 d-flex align-items-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Nombre Usuario</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Rol</th>
                            <th class="th-acc"><i class="bi bi-hammer"><span>Acciones</span></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u) { ?>
                            <tr>
                                <td><?= $u->getId() ?></td>
                                <td><?= $u->getEmail() ?></td>
                                <td><?= $u->getNombre_completo() ?></td>
                                <td><?= $u->getNombre_usuario() ?></td>
                                <td><?= $u->getTelefono() ?></td>
                                <td><?= $u->getDireccion() ?></td>
                                <td><?= $u->getRol() ?></td>
                                <td>
                                    <a href="index.php?seccion=editar_usuario&id=<?= $u->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-primary mb-1"><i class="bi bi-pen-fill"><span>Editar</span></i></a>
                                    <a href="index.php?seccion=borrar_usuario&id=<?= $u->getId() ?>" role="button" class="text-light d-block btn btn-sm btn-danger"><i class="bi bi-trash-fill"><span>Borrar</span></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
