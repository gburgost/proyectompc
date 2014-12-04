<?php

	include("conexion.php");

	@session_start();
	if($_SESSION["autentica"] != "SIP"){
	header("Location: login.php");
	exit();
	}

	date_default_timezone_set("Chile/Continental");
	$rut_persona = $_POST['rut'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");


	$myusuario = mysqli_query($conexion, "SELECT rut_persona FROM persona WHERE rut_persona =  '".htmlentities($_POST["rut"])."'");
    $nmyusuario = mysqli_num_rows($myusuario);
    //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
          $myclave = mysqli_query($conexion, "SELECT * FROM registro_persona WHERE rut_persona = '".htmlentities($_POST["rut"])."'
               and estado = 'abierto'");
          $persona = mysqli_query($conexion, "SELECT * FROM persona WHERE rut_persona = '".htmlentities($_POST["rut"])."'");
          $nmyclave = mysqli_num_rows($myclave);
          $fila = mysqli_fetch_array($persona);


          if ($nmyclave != 0){
          	$estado = "abierto";
          	$guardia = $_SESSION["usuarioactual"];
			$encontrar = mysqli_query($conexion, "SELECT nombre_guardia, apellido_guardia FROM guardia WHERE rut_guardia = '$guardia'");
			$buscar = mysqli_query($conexion, "SELECT nro_garita, jornada FROM turno_guardia WHERE rut_guardia = '$guardia'");

			$columna = mysqli_fetch_array($encontrar);
			$nombre_guardia = $columna['nombre_guardia'].' '.$columna['apellido_guardia'];

          	mysqli_query($conexion, "UPDATE registro_persona SET rut_guardia1 = '$nombre_guardia', fecha_salida = '$fecha', hora_salida = '$hora', estado = 'cerrado' WHERE rut_persona = '$rut_persona' and estado ='$estado' ");

          	echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro de <strong>salida</strong> exitoso.<br/><br/>Nombre: '.$fila['nombre'].' '.$fila['apellido'].' <br/> Hora salida: '.$hora.'</br>Fecha salida: '.$fecha.'<br/>
            	<div class="imguser"><img src="../administrador/'.$fila['foto'].'" widht="100" height = "100"/><p>'.$fila['tipo_persona'].'</p></div></div>';
            echo "<script>setTimeout('document.location.reload()',5000);</script>";

          }
          else{
          	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No se ha realizado una <strong>entrada</strong>.</div>';
          }

     }else{
         echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> El rut ingresado no esta registrado en la empresa.</div>';
     }

?>
