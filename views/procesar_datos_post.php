<?PHP
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$generos = $_POST['generos'];

if (!$generos) {
  $generos = "datos no ingresados";
  $cantidadGeneros = "-";
  $listaGeneros = "datos no ingresados";
} else {
  $cantidadGeneros = count($generos);
  $listaGeneros = implode(", ", $generos);
}

?>

<div id="datos" class="mb-5">
  <div class="container">
    <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <ul class="list-group">
          <h2 class="mb-3">datos usuario</h2>
          <li class='list-group-item fw-bold'>Nombre: <span class='fw-normal'><?= $nombre ?></span></li>
          <li class='list-group-item fw-bold'>Apellido: <span class='fw-normal'><?= $apellido ?></span></li>
          <li class='list-group-item fw-bold'>Email: <span class='fw-normal'><?= $email ?></span></li>
          <li class='list-group-item fw-bold'>Generos escuchados:
            <span class='fw-normal'>(<?= $cantidadGeneros ?>) | <?= $listaGeneros ?></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>