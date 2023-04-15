<?PHP
$artistaSeleccionado = $_GET['artista'] ?? FALSE;
require "includes/productos.php";


if (!array_key_exists($artistaSeleccionado, $productos)) {
  $artista = $productos["bob_marley"];
} else {
  $artista = $productos[$artistaSeleccionado];
}
;

$tituloArtista = ucwords(str_replace("_", " ", $artistaSeleccionado));
?>

<div id="discos">
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="text-white mb-3">Nuestros vinilos</h2>
    </div>

    <div class="container">
      <div class="row g-4">
        <h3>
          <?= $tituloArtista ?>
        </h3>

        <?PHP foreach ($artista as $album) { ?>
          <div class="prod col-sm-6 col-md-4 col-xl-3">
            <div class="card h-100 mb-3">
              <div class="img shadow-lg card-img-top"
                style="background: url('assets/img/<?= $album['portada'] ?>') no-repeat center">
                <button type="button" class="button" data-bs-toggle="modal"
                  data-bs-target="#producto-<?= $album['id'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus-lg"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                  </svg>
                </button>
              </div>
              <div class="card-body">
                <p class="fs-6 m-0 fw-bold artista">
                  <?= $album['artista'] ?>
                </p>
                <h5 class="card-title">
                  <?= $album['titulo'] ?>
                </h5>
              </div>
            </div>
          </div>

          <div class="modal fade" id="producto-<?= $album['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-dark">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">
                    <?= $album['titulo'] ?>
                  </h1>
                  <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark">
                  <p class="card-text">
                    <?= $album['bajada'] ?>
                  </p>
                  <ul class="list-group list-group-flush bg-dark">
                    <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Genero:</span>
                      <?= $album['genero'] ?>
                    </li>
                    <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Producción:</span>
                      <?= $album['productor'] ?>
                    </li>
                    </li>
                    <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Canciones:</span>
                      <?= $album['canciones'] ?>
                    </li>
                    <li class="list-group-item px-0 bg-dark"><span class="fw-bold">Publicación:</span>
                      <?= $album['publicacion'] ?>
                    </li>
                  </ul>
                  <div class="fs-3 mb-3 fw-bold text-center precio">$
                    <?= number_format($album['precio'], 2, ",", ".") ?>
                  </div>
                  <a href="#" class="btn bg-comprar w-100 fw-bold">COMPRAR</a>
                </div>
              </div>
            </div>
          </div>
        <?PHP } ?>

      </div>
    </div>

  </div>
</div>