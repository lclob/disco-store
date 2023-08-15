<?PHP
$id = $_GET['id'] ?? FALSE;
$genero = (new Genero())->get_x_id($id);

?>

<div>
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
      <h2 class="mb-3">Edición de <span><?= $genero->getNombre() ?><span></h2>
    </div>

    <div class="container">
      <div class="col-12 mb-3 borde">
        <form class="row g-3" action="actions/edit_genero_acc.php?id=<?= $genero->getId() ?>" method="POST" enctype="multipart/form-data">

          <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $genero->getNombre() ?>" required>
          </div>

          <button type="submit" class="btn btn-warning">Editar</button>

        </form>
      </div>
    </div>
  </div>
</div>