<?php include '../extend/header.php'; 

?>

	<div class="row">
		<div class="con s12">
			<div class="card">
			    <div class="card-content">
			      <h1>Editar perfil</h1>
			    </div>
			    <div class="card-tabs">
			      <ul class="tabs tabs-fixed-width">
			        <li class="tab"><a class="active" href="#datos">Datos</a></li>
			        <li class="tab"><a href="#pass">Contraseña</a></li>
			      </ul>
			    </div>
			    <div class="card-content grey lighten-4">
			      <div id="datos">
					<form action="up_perfil.php" class="form" method="post" enctype="multipart/form-data">



					<div class="input-field">
						<input type="text" name="nombre" required autofocus title="Nombre completo del usuario" pattern="[A-Zs ]+" id="nombre" onblur="may(this.value, this.id)" value="<?php echo $_SESSION['nombre'] ?>">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field">
						<input type="email" name="correo" required autofocus title="Correo electronico" id="correo" value="<?php echo $_SESSION['correo'] ?>">
						<label for="correo">Correo</label>
					</div>
					
					<button type="submit" class="btn">Editar <i class="material-icons">send</i></button>
				</form>
			      </div>
			      <div id="pass">
					
					<div class="input-field">
						<form action="up_pass.php" class="form" method="post" enctype="multipart/form-data">
						<input type="password" name="pass1" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" >
						<label for="pass1">Contraseña</label>
					</div>
					<div class="input-field">
						<input type="password" name="pass2" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" >
						<label for="pass2">Repetir Contraseña</label>
							<button id="btn_guardar" type="submit" class="btn">Editar <i class="material-icons">send</i></button>
						</form>
					</div>
			      </div>
			    </div>
			  </div>
		</div>
	</div>

<?php include '../extend/scripts.php'; ?>
<script type="../js/validacion.js"></script>
</body>
</html>