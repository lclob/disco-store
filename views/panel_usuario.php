<div class=" d-flex justify-content-center p-5">
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold">Panel de Usuario</h1>

      <div class="border rounded p-3 mb-4">
        <div class="row">
          <div class="col-12 ">
            <?PHP
            echo "<pre>";
            print_r($_SESSION['loggedIn']);
            echo "</pre>";
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>