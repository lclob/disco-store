<div>
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="mb-3">Cargar Artista</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mb-3 borde">
          <form class="row g-3" action="actions/add_artista_acc.php" method="POST" enctype="multipart/form-data">

            <div class="col-md-6 mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="alias" class="form-label">Alias</label>
              <input type="text" class="form-control" id="alias" name="alias" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="portada" class="form-label">Imagen</label>
              <input class="form-control" type="file" id="portada" name="portada" required>
            </div>

            <div class="col-md-6">
              <label for="primera_aparicion" class="form-label">Primera aparición</label>
              <input type="number" class="form-control" id="primera_aparicion" name="primera_aparicion" required>
              <div class="form-text">Ingresar el año con 4 dígitos.</div>
            </div>

            <div class="col-md-12 mb-3">
              <label for="biografia" class="form-label">Biografia</label>
              <textarea class="form-control" id="biografia" name="biografia"></textarea>
            </div>

            <button type="submit" class="btn bg-btn">Cargar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>