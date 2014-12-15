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
				<strong><?php
					$guardia = $_SESSION["usuarioactual"];
					$encontrar = mysqli_query($conexion, "SELECT nombre, apellido FROM persona WHERE rut_persona = '$guardia'");
					$columna = mysqli_fetch_array($encontrar);
					echo 'Administrador: '.$columna["nombre"].' '.$columna["apellido"];

					?></strong>
					<br>
					<strong><?php
					echo 'Rut                  : ' .$guardia;
					?></strong>
					<br>
					<a href="logout.php">Cerrar Sesión</a>

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
						<li><a href="contratista.php"><span class="icon-business-card"></span>Contratista</a></li>
						<li><a href="#"><span class="icon-business-card"></span>Vehiculos</a></li>
						<li><a href="herramienta.php"><span class="glyphicon glyphicon-wrench"></span>Herramientas</a></li>
						<li><a href="maquina.php"><span class="icon-business-card"></span>Maquinas</a></li>
				    </ul>
				  </li>
				<li><a href="buscar.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Buscar Empleado</a></li>
				<li><a href="hh.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Horas Trabajadas</a></li>
				<li><a href="grafico.php"><span class="icon-stats"></span>Estadísticas</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Registrar Vehículo</h4><hr></header>
		<section>
			<article id="aRegister">
				<div class="container-fluid">


					<form id="fRegister" class="form" name="form" action="#" enctype="multipart/form-data" method="POST">
						<div class="row">
							<div class="col-md-6">

				<p>
		                          <label for="name">Tipo de Vehículo</label>
		                          <input id="name" class="form-control" name="name" type="text" />
		                     </p>

		                     <p>
		                     	<label for="name">Patente</label>
		                     	<input id="name" class="form-control" name="name" type="text" />
		                     	</p>
		                     </div>

		                     	<div class="col-md-6">

		                     	<p>
		                     		<label for="tipo_contrato">Propiedad del Vehículo</label>
		                     		<select name="tipo_contrato" class="form-control" id="tipo_contrato">
		                     			<option>Seleccione Propiedad del Vehículo</option>
		                     			<option>Interno</option>
		                     			<option>Externo</option>
		                     		</select>
		                     		</p>

		                     		<p>
		                     			<label for="descobra">Descripción del Vehículo</label>
		                     			<textarea id="descobra" class="form-control" name="descobra" type="text"></textarea>
		                     			</p>
		                     			<hr>
		                     		<p>
		                     	</div>
		                     </div>

		                     <div id="botones">
		                     	<button type="reset" class="btn btn-danger" >Limpiar</button>
		                     	<button id="doRegister" class="btn btn-success" type="submit">Registrar</button>
		                     </div>
		                     </p>
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
