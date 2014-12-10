<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscar</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script src="../scripts/bootstrap.js"></script>
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
				<li role="presentation" class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Registrar <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu" role="menu">
				      	<li><a href="index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Empleado</a></li>
						<li><a href="contratista.php"><span class="icon-business-card"></span>Contratista</a></li>
				    </ul>
				  </li>
				<li class="active"><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Buscar Empleado</a></li>
				<li><a href="hh.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Horas Trabajadas</a></li>
				<li><a href="grafico.php"><span class="icon-stats"></span>Estadísticas</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Buscar Persona</h4></header>
		<section>
			<article id="aSearch">
			<form method="POST" action="return false" onsubmit="return false">
				<div class="row">
					<div class="col-md-6">
						<label>Nombre: </label>
						<input id="persona" class="auto form-control" type="text" required/>
					</div>
					<div class="col-md-6">
						<label for="desde">Desde: </label>
						<input type="date" id="desde" name="desde" class="form-control"/><br/>
						<label for="hasta">Hasta: </label>
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
			- © Copyright 2014 -
		</p>
	</footer>

</body>
</html>
