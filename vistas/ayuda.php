<!-- SECCION 5: Formulario de contacto / ayuda -->
<section id="ayuda" class="container">
    <h2 class="text-center">¡Contactate por cualquier problema!</h2>

    <!-- Lo mando a respuesta-form.php -->
    <form action="respuesta-form.php" method="POST">
        <div class="form row justify-content-center align-items-center">
            <!-- Mail -->
            <div class="form-group col-lg-5 col-md-12">
                <label for="correo-form">Correo electrónico</label>
                <input required type="email" name="email" class="form-control" id="correo-form" placeholder="ejemplo@gmail.com">
            </div>

            <!-- Nombre -->
            <div class="form-group col-lg-5 col-md-12">
                <label for="nombre-form">Nombre Completo</label>
                <input required type="text" name="nombre" class="form-control" id="nombre-form" placeholder="Nombre Completo">
            </div>
        </div>

        <div class="form row justify-content-center align-items-center">
            <!-- Celu -->
            <div class="form-group col-lg-5 col-md-12">
                <label for="celular-form">Teléfono</label>
                <input required type="number" name="telefono" class="form-control" id="celular-form" placeholder="+54911...">
            </div>

            <!-- Productos -->
            <div class="form-group col-lg-5 col-md-12">
                <label for="producto-form">Tipo de Producto</label>
                <select name="producto" id="producto-form" class="form-control">
                    <option value="Selecciona">Selecciona...</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria->getNombre(); ?>"><?= $categoria->getNombre(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


        </div>

        <!-- Problema -->
        <div class="form-group row justify-content-center align-items-center">
            <div class="col-lg-10 col-md-12">
                <label for="descripcion-form">Descripción del Problema</label>
                <textarea required name="descripcion" class="form-control" id="descripcion-form" rows="4" placeholder="Describe tu problema... (si compraste, introduce el código de compra)"></textarea>
            </div>
        </div>

        <!-- Enviar -->
        <div class="form-group row justify-content-center align-items-center">
            <div class="col-lg-10 col-md-12">
                <button type="submit" class="btn btn-primary d-block m-auto m-sm-auto m-lg-0">Enviar</button>
            </div>
        </div>
    </form>
</section>