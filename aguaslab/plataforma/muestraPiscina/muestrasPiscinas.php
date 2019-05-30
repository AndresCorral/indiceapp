<?php
include '../conexion/conexion.php';

$user_id=$_SESSION['id'];
$temp=$_POST['temp'];
$ph=$_POST['ph'];
$alcalino=$_POST['alcalinidad'];
$dureza=$_POST['dureza'];
$productoPh=$_POST['productoPh'];
$cantidadPh=$_POST['cantidadPh'];
$medidaPh=$_POST['medidaPh'];
$cloroInicial=$_POST['cloroInicial'];
$cloroFinal=$_POST['cloroFinal'];
$productoCloro=$_POST['productoCloro'];
$cantidadCloro=$_POST['cantidadCloro'];
$medidaCloro=$_POST['medidaCloro'];
$productoAlcalinidad=$_POST['productoAlcalinidad'];
$cantidadAlcalinidad=$_POST['cantidadAlcalinidad'];
$medidaAlcalinidad=$_POST['medidaAlcalinidad'];
$productoDureza=$_POST['productoDureza'];
$cantidadDureza=$_POST['cantidadDureza'];
$medidaDureza=$_POST['medidaDureza'];
$tiempoRotacion=$_POST['tiempoRotacion'];
$medidaTiempoRotacion=$_POST['medidaTiempoRotacion'];
$tiempoFiltracion=$_POST['tiempoFiltracion'];
$medidaTiempoFiltracion=$_POST['medidaTiempoFiltracion'];

$desinfeccionFiltro=$_POST['desinfeccion_filtro'];
$cepilladoParedes=$_POST['cepillado_paredes'];
$lavadoZonaH=$_POST['lavado_humedas'];
$superCloracion=$_POST['super_cloracion'];
$productoLimpieza=$_POST['productoLimpieza'];
$cantidadLimpieza=$_POST['cantidadLimpieza'];
$medidaLimpieza=$_POST['medidaLimpieza'];



$lnAlcalino=log($alcalino);
$lnDureza=log($dureza);
$indcTemp = array(
	17 => 0.422 ,
	18 =>  0,
	19 => 0.466 ,
	20 => 0.487 ,
	21 => 0.509 ,
	22 => 0.529 ,
	23 => 0.55 ,
	24 => 0.57 ,
	25 => 0.59 ,
	26 => 0.61 ,
	27 => 0.629 ,
	28 => 0.648 ,
	29 => 0.667 ,
	30 => 0.685 ,
	31 => 0.703 ,
	32 => 0.721 ,
	33 => 0.738 ,
	34 => 0.755 ,
	35 => 0.772 ,
	36 => 0.789 ,
	37 => 0.805 ,
	38 => 0.82 ,
	39 => 0.836 ,
	40 => 0.851 ,
);
$arraySuma = array(
	0=>$ph,
	1=>$indcTemp[$temp],
	2=>(0.4349*$lnAlcalino)+0.0044,
	3=>(0.4348*$lnDureza)-0.395,
	4=>-12.1,
);
$indLangerier=array_sum ( $arraySuma );
$tendencia="";
if ($indLangerier>=-6.000 && $indLangerier <= -0.600 ) {
	$tendencia="TENDENCIAS CORROSIVAS";
}  if($indLangerier>=0.600 && $indLangerier <= 6.000){
	$tendencia="TENDENCIAS INCRUSTANTES";
} if($indLangerier>=-0.599 && $indLangerier <= 0.599){
	$tendencia="TOTALMENTE BALANCEADA";
}

$data = '{"indice" :'.number_format($indLangerier,3).',"tendencia" : "'.$tendencia.'"}';
/*var_dump("INSERT INTO bitacora(id, user_id, indiceLangerier, tendencia, ph, productoPh, cantidadPh, medidaPh, cloroInicial, cloroFinal, productoCloro, cantidadCloro, medidaCloro, alcalinidad, productoAlcalinidad, cantidadAlcalinidad, medidaAlcalinidad, dureza, productoDureza, cantidadDureza, medidaDureza, tiempoRotacion, medidaTiempoRotacion, tiempoFiltracion, medidaTiempoFiltracion, temperatura, desinfeccionFiltro, cepilladoParedes, lavadoZonaH, superCloracion, productoLimpieza, cantidadLimpieza, medidaLimpieza) VALUES  (0,".$user_id.",".number_format($indLangerier,3).",'".$tendencia."',".$ph.",'".$productoPh."','".$cantidadPh."','".$medidaPh."',".$cloroInicial.",".$cloroFinal.",'".$productoCloro."',".$cantidadCloro.",'".$medidaCloro."',".$alcalino.",'".$productoAlcalinidad."',".$cantidadAlcalinidad.",'".$medidaAlcalinidad."',".$dureza.",'".$productoDureza."',".$cantidadDureza.",'".$medidaDureza."',".$tiempoRotacion.",'".$medidaTiempoRotacion."',".$tiempoFiltracion.",'".$medidaTiempoFiltracion."',".$temp.",'".$desinfeccionFiltro."','".$cepilladoParedes."','".$lavadoZonaH."','".$superCloracion."','".$productoLimpieza."',".$cantidadLimpieza.",'".$medidaLimpieza."')");
exit();*/
$con->query("INSERT INTO bitacora(id, user_id, indiceLangerier, tendencia, ph, productoPh, cantidadPh, medidaPh, cloroInicial, cloroFinal, productoCloro, cantidadCloro, medidaCloro, alcalinidad, productoAlcalinidad, cantidadAlcalinidad, medidaAlcalinidad, dureza, productoDureza, cantidadDureza, medidaDureza, tiempoRotacion, medidaTiempoRotacion, tiempoFiltracion, medidaTiempoFiltracion, temperatura, desinfeccionFiltro, cepilladoParedes, lavadoZonaH, superCloracion, productoLimpieza, cantidadLimpieza, medidaLimpieza) VALUES  (0,".$user_id.",".number_format($indLangerier,3).",'".$tendencia."',".$ph.",'".$productoPh."','".$cantidadPh."','".$medidaPh."',".$cloroInicial.",".$cloroFinal.",'".$productoCloro."',".$cantidadCloro.",'".$medidaCloro."',".$alcalino.",'".$productoAlcalinidad."',".$cantidadAlcalinidad.",'".$medidaAlcalinidad."',".$dureza.",'".$productoDureza."',".$cantidadDureza.",'".$medidaDureza."',".$tiempoRotacion.",'".$medidaTiempoRotacion."',".$tiempoFiltracion.",'".$medidaTiempoFiltracion."',".$temp.",'".$desinfeccionFiltro."','".$cepilladoParedes."','".$lavadoZonaH."','".$superCloracion."','".$productoLimpieza."',".$cantidadLimpieza.",'".$medidaLimpieza."')");

$character = json_decode($data);
echo $data;

//echo json_encode($return_arr);
//$return["json"] = json_encode($return_arr);
 // echo json_encode($return);
?>
