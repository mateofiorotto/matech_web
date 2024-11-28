<?php 
$id = $_GET['id'] ?? FALSE;
$usuario = Usuario::usuario_por_id($id)

?>

<section id="editar-usuario">

    <div class="container">
        <h2 class="text-center">Editar Usuario</h2>

        <form action="actions/editar_usuario_acc.php?id=<?= $usuario->getId() ?>" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="mb-3 col-lg-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $usuario->getEmail() ?>" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="nombre_usuario" class="form-label">Nombre Usuario</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?= $usuario->getNombre_usuario() ?>" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="nombre_completo" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="<?= $usuario->getNombre_completo() ?>" required>
                </div>

                <!-- 
                Es un ejemplo de como seria para editar la contraseña, sin embargo no debemos ni queremos editarla
                
                <div class="mb-3 col-lg-6">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" value="//$usuario->getContrasena() required>
                </div>
                -->

                <div class="mb-3 col-lg-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" value="<?= $usuario->getTelefono() ?>" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $usuario->getDireccion() ?>" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" id="rol" name="rol">
                <!-- precargo el campo -->
                    <option value="superadmin" <?= $usuario->getRol() === 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                    <option value="admin" <?= $usuario->getRol() === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="usuario" <?= $usuario->getRol() === 'usuario' ? 'selected' : '' ?>>Usuario</option>
                    </select>
                </div>

            </div>
            <button type="submit" class="m-auto d-block mt-5 mb-5 btn btn-primary">Editar Usuario</button>
        </form>
    </div>

</section>
