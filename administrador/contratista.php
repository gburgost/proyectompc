<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
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

	<script>
		function realizaProceso(rut){
		        var parametros = {
		                "rut" : rut
		        };
		        $.ajax({
		                data:  parametros,
		                url:   '#',
		                type:  'post',
		                beforeSend: function () {
		                        $("#registerBarcode").html("Procesando, espere por favor...");
		                },

		                success:  function () {
		                        $('#registerBarcode').barcode(rut, "codabar", {barWidth:1, barHeight:60, output: "canvas" }
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
				<li>
					<a href="index.php">Registrar Empleado al Sistema</a>
				</li>
				<li class="active"><a href="#">Registrar Contratista</a></li>
				<li><a href="buscar.php">Buscar</a></li>
				<li><a href="hh.php">H.H</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Registrar Persona</h4><hr></header>
		<section>
			<article id="aRegister">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<?php include 'formcontratistas.php'; ?>
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
		</section>
	</div>
	<footer>
		<p>
			hola
		</p>
	</footer>
</body>
</html>
