<?PHP
$miObjetoDisco = new Disco();
$generos = array_unique($miObjetoDisco->genero());
?>

<div id="contacto">
  <div>
    <div class="container text-center">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
      <h2 class="mb-2">Newsletter</h2>
      <p  class="mb-5">Suscribite a nuestro newsletter y no te pierdas las últimas novedades!</p>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <form action="index.php?sec=procesar_datos_post" method="POST" class="row gap-3 justify-content-center">

            <div class="row p-0">
              <div class="col-6">
                <div class="form-floating mb-3 text-dark">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                  <label for="nombre" class="form-label">Ingrese su nombre</label>
                </div>
              </div>

              <div class="col-6">
                <div class="form-floating mb-3 text-dark">
                  <input type="text" class="form-control text-dark" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
                  <label for="apellido" class="form-label">Ingrese su apellido</label>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating mb-3 text-dark">
                <input type="email" class="form-control text-dark" name="email" id="email" placeholder="Ingrese su e-mail" required>
                <label for="email" class="form-label">Ingrese su e-mail</label>
              </div>
            </div>

            <div class="col-12">
              <div class="mb-3 ">
                <div class="mb-2 fw-bold">Seleccione la/s pelicula/s que haya visto:</div>
                <div class="d-flex flex-wrap justify-content-start text-dark form">
                  <?PHP foreach ($generos as $indice => $genero) { ?>

                    <div class="form-check form-switch flex-fill bg-white p-3">
                      <input class="form-check-input" type="checkbox" id="check_<?= $indice ?>" name="generos[]" value="<?= $genero ?>">
                      <label class="form-check-label" for="check_<?= $indice ?>"><?= $genero ?></label>
                    </div>

                  <?PHP } ?>
                </div>
              </div>
            </div>

            <button type="submit" class="col-md-4 btn bg-btn mt-5">Enviar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>