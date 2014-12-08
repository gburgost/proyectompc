<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>H.H</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script>
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
				<li><a href="contratista.php">Registrar Contratista</a></li>
				<li><a href="buscar.php">Buscar</a></li>
				<li class="active"><a href="hh.php">Horas Hombre</a></li>
				<li><a href="grafico.php">Estadísticas</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Cálculo HH de los Empleados</h4></header>
		<section>
			<article id="aSearch">
			<form method="POST" action="return false" onsubmit="return false">
				<div class="row">
					<div class="col-md-6">
						<label for="desde">Mes: </label>
						<input type="month" id="desde" name="desde" class="form-control"/><br/>
					</div>
					<div class="col-md-6">
						<button class="btn center btn-success"  onclick="consultar(document.getElementById('desde').value);">Consultar</button>
						<button class="btn center btn-danger" type="reset">Limpiar</button>
					</div>
				</div>
				<hr>
			</form>
			<script>
                function consultar(desde)
                {
                  $.ajax({
                    url: "consultarhh.php",
                    type: "POST",
                    data: "desde="+desde,
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
			- © Copyright 2014 -
		</p>
	</footer>

</body>
</html>
