<?PHP
$id = $_GET['id'] ?? FALSE;

$miObjetoDisco = new Disco();
$disco = $miObjetoDisco->producto_x_id($id);
?>

<?PHP if (!empty($disco)) { ?>

  <div id="producto" class="mb-5">
    <div class="container">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
    </div>
    <div class="container">
      <div class="row align-items-center justify-content-center info">
        <div class="col">
          <figure>
            <img src="imagenes_discos/<?= $disco->getPortada() ?>" alt="imagen producto">
          </figure>
        </div>
        <div class="col descripcion-producto">
          <h2>
            <?= $disco->getTitulo() ?>
          </h2>
          <div class="fs-3 mb-3 fw-bold text-start precio">$
            <span><?= number_format($disco->getPrecio(), 2, ",", ".") ?></span>
          </div>
          <p>
            <?= $disco->getBajada() ?>
          </p>
          <ul class="list-group list-group-flush bg-dark">
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Genero:</span>
              <?= $disco->getGenero()->getNombre() ?>
            </li>
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Producción:</span>
              <?= $disco->getProductor() ?>
            </li>
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Canciones:</span>
              <?= $disco->getCanciones() ?>
            </li>
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Publicación:</span>
              <?= $disco->getPublicacion() ?>
            </li>
          </ul>
          <form action="admin/actions/add_item_acc.php" method="GET" class="row">
            <div class="col-6 d-flex align-items-center">
              <label for="q" class="fw-bold me-2">Cantidad: </label>
              <input type="number" class="form-control qty" value="1" name="q" id="q">
            </div>
            <div class="col-6">
              <input type="submit" value="AGREGAR AL CARRITO" class="btn  bg-btn w-100">
              <input type="hidden" value="<?= $id ?>" name="id" id="id">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?PHP } ?>