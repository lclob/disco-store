<?PHP
$miObjetoDisco = new Disco();
$catalogoCompleto = $miObjetoDisco->catalogo_completo();

$generosUnicos = array();

foreach ($catalogoCompleto as $genero) { 
  $nombreGenero = $genero->getGenero()->getNombre();
  if (!in_array($nombreGenero, $generosUnicos)) {
    $generosUnicos[] = $nombreGenero;
  } 
} 
?>

<div id="contacto">
  <div>
    <div class="container-fluid text-center">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
      <h2 class="mb-2">Newsletter</h2>
      <p class="mb-3">Suscribite a nuestro newsletter y no te pierdas las últimas novedades!</p>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="m-auto borde">
          <form action="index.php?sec=procesar_datos_post" method="POST" class="row gap-3 justify-content-center">

            <div class="row p-0">
              <div class="col-6">
                <div class="form-floating mb-3 text-dark">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                  <label for="nombre" class="form-label">Nombre</label>
                </div>
              </div>

              <div class="col-6">
                <div class="form-floating mb-3 text-dark">
                  <input type="text" class="form-control text-dark" id="apellido" name="apellido" placeholder="apellido" required>
                  <label for="apellido" class="form-label">Apellido</label>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating mb-3 text-dark">
                <input type="email" class="form-control text-dark" name="email" id="email" placeholder="e-mail" required>
                <label for="email" class="form-label">E-mail</label>
              </div>
            </div>

            <div class="col-12">
              <div class="mb-3 ">
                <div class="mb-2 fw-bold">Seleccione su/s genero/s preferidos:</div>
                <div class="d-flex flex-wrap justify-content-start text-dark form">
                  <?PHP foreach ($generosUnicos as $indice => $genero) { ?>

                    <div class="form-check form-switch flex-fill bg-white p-3">
                      <input class="form-check-input" type="checkbox" id="check_<?= $indice ?>" name="generos[]" value="<?= $genero ?>">
                      <label class="form-check-label" for="check_<?= $indice ?>"><?= $genero ?></label>
                    </div>

                  <?PHP } ?>
                </div>
              </div>
            </div>

            <button type="submit" class="col-md-4 btn bg-btn">Enviar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>