<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>MPC registros</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilo.css">
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-barcode.js"></script>

	<script>
		function realizaProceso(serial){
		        var parametros = {
		                "serial" : serial
		        };
		        $.ajax({
		                data:  parametros,
		                url:   '#',
		                type:  'post',
		                beforeSend: function () {
		                        $("#registerBarcode").html("Procesando, espere por favor...");
		                },

		                success:  function () {
		                        $('#registerBarcode').barcode(serial, "codabar", {barWidth:1, barHeight:60, output: "canvas" }
								);
		                }

		        });
		}
	</script>
</head>
<body>
	<div id="mainWrapper">
		<header>
			<figure id="logo">
				<img src="../img/logompc.png" alt="mpc" width="100" />
			</figure>
			<div class="titulos">
				<h1>Sistema de Control de <br>Acceso y Asistencia.</h1>
			</div>
			<div class="usuario">
				<strong>Administrador</strong>
				<p>Cristian Seura</p>
			</div>

		</header>
		<h3>Módulo Administrador</h3>
		<nav>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">Registrar Empleado al Sistema</a>
				</li>
				<li><a href="#">Registrar Contratista</a></li>
				<li><a href="buscar.php">Buscar</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Ingresar Nuevo Empleado</h4><hr></header>
		<section>
			<article id="aRegister">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<?php include 'form.php'; ?>
						</div>
						<div class="col-md-6">
							<div class="contentBardcode">
								<div class="barCode">
									<header>
										<h4>Código</h4>
									</header>
									<canvas id="registerBarcode" width="180" height="80"></canvas>
								</div>

								<input id="generar" class=" guardar btn btn-success" type="button" href="javascript:;" onclick="realizaProceso($('#rut').val());return false;" value="Generar Código de Barra"/>
							</div>
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
