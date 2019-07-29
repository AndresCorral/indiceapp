<?php
include '../conexion/conexion.php';

$user_id=$_SESSION['id'];
if (isset($_POST['param'])) {
	$param=$_POST['param'];
	$piscinero_id=$_POST['piscinero_id'];
}else if (isset($_GET['param'])){
	$param=$_GET['param'];
	$piscinero_id=$_GET['piscinero_id'];
}
$sel = $con->query("SELECT id, nick, nombre, correo, nivel, bloqueo, foto FROM usuario WHERE usuario.id=".$user_id);
$nombreAdmnistrador=$nickAdmnistrador="";
while($f = $sel->fetch_assoc()){
	$nombreAdmnistrador=$f['nombre'];
	$nickAdmnistrador=$f['nick'];
}
$sel = $con->query("SELECT id, nick, nombre, correo, nivel, bloqueo, foto FROM usuario WHERE usuario.id=".$piscinero_id);
$nombrePiscinero=$nickPiscinero="";
while($f = $sel->fetch_assoc()){
	$nombrePiscinero=$f['nombre'];
	$nickPiscinero=$f['nick'];
}

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "_mainaccount@aguaslab.co";
$to = "programacion@aguaslab.co";
$headers = "From:" . $from;
switch ($param) {
	case 'vincular':
		$subject = "Solicitud de vinculación";
		$message = "El administrador ".$nombreAdmnistrador." - ".$nickAdmnistrador." solicita la vinculación del piscinero ".$nombrePiscinero." - ".$nickPiscinero." en su organización.";
		mail($to,$subject,$message, $headers);
		header('location:../extend/alerta.php?msj=El piscinero ha sido vinculado correctamente&c=piscinero&p=in&t=success');
		break;
	case 'desvincular':
		$subject = "Solicitud de desvinculación";
		$message = "El administrador ".$nombreAdmnistrador." - ".$nickAdmnistrador." solicita la desvinculación  del piscinero ".$nombrePiscinero." - ".$nickPiscinero." en su organización.";
		mail($to,$subject,$message, $headers);
		header('location:../extend/alerta.php?msj=El piscinero ha sido desvinculado correctamente&c=piscinero&p=in&t=success');
		break;

}
?>