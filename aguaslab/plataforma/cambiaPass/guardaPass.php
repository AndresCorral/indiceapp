<?php

	include '../conexion/conexion.php';

	$user_id = $con->real_escape_string($_POST['user_id']);
	$token = $con->real_escape_string($_POST['token']);
	$password = $con->real_escape_string($_POST['password']);
	$con_password = $con->real_escape_string($_POST['con_password']);
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	function cambiaPassword($password, $user_id, $token){

		global $con;

		$stmt = $con->prepare("UPDATE usuario SET pass = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);

		if($stmt->execute()){
			return true;
			} else {
			return false;
		}
	}
	if(validaPassword($password, $con_password))
	{

		$pass_hash = sha1($password);

		if(cambiaPassword($pass_hash, $user_id, $token))
		{
			echo "Contrase&ntilde;a Modificada <br> <a href='../' >Iniciar Sesion</a>";
			} else {

			echo "Error al modificar contrase&ntilde;a";

		}

		} else {

		echo 'Las contraseñas no coinciden';

	}

?>