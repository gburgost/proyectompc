<?php
	include 'conexion.php';

	$nombre 			= $_POST['name'];
	$apellido 			= $_POST['lastname'];
	$rut1 				= $_POST['rut'];
	$fechanacimiento 	= $_POST['date'];
	$tipo_persona	 	= "Visita";
	$foto 				= "archivos/usuario.jpg";

	if ($nombre == '' && $apellido == '' && $rut1 == '' && $empresa == '' && $visitado == '') {
		echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Complete los Campos.</div>';
	}
	else{
		mysqli_query($conexion, "INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona, foto) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona', '$foto')");
		mysqli_query($conexion, "INSERT INTO visita(id_visita, rut_persona, nombre_visitado, empresa) VALUES('', '$rut1', '$visitado', '$empresa')");

		echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro realizado con éxito.</div>';
		echo "<script>setTimeout('document.location.reload()',4000);</script>";
	}
?>
