<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tarjeta <?php echo $_GET['visita']; ?></title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<script src="../scripts/jquery.min.js"></script>
</head>
<body id="tarjeta">
	<?php

	require('conexion.php');

	$visita 	= $_GET['visita'];
	$visitado	= $_GET['empleado'];
	$empresa	= $_GET['empresa'];
	 date_default_timezone_set("Chile/Continental");
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");

	$Arraynombre =explode(' ', $nombre = $_GET['visita']);
    $nombre = $Arraynombre[0];
    $apellido = $Arraynombre[1];

	$muestra = "SELECT rut_persona FROM persona WHERE nombre = '$nombre' AND apellido = '$apellido'";

	$bla = mysqli_query($conexion, $muestra);
	while ($rowx = mysqli_fetch_array($bla))
       {
       		$rut = $rowx['rut_persona'];
       }
	echo "<div class='ticket'>";
	echo "<div class='tituloticket'><img src='../img/logompc.png' width='80'/><h3>Ticket Provisorio </h3></div>";
	echo "<div class=row>";
	echo "<div class='izquierda'>";
	echo "<div class='cuerpoticket'>";
	echo "<p>Nombre de visita: <strong>".$visita."</strong></p>";
	echo "<p>Rut: ".$rut."</p>";
	echo "<p>Visita a: ".$visitado."</p>";
	echo "<p>Empresa: ".$empresa."</p>";
	echo "<p>Hora de entrada: ".$hora."</p>";
	echo "<p>Fecha: ".$fecha."</p>";
	echo "</div>";
	echo "</div>";
	echo "<div class='derecha'>";
	echo "<canvas id='codigo' width='280' height='49'></canvas><br/>";
	echo "<p>Firma:_________________________</p>";
	echo "</div>";
	echo "</div>";
	echo "<p class='pie'>Metalúrgica Puerto Caldera</p>";
	echo "</div>";
	echo '<a type="button" class="imprimir" onclick="window.print();">
			<span class="glyphicon glyphicon-print" aria-hidden="true"></span>Imprimir
			</a>';
	?>

	<script src="../scripts/jquery-barcode.js"></script>
	<script>
	$(document).ready(function(){
		    	serial = "<?php echo $rut; ?>";
	        $('#codigo').barcode(serial, "codabar", {barWidth:2, barHeight:30, output: "canvas"}
				);
		    });
	</script>
</body>
</html>
<?php
	@session_start();
	if($_SESSION["autentica"] != "SIP"){
	header("Location: login.php");
	exit();
	}
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
	$myusuario = mysqli_query($conexion, "SELECT rut_persona, nombre, apellido FROM persona WHERE rut_persona =  '$rut'");
    $nmyusuario = mysqli_num_rows($myusuario);

    $lista = mysqli_query($conexion,"SELECT * FROM lista_negra WHERE rut_persona =  '$rut'");
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


    }

    //Si existe el usuario lo validamos con su rut
     elseif($nmyusuario != 0){
          $myclave = mysqli_query($conexion, "SELECT rut_persona
               FROM registro_persona
               WHERE rut_persona = '$rut'");
          $nmyclave = mysqli_num_rows($myclave);

          	//Se Valida el estado de la persona y se compara con el rut
          	 if ($nmyclave != 0){
		          $myclave = mysqli_query($conexion, "SELECT rut_persona FROM registro_persona WHERE rut_persona = '$rut' and estado = 'abierto'");
		          $nmyclave = mysqli_num_rows($myclave);

		         //Si el estado esta en "abierto" se genera una alerta
		          if ($nmyclave != 0){
		          	echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No se ha realizado una salida.</div>';

		          }
		          //Si el estado es "cerrado" se insertan los datos en la tabla.
		          else
		          {
		          	$consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE rut_persona = '$rut'");
		          	$estado = "abierto";
		          	$datos = mysqli_fetch_array($consulta);
        				$nombre = $datos['nombre'];
        				$apellido = $datos['apellido'];
        				$tipopersona = $datos['tipo_persona'];
        				$foto = $datos['foto'];

          	 		mysqli_query($conexion, "INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut', '$guardia', '$fecha', '$hora', '', '', '$estado' )");
          	 		mysqli_query($conexion,"INSERT INTO visita(id_visita, rut_persona, nombre_visitado, empresa)VALUES('', '$rut', '$visitado','$empresa')");
            	echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro de <strong>entrada</strong> exitoso. <br/><br/>Nombre: '.$nombre.' '.$apellido.' <br/>Visita a: '.$visitado.'<br/>Empresa: '.$empresa.'<br/> Hora entrada: '.$hora.'</br>Fecha entrada: '.$fecha.'<br/>
            	<div class="imguser"><img src="../administrador/'.$foto.'" widht="100" height = "100"/><p>'.$tipopersona.'</p></div></div>';

		          }
          }
          else{
              $consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE rut_persona = '$rut'");
              $estado = "abierto";
              $datos = mysqli_fetch_array($consulta);
              $nombre = $datos['nombre'];
              $apellido = $datos['apellido'];
              $tipopersona = $datos['tipo_persona'];
              $foto = $datos['foto'];
          	 mysqli_query($conexion, "INSERT INTO registro_persona (cod_registro, nro_garita, rut_persona, rut_guardia, fecha_entrada, hora_entrada, fecha_salida, hora_salida, estado) VALUES('', '$nro_garita', '$rut', '$guardia', '$fecha', '$hora', '', '', '$estado' )");
            	echo '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro de <strong>entrada</strong> exitoso. <br/><br/>Nombre: '.$nombre.' '.$apellido.' <br/> Hora entrada: '.$hora.'</br>Fecha entrada: '.$fecha.'<br/>
            	<div class="imguser"><img src="../administrador/'.$foto.'" widht="100" height = "100"/><p>'.$tipopersona.'</p></div></div>';

          }
     }else{
          echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> El rut ingresado no esta registrado en la empresa.</div>';
     }
?>

