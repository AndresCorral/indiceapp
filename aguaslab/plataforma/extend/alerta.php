<?php
include '../conexion/conexion.php';
 ?>
 <head>
 	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<meta name="viewport" content="width=device-whidth, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
 </head>


 <body>
 	<?php
$mensaje = htmlentities($_GET['msj']);
$c = htmlentities($_GET['c']);
$p = htmlentities($_GET['p']);
$t = htmlentities($_GET['t']);

switch ($c) {
	case 'us':
		$carpeta = '../usuarios';
		break;
		case 'home':
		$carpeta = '../inicio';
		break;
		case 'salir':
		$carpeta = '../';
		break;
		case 'pe':
		$carpeta = '../perfil';
		break;
		case 'cli':
		$carpeta = '../clientes';
		break;
	case 'pisc':
		$carpeta = '../piscinas';
	break;
	case 'piscinero':
		$carpeta = '../piscineros';
	break;
	}
	switch ($p) {
	case 'in':
		$pagina = '/index.php';
		break;
	case 'home':
		$pagina = '/index.php';
		break;
	case 'salir':
		$pagina = '';
		break;
	case 'perfil':
		$pagina = '/perfil.php';
		break;
	}

$dir = $carpeta.$pagina;
if ($t == "error") {
	$titulo = "Ooops...";
}else{
	$titulo = "Buen trabajo";
};


 	?>
 </body>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
   <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script>
 	swal({
  title: '<?php echo $titulo ?>',
  text: "<?php echo $mensaje ?>",
  type: '<?php echo $t ?>',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'ok'
}).then(function(){
	location.href='<?php echo $dir; ?>';
});
$(document).click(function(){
	location.href='<?php echo $dir; ?>';
});
$(document).keyup(function(e){
	if (e.which == 27) {
		location.href='<?php echo $dir; ?>';
	}

});

 </script>