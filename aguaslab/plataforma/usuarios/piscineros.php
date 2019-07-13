<?php
include '../conexion/conexion.php';

$user_id=$_SESSION['id'];
$param=$_POST['param'];
switch($param) {
    case 'mostrar' : 
    	$id=$_POST['id'];
		$sel = $con->query("SELECT id, nick, nombre, correo, nivel, bloqueo, foto,piscineros.fechaVinculacion,piscinero_id FROM usuario,piscineros WHERE usuario.id=piscineros.cliente_id AND piscineros.piscinero_id=".$id);
		$data = array();
		while($r = $sel->fetch_assoc()){
			$data[] = $r;
		}
		$sel = $con->query("SELECT id, nick, nombre, correo, nivel, bloqueo, foto FROM usuario WHERE id NOT IN (SELECT cliente_id FROM piscineros WHERE piscinero_id=".$id.") AND nivel='ADMINISTRACION'");
		$administradores= array();
		while($r = $sel->fetch_assoc()){
			$administradores[] = $r;
		}
		$dataTotal= [$data,$administradores];
    	echo json_encode($dataTotal);
    break;
    case 'desvincular' :
    	$piscinero_id=$_POST['piscinero_id'];
    	$admin_id=$_POST['admin_id'];
		$sel = $con->query("DELETE FROM piscineros WHERE piscinero_id=".$piscinero_id." AND cliente_id=".$admin_id);
		echo json_encode("ok");
    break;
	case 'vincular' :
    	$piscinero_id=$_POST['piscinero_id'];
    	$admin_id=$_POST['admin_id'];
		$sel = $con->query("INSERT INTO piscineros(piscinero_id, cliente_id) VALUES (".$piscinero_id.",".$admin_id.")");
		echo json_encode("ok");
    break;
}
/*
$sel = $con->query("SELECT * FROM bitacora WHERE id=".$id);
$data = array();
	while($r = $sel->fetch_assoc()){
		$data[] = $r;
	}
echo json_encode($data);*/
?>