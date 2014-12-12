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
	<link rel="stylesheet" href="../css/estilo.css">

	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/prefixfree.min.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-barcode.js"></script>
	<script src="../scripts/reloj.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script src="../scripts/bootstrap.js"></script>

	<script>
		function ticket(name,empresa,visita)
        {
        var parametros = {
		    "name" : name,
		    "empresa" : empresa,
		    "visita" : visita
		 };
          $.ajax({
            url: "genera_ticket.php",
            type: "POST",
            data: parametros,
            success: function(resp){
              window.print();
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
		$(function() {
			//autocomplete
			$(".autovisita").autocomplete({
				source: "searchvisita.php",
				minLength: 1
			});
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

				<div id="resultado"></div>

					<form method="GET" action="generar_ticket.php">
						<div class="row">
							<div class="col-md-6">
								<p>
									<label for="name">Nombre de Visita</label>
									<input id="visita" name="visita" class="autovisita form-control" type="text" tabindex="1"/>
								</p>
								<p>
									<label for="empresa">Empresa: </label>
									<input id="empresa" name="empresa"type="text" class="form-control" tabindex="3"/>
								</p>
							</div>
							<div class="col-md-6">
								<p>
									<label>Visita a: </label>
									<input name="empleado" id="persona" class="auto form-control" type="text" tabindex="2" required/>
								</p>
							</div>
							<p>
						</div>
						<hr>
						<div id="botones">
							<button type="reset" class="btn btn-danger" >Limpiar</button>
							<button id="doRegister" class="btn btn-success" type="submit" formtarget="_blank">Generar Ticket</button>

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
