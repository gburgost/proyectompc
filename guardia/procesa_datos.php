<?php

	include("conexion.php");
	$myusuario = mysql_query("select rut_persona from registro_persona
                                 where idusuario =  '".htmlentities($_POST["usuario"])."'",$link);
    $nmyusuario = mysql_num_rows($myusuario);

	date_default_timezone_set("Chile/Continental");
	$rut_persona = $_POST['rut'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");

	$persona = mysql_query("SELECT * FROM registro_persona");
	$consulta = mysql_query($persona);
	$fila = mysql_fetch_array($consulta);

/*	if  ($fila['fecha_salida'] == "" && $fila['rut_persona'] == "" ):
		mysql_query("INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '' )");


		mysql_query("UPDATE registro_persona SET fecha_salida = '$fecha', hora_salida = '$hora' WHERE rut_persona = '$rut_persona'");

	else:
 		if($fila['fecha_entrada'] == "" && $fila['rut_persona'] == ""):
 			mysql_query("INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '' )");

 		endif;
 	endif;



	mysql_query("INSERT INTO registro_persona (id_entrada, rut_persona, fechaentrada, horaentrada, entrada) VALUES('', '$rut_persona', '$fechaentrada', '$horaentrada', '$entrada' )");*/




?>
