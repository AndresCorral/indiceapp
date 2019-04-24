<?php include('../extend/header.php'); ?>
<?php 
$nick = $_SESSION['nick'];
$sel = $con->query("SELECT * FROM muestras WHERE nit ='$nick'");
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
							<th>Numero de identificacion</th>
							<th>Fecha de toma</th>
							<th>vista previa</th>

						</tr>
					</thead>
					
					<?php while($f = $sel->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $f['pdf']; ?></td>
							<td><?php echo $f['nit']; ?></td>
							<td><?php echo $f['ftoma']; ?></td>
							<td><a target="_blank" href="../muestras/<?php echo $f['pdf'];?>.pdf">ver pdf</a></td>
							
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>