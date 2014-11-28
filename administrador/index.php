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
				<li><a href="contratista.php">Registrar Contratista</a></li>
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
									<canvas id="registerBarcode" width="280" height="80"></canvas>
								</div>

								<input id="generar" class=" guardar btn btn-success" type="button" href="javascript:;" onclick="realizaProceso($('#rut').val());return false;" value="Generar Código de Barra"/>
							</div>
						</div>
					</div>
				</div>
			</article>
		</section>
	</div>
	<script src="../scripts/jquery.min.js"></script>
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
		                        $('#registerBarcode').barcode(serial, "codabar", {barWidth:2, barHeight:30, output: "canvas" }
								);
		                }

		        });
		}
	</script>
	<footer>
		<p>
			- © Copyright 2014 -
		</p>
	</footer>
</body>
</html>
