<?PHP
$id = $_GET['id'] ?? FALSE;

$miObjetoDisco = new Disco();
$disco = $miObjetoDisco->producto_x_id($id);
?>

<?PHP if (!empty($disco)) { ?>

  <div id="producto" class="mb-5">
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
    </div>
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col">
          <figure>
            <img src="assets/img/<?= $disco->getPortada() ?>" alt="imagen producto">
          </figure>
        </div>
        <div class="col descripcion-producto">
          <p class="fs-6 fw-bold artista">
            <?= $disco->getArtista() ?>
          </p>
          <h2>
            <?= $disco->getTitulo() ?>
          </h2>
          <div class="fs-3 mb-3 fw-bold text-start precio">$
            <span><?= $disco->getPrecio() ?></span>
          </div>
          <p>
            <?= $disco->getBajada() ?>
          </p>
          <ul class="list-group list-group-flush bg-dark">
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Genero:</span>
              <?= $disco->getGenero() ?>
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
          <a href="#" class="btn bg-btn w-100 fw-bold">COMPRAR</a>
        </div>
      </div>
    </div>
  </div>

<!-- not working -->
<?PHP } else { 
  require_once "views/404.php";
} ?>