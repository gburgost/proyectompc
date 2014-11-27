<?php

	include("conexion.php");
	$rut_persona = $_POST['rut'];
	 date_default_timezone_set("Chile/Continental");
	$fecha=date("d-m-Y");
	$hora=date("H:i:s");
	$rut_guardia = "";
	$nro_garita = "";

	//Se realiza la validación si el usuario existe en el sistema
	$myusuario = mysqli_query($conexion, "SELECT rut_persona FROM persona WHERE rut_persona =  '".htmlentities($_POST["rut"])."'");
    $nmyusuario = mysqli_num_rows($myusuario);

    $lista = mysqli_query($conexion,"SELECT * FROM lista_negra
    							WHERE rut_persona =  '".htmlentities($_POST["rut"])."'");
    $fila = mysqli_fetch_array($lista);
    $lista = mysqli_num_rows($lista);
    $motivo = $fila['motivo'];


    //Se muestra si el usario esta en lista negra e imprime su motivo.
    if($lista != 0)
    {
    	echo '<div class="alert alert-danger" role="alert"><strong>Persona con Prohibición de Acceso.</strong><p>Motivo: '.$motivo.'</p></div>';
    	echo "<script>setTimeout('document.location.reload()',6000);</script>";

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
		          	echo '<div class="alert alert-danger" role="alert">No se ha realizado una salida.</div>';
		          	echo "<script>setTimeout('document.location.reload()',6000);</script>";
		          }
		          //Si el estado es "cerrado" se insertan los datos en la tabla.
		          else
		          {
		          	$consulta = mysqli_query($conexion, "SELECT nombre, apellido, foto FROM persona WHERE rut_persona = '".htmlentities($_POST["rut"])."'");
		          	$estado = "abierto";
		          	$datos = mysqli_fetch_array($consulta);
    				$nombre = $datos['nombre'];
    				$apellido = $datos['apellido'];
    				$foto = $datos['foto'];

          	 		mysqli_query($conexion, "INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '', '$estado' )");
            	echo '<div class="alert alert-success" role="alert">Registro de <strong>entrada</strong> exitoso. <br/><br/>Nombre: '.$nombre.' '.$apellido.' <br/> Hora entrada: '.$hora.'</br>Fecha entrada: '.$fecha.'<br/><img src="../administrador/'.$foto.'" widht="100" height = "100" class="imguser"/></div>';
            	//echo "<script>setTimeout('document.location.reload()',4000);</script>";
		          }
          }
          else{
          	$estado = "abierto";
          	 mysqli_query($conexion, "INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '', '$estado' )");
            	echo '<div class="alert alert-success" role="alert">Registro de entrada exitoso.</div>';
            	echo "<script>setTimeout('document.location.reload()',5000);</script>";
          }
     }else{
          echo '<div class="alert alert-danger" role="alert">El rut ingresado no esta registrado en la empresa.</div>';
     }




	/*



	$consulta = mysql_query("SELECT estado FROM registro_persona WHERE estado = 'cerrado' ");


		mysql_query("INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida) VALUES('', '$nro_garita', '$rut_persona', '$rut_guardia', '$fecha', '$hora', '', '' )");
		echo "<script>
              alert('Registro realizado con exito');
              location.href='index.php';</script>";


		echo "<h1>Entradas</h1>";
		echo "Tus datos son los siguientes: <br /><br /> Nombre: $nombre<br />Email: $email<br /><br />Fecha Entrada: $fechaentrada  <br /> Hora entrada: $horaentrada <br />";
		echo "<button><a href='entrada.html'>Volver</a></button>";


class conexion{

		function recuperarDatos(){
			include("conexion.php");
			$query= "SELECT * FROM entrada";
			$resultado = mysql_query($query);

			while($fila = mysql_fetch_array($resultado))
			{
				echo "<br/>Nombre: $fila[Nombre] <br/>";
				echo "Rut: $fila[Rut]<br/>";
				echo "Fecha y Hora: $fila[Fechaentrada]<br/>";
				echo "Hora: $fila[Horaentrada]<br/>";

			}

		}
	}
	$con= new conexion();
	$con ->recuperarDatos();
*/




?>
