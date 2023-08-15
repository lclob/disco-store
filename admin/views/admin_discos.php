<?PHP
$discos = (new Disco())->catalogo_completo();
?>
<div>
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="mb-3">Administración de Discos</h2>
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
                <th scope="col" width="15%">Portada</th>
                <th scope="col">Titulo</th>
                <th scope="col">Bajada</th>
                <th scope="col">Genero</th>
                <th scope="col">Productor</th>
                <th scope="col">Publicación</th>
                <th scope="col">Origen</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?PHP foreach ($discos as $D) { ?>
                <tr>
                  <td><img src="../imagenes_discos/<?= $D->getPortada() ?>" alt="Imágen Illustrativa de <?= $D->getTitulo() ?>" class="img-fluid rounded shadow-sm"></td>
                  <td><?= $D->getTitulo() ?></td>
                  <td><?= $D->getBajada() ?></td>
                  <td><?= $D->getGenero()->getNombre() ?></td>
                  <td><?= $D->getProductor() ?></td>
                  <td><?= $D->getPublicacion() ?></td>
                  <td><?= $D->getOrigen() ?></td>
                  <td><?= $D->getPrecio() ?></td>
                  <td>
                    <a href="index.php?sec=edit_disco&id=<?= $D->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                    <a href="index.php?sec=delete_disco&id=<?= $D->getId() ?>" role="button" class="d-block btn btn-sm btn-danger">Eliminar</a>
                  </td>
                </tr>
              <?PHP } ?>
            </tbody>
          </table>

          <a href="index.php?sec=add_disco" class="btn bg-btn w-100 mt-5">Cargar nuevo Disco</a>
        </div>
      </div>
    </div>
  </div>
</div>