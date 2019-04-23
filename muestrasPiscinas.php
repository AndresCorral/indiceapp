<?php
$temp=35;
$ph=1;
$alcalino=200;
$dureza=1000;
echo "temp: ".$temp;
echo "<br> ph: ".$ph;
echo "<br>alcalino: ".$alcalino;
echo "<br> dureza: ".$dureza."<br>";
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


foreach ($arraySuma as $key => $value) {
	echo number_format($value, 3, ",", ".")." , <br>";
}
echo " Indice Langerier ".number_format($indLangerier, 3, ",", ".");
echo " Indice Langerier ".$indLangerier;
echo "<br>";
if ($indLangerier>=-6.000 && $indLangerier <= -0.600 ) {
	echo "TENDENCIAS CORROSIVAS";
}  if($indLangerier>=0.600 && $indLangerier <= 6.000){
	echo "TENDENCIAS INCRUSTANTES";
} if($indLangerier>=-0.599 && $indLangerier <= 0.599){
	echo "TOTALMENTE BALANCEADA";

}


?>