<?PHP
$artistas = (new Artista())->get_artistas();
?>
<div>
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="mb-3">Administración de Artistas</h2>
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
                <th scope="col" width="15%">Imágen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?PHP foreach ($artistas as $A) { ?>
                <tr>
                  <td><img src="../imagenes_artistas/<?= $A->getPortada() ?>" alt="Imágen Illustrativa de <?= $A->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>
                  <td><?= $A->getNombre() ?></td>
                  <td>
                    <a href="index.php?sec=edit_artista&id=<?= $A->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                    <a href="index.php?sec=delete_artista&id=<?= $A->getId() ?>" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                  </td>
                </tr>
              <?PHP } ?>
            </tbody>
          </table>

          <a href="index.php?sec=add_artista" class="btn bg-btn w-100 mt-5"> Cargar nuevo artista</a>
        </div>

      </div>
    </div>
  </div>
</div>