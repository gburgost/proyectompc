<?php include 'conexion.php'; ?>
<?@session_start();
if($_SESSION["autentica"] != "SIP"){
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Estadísticas</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<script src="../scripts/amcharts.js"></script>
	<script src="../scripts/serial.js"></script>
	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script src="../scripts/bootstrap.js"></script>

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
				<li role="presentation" class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Registrar <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu" role="menu">
				      	<li><a href="index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Empleado</a></li>
						<li><a href="contratista.php"><span class="icon-business-card"></span>Contratista</a></li>
						<li><a href="vehiculo.php"><span class="icon-business-card"></span>Vehiculos</a></li>
						<li><a href="herramienta.php"><span class="glyphicon glyphicon-wrench"></span>Herramientas</a></li>
						<li><a href="maquina.php"><span class="icon-business-card"></span>Maquinas</a></li>
				    </ul>
				  </li>
				<li><a href="buscar.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Buscar </a></li>
				<li><a href="hh.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Horas Trabajadas</a></li>
				<li class="active"><a href="#"><span class="icon-stats"></span>Estadísticas</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Estadísticas</h4></header>
		<section>
			<article id="aSearch">
			<script>
				$('.dropdown-toogle').dropdown();

				AmCharts.loadJSON = function(url) {
				  // create the request
				  if (window.XMLHttpRequest) {
				    // IE7+, Firefox, Chrome, Opera, Safari
				    var request = new XMLHttpRequest();
				  } else {
				    // code for IE6, IE5
				    var request = new ActiveXObject('Microsoft.XMLHTTP');
				  }

				  // load it
				  // the last "false" parameter ensures that our code will wait before the
				  // data is loaded
				  request.open('GET', url, false);
				  request.send();

				  // parse adn return the output
				  return eval(request.responseText);
				};
  			</script>

  <!-- chart container -->
  <p>Cantidad de Registros</p>
  <div id="chartdiv" style="width: 100%; height: 300px;"></div>
  <p align="right">Tiempo</p>

  <!-- the chart code -->
  <script>
var chart;

// create chart
AmCharts.ready(function() {

  // load the data
  var chartData = AmCharts.loadJSON('data.php');

  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.pathToImages = "http://www.amcharts.com/lib/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "fecha";
  chart.dataDateFormat = "YYYY-MM-DD";

  // GRAPHS

  var graph1 = new AmCharts.AmGraph();
  	graph1.valueField = "value1";
	graph1.colorField = "color";
	graph1.balloonText = "<b>[[category]]: [[value]]</b>";
	graph1.type = "column";
	graph1.lineAlpha = 0;
	graph1.fillAlphas = 1;
	chart.addGraph(graph1);



  // CATEGORY AXIS
  chart.categoryAxis.parseDates = true;

  // WRITE
  chart.write("chartdiv");
});

  </script>
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
