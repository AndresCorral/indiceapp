<?php include('../extend/header.php');
include('../extend/permiso.php'); ?>
<?php
$sel = $con->query("SELECT * FROM usuario WHERE nivel='ADMINISTRACION'");
$row = mysqli_num_rows($sel);
 ?>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Alta de usuarios</span>
				<form action="ins_usuarios.php" class="form" method="post" enctype="multipart/form-data">
					<div class="input-field">
						<input type="number" name="nick" required autofocus title="DEBE CONTENER SOLO NUMEROS" pattern="[0-9]{5,15}" id="nick">
						<label for="nick">Numero de identificación</label>
					</div>
					<div class="validacion"></div>
					<div class="input-field">
						<input type="password" name="pass1" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" >
						<label for="pass1">Contraseña</label>
					</div>
					<div class="input-field">
						<input type="password" name="pass2" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" >
						<label for="pass2">Repetir Contraseña</label>
					</div>

					<select id="nivel" name="nivel" required>
						<option value="" disabled selected>Elige un nivel de usuario</option>
						<option value="SUPERUSUARIO">SUPERUSUARIO</option>
						<option value="ADMINISTRACION">ADMINISTRACION</option>
						<option value="PISCINERO">PISCINERO</option>
					</select>
					<div id="divCliente">					
						<select id="cliente" name="cliente">
							<option value="" disabled selected>Elige un cliente jefe del piscinero</option>
							<?php while($f = $sel->fetch_assoc()){ ?>
								<option value="<?php echo $f['id']; ?>"><?php echo $f['nombre'].' - ';echo $f['nick']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="input-field">
						<input type="text" name="nombre" required autofocus title="Nombre completo del usuario" pattern="[A-Zs ]+" id="nombre" onblur="may(this.value, this.id)">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field">
						<input type="email" name="correo" required autofocus title="Correo electronico" id="correo" >
						<label for="correo">Correo</label>
					</div>
					<div class="input-field file-field">
						<div class="btn">
							<span>Foto:</span>
							<input type="file" name="foto">
						</div>
						<div class="file-path-wrapper">
							<input type="text" class="file-path-validate">
						</div>
					</div>
					<button id="btn_guardar" type="submit" class="btn">Guardar <i class="material-icons">send</i></button>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col s12">
		<nav class="grey">
			<div class="nav-wrapper">
				<div class="input-field">

					<input type="search" id="buscar1">

					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</div>
		</nav>
	</div>
</div>

<?php
$sel = $con->query("SELECT * FROM usuario WHERE nivel <> 'PISCINERO'");
$row = mysqli_num_rows($sel);
 ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Usuarios <?php echo $row; ?></span>
				<table id="table1">

					<thead>
						<tr class="cabecera1">
							<th>número de identificación</th>
							<th>nombre</th>
							<th>correo</th>
							<th>nivel</th>
							<th></th>
							<th>foto</th>
							<th>bloqueo</th>
							<th>eliminar</th>
						</tr>
					</thead>

					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $f['nick']; ?></td>
							<td><?php echo $f['nombre']; ?></td>
							<td><?php echo $f['correo']; ?></td>
							<td>
								<form action="up_nivel.php" method="post">
									<input type="hidden" name="id" value="<?php echo $f['id']?>">
									<select name="nivel" required>
										<option value="" selected><?php echo $f['nivel']; ?></option>
										<option value="SUPERUSUARIO">SUPERUSUARIO</option>
										<option value="ADMINISTRACION">ADMINISTRACION</option>
										<option value="PISCINERO">PISCINERO</option>
									</select>
							</td>
							<td>

								<button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button></form>
							</td>
							<td><img src="<?php echo $f['foto']; ?>" width="50" class="circle" alt=""></td>
							<td>
								<?php if ($f['bloqueo']==1): ?>
									<a href="bloqueo_manual.php?us=<?php echo $f['id']; ?>&bl=<?php echo $f['bloqueo']; ?>"><i class="material-icons">toggle_on</i></a>
									<?php else: ?>
										<a href="bloqueo_manual.php?us=<?php echo $f['id']; ?>&bl<?php echo $f['bloqueo']; ?>"><i class="material-icons grey-text">toggle_off</i></a>
								<?php endif ?>
							</td>
							<td>
								<a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al usuario?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  location.href='eliminar_usuario.php?id=<?php echo $f['id'] ?>'; })"><i class="material-icons">clear</i></a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<nav class="grey">
			<div class="nav-wrapper">
				<div class="input-field">
					<input type="search" id="buscar2">
					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</div>
		</nav>
	</div>
</div>

<?php
$sel = $con->query("SELECT * FROM usuario WHERE nivel = 'PISCINERO'");
$row = mysqli_num_rows($sel);
 ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Piscineros <?php echo $row; ?></span>
				<table id="table2">

					<thead>
						<tr class="cabecera2">
							<th>Numero de identificación</th>
							<th>nombre</th>
							<th>correo</th>
							<th>nivel</th>
							<th></th>
							<th>foto</th>
							<th>bloqueo</th>
							<th>administradores</th>
						</tr>
					</thead>

					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $f['nick']; ?></td>
							<td><?php echo $f['nombre']; ?></td>
							<td><?php echo $f['correo']; ?></td>
							<td>
								<form action="up_nivel.php" method="post">
									<input type="hidden" name="id" value="<?php echo $f['id']?>">
									<select name="nivel" required>
										<option value="" selected><?php echo $f['nivel']; ?></option>
										<option value="SUPERUSUARIO">SUPERUSUARIO</option>
										<option value="ADMINISTRACION">ADMINISTRACION</option>
										<option value="PISCINERO">PISCINERO</option>
									</select>
							</td>
							<td>

								<button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button></form>
							</td>
							<td><img src="<?php echo $f['foto']; ?>" width="50" class="circle" alt=""></td>
							<td>
								<?php if ($f['bloqueo']==1): ?>
									<a href="bloqueo_manual.php?us=<?php echo $f['id']; ?>&bl=<?php echo $f['bloqueo']; ?>"><i class="material-icons">toggle_on</i></a>
									<?php else: ?>
										<a href="bloqueo_manual.php?us=<?php echo $f['id']; ?>&bl<?php echo $f['bloqueo']; ?>"><i class="material-icons grey-text">toggle_off</i></a>
								<?php endif ?>
							</td>
							<td>
								<button onclick="modal(<?php echo $f['id']; ?>)" data-target="modalMuestras" class="btn modal-trigger"><i class="material-icons">remove_red_eye</i> Ver </button>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="modalMuestras" class="modal">
	<div class="modal-header">
      <h3>Relación Piscinero Administrador</h3>
    </div>
    <div class="modal-content">
    	<div class="row">
			<div class="col s12">
				<nav class="grey">
					<div class="nav-wrapper">
						<div class="input-field">
							<input type="search" id="buscar3">
							<label for="buscar"><i class="material-icons">search</i></label>
							<i class="material-icons">close</i>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<table id="table3">
			<thead>
				<tr class="cabecera2">
					<th>Numero de identificación</th>
					<th>nombre</th>
					<th>correo</th>
					<th>foto</th>
					<th>fecha hora vinculación</th>
					<th>desvincular</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				</tr>
			</tbody>
		</table>
		<h3>Vincular Administrador</h3>
		<form id='formVincular'>
	    	<input id="piscinero_id" name="piscinero_id" type="hidden">
			<select id="vincularAdministrador" name="vincularAdministrador" required>
				
			</select>
			<input type="submit" value="Vincular">
		</form>
	</div>
    <div class="modal-footer">
      <a href="#!" id="disagree" class="modal-close waves-effect waves-red btn-flat">Cerrar</a>
    </div>
 </div>

<?php include('../extend/scripts.php') ?>
<script src="../js/validacion.js"></script>
<script type="text/javascript">
	$("#divCliente").hide();
	$('#cliente').removeAttr('required');
	$( "#nivel" ).change(function () {
 	if ($( this ).val()=='PISCINERO') {
 		$("#divCliente").show();
	    $("#cliente").attr('required','');
 	}else{
 		$("#divCliente").hide();
		$('#cliente').removeAttr('required');
 	}   
  })
  .change();
</script>
<script type="text/javascript">
	$('#buscar2').keyup(function(event) {
  		var contenido = new RegExp($(this).val(), 'i');
  		$('#table2 tr').hide();
  		$('#table2 tr').filter(function(){
  			return contenido.test($(this).text());
  		}).show();
  		$('.cabecera2').attr('style','');
  	});
  	$('#buscar1').keyup(function(event) {
  		var contenido = new RegExp($(this).val(), 'i');
  		$('#table1 tr').hide();
  		$('#table1 tr').filter(function(){
  			return contenido.test($(this).text());
  		}).show();
  		$('.cabecera1').attr('style','');
  	});
  	$('#buscar3').keyup(function(event) {
  		var contenido = new RegExp($(this).val(), 'i');
  		$('#table3 tr').hide();
  		$('#table3 tr').filter(function(){
  			return contenido.test($(this).text());
  		}).show();
  		$('.cabecera3').attr('style','');
  	});
</script>
<script type="text/javascript">
	$( "#formVincular" ).submit(function() {
	   event.preventDefault();
	   vincular(this.piscinero_id.value,this.vincularAdministrador.value)
	});
	function modal(id){
		$("#table3 tbody tr").remove(); 
		$("#vincularAdministrador option").remove(); 
		$.ajax({
	        data:  {'param':'mostrar','id':id},
	        url:   'piscineros.php',
	        dataType: 'json',
	        type:  'post',
	        success:  function (response) {
	        	tabla=response[0];
	        	admins=response[1];
	        	for (var i = 0; i < tabla.length; i++) {
	        		var tr=`<tr>
							<td>`+tabla[i].nick+`</td>
							<td>`+tabla[i].nombre+`</td>
							<td>`+tabla[i].correo+`</td>
							<td><img src="`+tabla[i].foto+`" width="50" class="circle" alt=""></td>
							<td>`+tabla[i].fechaVinculacion+`</td>
							<td>
								<a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al usuario?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  desvincular(`+tabla[i].piscinero_id+`,`+tabla[i].id+`); })"><i class="material-icons">clear</i></a>
							</td>
							</tr>
	        		`
	        		$('#table3').append(tr)
	        	}
	        	$('#vincularAdministrador').append('<option value="" selected disabled>Seleccione un administrador</option>')
	        	for (var i = 0; i < admins.length; i++) {
	        		var option='<option value="'+admins[i].id+'">'+admins[i].nick+' - '+admins[i].nombre+'</option>'
	        		$('#vincularAdministrador').append(option);
	        	}
				$('#piscinero_id').val(id);
	        	$('select').formSelect();
	        }
	    });
	}
	function desvincular(piscinero_id,admin_id){
		$.ajax({
	        data:  {'param':'desvincular','piscinero_id':piscinero_id,'admin_id':admin_id},
	        url:   'piscineros.php',
	        dataType: 'json',
	        type:  'post',
	        success:  function (response) {
				swal("Desvinculación Correcta");
				setTimeout(function(){location.reload()},3000);
				
	        }
	    });
	}
	function vincular(piscinero_id,admin_id){
		$.ajax({
	        data:  {'param':'vincular','piscinero_id':piscinero_id,'admin_id':admin_id},
	        url:   'piscineros.php',
	        dataType: 'json',
	        type:  'post',
	        success:  function (response) {
	        	modal(piscinero_id);
				swal("Vinculación Correcta");
				setTimeout(function(){location.reload()},3000);
	        }
	    });
	}
</script>

</body>
</html>
