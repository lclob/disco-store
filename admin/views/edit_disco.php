<?PHP
$id = $_GET['id'] ?? FALSE;
$disco = (new Disco())->producto_x_id($id);

$generos = (new Genero())->get_generos();
$artistas = new Artista();

$artU = $artistas->get_artista_x_disco($id);
?>

<div>
	<div>
		<div class="container">
			<h1 class="text-center mb-5 fw-bold">disco-store</h1>
			<h2 class="mb-3">Edición de <span><?= $disco->getTitulo() ?><span></h2>
		</div>

		<div class="container">
			<div class="col-12 mb-3 borde">
				<form class="row g-3" action="actions/edit_disco_acc.php?id=<?= $disco->getId() ?>" method="POST" enctype="multipart/form-data">

					<div class="col-md-6 mb-3">
						<label for="titulo" class="form-label">Titulo</label>
						<input type="text" class="form-control" id="titulo" name="titulo" required value="<?= $disco->getTitulo() ?>">
					</div>

					<div class="col-md-6 mb-3">
						<label for="guionista_id" class="form-label">Genero</label>
						<select class="form-select" name="genero_id" id="genero_id" required>
							<option value="" selected disabled>Elija una opción</option>
							<?PHP foreach ($generos as $G) { ?>
								<option value="<?= $G->getId() ?>" <?= $G->getId() == $disco->getGenero()->getId() ? "selected" : "" ?>><?= $G->getNombre() ?></option>
							<?PHP } ?>
						</select>
					</div>

					<div class="col-md-6 mb-3">
						<label for="publicacion" class="form-label">Publicacion</label>
						<input type="date" class="form-control" id="publicacion" name="publicacion" required value="<?= $disco->getPublicacion() ?>">
					</div>

					<div class="col-md-6 mb-3">
						<label for="artista" class="form-label">Artista</label>
						<select class="form-select" name="artista" id="artista" required>
							<?PHP
							foreach ($artistas->get_artistas() as $A) {
							?>
								<option <?= $artU->getId() == $A->getId() ? "selected" : "" ?> value="<?= $A->getId() ?>"><?= $A->getNombre() ?></option>
							<?PHP } ?>
						</select>
					</div>

					<div class="col-md-4 mb-3">
						<label for="portada_og" class="form-label">Portada Actual</label>
						<img src="../imagenes_discos/<?= $disco->getPortada() ?>" alt="Imágen Illustrativa de <?= $disco->getTitulo() ?>" class="img-fluid rounded shadow-sm d-block">
						<input class="form-control" type="hidden" id="portada_og" name="portada_og" required value="<?= $disco->getPortada() ?>">
					</div>


					<div class="col-md-8 mb-3">
						<label for="portada" class="form-label">Reemplazar Portada</label>
						<input class="form-control" type="file" id="portada" name="portada">
					</div>

					<div class="col-md-6 mb-3">
						<label for="productor" class="form-label">Productor</label>
						<input type="text" class="form-control" id="productor" name="productor" required value="<?= $disco->getProductor() ?>">
					</div>

					<div class="col-md-6 mb-3">
						<label for="canciones_cantidad" class="form-label">Canciones</label>
						<select class="form-select" name="canciones_cantidad" id="canciones_cantidad" required>
							<option selected value="<?= $disco->getCanciones() ?>"><?= $disco->getCanciones() ?></option>
							<?PHP
							for ($i = 0; $i < 50; $i++) { ?>
								<option><?= $i ?></option>
							<?PHP } ?>
						</select>
					</div>

					<div class="col-md-6 mb-3">
						<label for="origen" class="form-label">Origen</label>
						<input type="text" class="form-control" id="origen" name="origen" required value="<?= $disco->getOrigen() ?>">
					</div>

					<div class="col-md-6 mb-3">
						<label for="precio" class="form-label">Precio</label>
						<input type="number" class="form-control" id="precio" name="precio" required value="<?= intval($disco->getPrecio()) ?>">
					</div>

					<div class="col-md-12 mb-3">
						<label for="bajada" class="form-label">Bajada</label>
						<textarea class="form-control" id="bajada" name="bajada" rows="7"><?= $disco->getBajada() ?></textarea>
					</div>


					<button type="submit" class="btn btn-warning">Editar</button>
				</form>
			</div>
		</div>
	</div>
</div>