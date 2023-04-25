<?PHP
$artistaSeleccionado = $_GET['nombre'] ?? FALSE;
$cantidadCanciones = $_GET['canciones'] ?? FALSE;
$filtroGenero = $_GET['genero'] ?? FALSE;

$miObjetoDisco = new Disco();
$catalogo = $miObjetoDisco->catalogo_x_artista($artistaSeleccionado);

if (empty($catalogo)) {
  $catalogo = $miObjetoDisco->catalogo_completo();
}

if ($cantidadCanciones) {
  $catalogo = $miObjetoDisco->catalogo_x_canciones($cantidadCanciones);
}

if ($filtroGenero) {
  $catalogo = $miObjetoDisco->catalogo_x_genero($filtroGenero);
}

$tituloArtista = ucwords(str_replace("_", " ", $artistaSeleccionado));
?>

<div id="discos">
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="text-white mb-3">Nuestros vinilos</h2>

      <div class="mb-4">
        <span class="mb-2 filtrar">Filtrar por:</span>
        <ul class="list-group d-flex flex-row filters bg-black">
          <li class="dropdown-item w-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Artistas
            </button>
            <ul class="dropdown-menu bg-secondary">
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&nombre=bob_marley">Bob Marley</a></li>
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&nombre=pink_floyd">Pink Floyd</a></li>
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&nombre=the_beatles">The Beatles</a></li>
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&nombre=rolling_stones">Rolling Stones</a></li>
            </ul>
          </li>
          <li class="dropdown-item w-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Genero
            </button>
            <ul class="dropdown-menu bg-secondary">
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&genero=Reggae">Reggae</a></li>
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&genero=Rock">Rock</a></li>
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&genero=Rock/Pop">Rock/Pop</a></li>
            </ul>
          </li>
          <li class="dropdown-item w-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Canciones
            </button>
            <ul class="dropdown-menu bg-secondary">
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&canciones=10">Menos de 10</a></li>
              <li><a class="dropdown-item text-white" href="index.php?sec=discos&canciones=11">Más de 10</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="container">
      <div class="row g-4">

        <?PHP if ($tituloArtista) { ?>
          <h3>
            <?= $tituloArtista ?>
          </h3>
        <?PHP } ?>

        <?PHP foreach ($catalogo as $disco) { ?>
          <div class="prod col-sm-6 col-md-4 col-xl-3">
            <div class="card h-100 mb-3">
              <div class="img shadow-lg card-img-top" style="background: url('assets/img/<?= $disco->getPortada() ?>') no-repeat center">
                <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#producto-<?= $disco->getId() ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                  </svg>
                </button>
              </div>
              <div class="card-body">
                <p class="fs-6 m-0 fw-bold artista">
                  <?= $disco->getArtista() ?>
                </p>
                <h5 class="card-title">
                  <?= $disco->getTitulo() ?>
                </h5>
              </div>
            </div>
          </div>

          <div class="modal fade" id="producto-<?= $disco->getId() ?>" tabindex="-1" aria-labelledby="exampleModalLabel-<?= $disco->getId() ?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-dark">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 text-light" id="exampleModalLabel-<?= $disco->getId() ?>">
                    <?= $disco->getTitulo() ?>
                  </h1>
                  <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark">
                  <p class="card-text">
                    <?= $disco->bajada_reducida(25) ?>
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
                  <div class="fs-3 mb-3 fw-bold text-center precio">$
                    <?= $disco->getPrecio() ?>
                  </div>
                  <a href="index.php?sec=producto&id=<?= $disco->getId() ?>" class="btn bg-btn w-100 fw-bold">VER MÁS</a>
                </div>
              </div>
            </div>
          </div>
        <?PHP } ?>

      </div>
    </div>
  </div>
</div>