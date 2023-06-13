<?php
session_start();

if (isset($_SESSION["usuario"])) {
	header("Location: index.php");
} else {

?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="UTF-8">
		<title>Inicio de sesión</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="text-center mt-4">
						<h3>Tarea de Seguridad de Redes TCP/IP</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="text-center">
						<h4>Applicacion web segura</h4>
					</div>
				</div>
			</div>
			<!-- mensaje de error -->
			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
					<strong>Error!</strong><?php echo $_GET['error']; ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php } ?>

			<form method="post" action="loginLogic.php">
				<div class="row d-flex justify-content-center mt-5">
					<div class="col-6">
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">Usuario</span>
							<input type="text" class="form-control" placeholder="Usuario" name="usuario" aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>
				</div>
				<div class="row d-flex justify-content-center">
					<div class="col-6">
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">Contraseña</span>
							<input type="password" placeholder="Contraseña" name="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col d-flex justify-content-center">
						<div class="row">
							<div class="col">
								<button class="btn btn-success">Acceder</button>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- <h3>Tarea de seguridad de redes TCP/IP</h3>
		<p>Applicacion web inseguro</p>
		<br>
		<form method="post" action="loginLogic.php">
			<input type="text" placeholder="Usuario" name="usuario" style="margin-bottom: 5px;">
			<br>
			<input type="password" placeholder="Contraseña" name="password">
			<br>
			<button style="margin-top: 10px;">Acceder</button>
		</form> -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

	</html>
<?php

}
?>