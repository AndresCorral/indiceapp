<?php
include '../conexion/conexion.php';

$correo = $con->real_escape_string($_POST['correo']);


$sel = $con->query("SELECT id FROM usuario WHERE correo = '$correo' ");
$row = mysqli_num_rows($sel);
if ($row != 0) {
	echo "<label style='color: red;'>El correo ya existe</label>";
}else{
	echo "<label style='color: green;'>El correo esta disponible</label>";
}
$con->close();
?>