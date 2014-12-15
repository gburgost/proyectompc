<?php
	include 'conexion.php';

	//Validacion de Campos (no vacios y campos correctos)
		if(empty($_POST["name"])){
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Debe ingresar un nombre.</div>';
		}else if (empty($_POST["lastname"])){
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Debe ingresar un apellido.</div>';
		}else if (empty($_POST["rut"])){
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Debe ingresar un rut.</div>';
		}else if (empty($_POST["date"])){
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Debe ingresar una fecha.</div>';
		}else{
			$fechanacimiento 	= $_POST['date'];
			$nombre 			= $_POST['name'];
			$apellido 			= $_POST['lastname'];
			$rut1 				= $_POST['rut'];
			$tipo_persona	 	= "Visita";
			$foto 				= "archivos/usuario.jpg";

			mysqli_query($conexion, "INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona, foto) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona', '$foto')");

			echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro realizado con éxito.</div>';
			echo "<script>setTimeout('document.location.reload()',4000);</script>";
		}
?>
