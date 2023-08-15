<?PHP
$miObjetoDisco = new Disco;
$discos = $miObjetoDisco->catalogo_completo();
?>

<div id="historia" class="d-flex justify-content-center">
  <div>
    <div class="containe-fluidr">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-3 p-0">
          <div id="carouselExampleControls" class="carousel carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="index.php?sec=producto&id=<?= $discos[1]->getId() ?>"><img src="imagenes_discos/<?= $discos[1]->getPortada() ?>" class="d-block" alt="<?= $discos[1]->getTitulo() ?> - imagen" /></a>
            </div>
              <?PHP foreach ($discos as $disco) { ?>
                <div class="carousel-item">
                <a href="index.php?sec=producto&id=<?= $disco->getId() ?>"><img src="imagenes_discos/<?= $disco->getPortada() ?>" class="d-block" alt="<?= $disco->getTitulo() ?> - imagen" /></a>
                </div>
              <?PHP } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-2 divider"></div>
        <div class="col-12 fs-5">
          <p>El disco de vinilo es un medio de almacenamiento analógico de señales sonoras, caracterizado por utilizar
            como material de soporte un plástico denominado policloruro de vinilo, del que recibe el nombre. Fue
            introducido oficialmente en 1948 por la compañía Columbia Records en los Estados Unidos, como una evolución
            muy mejorada de los anteriores discos de 78 rpm. Actualmente el término vinilo se suele utilizar para
            indicar en particular el formato LP, aunque este uso sea inadecuado, ya que también discos fabricados con
            otros materiales explotan el mismo formato como soporte.
            El sonido de un disco se reproduce mediante un tocadiscos, que permiten utilizar discos de diferentes
            diámetros y elegir la velocidad de rotación mediante un selector.</p>
        </div>
      </div>
    </div>
  </div>
</div>