<?php include('../extend/header.php');
include('../extend/permiso.php'); ?>
<link rel="stylesheet" href="../css/jquery.ezdz.css">
<div class="row">
	<div class="col s12">
		<nav class="grey">
			<div class="nav-wrapper">
				<div class="input-field">

					<input type="search" id="buscar">

					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</div>
		</nav>
	</div>
</div>
<?php

$nivel=$_SESSION['nivel'];
if ($nivel=='ADMINISTRACION') {
	$sel = $con->query("SELECT id, nick, nombre, correo, nivel, bloqueo, foto FROM usuario,piscineros WHERE piscineros.piscinero_id=usuario.id AND piscineros.cliente_id=".$_SESSION['id']);
}
$row = mysqli_num_rows($sel);
 ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">muestras <?php echo $row; ?></span>
				<table>

					<thead>
						<tr class="cabecera">
							<th>#</th>
							<th>Nick</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Foto</th>
							<th>Desvincular</th>

						</tr>
					</thead>

					<?php $cont=1 ?>
					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $cont; ?></td>
							<td><?php echo $f['nick']; ?></td>
							<td><?php echo $f['nombre']; ?></td>
							<td><?php echo $f['correo']; ?></td>
							<td><img src="../usuarios/<?php echo $f['foto']; ?>" width="50" class="circle materialboxed" alt="<?php echo $f['nombre']; ?>"></td>
							<td><a href="#" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea desvincular al piscinero (<?php echo $f['nombre']; ?>)?', text: 'Los cambios se verán reflejados cuando el administrador de AguasLab verifique la solicitud!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, desvincular!' }).then(function () {  location.href='piscineros.php?param=desvincular&piscinero_id=<?php echo $f['id'] ?>'; })"><i class="material-icons">clear</i></a></td>
						<?php $cont++ ?>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
if ($nivel=='ADMINISTRACION') {
	$sel = $con->query("SELECT id, nick, nombre, correo, nivel, foto FROM usuario WHERE usuario.nivel='PISCINERO' AND id NOT IN (SELECT piscinero_id FROM piscineros WHERE cliente_id=".$_SESSION['id'].")");
}
?>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Vincular Piscinero</span>
				<form action="piscineros.php" class="form" method="post" enctype="multipart/form-data">
					<input type="hidden" name="param" id="param" value="vincular">
					<div class="input-field">
					<select id="piscinero_id" name="piscinero_id" required>
						<option disabled selected>Seleccione un piscinero para vincular </option>
						<?php while($f = $sel->fetch_assoc()){ ?>
							<option value="<?php echo $f['id']; ?>"><?php echo $f['nick']." - ".$f['nombre']; ?></option>
						<?php } ?>

					</select>
						<label for="nombre">Piscinero</label>
					</div>
					<button id="btn_guardar" type="submit" class="btn">Vincular <i class="material-icons">send</i></button>
				</form>
			</div>
		</div>
	</div>
</div>











<div id="modalMuestra" class="modal">
    <div class="modal-header">
      <h2>Detalle</h2>
    </div>
    <div class="modal-content">
		<div id="modalBody"></div>
	</div>
    <div class="modal-footer">
      <a href="#!" id="disagree" class="modal-close waves-effect waves-red btn-flat">Cerrar</a>
    </div>
  </div>
<?php include('../extend/scripts.php') ?>
<script src="../js/jquery.ezdz.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    	$('.materialboxed').materialbox();
  	});
  function modal(id){
  	console.log(id);
		$.ajax({
	        data:  {'id':id},
	        url:   'muestra.php',
	        dataType: 'json',
	        type:  'post',
	        success:  function (response) {
	        	console.log(response);
	        	response=response[0];
	        	console.log(response);
	            //response=JSON.parse(response);
	            var html="";
	            	html+=`<div class="resultMuestra">
							<h6> Fecha Hora</h6>
							<p> `+response.fechaHora+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> PH</h6>
							<p> `+response.ph+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Producto PH</h6>
							<p> `+response.productoPh+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cantidad PH</h6>
							<p> `+response.cantidadPh+` `+response.medidaPh+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cloro Inicial</h6>
							<p> `+response.cloroInicial+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cloro Final</h6>
							<p> `+response.cloroFinal+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Producto Cloro</h6>
							<p> `+response.productoCloro+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cantidad Cloro</h6>
							<p> `+response.cantidadCloro+` `+response.medidaCloro+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Alcalinidad</h6>
							<p> `+response.alcalinidad+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Producto Alcalinidad</h6>
							<p> `+response.productoAlcalinidad+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cantidad Alcalinidad</h6>
							<p> `+response.cantidadAlcalinidad+` `+response.medidaAlcalinidad+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Dureza</h6>
							<p> `+response.dureza+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Producto Dureza</h6>
							<p> `+response.productoDureza+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cantidad Dureza</h6>
							<p> `+response.cantidadDureza+` `+response.medidaDureza+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Tiempo Rotación</h6>
							<p> `+response.tiempoRotacion +` `+ response.medidaTiempoRotacion +`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Tiempo Filtración</h6>
							<p> `+response.tiempoFiltracion +` `+ response.medidaTiempoFiltracion+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Temperatura</h6>
							<p> `+response.temperatura+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Desinfección Filtro</h6>
							<p> `+response.desinfeccionFiltro+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cepillado Paredes</h6>
							<p> `+response.cepilladoParedes+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Lavado Zonas Humedas</h6>
							<p> `+response.lavadoZonaH+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Super Cloración</h6>
							<p> `+response.superCloracion+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Producto Limpieza</h6>
							<p> `+response.productoLimpieza+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Cantidad Limpieza</h6>
							<p> `+response.cantidadLimpieza+` `+response.medidaLimpieza+`</p>
						</div>`;
	            $("#modalBody").html(html);
	        }
	    });
	}
</script>
<script>
    $('[type="file"]').ezdz({
        text: 'Arrastre imagen de la piscina',
        reject: function(file, errors) {
            if (errors.mimeType) {
                alert(file.name + ' deberia ser una imagen.');
            }
        }
    });
</script>