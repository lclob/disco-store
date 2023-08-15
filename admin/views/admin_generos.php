<?PHP
$generos = (new Genero())->get_generos();
?>
<div>
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="mb-3">Administración de Generos</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mb-3">
          <div>
            <?= (new Alerta())->get_alertas(); ?>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
              </tr>
            </thead>
            <tbody>
              <?PHP foreach ($generos as $G) { ?>
                <tr>
                  <td><?= $G->getNombre() ?></td>
                  <td>
                    <a href="index.php?sec=edit_genero&id=<?= $G->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                    <a href="index.php?sec=delete_genero&id=<?= $G->getId() ?>" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                  </td>
                </tr>
              <?PHP } ?>
            </tbody>
          </table>

          <a href="index.php?sec=add_genero" class="btn bg-btn w-100 mt-5"> Cargar nuevo genero</a>
        </div>

      </div>
    </div>
  </div>
</div>