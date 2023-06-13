<?php
session_start();
session_regenerate_id(true);
$conexion = mysqli_connect("localhost", "root", "Rootadmin@2023", "bd_app_inseguro");
mysqli_set_charset($conexion, 'utf8');
$conexion->query("SET time_zone = 'America/Guatemala'");
if (!$conexion) {
	header("Location: login.php?error=Conexión fallida con la base de datos");
}

#Salir si sesión no está iniciada
if (!isset($_SESSION["usuario"])) {
	header("Location: logout.php");
}
#Recuperar los mensajes de un archivo
// $mensajes = [];
// if (file_exists("mensajes.txt")) {
// 	$mensajes = explode("\n", file_get_contents("mensajes.txt"));
// }
// ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<h3><span class="me-3">Hola Usuario: </span><?php echo $_SESSION["usuario"]; ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<a href="logout.php" class="btn btn-danger btn-sm">Cerrar sesión</a>
				<a href="nuevo.html" class="btn btn-success btn-sm">Agregar mensaje</a>
			</div>
		</div>
		<!-- mensaje de error -->
		<?php if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
				<strong>Error!</strong><?php echo $_GET['error']; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php } ?>
		
		<div class="row">
			<div class="col">
				<div class="text-center">
					<h5>Mensajes del dia</h5>
				</div>
			</div>
		</div>

		<?php
		$consulta = mysqli_query($conexion, "SELECT * FROM `tb_mensajes`");
		while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
			$mensajevalor = $fila['mensaje'];
			$usuariovalor = $fila['usuario'];
		?>
			<div class="row">
				<div class="col">
					<div class="alert alert-secondary" role="alert">
						<span class="me-2"><b class="me-2">Mensaje:</b><?php echo strip_tags($mensajevalor); ?></span><span class="me-2"><b class="me-2">Creado por:</b><?php echo $usuariovalor; ?></span>
					</div>
				</div>
			</div>
		<?php }
		?>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>