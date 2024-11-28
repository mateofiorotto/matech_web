<?php 
$id = $_GET['id'] ?? FALSE;
$marca = Marca::marca_por_id($id)

?>

<section id="editar-marca">

    <div class="container">
        <h2 class="text-center">Editar Marca</h2>

        <form action="actions/editar_marca_acc.php?id=<?= $marca->getId() ?>" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="mb-3 col-lg-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <span class="mb-3 d-block">Cargar nombre formateado para títulos u otros. Ej: "Western Digital".</span>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $marca->getNombre() ?>" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="nombre_url" class="form-label">Nombre para URL</label>
                    <span class="mb-3 d-block">Cargar nombre en minuscula y los espacios con "_". EJ: "western_digital".</span>
                    <input type="text" class="form-control" id="nombre_url" name="nombre_url" value="<?= $marca->getNombre_url() ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required> <?= $marca->getDescripcion() ?></textarea>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="fundacion" class="form-label">Año de Fundación</label>
                    <span class="mb-3 d-block">Cargar con el siguiente formato: 1997 (4 digitos).</span>
                    <input type="number" class="form-control" id="fundacion" name="fundacion" value="<?= $marca->getFundacion() ?>"  required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="origen" class="form-label">Origen</label>
                    <span class="mb-3 d-block">Nombre del país.</span>
                    <input type="text" class="form-control" id="origen" name="origen" value="<?=$marca->getOrigen() ?>" required>
                </div>

                <div class="mb-3 col-lg-12">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <span class="mb-3 d-block">Optimizar imagenes antes de subirlas - 400x400. Utilizar ".webp".</span>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                </div>

                <div class="mb-3 col-lg-12">
                    <p class="mt-3">Imagen actual:</p>
                    <img class="img-fluid w-25" src="../elementos-graficos/marcas/<?= $marca->getImagen() ?>"
                    alt="Marca: <?= $marca->getNombre() ?>">
                    <input type="hidden" class="form-control" id="imagen_og" name="imagen_og" value="<?= $marca->getImagen() ?>">
                </div>

            </div>
            <button type="submit" class="m-auto d-block mt-5 mb-5 btn btn-primary">Editar Marca</button>
        </form>
    </div>

</section>
