<?PHP
$miObjetoArtista = new Artista;
$artista = $miObjetoArtista->get_artistas();
?>

<div id="artistas">
  <div>
    <div class="container-fluid">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
      <h2 class="mb-3">Nuestros artistas</h2>
    </div>

    <div class="container-fluid">
      <div class="row g-4">
        <?PHP foreach ($artista as $key) { ?>
            <div class="col-sm-6 col-md-4 col-xl-3">
              <div class="card text-bg-dark">
                <a href="index.php?sec=discos&nombre=<?= $key->getId() ?>">
                <img src="imagenes_artistas/<?= $key->getPortada() ?>" class="card-img" alt="portada - <?= $key->getNombre() ?>"/>
                <div class="card-img-overlay">
                  <h3 class="card-title h5">
                    <?= $tituloArtistas = ucwords(str_replace("_", " ", $key->getNombre())); ?>
                  </h3>
                </div>
              </a>
              </div>
            </div>
        <?PHP } ?>
      </div>
    </div>
  </div>
</div>