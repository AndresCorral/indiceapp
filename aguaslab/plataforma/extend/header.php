<?php 
	include '../conexion/conexion.php';
	if (!isset($_SESSION['nick'])) {
	header('location:../');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="shortcut icon" href="images/fav.png">
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<meta name="viewport" content="width=device-whidth, initial-scale=1.0">
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
	<style>
	.sidenav-overlay{
	z-index: 0 !important;
}
		    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }
	</style>
	<title>Aguaslab</title>
</head>
	<body>
		<main>
			<?php 
				if ($_SESSION['nivel'] == 'ADMINISTRADOR') {
					include 'menu-admin.php';				
				}else{
					include 'menu-asesor.php';
				}
			 ?>
		