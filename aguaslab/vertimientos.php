<?php 
include 'header.php';
include 'nav.php';
?>
<!-- =========================
     END MAIN MENU
============================== --> 

<div class="booking" id="booking" style="background-image: url(images/fondos/vertimiento.jpg);">
	<div class="container">
		<div class="row" >
			<div class="texto col-lg-6 col-md-6 col-sm-6 col-xs-12" > <h2 class="section-title" >
					<span class="bold700" >Análisis de vertimientos
 </h2>
				<p >¿Buscas reducir y controlar las sustancias contaminantes que llegan a los ríos, embalses, lagunas,
cuerpos de agua natural o artificial de agua dulce, y al sistema de alcantarillado público? <br><br>
¡Valoramos tu compromiso con el Medio Ambiente! <br><br>
Te servimos de enlace para que realices los análisis de vertimientos y de esta forma, aportemos al
mejoramiento de la calidad del agua y juntos trabajemos en la recuperación ambiental de las
arterias fluviales del país.

 </p> </div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 booking-form">
				<h2 class="section-title" style="text-align:center; ">
					<span class="bold700" >Escribenos</span>
				</h2>
				<form class="bookform-form" action="js/sendmail-book.php" role="form" method="post"> 
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-form-item name">
							<input type="text" name="name" id="name" data-validation="required" placeholder="Nombre solicitante / representante legal" />
							<div class="help help-sm help-red">!</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-form-item name">
							<input type="text" name="entidad" id="name" data-validation="required" placeholder="Entidad"" />
							<div class="help help-sm help-red">!</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 booking-form-item phone">
							<input type="text" name="phone" id="phone" data-validation="required" placeholder="Telefono" />
							<div class="help help-sm help-red">!</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 booking-form-item email">
							<input type="text" name="email" id="email" placeholder="Correo" />
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-form-item">
							<textarea name="message" id="message" placeholder="Tu Mensaje"></textarea>
						</div>
					</div>
					
					<div class="row latest-row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12booking-form-item">
							<button class="btn btn-primary" style="width:100%;">Enviar</button>
						</div>
						
					</div>
					<div class="form-messages"></div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- =========================
     HEADER SLIDER
============================== -->

<!-- =========================
     END HEADER SLIDER
============================== --> 
<div style="width: 100%; height: 50px;"></div>
<!-- =========================
     SERVICES
============================== -->
<?php include 'servicioslider.php'; ?>
<?php include'footer.php';?>