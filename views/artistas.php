<?PHP
require_once "libraries/productos.php";
$artista = artista();
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
                <a href="index.php?sec=discos&nombre=<?= $key['nombre'] ?>">
                <img src="assets/img/<?= $key['portada'] ?>" class="card-img" alt="portada - <?= $key['titulo'] ?>"/>
                <div class="card-img-overlay">
                  <h5 class="card-title">
                    <?= $tituloArtistas = ucwords(str_replace("_", " ", $key['nombre'])); ?>
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