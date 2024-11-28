<?PHP
//obtengo la id y la marca
$id = $_GET['id'] ?? FALSE;
$marca = Marca::marca_por_id($id);
?>

<section id="borrar-marca" class="container mb-5 mt-5">
	<h2 class="text-center mb-5 bold">¿Deseas borrar esta marca?</h2>
	<div class="row">


		<div class="col-12 col-md-6">
			<img src="../elementos-graficos/marcas/<?= $marca->getImagen() ?>" alt="Imágen de <?= $marca->getNombre() ?>" class="d-block m-auto img-fluid mb-3">
			<a href="actions/borrar_marca_acc.php?id=<?= $marca->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4 w-50 m-auto">Eliminar</a>
		</div>

		<div class="col-12 col-md-6 mb-4 ms-5 ms-lg-0">
			<div class="row mt-5 mb-lg-4 mb-0 mt-lg-0">
				<div class="col-lg-6 col-md-12">
					<h3>Nombre</h3>
					<p><?= $marca->getNombre() ?></p>
				</div>
				<div class="col-lg-6 col-md-12">
					<h3>Nombre URL</h3>
					<p><?= $marca->getnombre_url() ?></p>
				</div>
			</div>

			<div class="row mb-lg-4 mb-0">
				<div class="col-lg-6 col-md-12">
					<h3>Fundacion</h3>
					<p><?= $marca->getFundacion() ?></p>
				</div>
				<div class="col-lg-6 col-md-12">
					<h3>Origen</h3>
					<p><?= $marca->getOrigen() ?></p>
				</div>
			</div>
			
			<h3>Descripcion</h3>
			<p><?= $marca->getDescripcion() ?></p>

		</div>

	</div>


</section>