<?php 
if ($_SESSION['nivel'] != 'SUPERUSUARIO' && $_SESSION['nivel'] != 'ADMINISTRACION' && $_SESSION['nivel'] != 'PISCINERO') {
	header('location:bloqueo.php');
}
?>
