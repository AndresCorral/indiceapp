<?php 
include 'header.php';
include 'nav.php';
?>
<!-- =========================
     END MAIN MENU
============================== --> 


<!-- =========================
     HEADER SLIDER
============================== -->
<div id="myCarousel2" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel2" data-slide-to="1"></li>
    <li data-target="#myCarousel2" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/slide_03.jpg" alt="">
    </div>
        <div class="item">
      <img src="images/slide_03.jpg" alt="">
    </div>
        <div class="item">
      <img src="images/slide_03.jpg" alt="">
    </div>


  <!-- Left and right controls -->

</div>

<!-- =========================
     END HEADER SLIDER
============================== --> 
<div style="width: 100%; height: 50px;"></div>
<!-- =========================
     SERVICES
============================== --><?php include 'servicioslider.php'; ?>
<div class="about">
	<div class="container">
		<div class="row"> 
			
			<!-- ABOUT TEXT -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 about-text">
				<h2 class="section-title">
					<span class="bold700">Acerca del laboratorio</h2>
				<p style="font-size: 20px;">Aguaslab es un laboratorio el cual brinda un control y calidad para aguas potables, envasadas de consumo y recreativas de la industria hotelera, conjuntos residenciales, acueductos municipales, alimentos y bebidas, demás que requieran controlar la calidad del agua potable en la región de Cundinamarca</p>
				
				<p style="font-size: 20px;">Con el propósito de cumplir con esas necesidades surge la idea de constituir el  laboratorio dedicado al control de calidad desde julio de 1992; siendo este el primer paso al inicio de lo que hoy somos. Sin embargo mirando y analizando la gran acogida y la necesidad a nivel regional, el laboratorio abre sus puertas como una empresa independiente el 11 de mayo del 2002, con el fin de responder a una realidad cada vez más incipiente </p>
			</div>
			
			<!-- ABOUT BACKGROUND -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 about-bg"> </div>
		</div>
	</div>
</div>
<!-- =========================
     END ABOUT
============================== --> 

<!-- =========================
     CERTIFICATES
============================== -->


<!-- =========================
     BOOKING FORM
============================== -->
<div class="booking" id="booking">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> </div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 booking-form">
				<h2 class="section-title">
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
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-form-item name">
							<input type="text" name="nit" id="name" data-validation="required" placeholder="N.I.T." />
							<div class="help help-sm help-red">!</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-form-item name">
							<input type="text" name="direccion" id="name" data-validation="required" placeholder="Direccion" />
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
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 booking-form-item">
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
     END BOOKING FORM
============================== --> 

<!-- =========================
     NUMBERS
============================== -->



<!-- =========================
    FOOTER
============================== -->
</div><?php include'footer.php';?>