<div id="checkout">
  <div>
    <div class="container">
      <h1 class="text-center mb-5 fw-bold">disco-store</h1>
      <h2 class="text-center mb-3">Datos Usuario</h2>
    </div>

    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-10 m-auto borde text-dark">
          <p class="h3">Usaremos los datos del siguiente usuario para finalizar la compra:</p>
          <span class="my-3 d-block"><?= $_SESSION['loggedIn']['username'] ?></span>
          <a href="admin/actions/checkout_acc.php" role="button" class="btn btn-primary w-100">Pagar</a>

        </div>
      </div>
    </div>
  </div>
</div>
