<?php include('../extend/header.php');
include('../extend/permiso.php'); ?>
<link rel="stylesheet" href="../css/jquery.ezdz.css">

<?php
date_default_timezone_set('America/Bogota');
$sel = $con->query("SELECT * FROM usuario WHERE nivel='ADMINISTRACION'");
$row = mysqli_num_rows($sel);
 ?>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Cargar muestra</span>
				<form action="upload.php" class="form" method="post" enctype="multipart/form-data" id="formSubirPdf">
					<select name="cliente" id="cliente" class="required">
						<option disabled selected>Seleccione Cliente</option>
						<?php while($f = $sel->fetch_assoc()){ ?>
							<option value="<?php echo $f['nick']; ?>"><?php echo ($f['nick']." - ". $f['nombre']); ?></option>
						<?php } ?>
					</select>
					<input type="date" name="fechaToma" id="fechaToma" required>
					<center>
						<input name="archivoAnalisis" id="archivoAnalisis" type="file" accept="application/pdf" required>
					</center>
					<center style="margin-top: 25px;">
						<input type="submit" class="waves-effect waves-light btn" value="Subir">
						<input  type="reset" class="waves-effect waves-light btn red" value="limpiar">
					</center>
				</form>
			</div>
			<?php
				if (isset($_SESSION['message']) && $_SESSION['message'])
			    {
			      printf('<b>%s</b>', $_SESSION['message']);
			      unset($_SESSION['message']);
			    }
			   ?>
		</div>
	</div>
</div>


<?php include('../extend/scripts.php') ?>
<script src="../js/jquery.ezdz.js"></script>
<script>
	var form = document.getElementById("formSubirPdf");
	form.onsubmit = function(e){
		$( "select" ).each(function() {
		  if($( this ).hasClass("required")){
			  if($( this ).val()==null){
				alert("No puede estar ningún campo vacío");
				boolean=false;
				event.preventDefault();
				return false;
			  }
		  }
		});
	}
    $('[type="file"]').ezdz({
        text: 'Arrastre archivo de analisis',
        reject: function(file, errors) {
            if (errors.mimeType) {
                alert(file.name + ' deberia ser un archivo PDF.');
            }
        }
    });
</script>


