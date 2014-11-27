<?php
	include 'conexion.php';

	$nombre = $_POST['name'];
	$apellido = $_POST['lastname'];
	$rut1 = $_POST['rut'];
	$rut2 = $_POST['rut'];
	$fechanacimiento = $_POST['date'];
	$id_departamento = $_POST['id_departamento'];
	$cargo = $_POST['cargo'];
	$tipo_contrato = $_POST['tipo_contrato'];
	$fechavin = $_POST['fechavin'];
	$fechades = $_POST['fechades'];
	$tipo_persona = "Empleado";



	mysql_query("INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona' )");

	mysql_query("INSERT INTO empleado ( id_empleado, rut_persona, fecha_vinculacion, fecha_desvinculacion, tipo_contrato, cargo, id_departamento) VALUES ('', '$rut2', '$fechavin', '$fechades', '$tipo_contrato', '$cargo', '$id_departamento')");


		echo "<script>
              alert('Registro realizado con exito');
              location.href='index.php';</script>";

?>
