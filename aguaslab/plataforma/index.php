<?php @session_start();
if (isset($_SESSION['nick'])) {
	header('location:inicio');
}
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="shortcut icon" href="fav.png">
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<meta name="viewport" content="width=device-whidth, initial-scale=1.0">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Aguaslab</title>
</head>
<body style="background-color: #d8ebfd;">
	<main>
		<div class="container">
			<div class="row" style="margin-top: 50px;">
				<div class="col s12">
					<div class="card">
						<div class="card-content">
							<span style="font-size: 40px; font-weight: bold;" class="card-title center">Bienvenido a<br><br><img src="https://aguaslab.co/images/logo.png" alt=""></span>
							<p class="center" style="font-size: 40px; ">
							 Para ver tus resultados inicia sesión </p>

						</div>
					</div>
				</div>
				<div class="col s12">
					<div class="card">
						<div class="card-content">
							<span class="card-title">Inicio de sesión</span>
							<form action="login/index.php" autocomplete="off" method="post">
								<div class="input-field">
									<i class="material-icons prefix">perm_identity</i>
									<input type="text" name="usuario" id="usuario" pattern="[A-Za-z0-9]{8,15}" required autofocus>
									<label for="usuario">Usuario</label>
								</div>
								<div class="input-field">
									<i class="material-icons prefix">vpn_key</i>
									<input type="password" name="contra" id="contra" pattern="[A-Za-z0-9]{8,15}" required>
									<label for="contra">Contraseña</label>
								</div>
								<div class="input-field">
									<button class="btn waves-effect waves-light">acceder</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="js/materialize.min.js"></script>