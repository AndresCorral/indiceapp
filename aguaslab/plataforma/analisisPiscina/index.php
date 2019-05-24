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
$sel = $con->query("SELECT bitacora.id,usuario.nombre,bitacora.tendencia,bitacora.fechaHora FROM bitacora,piscineros,usuario WHERE bitacora.user_id=piscineros.piscinero_id AND piscineros.cliente_id=usuario.id");
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
							<th>Nombre Cliente</th>
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
	        url:   'muestra',
	        dataType: 'json',
	        type:  'post',
	        success:  function (response) {
	        	console.log(response);
	        	response=response[0];
	        	console.log(response);
	            //response=JSON.parse(response);
	            var html="";
	            	html+=`<div clase="resultMuestra">
							<h6> Fecha Hora</h6>
							<p> `+response.fechaHora+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> PH</h6>
							<p> `+response.ph+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Producto PH</h6>
							<p> `+response.productoPh+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cantidad PH</h6>
							<p> `+response.cantidadPh+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cloro Inicial</h6>
							<p> `+response.cloroInicial+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cloro Final</h6>
							<p> `+response.cloroFinal+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Producto Cloro</h6>
							<p> `+response.productoCloro+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cantidad Cloro</h6>
							<p> `+response.cantidadCloro+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Alcalinidad</h6>
							<p> `+response.alcalinidad+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Producto Alcalinidad</h6>
							<p> `+response.productoAlcalinidad+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cantidad Alcalinidad</h6>
							<p> `+response.cantidadAlcalinidad+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Dureza</h6>
							<p> `+response.dureza+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Producto Dureza</h6>
							<p> `+response.productoDureza+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cantidad Dureza</h6>
							<p> `+response.cantidadDureza+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Hora Rotación</h6>
							<p> `+response.horaRotacion+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Hora Filtración</h6>
							<p> `+response.horaFiltracion+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Temperatura</h6>
							<p> `+response.temperatura+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Desinfección Filtro</h6>
							<p> `+response.desinfeccionFiltro+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cepillado Paredes</h6>
							<p> `+response.cepilladoParedes+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Lavado Zonas Humedas</h6>
							<p> `+response.lavadoZonaH+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Super Cloración</h6>
							<p> `+response.superCloracion+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Producto Limpieza</h6>
							<p> `+response.productoLimpieza+`</p>
						</div>`;
					html+=`<div clase="resultMuestra">
							<h6> Cantidad Limpieza</h6>
							<p> `+response.cantidadLimpieza+`</p>
						</div>`;

	            $("#modalBody").html(html);
	        }
	    });
	}
</script>
<?php include('../extend/scripts.php') ?>