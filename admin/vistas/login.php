<section class="container">
    <div class="row my-5 justify-content-center">

        <h2 class="text-center mb-5 fw-bold">Iniciar Sesión (admin)</h2>

        <div class="col-lg-7 justify-content-center text-align-center">
            <p><?= Alerta::obtener_alertas(); ?></p>
        </div>

        <div class="col-lg-6">
            <form class="row g-3" action="actions/auth_login.php" method="POST">
                <div class="col-12 mb-3">
                    <label for="usuario" class="pb-2 form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario">
                </div>

                <div class="col-12 mb-3">
                    <label for="contrasena" class="pb-2 form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                </div>

                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</section>