<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tarjeta <?php echo $_GET['nombre'].' '.$_GET['apellido']; ?></title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<script src="../scripts/jquery.min.js"></script>
</head>
<body id="tarjeta">
	<?php

	require('conexion.php');

	$nombre = $_GET['nombre'];
	$apellido = $_GET['apellido'];
	$rut = $_GET['rut_persona'];
	$tipo = $_GET['tipo_persona'];


	echo "<div class='tarjeta'>";
	echo "<p class='iden'>Identificación</p>";
	echo "<div class='cuerpo'>";
	echo "<p><strong>".$nombre." ".$apellido."</strong></p>";
	echo "<p>".$tipo."</p>";
	echo "<p>".$rut."</p>";
	echo"<canvas id='codigo' width='280' height='49'></canvas>";
	echo "</div>";
	echo "<p class='pie'>Metalúrgica Puerto Caldera</p>";
	echo "</div>";
	echo '<a type="button" class="imprimir" onclick="window.print();">
			<span class="glyphicon glyphicon-print" aria-hidden="true"></span>Imprimir
			</a>';
	?>

	<script src="../scripts/jquery-barcode.js"></script>
	<script>
	$(document).ready(function(){
		    	serial = "<?php echo $_GET['rut_persona']; ?>";
	        $('#codigo').barcode(serial, "codabar", {barWidth:2, barHeight:30, output: "canvas"}
				);
		    });
	</script>
</body>
</html>
