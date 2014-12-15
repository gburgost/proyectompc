<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$rut_persona = $_POST['rut'];
	$fecha=date("d-m-Y");
	$hora=date("H:i:s");


	$myusuario = mysqli_query($conexion, "SELECT rut_persona FROM persona WHERE tipo_persona = 'Visita' AND rut_persona =  '".htmlentities($_POST["rut"])."'");
    $nmyusuario = mysqli_num_rows($myusuario);
    //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
          $myclave = mysqli_query($conexion, "SELECT * FROM registro_persona WHERE rut_persona = '".htmlentities($_POST["rut"])."'
               and estado = 'abierto'");
          $persona = mysqli_query($conexion, "SELECT * FROM persona WHERE tipo_persona = 'Visita' AND rut_persona = '".htmlentities($_POST["rut"])."'");
          $nmyclave = mysqli_num_rows($myclave);
          $fila = mysqli_fetch_array($persona);


          if ($nmyclave != 0){
          	$estado = "abierto";
          	mysqli_query($conexion, "UPDATE registro_persona SET fecha_salida = '$fecha', hora_salida = '$hora', estado = 'cerrado' WHERE rut_persona = '$rut_persona' and estado ='$estado' ");

          	echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro de <strong>salida</strong> exitoso.<br/><br/>Nombre: '.$fila['nombre'].' '.$fila['apellido'].' <br/> Hora salida: '.$hora.'</br>Fecha salida: '.$fecha.'<br/>
            	<div class="imguser"><p>'.$fila['tipo_persona'].'</p></div></div>';
            echo "<script>setTimeout('document.location.reload()',5000);</script>";

          }
          else{
          	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No se ha realizado una <strong>entrada</strong>.</div>';
          }

     }else{
 			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> La persona no esta registrada como visita.</div>';
     }

?>
