<?php
include ('conexion.php');
$persona = $_GET['rut_persona'];

$strConsulta = "SELECT * from persona where rut_persona =  '$persona'";
	$persona = mysql_query($strConsulta);
	$fila = mysql_fetch_array($persona);

	if (mysql_errno()){
		echo "Mysql error " .mysql_errno().": ".mysql_error();
	}
	else{
		echo "Nombre: ".$fila['nombre'].' '.$fila['apellido'];
		echo "<table id='tb' border = 1px";
		echo "<tr><td>Fecha Entrada</td><td>Hora Entrada</td><td>Fecha Salida</td><td>Hora Entrada</td></tr>";
			$persona= $_GET['rut_persona'];
			$strConsulta =
				 "SELECT registro_entrada.fecha_entrada,
				 		 registro_entrada.hora_entrada,
				 		 registro_entrada.fecha_salida,
				 		 registro_entrada.hora_salida,
				 		 persona.nombre,
				 		 persona.rut_persona

			FROM registro_entrada
			Inner Join persona ON registro_entrada.rut_persona = persona.rut_persona
			WHERE persona.rut_persona = '$persona'";

			$historial = mysql_query($strConsulta);

		while ($fila = mysql_fetch_array($historial)) {
			echo "<tr><td>".$fila['fecha_entrada']"</td><td>".$fila['hora_entrada']"</td><td>".$fila['fecha_salida']"</td><td>".$fila['hora_salida']"</td>";
		}
		echo "</table>";

		mysql_close($conexion);

	}



?>
