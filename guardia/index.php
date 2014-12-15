<?php include 'conexion.php'; ?>
<?@session_start();
if($_SESSION["autentica"] != "SIP"){
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"/>
	<title>MPC registros</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilo.css">

	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/prefixfree.min.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-barcode.js"></script>
	<script src="../scripts/reloj.js"></script>
	<script src="../scripts/bootstrap.js"></script>

	<script>
	$('.dropdown-toogle').dropdown();
        function entrar(rut)
        {
          $.ajax({

            url: "procesar_entrada.php",
            type: "POST",
            data: "rut="+rut,
            success: function(resp){
              $('#resultado').html(resp);
              return false;
            }
          });
        }
        function salir(rut)
        {
          $.ajax({
            url: "procesar_salida.php",
            type: "POST",
            data: "rut="+rut,
            success: function(resp){
              $('#resultado').html(resp);
              return false;

            }
          });
        }
	</script>
</head>
<body onload="Comenzar()">
	<div id="mainWrapper">
		<header>
			<figure id="logo">
				<img src="../img/logompc.png" alt="mpc" width="100" />
			</figure>
			<div class="titulos">
				<h1>Sistema de Control de <br>Acceso y Asistencia.</h1>
			</div>
			<div class="usuario">
				<strong><?php
					$guardia = $_SESSION["usuarioactual"];
					$encontrar = mysqli_query($conexion, "SELECT nombre_guardia, apellido_guardia FROM guardia WHERE rut_guardia = '$guardia'");
					$buscar = mysqli_query($conexion, "SELECT nro_garita, jornada FROM turno_guardia WHERE rut_guardia = '$guardia'");

					$columna = mysqli_fetch_array($encontrar);
					$fila = mysqli_fetch_array($buscar);

					echo 'Guardia: '.$columna["nombre_guardia"].' '.$columna["apellido_guardia"];
				?></strong>
				<p><?php echo 'Rut: ' .$guardia; ?><br>
				<?php echo 'Garita: '.$fila["nro_garita"];?></p>
				<a href="logout.php">Cerrar Sesión</a>
			</div>

		</header>
		<h3>Módulo Guardia</h3>
		<nav>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Acceso</a>
				</li>

				<li role="presentation" class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Visita <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu" role="menu">
				      	<li><a href="visita.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Registrar</a></li>
						<li><a href="ticket.php"><span class="icon-business-card"></span>Generar Ticket</a></li>

				    </ul>
				  </li>

			</ul>
		</nav>
		<header id="titleContent">
			<h4>Acceso de Entrada y Salida</h4>
			<h5>Empleado y Contratista</h5>

			<div id="reloj"></div>

			<hr></header>
		<section>
			<article id="aRegister">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<h3>Código</h3>
							<?php include 'form.php'; ?>
						</div>
						<div class="col-md-2">
						</div>
					</div>
				</div>
			</article>
		</section>
	</div>
	<footer>
		<p>
			- © Copyright 2014 -
		</p>
	</footer>
</body>
</html>
