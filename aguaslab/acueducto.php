<?php 
include 'header.php';
include 'nav.php';
?>
<!-- =========================
     END MAIN MENU
============================== --> 

<div class="booking" id="booking" style="background-image: url(images/fondos/acueducto.jpg);">
	<div class="container">
		<div class="row" >
			<div class="texto col-lg-6 col-md-6 col-sm-6 col-xs-12 " > 
				<h2 class="section-title" >
					<span class="bold700" >Análisis de Acueducto
 				</h2>
				<p> 
				La salud de tus usuarios es la prioridad número uno de tu gestión
				No dejes a la suerte el bienestar de quienes consumen el agua que tratas, un mal tratamiento 
				puede generar graves enfermedades y problemas sociales en tu comunidad.<br><br>
				Somos un aliado estratégico para que entregues un agua de calidad
				¡Contáctanos ahora mismo!
				</p> 
			</div>
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
============================== --><?php include 'servicioslider.php'; ?>
<!-- 
<div class="services" id="services">
		
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-primary-2" style="background-color: #084B8A;">
				<div class="service-icon"> <img src="images/001.png" ></div>
				<div class="service-title">
					<h3>Analisis Fisico Quimico</h3>
				</div>
				
			</div>
			
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-child-2" style="background-color: #045FB4;">
				<div class="service-icon"> <img src="images/002.png" ></div>
				<div class="service-title">
					<h3>Analisis Microbiologico</h3>
				</div>
				
			</div>
			
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-child-3" style="background-color: #0174DF;">
				<div class="service-icon"> <img src="images/003.png" ></div>
				<div class="service-title">
					<h3>Asesorias</h3>
				</div>
			</div>
			
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-child-4" style="background-color: #0080FF;">
				<div class="service-icon"> <img src="images/004.png" ></div>
				<div class="service-title">
					<h3>Cultivos de ambientes y superficies</h3>
				</div>
			</div>
			
</div>
<div class="services" id="services">
		
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-primary-2" style="background-color: #0B3861;">
				<div class="service-icon"> <img src="images/001.png" ></div>
				<div class="service-title">
					<h3>Analisis Fisico Quimico</h3>
				</div>
				
			</div>
			
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-child-2" style="background-color: #0B173B;">
				<div class="service-icon"> <img src="images/002.png" ></div>
				<div class="service-title">
					<h3>Analisis Microbiologico</h3>
				</div>
				
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-child-3" style="background-color: #0A122A;">
				<div class="service-icon"> <img src="images/003.png" ></div>
				<div class="service-title">
					<h3>Asesorias</h3>
				</div>
			</div>
			
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 service bg-child-4" style="background-color: #0A0A2A;">
				<div class="service-icon"> <img src="images/004.png" ></div>
				<div class="service-title">
					<h3>Cultivos de ambientes y superficies</h3>
				</div>
			</div>
			
</div> -->
<!-- =========================
     END SERVICES
============================== -->
 
<!-- =========================
     ABOUT
============================== -->

<!-- =========================
     END ABOUT
============================== --> 

<!-- =========================
     CERTIFICATES
============================== -->


<!-- =========================
     BOOKING FORM
============================== -->

<!-- =========================
     END BOOKING FORM
============================== --> 

<!-- =========================
     NUMBERS
============================== -->



<!-- =========================
    FOOTER
============================== -->
<?php include 'footer.php'; ?>