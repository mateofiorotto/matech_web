<?PHP
$id = $_GET['id'] ?? FALSE;
$categoria = Categoria::categoria_por_id($id);
?>

<section id="borrar-categoria" class="container mb-5 mt-5">
	<h2 class="text-center mb-5 bold">¿Deseas borrar esta categoria?</h2>
	<div class="row justify-content-center align-items-center mb-5 mt-5 pt-1 pb-1">


		<div class="col-12 col-md-6">
			<div class="row mt-5 mb-lg-4 mb-0 mt-lg-0">
				<div class="col-lg-6 col-md-12 mt-5 mb-5">
					<h3 class="text-center">Nombre</h3>
					<p class="text-center"><?= $categoria->getNombre() ?></p>
				</div>
				<div class="col-lg-6 col-md-12 mt-5 mb-5">
					<h3 class="text-center">Nombre URL</h3>
					<p class="text-center"><?= $categoria->getnombre_url() ?></p>
				</div>
			</div>
			<a href="actions/borrar_categoria_acc.php?id=<?= $categoria->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4 w-50 m-auto">Eliminar</a>

		</div>

	</div>


</section>