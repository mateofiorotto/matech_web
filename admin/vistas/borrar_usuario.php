<?PHP
$id = $_GET['id'] ?? FALSE;
$usuario = Usuario::usuario_por_id($id);
?>

<section id="borrar-usuario" class="container mb-5 mt-5">
	<h2 class="text-center mb-5 bold">¿Deseas borrar este usuario?</h2>
	<div class="row justify-content-center align-items-center mb-5 mt-5 pt-1 pb-1">
		<div class="col-lg-4 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Email</h3>
			<p class="text-center"><?= $usuario->getEmail() ?></p>
		</div>

		<div class="col-lg-4 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Nombre de Usuario</h3>
			<p class="text-center"><?= $usuario->getNombre_usuario() ?></p>
		</div>

		<div class="col-lg-4 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Nombre Completo</h3>
			<p class="text-center"><?= $usuario->getNombre_completo() ?></p>
		</div>

		<div class="col-lg-4 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Rol</h3>
			<p class="text-center"><?= $usuario->getRol() ?></p>
		</div>

		<div class="col-lg-4 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Telefono</h3>
			<p class="text-center"><?= $usuario->getTelefono() ?></p>
		</div>

		<div class="col-lg-4 col-md-12 mt-5 mb-5">
			<h3 class="text-center">Direccion</h3>
			<p class="text-center"><?= $usuario->getDireccion() ?></p>
		</div>
		
		<a href="actions/borrar_usuario_acc.php?id=<?= $usuario->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4 w-25 m-auto">Eliminar</a>
	</div>


</section>