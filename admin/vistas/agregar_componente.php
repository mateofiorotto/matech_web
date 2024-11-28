<?php 
$marcas = Marca::listado_de_marcas();
$categorias = Categoria::listado_de_categorias();
$etiquetas = Etiqueta::listado_de_etiquetas();
?>

<section id="agregar-componente">

        <div class="container">
            <h2 class="text-center">Agregar Componente</h2>

             <!-- mandarlo a agregar_componente_acc -->
            <form action="actions/agregar_componente_acc.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                
                <div class="mb-3 col-lg-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <span class="mb-3 d-block">Cargar nombre formateado para títulos u otros. Ej: "Tarjeta Gráfica".</span>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="precio" class="form-label">Precio</label>
                    <span class="mb-3 d-block">Cargar precio con dos decimales. Ej: "699.99".</span>
                    <input step="0.01" min="0" type="number" class="form-control" id="precio" name="precio" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                    <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="marca_id" class="form-label">Marca</label>
                    <select class="form-select" id="marca_id" name="marca_id" required>
                        <option value="" disabled selected>Seleccionar Marca</option>
                        <!-- cargo las marcas -->
                            <?PHP foreach ($marcas as $m) { ?>
                                <option value="<?= $m->getId() ?>"><?= $m->getId() . " - " . $m->getNombre() ?></option>
                            <?PHP } ?>
                    </select>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                        <option value="" disabled selected>Seleccionar Categoría</option>
                        <!-- cargo las categorias -->
                        <?PHP foreach ($categorias as $c) { ?>
                                <option value="<?= $c->getId() ?>"><?= $c->getId() . " - " . $c->getNombre() ?></option>
                            <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
					<label class="form-label d-block">Etiquetas</label>
					<?PHP foreach ($etiquetas as $E) {	?>
                    <!-- etiquetas -->
						<div class="etiquetas-admin form-check form-check-inline">
                            <!-- mando un array en el name y paso las que se hayan seleccionado -->
							<input class="form-check-input mt-2" type="checkbox" name="etiquetas[]" id="etiquetas_<?= $E->getId() ?>" value="<?= $E->getId() ?>" >
							<label class="ms-2 form-check-label mb-2" for="etiquetas_<?= $E->getId() ?>"><?= $E->getNombre() ?></label>
						</div>
					<?PHP } ?>
				</div>

                <div class="mb-3 col-lg-6">
                    <label for="dimensiones" class="form-label">Dimensiones</label>
                    <span class="mb-3 d-block">Cargar en este formato: 31 x 31 x 31 mm</span>
                    <input type="text" class="form-control" id="dimensiones" name="dimensiones" required>
                </div>

                <div class="mb-3 col-lg-6">
                    <label for="imagen" class="form-label">Imagen</label>
                    <span class="mb-3 d-block">Optimizar imagenes antes de subirlas - 400x400. Utilizar ".webp".</span>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                </div>

                </div>
                <button type="submit" class="m-auto d-block mt-5 mb-5 btn btn-primary">Agregar Componente</button>
            </form>
        </div>

</section>