<?php  include '../conexion/conexion.php'; 
$id= $con-> real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM usuario WHERE id='$id' ");
if ($del) {
	header('location:../extend/alerta.php?msj=El usuario a sido eliminado&c=us&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=El usuario a no ha podido ser eliminado&c=us&p=in&t=error');
}
$con->close();
?>