<?PHP
require_once "libraries/productos.php";
$id = $_GET['id'] ?? FALSE;
$vinilo = producto_x_id($id);

?>

<div id="producto" class="mb-5">

  <div class="container">
    <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
  </div>

  <div class="container">
    <div class="row align-items-center justify-content-center">

      <?PHP if (!empty($vinilo)) { ?>
        <div class="col">
          <figure>
            <img src="assets/img/<?= $vinilo['portada'] ?>" alt="imagen producto">
          </figure>
        </div>
        <div class="col descripcion-producto">
          <p class="fs-6 fw-bold artista">
            <?= $vinilo['artista'] ?>
          </p>
          <h2>
            <?= $vinilo['titulo'] ?>
          </h2>
          <p>
            <?= $vinilo['bajada'] ?>
          </p>
          <ul class="list-group list-group-flush bg-dark">
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Genero:</span>
              <?= $vinilo['genero'] ?>
            </li>
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Producción:</span>
              <?= $vinilo['productor'] ?>
            </li>
            </li>
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Canciones:</span>
              <?= $vinilo['canciones'] ?>
            </li>
            <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Publicación:</span>
              <?= $vinilo['publicacion'] ?>
            </li>
          </ul>
          <div class="fs-3 mb-3 fw-bold text-center precio">$
            <?= number_format($vinilo['precio'], 2, ",", ".") ?>
          </div>
          <a href="#" class="mb-3 btn bg-btn w-100 fw-bold">COMPRAR</a>
        </div>
    </div>
  </div>
<?PHP } else { ?>
  <div class="col">
    <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
  </div>
<?PHP } ?>

</div>
</div>
</div>