<?php
include '../conexion/conexion.php';

$param=null;
if (isset($_POST['param'])) {
	$param=$_POST['param'];
}
switch ($param) {
	case 'getPiscinas':
		$admin_id=$_POST['admin_id'];
		$sel = $con->query("SELECT * FROM piscinas WHERE cliente_id=".$admin_id);
		$data = array();
		while($r = $sel->fetch_assoc()){
			$data[] = $r;
		}
    	echo json_encode($data);
		break;
	default:



$user_id=$_SESSION['id'];
$admin_id=$_POST['administrador'];
$piscina_id=$_POST['piscina'];
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
if (isset($_POST['productoLimpieza'])) {
	$productoLimpieza="'".$_POST['productoLimpieza']."'";
}else{
	$productoLimpieza='NULL';
}
if (isset($_POST['cantidadLimpieza'])) {
	$cantidadLimpieza=$_POST['cantidadLimpieza'];
}else{
	$cantidadLimpieza='NULL';
}
if (isset($_POST['medidaLimpieza'])) {
	$medidaLimpieza="'".$_POST['medidaLimpieza']."'";
}else{
	$medidaLimpieza='NULL';
}



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
	$tendencia="CORROSIVAS";
}  if($indLangerier>=0.600 && $indLangerier <= 6.000){
	$tendencia="INCRUSTANTES";
} if($indLangerier>=-0.599 && $indLangerier <= 0.599){
	$tendencia="TOTALMENTE BALANCEADA";
}

$data = '{"indice" :'.number_format($indLangerier,3).',"tendencia" : "'.$tendencia.'"}';
/*var_dump("INSERT INTO bitacora(id, user_id, cliente_id, piscina_id, indiceLangerier, tendencia, ph, productoPh, cantidadPh, medidaPh, cloroInicial, cloroFinal, productoCloro, cantidadCloro, medidaCloro, alcalinidad, productoAlcalinidad, cantidadAlcalinidad, medidaAlcalinidad, dureza, productoDureza, cantidadDureza, medidaDureza, tiempoRotacion, medidaTiempoRotacion, tiempoFiltracion, medidaTiempoFiltracion, temperatura, desinfeccionFiltro, cepilladoParedes, lavadoZonaH, superCloracion, productoLimpieza, cantidadLimpieza, medidaLimpieza) VALUES  (0,".$user_id.",".$admin_id.",".$piscina_id.",".number_format($indLangerier,3).",'".$tendencia."',".$ph.",'".$productoPh."','".$cantidadPh."','".$medidaPh."',".$cloroInicial.",".$cloroFinal.",'".$productoCloro."',".$cantidadCloro.",'".$medidaCloro."',".$alcalino.",'".$productoAlcalinidad."',".$cantidadAlcalinidad.",'".$medidaAlcalinidad."',".$dureza.",'".$productoDureza."',".$cantidadDureza.",'".$medidaDureza."',".$tiempoRotacion.",'".$medidaTiempoRotacion."',".$tiempoFiltracion.",'".$medidaTiempoFiltracion."',".$temp.",'".$desinfeccionFiltro."','".$cepilladoParedes."','".$lavadoZonaH."','".$superCloracion."',".$productoLimpieza.",".$cantidadLimpieza.",".$medidaLimpieza.")");
exit();*/
$query="INSERT INTO bitacora(id, user_id, cliente_id, piscina_id, indiceLangerier, tendencia, ph, productoPh, cantidadPh, medidaPh, cloroInicial, cloroFinal, productoCloro, cantidadCloro, medidaCloro, alcalinidad, productoAlcalinidad, cantidadAlcalinidad, medidaAlcalinidad, dureza, productoDureza, cantidadDureza, medidaDureza, tiempoRotacion, medidaTiempoRotacion, tiempoFiltracion, medidaTiempoFiltracion, temperatura, desinfeccionFiltro, cepilladoParedes, lavadoZonaH, superCloracion, productoLimpieza, cantidadLimpieza, medidaLimpieza) VALUES  (0,".$user_id.",".$admin_id.",".$piscina_id.",".number_format($indLangerier,3).",'".$tendencia."',".$ph.",'".$productoPh."','".$cantidadPh."','".$medidaPh."',".$cloroInicial.",".$cloroFinal.",'".$productoCloro."',".$cantidadCloro.",'".$medidaCloro."',".$alcalino.",'".$productoAlcalinidad."',".$cantidadAlcalinidad.",'".$medidaAlcalinidad."',".$dureza.",'".$productoDureza."',".$cantidadDureza.",'".$medidaDureza."',".$tiempoRotacion.",'".$medidaTiempoRotacion."',".$tiempoFiltracion.",'".$medidaTiempoFiltracion."',".$temp.",'".$desinfeccionFiltro."','".$cepilladoParedes."','".$lavadoZonaH."','".$superCloracion."',".$productoLimpieza.",".$cantidadLimpieza.",".$medidaLimpieza.")";
//$con->query("INSERT INTO bitacora(id, user_id, indiceLangerier, tendencia, ph, productoPh, cantidadPh, medidaPh, cloroInicial, cloroFinal, productoCloro, cantidadCloro, medidaCloro, alcalinidad, productoAlcalinidad, cantidadAlcalinidad, medidaAlcalinidad, dureza, productoDureza, cantidadDureza, medidaDureza, tiempoRotacion, medidaTiempoRotacion, tiempoFiltracion, medidaTiempoFiltracion, temperatura, desinfeccionFiltro, cepilladoParedes, lavadoZonaH, superCloracion, productoLimpieza, cantidadLimpieza, medidaLimpieza) VALUES  (0,".$user_id.",".number_format($indLangerier,3).",'".$tendencia."',".$ph.",'".$productoPh."','".$cantidadPh."','".$medidaPh."',".$cloroInicial.",".$cloroFinal.",'".$productoCloro."',".$cantidadCloro.",'".$medidaCloro."',".$alcalino.",'".$productoAlcalinidad."',".$cantidadAlcalinidad.",'".$medidaAlcalinidad."',".$dureza.",'".$productoDureza."',".$cantidadDureza.",'".$medidaDureza."',".$tiempoRotacion.",'".$medidaTiempoRotacion."',".$tiempoFiltracion.",'".$medidaTiempoFiltracion."',".$temp.",'".$desinfeccionFiltro."','".$cepilladoParedes."','".$lavadoZonaH."','".$superCloracion."','".$productoLimpieza."',".$cantidadLimpieza.",'".$medidaLimpieza."')");

if($con->query($query)!==False){
    $character = json_decode($data);
	echo $data;
}else{
    header('HTTP/1.1 500 Internal Server AguasLab');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => 'ERROR', 'code' => 500)));
}

		break;
}
//echo json_encode($return_arr);
//$return["json"] = json_encode($return_arr);
 // echo json_encode($return);
?>
