<?php include('../extend/header.php');
include('../extend/permiso.php'); ?>
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
if ($nivel=='PISCINERO') {
	$sel = $con->query("SELECT bitacora.id,usuario.nombre,bitacora.tendencia,bitacora.fechaHora FROM bitacora,usuario WHERE  bitacora.cliente_id IN (SELECT cliente_id FROM piscineros WHERE piscinero_id=".$_SESSION['id'].") AND usuario.id=bitacora.cliente_id");
}else if ($nivel=='ADMINISTRACION') {
	$sel = $con->query("SELECT bitacora.id,usuario.nombre,bitacora.tendencia,bitacora.fechaHora FROM bitacora,piscineros,usuario WHERE bitacora.user_id=usuario.id AND bitacora.cliente_id=".$_SESSION['id']." GROUP BY bitacora.id");
}else{
	$sel = $con->query("SELECT bitacora.id,usuario.nombre,bitacora.tendencia,bitacora.fechaHora FROM bitacora,piscineros,usuario WHERE bitacora.cliente_id=usuario.id GROUP BY bitacora.id");
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
							<?php 
							if ($nivel=='ADMINISTRACION') {
								echo ("<th>Nombre Piscinero</th>");
							}else{
								echo ("<th>Nombre Cliente</th>");
							}
							?>
							<th>Tendencia</th>
							<th>Fecha de toma</th>
							<th>Vista detallada</th>

						</tr>
					</thead>

					<?php $cont=1 ?>
					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $cont; ?></td>
							<td><?php echo $f['nombre']; ?></td>
							<td><?php echo $f['tendencia']; ?></td>
							<td><?php echo $f['fechaHora']; ?></td>
							<td><button onclick="modal(<?php echo $f['id']; ?>)" data-target="modalMuestra" class="btn modal-trigger"><i class="material-icons">remove_red_eye</i> Ver </button></td>
						<?php $cont++ ?>
						</tr>
					<?php } ?>
				</table>
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
<script type="text/javascript">
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
	            if (response.productoLimpieza==null) {
	            	response.productoLimpieza='NO';
	            }
	            if (response.cantidadLimpieza==null) {
	            	response.cantidadLimpieza='NO';
	            }
	            if (response.medidaLimpieza==null) {
	            	response.medidaLimpieza='';
	            }
	            var html="";
	            	html+=`<div class="resultMuestra">
							<h6> Fecha Hora</h6>
							<p> `+response.fechaHora+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Nombre Del Piscinero</h6>
							<p> `+response.nombrePiscinero+`</p>
						</div>`;
					html+=`<div class="resultMuestra">
							<h6> Piscina</h6>
							<p> `+response.nombre+`</p>
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
<?php include('../extend/scripts.php') ?>
