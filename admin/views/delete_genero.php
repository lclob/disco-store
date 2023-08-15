<?PHP
$id = $_GET['id'] ?? FALSE;
$genero = (new Genero())->get_x_id($id);
?>
<div>
	<div>
		<div class="container">
			<h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
		</div>
		<div class="container">
			<div class="row my-5 g-3 align-items-center justify-content-center">
				<h2 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este genero?</h2>

				<div class="col-12 col-md-6">
					<h2 class="fs-6">Nombre</h2>
					<p><?= $genero->getNombre() ?></p>

					<a href="actions/delete_genero_acc.php?id=<?= $genero->getId() ?>" role="button" class="d-block btn btn-danger text-dark mt-4">Eliminar</a>
					<a href="index.php?sec=admin_generos" role="button" class="d-block btn bg-btn mt-2">Conservar</a>
				</div>
			</div>
		</div>
	</div>
</div>