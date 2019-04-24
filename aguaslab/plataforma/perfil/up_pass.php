<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $_SESSION['nick'];
	$pass = $con->real_escape_string(htmlentities($_POST['pass1']));
	$pass = sha1($pass);

	$up = $con->query("UPDATE usuario SET pass='$pass' WHERE nick='$nick'");
	if ($up) {
		$_SESSION['nombre'] = $nombre;
		$_SESSION['correo'] = $correo;
		header('location:../extend/alerta.php?msj=Clave actualizada&c=pe&p=perfil&t=success');
	}else{
		header('location:../extend/alerta.php?msj=la clave no a podido ser actualizada&c=pe&p=perfil&t=error');
	}

	$con->close();
}else{
	header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
}
?>