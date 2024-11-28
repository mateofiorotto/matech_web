<?php 
$id = $_GET['id'] ?? FALSE;
$etiqueta = Etiqueta::etiqueta_por_id($id)

?>

<section id="editar-etiqueta">

    <div class="container">
        <h2 class="text-center">Editar Etiqueta</h2>

        <form action="actions/editar_etiqueta_acc.php?id=<?= $etiqueta->getId() ?>" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="mb-3 col-12">
                    <label for="nombre" class="form-label">Nombre</label>
                    <span class="mb-3 d-block">Cargar nombre formateado para títulos u otros. Ej: "Gama alta".</span>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $etiqueta->getNombre() ?>" required>
                </div>
 
                <div class="mb-3 col-12">
                    <label for="nombre_url" class="form-label">Nombre para URL</label>
                    <span class="mb-3 d-block">Cargar nombre en minuscula y los espacios con "_". EJ: "gama_alta".</span>
                    <input type="text" class="form-control" id="nombre_url" name="nombre_url" value="<?= $etiqueta->getNombre_url() ?>" required>
                </div>

            </div>
            <button type="submit" class="m-auto d-block mt-5 mb-5 btn btn-primary">Editar Etiqueta</button>
        </form>
    </div>

</section>