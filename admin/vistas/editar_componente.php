<?php 
$id = $_GET['id'] ?? FALSE;
$componente = Componente::producto_por_id($id);
$etiquetas_seleccionadas = $componente->getEtiquetas_ids();
$marcas = Marca::listado_de_marcas();
$categorias = Categoria::listado_de_categorias();
$etiquetas = Etiqueta::listado_de_etiquetas();

?>

<section id="editar-componente">

        <div class="container">
            <h2 class="text-center">Editar Componente</h2>

            <form action="actions/editar_componente_acc.php?id=<?= $componente->getId() ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                
                <div class="mb-3 col-lg-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <span class="mb-3 d-block">Cargar nombre formateado para títulos u otros. Ej: "Tarjeta Gráfica".</span>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$componente->getNombre() ?>" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="precio" class="form-label">Precio</label>
                    <span class="mb-3 d-block">Cargar precio con dos decimales. Ej: "699.99".</span>
                    <input step="0.01" min="0" type="number" class="form-control" id="precio" name="precio" value="<?=$componente->getPrecio() ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= $componente->getDescripcion() ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                    <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" value="<?=$componente->getFechaLanzamiento() ?>" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="marca_id" class="form-label">Marca</label>
                    <select class="form-select" id="marca_id" name="marca_id">
                        <!--precargo el selector de marcas al editar-->
                        <?PHP foreach ($marcas as $m) { ?>
                            <option
                             value="<?= $m->getId() ?>" <?= $m->getId() == $componente->getMarca()->getId()  ? "selected" : "" ?>><?= $m->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select class="form-select" id="categoria_id" name="categoria_id">
                        <!--precargo el selector de categorias al editar-->
                    <?PHP foreach ($categorias as $c) { ?>
                            <option value="<?= $c->getId() ?>" <?= $c->getId() == $componente->getCategoria()->getId()  ? "selected" : "" ?>><?= $c->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                <?PHP                    
                    foreach ($etiquetas as $E) {
                    ?>
                        <div class="etiquetas-admin form-check form-check-inline">
                            <input class="form-check-input mt-2" type="checkbox" name="etiquetas[]" id="etiquetas_<?= $E->getId() ?>" value="<?= $E->getId() ?>"                             
                            <?= in_array($E->getId(), $etiquetas_seleccionadas) ? "checked" : "" ?>>
                            <label class="ms-2 form-check-label" for="etiquetas_<?= $E->getId() ?>"><?= $E->getNombre() ?></label>
                        </div>
                <?PHP } ?>
                </div>

                <div class="mb-3 col-lg-12">
                    <label for="dimensiones" class="form-label">Dimensiones</label>
                    <span class="mb-3 d-block">Cargar en este formato: 31 x 31 x 31 mm</span>
                    <input type="text" class="form-control" id="dimensiones" name="dimensiones" value="<?=$componente->getDimension() ?>" required>
                </div>

                <div class="mb-3 col-lg-12">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <span class="mb-3 d-block">Optimizar imagenes antes de subirlas - 400x400. Utilizar ".webp".</span>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                </div>

                <div class="mb-3 col-lg-12">
                    <p class="mt-3">Imagen actual:</p>
                    <img class="img-fluid w-25" src="../elementos-graficos/productos/<?= $componente->getImagen() ?>"
                    alt="Componente: <?= $componente->getNombre() ?>">
                    <input type="hidden" class="form-control" id="imagen_og" name="imagen_og" value="<?= $componente->getImagen() ?>">
                </div>

                </div>
                <button type="submit" class="m-auto d-block mt-5 mb-5 btn btn-primary">Editar Componente</button>
            </form>
        </div>

</section>