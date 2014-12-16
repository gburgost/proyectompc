<?php
	@session_start();
	if($_SESSION["autentica"] != "SIP"){
	header("Location: login.php");
	exit();
	}

	include("conexion.php");
	$rut_persona = $_POST['rut'];
	 date_default_timezone_set("Chile/Continental");
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$guardia = $_SESSION["usuarioactual"];
	$encontrar = mysqli_query($conexion, "SELECT nombre_guardia, apellido_guardia FROM guardia WHERE rut_guardia = '$guardia'");
	$buscar = mysqli_query($conexion, "SELECT nro_garita, jornada FROM turno_guardia WHERE rut_guardia = '$guardia'");

	$columna = mysqli_fetch_array($encontrar);
	$fil = mysqli_fetch_array($buscar);
	$nro_garita = $fil['nro_garita'];

	//Se realiza la validación si el usuario existe en el sistema
	$myusuario = mysqli_query($conexion, "SELECT rut_persona, nombre, apellido FROM persona WHERE rut_persona =  '".htmlentities($_POST["rut"])."'");
    $nmyusuario = mysqli_num_rows($myusuario);

    $lista = mysqli_query($conexion,"SELECT * FROM lista_negra
    							WHERE rut_persona =  '".htmlentities($_POST["rut"])."'");
    $fila = mysqli_fetch_array($lista);
    $lista = mysqli_num_rows($lista);
    $fila1 = mysqli_fetch_array($myusuario);
    $motivo = $fila['motivo'];
    $nombre = $fila1['nombre'];
    $apellido = $fila1['apellido'];


    //Se muestra si el usario esta en lista negra e imprime su motivo.
    if($lista != 0)
    {
    	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <strong>Persona con Prohibición de Acceso.</strong><p><br/>
			<strong>'.$nombre.' '.$apellido.'</strong><br/>
    		Motivo: '.$motivo.'</p></div>';
    	echo "<script>setTimeout('document.location.reload()',8000);</script>";

    }

    //Si existe el usuario lo validamos con su rut
     elseif($nmyusuario != 0){
          $myclave = mysqli_query($conexion, "SELECT rut_persona
               FROM registro_persona
               WHERE rut_persona = '".htmlentities($_POST["rut"])."'");
          $nmyclave = mysqli_num_rows($myclave);

          	//Se Valida el estado de la persona y se compara con el rut
          	 if ($nmyclave != 0){
		          $myclave = mysqli_query($conexion, "SELECT rut_persona FROM registro_persona WHERE rut_persona = '".htmlentities($_POST["rut"])."' and estado = 'abierto'");
		          $nmyclave = mysqli_num_rows($myclave);

		         //Si el estado esta en "abierto" se genera una alerta
		          if ($nmyclave != 0){
		          	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No se ha realizado una salida.</div>';
		          	echo "<script>setTimeout('document.location.reload()',8000);</script>";
		          }
		          //Si el estado es "cerrado" se insertan los datos en la tabla.
		          else
		          {
		          	$consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE rut_persona = '".htmlentities($_POST["rut"])."'");
		          	$estado = "abierto";
		          	$datos = mysqli_fetch_array($consulta);
        				$nombre = $datos['nombre'];
        				$apellido = $datos['apellido'];
        				$tipopersona = $datos['tipo_persona'];
        				$foto = $datos['foto'];

          	 		mysqli_query($conexion, "INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut_persona', '$guardia', '$fecha', '$hora', '', '', '$estado' )");
            	echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro de <strong>entrada</strong> exitoso. <br/><br/>Nombre: '.$nombre.' '.$apellido.' <br/> Hora entrada: '.$hora.'</br>Fecha entrada: '.$fecha.'<br/>
            	<div class="imguser"><img src="../administrador/'.$foto.'" widht="100" height = "100"/><p>'.$tipopersona.'</p></div></div>';
            	echo "<script>setTimeout('document.location.reload()',8000);</script>";
		          }
          }
          else{
              $consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE rut_persona = '".htmlentities($_POST["rut"])."'");
              $estado = "abierto";
              $datos = mysqli_fetch_array($consulta);
              $nombre = $datos['nombre'];
              $apellido = $datos['apellido'];
              $tipopersona = $datos['tipo_persona'];
              $foto = $datos['foto'];
          	 mysqli_query($conexion, "INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut_persona', '$guardia', '$fecha', '$hora', '', '', '$estado' )");
            	echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro de <strong>entrada</strong> exitoso. <br/><br/>Nombre: '.$nombre.' '.$apellido.' <br/> Hora entrada: '.$hora.'</br>Fecha entrada: '.$fecha.'<br/>
            	<div class="imguser"><img src="../administrador/'.$foto.'" widht="100" height = "100"/><p>'.$tipopersona.'</p></div></div>';
              echo "<script>setTimeout('document.location.reload()',8000);</script>";
          }
     }else{
          echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> El rut ingresado no esta registrado en la empresa.</div>';
     }
?>
