<?php
	include 'conexion.php';

	$nombre = $_POST['name'];
	$apellido = $_POST['lastname'];
	$rut1 = $_POST['rut'];
	$fechanacimiento = $_POST['date'];
	$tipo_persona = "Visita";
	$foto = "";

	if ($nombre == '' && $apellido == '' && $rut1 == '') {
		echo "<script>
			 alert('Rellene los campos');
			 location.href='visita.php';</script>'";
	}
	else{
		mysqli_query($conexion, "INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona, foto) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona', '$foto')");

		echo "<script>
              alert('Registro realizado con exito');
              location.href='visita.php';</script>";
	}
?>
