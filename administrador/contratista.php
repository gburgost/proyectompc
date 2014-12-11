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
	<script src="../scripts/bootstrap.js"></script>

	<script>
		$('.dropdown-toogle').dropdown();

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
				<li role="presentation" class="dropdown active">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Registrar <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu" role="menu">
				      	<li><a href="index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Empleado</a></li>
						<li><a href="#"><span class="icon-business-card"></span>Contratista</a></li>
				    </ul>
				  </li>
				<li><a href="buscar.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Buscar Empleado</a></li>
				<li><a href="hh.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Horas Trabajadas</a></li>
				<li><a href="grafico.php"><span class="icon-stats"></span>Estadísticas</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Registrar Contratista</h4><hr></header>
		<section>
			<article id="aRegister">
				<div class="container-fluid">
					<form id="fRegister" class="form" name="form" action="registro_contratista.php" enctype="multipart/form-data" method="POST">
						<div class="row">
							<div class="col-md-6">
								<p>
									<label for="name">Nombre</label>
									<input id="name" class="form-control" name="name" type="text" tabindex="1"/>
								</p>

								<p>
									<label for="rut">Rut</label>
									<input id="rut" class="form-control" name="rut" type="text" tabindex="3" />
								</p>
								<p>
									<label for="empresa">Empresa</label>
									<input id="empresa" class="form-control" name="empresa" type="text" tabindex="5"/>
								</p>
								<p>
									<label for="dateinic">Fecha de inicio contrato</label>
									<input id="dateinic" class="form-control" name="dateinic" type="date" tabindex="7"/>
								</p>
								<p>
									<label for="descobra">Descripción Obra</label>
									<textarea id="descobra" class="form-control" name="descobra" type="text" tabindex="9"></textarea>
								</p>

							</div>
							<div class="col-md-6">
								<p>
									<label for="lastname">Apellidos</label>
									<input id="lastname" class="form-control" name="lastname" type="text" tabindex="2"/>
								</p>
								<p>
									<label for="date">Fecha Nacimiento</label>
									<input id="date" class="form-control" name="date" type="date" tabindex="4"/>
								</p>
								<p>
									<label for="contrato">Número de Contrato</label>
									<input id="contrato" class="form-control" name="contrato" type="number" tabindex="6"/>
								</p>
								<p>
									<label for="datefin">Fecha de fin contrato</label>
									<input id="datefin" class="form-control" name="datefin" type="date" tabindex="8"/>
								</p>
								<p>
									<label for="foto">Foto de Contratista</label>
									<input name="foto" type="file" class="" id="foto" tabindex="10" />
								</p>
							<!--<div class="contentBardcode">
									<div class="barCode">
										<header>
											<h4>Código</h4>
										</header>
										<canvas id="registerBarcode" width="180" height="80"></canvas>
									</div>

									<input id="generar" class=" guardar btn btn-success" type="button" href="javascript:;" onclick="realizaProceso($('#rut').val());return false;" value="Generar Código de Barra"/>
								</div>
							-->
							</div>
						</div>
						<hr>
						<div id="botones">
							<button type="reset" class="btn btn-danger" >Limpiar</button>
							<button id="doRegister" class="btn btn-success" type="submit">Registrar</button>
						</div>
					</form>
				</div>
			</article>
		</section>
	</div>
	<footer>
		<p>
			- <strong>MPControl</strong> © 2014, un producto <strong>LPdigital</strong> -
		</p>
	</footer>
</body>
</html>
