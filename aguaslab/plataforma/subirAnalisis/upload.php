<?php
include '../conexion/conexion.php';	

	$cliente=$_POST['cliente'];
	$fechaToma=$_POST['fechaToma'];
	//$fileName = $cliente.'_'.date('Yjn_his').'.pdf';
	$fileName = $_FILES['archivoAnalisis']['name'];
	$fichero_subido = '../muestras/'.$fileName;
	
	if (move_uploaded_file($_FILES['archivoAnalisis']['tmp_name'], $fichero_subido)) {
		$con->query("INSERT INTO muestras(pdf, nit, ftoma) VALUES ('".$fileName."',".$cliente.",'".$fechaToma."')");
	    $_SESSION["message"] ='Registro guardado correctamente';
	} else {
	    $_SESSION["message"] = "¡No se pudo guardar el registro!\n";
	}
header('location:../subirAnalisis');
?>