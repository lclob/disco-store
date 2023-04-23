<?PHP
$miObjetoDisco = new Disco;
$artista = $miObjetoDisco->artista();
?>

<div id="artistas">
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="text-white mb-3">Nuestros artistas</h2>
    </div>

    <div class="container">
      <div class="row g-4">
        <?PHP foreach ($artista as $key) { ?>
            <div class="col-sm-6 col-md-4 col-xl-3">
              <div class="card text-bg-dark">
                <a href="index.php?sec=discos&nombre=<?= $key->getNombre() ?>">
                <img src="assets/img/<?= $key->getPortada() ?>" class="card-img" alt="portada - <?= $key->getTitulo() ?>"/>
                <div class="card-img-overlay">
                  <h5 class="card-title">
                    <?= $tituloArtistas = ucwords(str_replace("_", " ", $key->getNombre())); ?>
                  </h5>
                </div>
              </a>
              </div>
            </div>
        <?PHP } ?>
      </div>
    </div>
  </div>
</div>