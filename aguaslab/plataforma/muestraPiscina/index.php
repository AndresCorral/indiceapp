<?php include('../extend/header.php');
include('../extend/permisoPiscina.php');
?>

<link rel="stylesheet" href="css.css">

<?php
//include 'muestrasPiscinas.php';
date_default_timezone_set('America/Bogota');

?>
<body>
<form id="muestraForm" action="">
		<div class="container">
			<div class="formulario">
					<div class="uno">
						<label for="">Fecha y hora: <?php echo date('j/n/Y h:i:s'); ?> </label><!-- Esto es solo para mostrar al usuario, almacenar en la base de datos la fecha -->
					</div>
					<div class="uno">
						<label for="ph">PH: </label><br>
						<input required  type="number" step="any" name="ph" id="ph" value="">
					</div>
					<div class="uno dos">
						<div>
							<label for="productoPh">Producto: </label><br>
							<input required  type="text" name="productoPh" value="">
						</div>
						<div>

							<label for="cantidadPh">Cantidad: </label><br>
							<input required  type="number" name="cantidadPh" value="">
						</div>
					</div>
					<div class="uno dos">
						<div>
							<label for="cloroInicial">Cloro inicial: </label><br>
							<input required  type="text" name="cloroInicial" value="">
						</div>
						<div>

							<label for="cloroFinal">Cloro final: </label><br>
							<input required  type="text" name="cloroFinal" value="">
						</div>
					</div>
					<div class="uno dos">
						<div>
							<label for="productoCloro">Producto: </label><br>
							<input required  type="text" name="productoCloro" value="">
						</div>
						<div>

							<label for="cantidadCloro">Cantidad: </label><br>
							<input required  type="number" name="cantidadCloro" value="">
						</div>
					</div>
					<div class="uno">
						<label for="alcalinidad">Alcalinidad: </label><br>
						<input required  type="number" step="any" name="alcalinidad" id="alcalinidad" value="">

					</div>
					<div class="uno dos">
						<div>
							<label for="productoAlcalinidad">Producto: </label><br>
							<input required  type="text" name="productoAlcalinidad" value="">
						</div>
						<div>

							<label for="cantidadAlcalinidad">Cantidad: </label><br>
							<input required  type="number" name="cantidadAlcalinidad" value="">
						</div>
					</div>
					<div class="uno">
						<label for="dureza">Dureza: </label><br>
						<input required  type="number" step="any" name="dureza" id="dureza" value="">

					</div>
					<div class="uno dos">
						<div>
							<label for="productoDureza">Producto: </label><br>
							<input required  type="text" name="productoDureza" value="">
						</div>
						<div>

							<label for="cantidadDureza">Cantidad: </label><br>
							<input required  type="number" name="cantidadDureza" value="">
						</div>
					</div>
					<div class="uno dos">
						<div>
							<label for="horaRotacion">Horas de rotación: </label><br>
							<input required  type="time" name="horaRotacion" value="">
						</div>
						<div>

							<label for="horaFiltracion">Horas de filtracion: </label><br>
							<input required  type="time" name="horaFiltracion" value="">
						</div>
					</div>
					<div class="uno dos">
						<div>
							<label for="temp">Temperatura en grados celsius: </label><br>
							<input required type="number" name="temp" id="temp" value="" >
						</div>
					</div>
					<div class="uno">
						<div id="resultado">

						</div>
					</div>
			</div>
		</div>
		<div class="container">

				<div class="uno dos">
					<fieldset>
				        <legend>Desinfeccion del filtro</legend>
				        <div>
							<label>
				            	<input required type="radio" name="desinfeccion_filtro" value="SI" ><span>SI</span>
				            </label>
				        </div>
				        <div>
				        	<label>
				            	<input required type="radio" name="desinfeccion_filtro" value="NO"><span> No</span>
				            </label>
				        </div>

			    	</fieldset>
			    	<fieldset>
				        <legend>Cepillado de paredes</legend>
				        <div>
				        	<label>
				            	<input required type="radio" name="cepillado_paredes" value="SI" ><span>SI</span>
				            </label>
				        </div>
				        <div>
				        	<label>
				            	<input required type="radio" name="cepillado_paredes" value="NO"><span> No</span>
				            </label>
				        </div>

			    	</fieldset>
			    	<fieldset>
				        <legend>Lavado Zonas Húmedas</legend>
				        <div>
				        	<label>
				            	<input required type="radio" name="lavado_humedas" value="SI" ><span>SI</span>
				            </label>
				        </div>
				        <div>
				        	<label>
				            	<input required type="radio" name="lavado_humedas" value="NO"><span> No</span>
				            </label>
				        </div>

			    	</fieldset>
			    	<fieldset>
				        <legend>Super cloración</legend>
				        <div>
				        	<label>
				            	<input required type="radio" name="super_cloracion" value="SI"/><span><span>SI</span></span>
				            </label>
				        </div>
				        <div>
				        	<label>
				            	<input required type="radio" name="super_cloracion" value="NO"><span> No</span>
				            </label>
				        </div>

			    	</fieldset>
	    		</div>
	    		<div class="uno dos">
						<div>
							<label for="productoLimpieza">Producto </label><br>
							<input required type="text" name="productoLimpieza" value="" >
						</div>
						<div>

							<label for="cantidadLimpieza">Cantidad: </label><br>
							<input required type="number" name="cantidadLimpieza" value="" >
						</div>
				</div>

				<center>
					<input type="submit" class="waves-effect waves-light btn" value="Calcular">
					<input  type="reset" class="waves-effect waves-light btn red" value="limpiar">
				</center>
		</div>
	</form>


  <!-- Modal Structure -->
  <div id="modalMuestras" class="modal">
    <div class="modal-content">
      <h2>¿esta seguro de hacer el calculo?</h2>
      <div id="modalBody"></div>
    </div>
    <div class="modal-footer">
      <a href="#!" id="disagree" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
      <button onclick="aceptar()" id="agree" class="waves-effect waves-green btn-flat">Aceptar</button>
    </div>
  </div>

<script type="text/javascript">
	var form = document.getElementById("muestraForm");
	form.onsubmit = function(e){
		var html="<h4>PH: "+$("#ph").val()+"</h4>"
		html+="<h4>Temperatura: "+$("#temp").val()+" ºC</h4>"
		html+="<h4>Alcalinidad: "+$("#alcalinidad").val()+"</h4>"
		html+="<h4>Dureza: "+$("#dureza").val()+"</h4>"
		$("#modalBody").html(html);
		$('#modalMuestras').modal('open');
		e.preventDefault();

	}
	function aceptar(){
		var formData= $("#muestraForm").serialize();
		$.ajax({
	        data:  formData,
	        url:   'muestrasPiscinas',
	        dataType: 'html',
	        type:  'post',
	        beforeSend: function () {
	            //mostramos gif "cargando"
	            jQuery('#loading_spinner').show();
	            //antes de enviar la petición al fichero PHP, mostramos mensaje
	            jQuery("#resultado").html("Déjame pensar un poco...");
	        },
	        success:  function (response) {
	            response=JSON.parse(response);
	        	var html='<label for="indiceLangerirt" id="indiceLangerirt">Indice Langerier: '+response.indice+'</label><br> <label for="tendenciaAgua" id="tendenciaAgua"> Tendencia del agua: '+response.tendencia+'</label><br>'
	            $("#resultado").html(html);
	            $('#muestraForm')[0].reset();
	            $('#modalMuestras').modal('close');


	        }
	    });
	}
</script>


</body>


<?php include('../extend/scripts.php') ?>