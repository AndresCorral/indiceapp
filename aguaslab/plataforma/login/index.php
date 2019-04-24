<?php 
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user = $con->real_escape_string(htmlentities($_POST['usuario']));
	$pass = $con->real_escape_string(htmlentities($_POST['contra']));
	$candado = ' ';
	$str_u = strpos($user, $candado);
	$str_p = strpos($pass, $candado);
	if (is_int($str_u)) {
		$user = '';
	}else{
		$usuario = $user;
	}
	if (is_int($str_p)) {
		$pass = '';
	}else{
		$pass2 = sha1($pass);
	}
	if ($user == null && $pass == null) {
		header('location:../extend/alerta.php?msj=el formato no es correcto&c=salir&p=salir&t=error');
	}else{
		$sel = $con->query("SELECT nick, nombre, nivel, correo, foto, pass FROM usuario WHERE nick = '$usuario' AND pass = '$pass2' AND bloqueo = 1");
		$row = mysqli_num_rows($sel);
		if ($row == 1) {
			if ($var = $sel->fetch_assoc()) {
				$nick = $var['nick'];
				$contra = $var['pass'];
				$correo = $var['correo'];
				$nivel = $var['nivel'];
				$nombre = $var['nombre'];
				$foto = $var['foto'];
			}
			if ($nick == $usuario && $contra == $pass2 && $nivel == 'ADMINISTRADOR') {
				$_SESSION['nick'] = $nick;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['correo'] = $correo;
				$_SESSION['nivel'] = $nivel;
				$_SESSION['foto'] = $foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			}elseif ($nick == $usuario && $contra == $pass2 && $nivel == 'CLIENTE') {
				$_SESSION['nick'] = $nick;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['correo'] = $correo;
				$_SESSION['nivel'] = $nivel;
				$_SESSION['foto'] = $foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			}else{
				header('location:../extend/alerta.php?msj=no tienes el nivel necesario para acceder&c=salir&p=salir&t=error');
			}
		}else{
			header('location:../extend/alerta.php?msj=Usuario o contraseña incorrectos&c=salir&p=salir&t=error');
		}





	}
}else{
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
}
?>