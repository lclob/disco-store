<?PHP
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$generos = $_POST['generos'];
$cantidadGeneros = count($generos);
$listaGeneros = implode(", ", $generos);

?>

<div class="container">
  <div class="row">
    <div class="col">
      <ul class="list-group">
        <h2 class="mb-3">Datos</h2>
        <li class='list-group-item'>Nombre: <span class='fw-bold'><?= $nombre ?></span></li>
        <li class='list-group-item'>Apellido: <span class='fw-bold'><?= $apellido ?></span></li>
        <li class='list-group-item'>Generos escuchados:
          <?php if ($cantidadGeneros > 5) : ?>
            <span class='fw-bold text-success'>(<?= $cantidadGeneros ?>) | <?= $listaGeneros ?> :) </span>
          <?php else : ?>
            <span class='fw-bold text-danger'>(<?= $cantidadGeneros ?>) | <?= $listaGeneros ?> :( </span>
          <?php endif ?>
        </li>
      </ul>
    </div>
  </div>
</div>