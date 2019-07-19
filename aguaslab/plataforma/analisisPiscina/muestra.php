<?php
include '../conexion/conexion.php';

$user_id=$_SESSION['id'];
$id=$_POST['id'];


$sel = $con->query("SELECT bitacora.id, user_id, bitacora.cliente_id, piscina_id, fechaHora, indiceLangerier, tendencia, ph, productoPh, cantidadPh, medidaPh, cloroInicial, cloroFinal, productoCloro, cantidadCloro, medidaCloro, alcalinidad, productoAlcalinidad, cantidadAlcalinidad, medidaAlcalinidad, dureza, productoDureza, cantidadDureza, medidaDureza, tiempoRotacion, medidaTiempoRotacion, tiempoFiltracion, medidaTiempoFiltracion, temperatura, desinfeccionFiltro, cepilladoParedes, lavadoZonaH, superCloracion, productoLimpieza, cantidadLimpieza, medidaLimpieza, piscinas.nombre,usuario.nombre AS nombrePiscinero FROM bitacora,piscinas, usuario WHERE usuario.id=bitacora.user_id AND bitacora.piscina_id=piscinas.id AND bitacora.id=".$id);
$data = array();
	while($r = $sel->fetch_assoc()){
		$data[] = $r;
	}
//$json = json_encode($data);
echo json_encode($data);
?>