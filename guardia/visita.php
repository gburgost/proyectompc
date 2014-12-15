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
	<title>Registrar Visita</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link href="css/ui-lightness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilo.css">

	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/prefixfree.min.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-barcode.js"></script>
	<script src="../scripts/reloj.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script src="../scripts/modernizr.js"></script>
	<script src="../scripts/bootstrap.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/jquery-ui.custom.js"></script>

	<script>
		function registrar(name,rut,lastname,date)
        {
        var parametros = {
		    "name" : name,
		    "rut" : rut,
		    "lastname" : lastname,
		    "date" : date
		 };
          $.ajax({
            url: "registro_visita.php",
            type: "POST",
            data: parametros,
            success: function(resp){
              $('#resultado').html(resp);
              return false;

            }
          });
        }
		$(function() {
			//autocomplete
			$(".auto").autocomplete({
				source: "search.php",
				minLength: 1
			});

		});

		Modernizr.load({
        test: Modernizr.inputtypes.date,
        nope: "js/jquery-ui.custom.js",
        callback: function() {
          $("input[type=date]").datepicker();
        }
      	});


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
				<li>
					<a href="index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Acceso</a>
				</li>
				<li role="presentation" class="dropdown active">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Visita <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu" role="menu">
				      	<li><a href="visita.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Registrar</a></li>
						<li><a href="ticket.php"><span class="icon-business-card"></span>Generar Ticket</a></li>

				    </ul>
				  </li>

			</ul>
		</nav>
		<header id="titleContent">
		<h4 style="padding-bottom:1.5em;">Registar Visita</h4>
		<div id="reloj"></div>
		<hr></header>
		<section>
			<article id="aRegister">
				<div class="container-fluid">

					<form method="POST" action="return false" onsubmit="return false">
						<div class="row">
							<div class="col-md-6">
								<p>
									<label for="name">Nombre</label>
									<input id="name" class="form-control" name="name" type="text" required tabindex="1"/>
								</p>
								<p>
									<label for="rut">Rut</label>
									<input id="rut" class="form-control" name="rut" type="text" tabindex="3" />
								</p>
							</div>
							<div class="col-md-6">
								<p>
									<label for="lastname">Apellido</label>
									<input id="lastname" class="form-control" name="lastname" type="text" required tabindex="2"/>
								</p>
								<p>
									<label for="date">Fecha Nacimiento (AAAA-MM-DD)</label>
									<input id="date" class="form-control" name="date" type="date" tabindex="4"/>
								</p>
							</div>
							<p>
						</div>
						<hr>
						<div id="resultado"></div>
						<div id="botones">
							<button type="reset" class="btn btn-danger" >Limpiar</button>
							<button id="doRegister" class="btn btn-success"onclick = "registrar(document.getElementById('name').value, document.getElementById('rut').value, document.getElementById('lastname').value,document.getElementById('date').value);" >Registrar</button>

						</div>
					</form>

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
