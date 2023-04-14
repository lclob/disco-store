<?PHP
require "includes/productos.php";
?>

<div id="artistas">
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="text-white mb-3">Nuestros artistas</h2>
    </div>

    <div class="container">
      <div class="row g-4">
        <?PHP foreach ($productos as $key => $value) { 
          $portada = array_shift($value); ?>
            <div class="col-sm-6 col-md-4 col-xl-3">
              <div class="card text-bg-dark">
                <a href="index.php?sec=discos&artista=<?= $key ?>">
                <img src="assets/img/<?= $portada['portada'] ?>" class="card-img" alt="portada - <?= $portada['titulo'] ?>"/>
                <div class="card-img-overlay">
                  <h5 class="card-title">
                    <?= $tituloArtistas = ucwords(str_replace("_", " ", $key)); ?>
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