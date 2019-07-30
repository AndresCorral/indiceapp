<?php

	include '../conexion/conexion.php';
	//include '../extend/permiso.php';

	session_start();

	function emailExiste($email)
	{
		global $con;
		$stmt = $con->prepare("SELECT id FROM usuario WHERE correo = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
	function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}

	function generateToken()
	{
		$gen = sha1(uniqid(mt_rand(), false));
		return $gen;
	}
	//función para guardar token de password en la tabla usuarios
	function generaTokenPass($user_id)
	{
		global $con;

		$token = generateToken();

		$stmt = $con->prepare("UPDATE usuario SET token_password=?, password_request=1 WHERE id = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();

		return $token;
	}

	function getValor($campo, $campoWhere, $valor)
	{
		global $con;

		$stmt = $con->prepare("SELECT $campo FROM usuario WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;
		}
	}
	function enviarEmail($email, $nombre, $asunto, $cuerpo){
		ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "_mainaccount@aguaslab.co";
        $headers = "From:" . $from;
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		if(mail($email,$asunto,$cuerpo, $headers)){
		return true;
		}else{
		return false;
		}
	}

	if(isset($_SESSION["id"])){
		header("Location: ../");
	}

	$errors = array();


	if(count($_POST)>0)
	{
		$email = $con->real_escape_string($_POST['email']);
		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}

		if(emailExiste($email))
		{
			$user_id = getValor('id', 'correo', $email);
			$nombre = getValor('nombre', 'correo', $email);

			$token = generaTokenPass($user_id);

			$url = 'http://'.$_SERVER["SERVER_NAME"].'/plataforma/cambiaPass?user_id='.$user_id.'&token='.$token;

			$asunto = 'Recuperar Password - Sistema de Usuarios';
			$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>Cambiar Password</a>";

			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
				echo "<a href='../' >Iniciar Sesion</a>";
				exit;
			}
		} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}
?>
<html>
	<head>
		<title>Recuperar Password</title>

		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
	</head>

	<body>

		<div class="container">
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar Password</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../">Iniciar Sesi&oacute;n</a></div>
					</div>

					<div style="padding-top:30px" class="panel-body" >

						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>
							</div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>