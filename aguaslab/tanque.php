<?php 
include 'header.php';
include 'nav.php';
?>
<!-- =========================
     END MAIN MENU
============================== --> 

<div class="booking" id="booking" style="background-image: url(images/fondos/tanque.jpg);">
	<div class="container">
		<div class="row" >
			<div class="texto col-lg-6 col-md-6 col-sm-6 col-xs-12" > <h2 class="section-title" >
					<span class="bold700" >Análisis de agua en tanques de almacenamiento 
 </h2>
				<p>¿Estás seguro que esa agua que permanece durante mucho tiempo almacenada esta en
condiciones de ser usada? <br><br>¿Le aplicas lo necesario para mantenerla limpia y sana? <br><br>¡Realicemos
un análisis para saberlo!


 </p> </div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 booking-form">
				<h2 class="section-title" style="text-align:center;>
					<span class="bold700">Escribenos</span>
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
							<button class="btn btn-primary">Enviar</button>
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