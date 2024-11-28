<section id="agregar-usuario">

    <div class="container">
        <h2 class="text-center">Agregar Usuario</h2>

        <form action="actions/agregar_usuario_acc.php" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="mb-3 col-lg-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="nombre_usuario" class="form-label">Nombre Usuario</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="nombre_completo" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>

                <div class="mb-3 col-lg-12">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" id="rol" name="rol" required>
                        <option value="" disabled selected>Seleccione un rol</option>
                        <option value="superadmin">Superadmin</option>
                        <option value="admin">Admin</option>
                        <option value="usuario">Usuario</option>
                    </select>
                </div>

            </div>
            <button type="submit" class="m-auto d-block mt-5 mb-5 btn btn-primary">Agregar Usuario</button>
        </form>
    </div>

</section>
