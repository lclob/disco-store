<?PHP

$artistas = (new Artista())->get_artistas();
$generos = (new Genero())->get_generos();

?>

<div>
	<div>
		<div class="container">
			<h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
			<h2 class="mb-3">Cargar Disco</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 mb-3 borde">
					<form class="row g-3" action="actions/add_disco_acc.php" method="POST" enctype="multipart/form-data">

						<div class="col-md-6 mb-3">
							<label for="titulo" class="form-label">Titulo</label>
							<input type="text" class="form-control" id="titulo" name="titulo" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="portada" class="form-label">Portada</label>
							<input class="form-control" type="file" id="portada" name="portada" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="publicacion" class="form-label">Publicacion</label>
							<input type="date" class="form-control" id="publicacion" name="publicacion" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="productor" class="form-label">Productor</label>
							<input type="text" class="form-control" id="productor" name="productor" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="genero_id" class="form-label">Genero</label>
							<select class="form-select" name="genero_id" id="genero_id" required>
								<option value="" selected disabled>Elija una opción</option>
								<?PHP foreach ($generos as $G) { ?>
									<option value="<?= $G->getId() ?>"><?= $G->getNombre() ?></option>
								<?PHP } ?>
							</select>
						</div>

						<div class="col-md-6 mb-3">
							<label for="artista" class="form-label">Artista</label>
							<select class="form-select" name="artista" id="artista" required>
								<option value="" selected disabled>Elija una opción</option>
								<?PHP foreach ($artistas as $A) { ?>
									<option value="<?= $A->getId() ?>"><?= $A->getNombre() ?></option>
								<?PHP } ?>
							</select>
						</div>

						<div class="col-md-4 mb-3">
							<label for="origen" class="form-label">Origen</label>
							<input type="text" class="form-control" id="origen" name="origen" required>
						</div>

						<div class="col-md-4 mb-3">
							<label for="canciones_cantidad" class="form-label">Cantidad de canciones</label>
							<select class="form-select" name="canciones_cantidad" id="canciones_cantidad" required>
								<option value="" selected disabled>Elija una opción</option>
								<?PHP for ($i = 0; $i < 51; $i++) { ?>
									<option><?= $i ?></option>
								<?PHP } ?>
							</select>
						</div>


						<div class="col-md-4 mb-3">
							<label for="precio" class="form-label">Precio</label>
							<input type="number" class="form-control" id="precio" name="precio" required>
						</div>


						<div class="col-md-12 mb-3">
							<label for="bajada" class="form-label">Bajada</label>
							<textarea class="form-control" id="bajada" name="bajada" rows="7"></textarea>
						</div>


						<button type="submit" class="btn bg-btn">Cargar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>