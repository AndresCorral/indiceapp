<?php 
if ($_SESSION['nivel'] != 'ADMINISTRADOR' && $_SESSION['nivel'] != 'CLIENTE' && $_SESSION['nivel'] != 'PISCINERO') {
	header('location:bloqueo.php');
}
?>