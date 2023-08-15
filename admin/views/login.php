<div id="login">
	<div>
		<div class="container">
			<h1 class="text-center mb-5 fw-bold">disco-store</h1>
			<h2 class="text-center mb-3">Iniciar sesión</h2>
		</div>

		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-10">
					<?= (new Alerta())->get_alertas(); ?>
				</div>
				<div class="col-lg-10 m-auto borde">
					<form class="row gap-3 justify-content-center mt-0" action="admin/actions/auth_login.php" method="POST">
						<div class="row g-3 mt-0	">
							<div class="col-12 mb-3 mt-0">
								<label for="username" class="form-label">Nombre de Usuario</label>
								<input type="text" class="form-control" id="username" name="username">
							</div>
							<div class="col-12 mb-3">
								<label for="pass" class="form-label">Password</label>
								<input type="password" class="form-control" id="pass" name="pass">
							</div>
							<button type="submit" class="btn bg-btn">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>