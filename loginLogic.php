<?php
$conexion = mysqli_connect("localhost", "root", "Rootadmin@2023", "bd_app_inseguro");
mysqli_set_charset($conexion, 'utf8');
$conexion->query("SET time_zone = 'America/Guatemala'");
if (!$conexion) {
	header("Location: login.php?error=Conexión fallida con la base de datos");
}

$usuario = $_POST["usuario"];
$pass = $_POST["password"];

#Simple y tonta comprobación para efectos de simplicidad
session_start();
//hacer la consulta a la bd
$consulta = mysqli_query($conexion, "SELECT * FROM `tb_usuario` us WHERE us.user='" . $usuario . "' AND us.pass='" . $pass . "'");
$bandera = false;
while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
	$bandera = true;
	$valorusu = $fila['user'];
	$valorpass = $fila['pass'];
}

if ($bandera) {
	$_SESSION["pass"] = $valorpass;
	$_SESSION["usuario"] = $valorusu;
	header("Location: index.php");
} else {
	header("Location: login.php?error=Usuario o contraseña incorrecto");
}
//fin de la consulta

// if ($usuario === "admin" && $pass === "0UqiNBK8iQRrtK1yvHosV79h3") {
// 	$_SESSION["admin"] = true;
// 	$_SESSION["usuario"] = $usuario;
// 	header("Location: index.php");
// } else if ($usuario === "user" && $pass === "4PPvLoH19Jvbhig3rebUZnD63") {
// 	$_SESSION["admin"] = false;
// 	$_SESSION["usuario"] = $usuario;
// 	header("Location: index.php");
// } else {
// }
