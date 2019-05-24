<?php
include '../conexion/conexion.php';

$user_id=$_SESSION['id'];
$id=$_POST['id'];


$sel = $con->query("SELECT * FROM bitacora WHERE id=".$id);
$data = array();
	while($r = $sel->fetch_assoc()){
		$data[] = $r;
	}
//$json = json_encode($data);
echo json_encode($data);
?>