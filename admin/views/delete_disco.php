<?PHP
$id = $_GET['id'] ?? FALSE;
$disco = (new Disco())->producto_x_id($id);
?>

</div>

<div>
	<div>
		<div class="container">
			<h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
		</div>
		<div class="container">
			<div class="row my-5 g-3 align-items-center justify-content-center">
				<h2 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este disco?</h2>
				<div class="col-12 col-md-6">
					<img src="../imagenes_discos/<?= $disco->getPortada() ?>" alt="Imágen Illustrativa de <?= $disco->getTitulo() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
				</div>

				<div class="col-12 col-md-6">
					<h2 class="fs-6">Titulo</h2>
					<p><?= $disco->getTitulo() ?></p>
					<h2 class="fs-6">Genero</h2>
					<p><?= $disco->getGenero()->getNombre() ?></p>
					<h2 class="fs-6">Bajada</h2>
					<p><?= $disco->getBajada() ?></p>
					<h2 class="fs-6">Publicación</h2>
					<p><?= $disco->getPublicacion() ?></p>


					<a href="actions/delete_disco_acc.php?id=<?= $disco->getId() ?>" role="button" class="d-block btn text-dark btn-danger mt-4">Eliminar</a>
					<a href="index.php?sec=admin_discos" role="button" class="d-block btn bg-btn mt-2">Conservar</a>
				</div>
			</div>
		</div>
	</div>
</div>