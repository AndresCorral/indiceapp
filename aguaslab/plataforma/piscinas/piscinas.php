<?php
include '../conexion/conexion.php';

$user_id=$_SESSION['id'];
if (isset($_POST['param'])) {
	$param=$_POST['param'];
}else if (isset($_GET['param'])){
	$param=$_GET['param'];
}
switch($param) {
    case 'create' : 
    	$nombre=$_POST['nombre'];
    	if (isset($_POST['descripcion'])) {
    		$descripcion=$_POST['descripcion'];
    	}else{
    		$descripcion=NULL;
    	}

    	if (isset($_FILES['foto1'])) {
    		$foto1=$_FILES['foto1'];
    	}else{
    		$foto1=NULL;
    	}
    	if (isset($_FILES['foto2'])) {
    		$foto2=$_FILES['foto2'];
    	}else{
    		$foto2=NULL;
    	}
		$ins = $con->query("INSERT INTO piscinas(id, cliente_id, nombre, descripcion, foto1, foto2) VALUES (0,$user_id,'$nombre','$descripcion',NULL,NULL)");
		$id=$con->insert_id;
		if ($foto1!=NULL) {
			$nombrearchivo = $_FILES['foto1']['name'];
			$info = pathinfo($nombrearchivo);
			$fileName = $id.'_'.$user_id.'_01.'.$info['extension'];;
			$fichero_subido = 'foto_piscinas/'.$fileName;
			if (move_uploaded_file($_FILES['foto1']['tmp_name'], $fichero_subido)) {
				$con->query("UPDATE piscinas SET foto1='$fichero_subido' WHERE id=".$id);  
			} 
		}
		if ($foto2!=NULL) {
			$nombrearchivo = $_FILES['foto2']['name'];
			$info = pathinfo($nombrearchivo);
			$fileName = $id.'_'.$user_id.'_02.'.$info['extension'];;
			$fichero_subido = 'foto_piscinas/'.$fileName;
			if (move_uploaded_file($_FILES['foto2']['tmp_name'], $fichero_subido)) {
				$con->query("UPDATE piscinas SET foto2='$fichero_subido' WHERE id=".$id);  
			} 
		}
		header('location:../extend/alerta.php?msj=La piscina a sido registrada correctamente&c=pisc&p=in&t=success');
    break;
    case 'delete' :
    	$id=$_GET['id'];
		$con->query("DELETE FROM piscinas WHERE id=".$id);
		header('location:../extend/alerta.php?msj=La piscina a sido eliminada correctamente&c=pisc&p=in&t=success');
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