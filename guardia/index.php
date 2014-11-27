<?php include 'conexion.php'; ?>
<?@session_start();
if($_SESSION["autentica"] != "SIP"){
	header("Location: login.php");
	echo"AAA";
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

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/prefixfree.min.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-barcode.js"></script>
	<script src="../scripts/reloj.js"></script>

	<script>
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
					<a href="#">Registrar Empleado</a>
				</li>

			</ul>
		</nav>
		<header id="titleContent">
			<h4>Registro de Entrada y Salida</h4>
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
			<!--<article id="aSearch">
				<table id="tSearch" class="table table-hover" cellspacing="1">
					<caption>Listado de Personas</caption>
					<thead>
						<tr>
							<th>Id</th>
							<th>Area</th>
							<th>Encargado</th>
							<th>Nombre</th>
							<th># Serie</th>
							<th>Cantidad</th>
							<th>Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>4</td>
							<td>Area 1</td>
							<td>Hector</td>
							<td>Hector</td>
							<td>1234</td>
							<td>10</td>
							<td>probando todo esto</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Area 1</td>
							<td>Jano</td>
							<td>Alvaro</td>
							<td>1234</td>
							<td>10</td>
							<td>probando todo esto</td>
						</tr>

					</tbody>
				</table>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<h3>Editar personas <span></span></h3>
							Ultima actualizacion: <i></i>
							<?php // include 'form.php'; ?>
						</div>
						<div class="col-md-6">
							<div class="contentBardcode">
								<div class="barCode">
									<header>
										<h4>Código</h4>
									</header>
									<canvas id="searchBarcode" width="120" height="70"></canvas>
								</div>
								<a href="#" class="btn btn-primary">Guardar</a>
								<div class="alert"></div>
							</div>
						</div>
					</div>
				</div>
			</artivle>-->
		</section>
	</div>
	<footer>
		<p>
			- © Copyright 2014 -
		</p>
	</footer>
</body>
</html>
