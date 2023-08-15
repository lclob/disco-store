<?PHP
$id = $_GET['id'] ?? FALSE;
$artista = (new Artista())->get_x_id($id);

?>

<div>
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
      <h2 class="mb-3">Edición de <span><?= $artista->getNombre() ?><span></h2>
    </div>

    <div class="container">
      <div class="col-12 mb-3 borde">
        <form class="row g-3" action="actions/edit_artista_acc.php?id=<?= $artista->getId() ?>" method="POST" enctype="multipart/form-data">

          <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $artista->getNombre() ?>" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="alias" class="form-label">Alias</label>
            <input type="text" class="form-control" id="alias" name="alias" value="<?= $artista->getAlias() ?>" required>
          </div>

          <div class="col-md-2 mb-3">
            <label for="portada_og" class="form-label">Imágen actual</label>
            <img src="../imagenes_artistas/<?= $artista->getPortada() ?>" alt="Imágen Illustrativa de <?= $artista->getNombre() ?>" class="img-fluid rounded shadow-sm d-block">
            <input class="form-control" type="hidden" id="portada_og" name="portada_og" value="<?= $artista->getPortada() ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label for="portada" class="form-label">Reemplazar Imagen</label>
            <input class="form-control" type="file" id="portada" name="portada">
          </div>

          <div class="col-md-6 mb-3">
            <label for="primera_aparicion" class="form-label">Primera aparición</label>
            <input type="number" class="form-control" id="primera_aparicion" name="primera_aparicion" value="<?= $artista->getPrimera_aparicion() ?>" required>
            <div class="form-text">Ingresar el año con 4 dígitos.</div>
          </div>

          <div class="col-md-12 mb-3">
            <label for="bio" class="form-label">Biografia</label>
            <textarea class="form-control" id="bio" name="bio"><?= $artista->getBiografia() ?></textarea>
          </div>

          <button type="submit" class="btn btn-warning">Editar</button>

        </form>
      </div>
    </div>
  </div>
</div>