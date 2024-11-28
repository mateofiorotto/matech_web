<?PHP
$id = $_GET['id'] ?? FALSE;
$componente = Componente::producto_por_id($id);
?>

<section id="borrar-componente" class="container mb-5 mt-5">
	<h2 class="text-center mb-5 bold">¿Deseas borrar este componente?</h2>
	<div class="row">


		<div class="col-12 col-md-6">
			<img src="../elementos-graficos/productos/<?= $componente->getImagen() ?>" alt="Imágen de <?= $componente->getNombre() ?>" class="d-block m-auto img-fluid mb-3">
			<a href="actions/borrar_componente_acc.php?id=<?= $componente->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4 w-50 m-auto">Eliminar</a>
		</div>

		<div class="col-12 col-md-6 mb-4 ms-5 ms-lg-0">
			<div class="row mt-5 mb-lg-4 mb-0 mt-lg-0">
				<div class="col-lg-6 col-md-12">
					<h3>Nombre</h3>
					<p><?= $componente->getNombre() ?></p>
				</div>
				<div class="col-lg-6 col-md-12">
					<h3>Precio</h3>
					<p><?= $componente->getPrecio() ?></p>
				</div>
			</div>

			<div class="row mb-lg-4 mb-0">
				<div class="col-lg-6 col-md-12">
					<h3>Dimensiones</h3>
					<p><?= $componente->getDimension() ?></p>
				</div>
				<div class="col-lg-6 col-md-12">
					<h3>Fecha de Lanzamiento</h3>
					<p><?= $componente->getFechaLanzamiento() ?></p>
				</div>
			</div>


			<div class="row mb-lg-4 mb-0">
				<div class="col-lg-6 col-md-12">
					<h3>Marca</h3>
				<!-- traigo con la clase compleja nombre marca y comp reemplazando los metodos
				 		anteriores marca_del_producto y categoria_del_producto-->
					<p><?= $componente->getMarca()->getNombre() ?></p>
				</div>
				<div class="col-lg-6 col-md-12">
					<h3>Categoria</h3>
					<p><?= $componente->getCategoria()->getNombre() ?></p>
				</div>
			</div>
			
			<h3>Descripcion</h3>
			<p><?= $componente->getDescripcion() ?></p>

		</div>

	</div>


</section>