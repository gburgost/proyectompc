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
	<title>Buscar</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link href="css/ui-lightness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilo.css">
	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script src="../scripts/bootstrap.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/jquery-ui.custom.js"></script>
	<script>
		$('.dropdown-toogle').dropdown();

		$(function() {

			//autocomplete
			$(".auto").autocomplete({
				source: "search.php",
				minLength: 1
			});

		});
		$(document).ready( function () {
		    $('#tSearch').DataTable();
		} );
		Modernizr.load({
        test: Modernizr.inputtypes.date,
        nope: "js/jquery-ui.custom.js",
        callback: function() {
          $("input[type=date]").datepicker();
        }
      	});
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
				<li class="active"><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Buscar</a></li>
				<li><a href="hh.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Horas Trabajadas</a></li>
				<li><a href="grafico.php"><span class="icon-stats"></span>Estadísticas</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Buscar Empleado | Contratista</h4></header>
		<section>
			<article id="aSearch">
			<form method="POST" action="return false" onsubmit="return false">
				<div class="row">
					<div class="col-md-6">
						<label>Nombre: </label>
						<input id="persona" class="auto form-control" type="text" required/>
					</div>
					<div class="col-md-6">
						<label for="desde">Desde (AAAA-MM-DD): </label>
						<input type="date" id="desde" name="desde" class="form-control"/><br/>
						<label for="hasta">Hasta (AAAA-MM-DD): </label>
						<input type="date" id="hasta" name="hasta" class="form-control"/><br/>
						<button class="btn btn-success"  onclick="consultar(document.getElementById('persona').value,document.getElementById('desde').value, document.getElementById('hasta').value);">Consultar</button>
						<button class="btn btn-danger" type="reset">Limpiar</button>
					</div>
				</div>
				<hr>
			</form>
			<script>
                function consultar(persona, desde, hasta)
                {
                  $.ajax({
                    url: "consultar.php",
                    type: "POST",
                    data: "persona="+persona+"&desde="+desde+"&hasta="+hasta,
                    beforeSend: function () {
		                        $("#resultados").html("<img src='../img/load.gif' />");
		                },
                    success: function(resp){
                      $('#resultados').html(resp);
                    }
                  });
                }
                </script>
                <div id="resultados">
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
