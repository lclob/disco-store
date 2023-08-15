<?PHP
$id = $_GET['id'] ?? FALSE;
$artista = (new Artista())->get_x_id($id);
?>
<div>
	<div>
		<div class="container">
			<h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
		</div>
		<div class="container">
			<div class="row my-5 g-3 align-items-center justify-content-center">
				<h2 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este artista?</h2>
				<div class="col-12 col-md-6">
					<img src="../imagenes_artistas/<?= $artista->getPortada() ?>" alt="Imágen Illustrativa de <?= $artista->getNombre() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
				</div>

				<div class="col-12 col-md-6">

					<h2 class="fs-6">Nombre</h2>
					<p><?= $artista->getNombre() ?></p>
					<h2 class="fs-6">Alias</h2>
					<p><?= $artista->getAlias() ?></p>
					<h2 class="fs-6">Primera Aparicion</h2>
					<p><?= $artista->getPrimera_aparicion() ?></p>
					<h2 class="fs-6">Biografía</h2>
					<p><?= $artista->getBiografia() ?></p>

					<a href="actions/delete_artista_acc.php?id=<?= $artista->getId() ?>" role="button" class="d-block btn btn-danger text-dark mt-4">Eliminar</a>
					<a href="index.php?sec=admin_artistas" role="button" class="d-block btn bg-btn mt-2">Conservar</a>
				</div>
			</div>
		</div>
	</div>
</div>