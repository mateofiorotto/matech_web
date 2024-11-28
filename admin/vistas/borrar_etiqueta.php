<?PHP
$id = $_GET['id'] ?? FALSE;
$etiqueta = Etiqueta::etiqueta_por_id($id);
?>

<section id="borrar-etiqueta" class="container mb-5 mt-5">
	<h2 class="text-center mb-5 bold">¿Deseas borrar esta etiqueta?</h2>
	<div class="row justify-content-center align-items-center mb-5 mt-5 pt-1 pb-1">
		<div class="col-lg-6 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Nombre</h3>
			<p class="text-center"><?= $etiqueta->getNombre() ?></p>
		</div>
		<div class="col-lg-6 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Nombre URL</h3>
			<p class="text-center"><?= $etiqueta->getnombre_url() ?></p>
		</div>
		<a href="actions/borrar_etiqueta_acc.php?id=<?= $etiqueta->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4 w-25 m-auto">Eliminar</a>
	</div>
</section>