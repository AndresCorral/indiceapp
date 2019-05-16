<?php
include '../conexion/conexion.php';
if(isset($_POST['ph'])) {
    switch($action) {
        case 'test' : test();break;
        case 'blah' : blah();break;
        // ...etc...
    }
}
$temp=$_POST['temp'];
$ph=$_POST['ph'];
$alcalino=$_POST['alcalinidad'];
$dureza=$_POST['dureza'];
$productoPh=$_POST['productoPh'];
$cantidadPh=$_POST['cantidadPh'];
$cloroInicial=$_POST['cloroInicial'];
$cloroFinal=$_POST['cloroFinal'];
$cloroFinal=$_POST['cloroFinal'];
$productoCloro=$_POST['productoCloro'];
$cantidadCloro=$_POST['cantidadCloro'];
$alcalinidad=$_POST['alcalinidad'];


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
$tendencia="hola";
if ($indLangerier>=-6.000 && $indLangerier <= -0.600 ) {
	$tendencia="TENDENCIAS CORROSIVAS";
}  if($indLangerier>=0.600 && $indLangerier <= 6.000){
	$tendencia="TENDENCIAS INCRUSTANTES";
} if($indLangerier>=-0.599 && $indLangerier <= 0.599){
	$tendencia="TOTALMENTE BALANCEADA";
}

$data = '{"indice" :'.number_format($indLangerier,3).',"tendencia" : "'.$tendencia.'"}';
$con->query("INSERT INTO `bitacora`(`id`, `indiceLangerier`, `tendencia`, `ph`, `productoPh`, `cantidadPh`, `cloroInicial`, `cloroFinal`, `productoCloro`, `cantidadCloro`, `alcalinidad`, `productoAlcalinidad`, `cantidadAlcalinidad`, `dureza`, `productoDureza`, `cantidadDureza`, `horaRotacion`, `horaFiltracion`, `temperatura`, `desinfeccionFiltro`, `cepilladoParedes`, `lavadoZonaH`, `superCloracion`, `productoLimpieza`, `cantidadLimpieza`) VALUES (0,".number_format($indLangerier,3).",'".$tendencia."',".$ph.",[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25])");

$character = json_decode($data);
echo $data;

//echo json_encode($return_arr);
//$return["json"] = json_encode($return_arr);
 // echo json_encode($return);
?>
