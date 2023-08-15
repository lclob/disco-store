<div>
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold text-white">disco-store</h1>
      <h2 class="mb-3">Cargar Genero</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mb-3 borde">
          <form class="row g-3" action="actions/add_genero_acc.php" method="POST" enctype="multipart/form-data">

            <div class="col mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            
            <button type="submit" class="btn bg-btn">Cargar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>