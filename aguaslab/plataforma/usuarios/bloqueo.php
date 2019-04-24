<?php include '../conexion/conexion.php';
	$user = $_SESSION['nick'];

	$up = $con->query("UPDATE usuario SET bloqueo=0 WHERE nick='$user'");
	if ($up) {
		$_SESSION = array();
		session_destroy();
		header('location:../extend/alerta.php?msj=Uso indevido del sistema&c=salir&p=salir&t=error');
	}
?>