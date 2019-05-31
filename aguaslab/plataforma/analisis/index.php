<?php include('../extend/header.php'); 
include('../extend/permiso.php'); ?>
<div class="row">
	<div class="col s12">
		<nav class="grey">
			<div class="nav-wrapper">
				<div class="input-field">

					<input type="search" id="buscar">
					
					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</div>
		</nav>
	</div>
</div>
<?php 
$sel = $con->query("SELECT pdf, nit, ftoma,usuario.nombre FROM usuario RIGHT JOIN muestras ON usuario.nick = muestras.nit ORDER BY ftoma DESC");
$row = mysqli_num_rows($sel);
 ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">muestras <?php echo $row; ?></span>
				<table>
					
					<thead>
						<tr class="cabecera">
							<th>PDF</th>
							<th>Numero de identificación</th>
							<th>Nombre</th>
							<th>Fecha de toma</th>
							<th>vista previa</th>

						</tr>
					</thead>
					
					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $f['pdf']; ?></td>
							<td><?php echo $f['nit']; ?></td>
							<td><?php echo $f['nombre']; ?></td>
							<td><?php echo $f['ftoma']; ?></td>
							<td><a target="_blank" href="../muestras/<?php echo $f['pdf'];?>">ver pdf</a></td>
							
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('../extend/scripts.php') ?>