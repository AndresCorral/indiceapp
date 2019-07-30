<?php

	include '../conexion/conexion.php';
	$message="";
	if(empty($_GET['user_id'])){
		header('Location: ../');
	}

	if(empty($_GET['token'])){
		header('Location: ../');
	}
	function verificaTokenPass($user_id, $token){
		global $con;

		$stmt = $con->prepare("SELECT bloqueo FROM usuario WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	if(count($_GET)>0){
		$user_id = $con->real_escape_string($_GET['user_id']);
		$token = $con->real_escape_string($_GET['token']);
		if(!verificaTokenPass($user_id, $token))
		{
			echo 'No se pudo verificar los Datos <a href="../" >Iniciar Sesion</a>';
			exit;
		}
	}
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	function cambiaPassword($password, $user_id, $token){

		global $con,$message;
		$stmt = $con->prepare("UPDATE usuario SET pass = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);

		if($stmt->execute()){
			return true;
		} else {
			$message = "Error al modificar contrase&ntilde;a";
			return false;
		}

	}
	if(count($_POST)>0){
		$user_id = $con->real_escape_string($_POST['user_id']);
		$token = $con->real_escape_string($_POST['token']);
		$password = $con->real_escape_string($_POST['password']);
		$con_password = $con->real_escape_string($_POST['con_password']);
		if(validaPassword($password, $con_password))
		{
			$contra = strlen($password);
			if ($contra < 8 || $contra > 15) {
				$message = "La contrase&ntilde;a debe contener entre 8 y 15 caracteres";
			}else{
				$pass_hash = sha1($password);
				if(cambiaPassword($pass_hash, $user_id, $token))
				{
					header('location:../extend/alerta.php?msj=Contraseña Modificada&c=salir&p=salir&t=');
				}
			}
		} else {
			$message = 'Las contraseñas no coinciden';
		}
	}
?>

<html>
	<head>
		<title>Cambiar Password</title>

		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>

	</head>

	<body>
		<?php echo $message ?>
		<div class="container">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Cambiar Password</div>
				<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />

					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />

					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Nuevo Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>

					<div class="form-group">
						<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
						</div>
					</div>

					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
		</div>
	</body>
</html>