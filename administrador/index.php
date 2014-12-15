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
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<link href="css/ui-lightness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
	<script src="js/modernizr.js"></script>
	<script src="js/jquery-ui.custom.js"></script>
	<script>
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
				<li role="presentation" class="dropdown active">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Registrar <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu" role="menu">
				      	<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Empleado</a></li>
						<li><a href="contratista.php"><span class="icon-business-card"></span>Contratista</a></li>
						<li><a href="vehiculo.php"><span class="icon-business-card"></span>Vehiculos</a></li>
						<li><a href="herramienta.php"><span class="glyphicon glyphicon-wrench"></span>Herramientas</a></li>
						<li><a href="maquina.php"><span class="icon-business-card"></span>Maquinas</a></li>
				    </ul>
				  </li>
				<li><a href="buscar.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Buscar Empleado</a></li>
				<li><a href="hh.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Horas Trabajadas</a></li>
				<li><a href="grafico.php"><span class="icon-stats"></span>Estadísticas</a></li>

			</ul>
		</nav>
		<header id="titleContent"><h4>Ingresar Nuevo Empleado</h4><hr></header>
		<section>
			<article id="aRegister">
				<div class="container-fluid">
					<form id="fRegister" class="form" name="form" action="registro_empleado.php" enctype="multipart/form-data"  method="POST">
						<div class="row">
							<div class="col-md-6">

								<p>
									<label for="name">Nombre</label>
									<input id="name" class="form-control" name="name" type="text"  tabindex="1"/>
								</p>
								<p>
									<label for="rut">Rut</label>
									<input id="rut" class="form-control" name="rut" type="text" tabindex="3" />
								</p>
								<p>
									<label for="cargo">Cargo</label>
									<input id="cargo" class="form-control" name="cargo" type="text" tabindex="5" />
								</p>
								<p>
									<label for="fechavin">Fecha de Vinculación (AAAA-MM-DD)</label>
									<input id="fechavin" class="form-control" name="fechavin" type="date" tabindex="7" />
								</p>
								<p>
									<label for="departamento">Departamento</label>
									<?php
					                    $conexion=mysql_connect('localhost', 'root', '')
					                    or die("Problemas en la conexion");
					                    mysql_select_db("mpc",$conexion) or
					                    die("Problemas en la seleccion de la base de datos");
					                    $ssql="SELECT id_departamento, CONCAT( nombre_departamento) AS FNAME FROM departamento order by FNAME";
					                    saca_menu_desplegable2($ssql,1,'FNAMES');
					/*definición de la función*/
											function saca_menu_desplegable2($ssql,$valor,$nombre){
										   echo "<select id='id_departamento' name='id_departamento' class='form-control'>";
										   $resultado=mysql_query($ssql);
										   while ($fila=mysql_fetch_row($resultado)){
										     if ($fila[0]==$valor){
										       echo "<option selected value='$fila[0]'>$fila[1]</option>";
										     }
										     else{
										       echo "<option value='$fila[0]'>$fila[1]</option>";
										     }
										  }
										   echo "</select>";
										}
					                    ?>
								</p>

							</div>
							<div class="col-md-6">

								<p>
									<label for="lastname">Apellidos</label>
									<input id="lastname" class="form-control" name="lastname" type="text"  tabindex="2"/>
								</p>
								<p>
									<label for="date">Fecha Nacimiento (AAAA-MM-DD)</label>
									<input id="date" class="form-control" name="date" type="date" tabindex="4"/>
								</p>
								<p>
									<label for="tipo_contrato">Tipo Contrato</label>
									<select name="tipo_contrato" class="form-control" id="tipo_contrato" tabindex="6">
										<option>Seleccione Tipo Contrato</option>
										<option>Plazo fijo</option>
										<option>Indefinido</option>
									</select>
								</p>

								<p>
									<label for="fechades">Fecha de Desvinculación (AAAA-MM-DD)</label>
									<input id="fechades" class="form-control" name="fechades" type="date" tabindex="8" />
								</p>
								<p>
									<label for="foto">Foto de Empleado</label>
									<input name="foto" type="file" class="" id="foto" tabindex="10"/>
								</p>

							<!--	<div class="contentBardcode">

								<div class="barCode">
										<header>
											<h4>Código</h4>
										</header>
										<div id="registerBarcode" width="280" height="80"></div>
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
	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/functions.js"></script>
	<script src="../scripts/jquery-ui.js"></script>
	<script src="../scripts/jquery.dataTables.js"></script>
	<script src="../scripts/jquery-barcode.js"></script>
	<script src="../scripts/bootstrap.js"></script>

	<script>
		$('.dropdown-toogle').dropdown();

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
		                        $('#registerBarcode').barcode(serial, "codabar", {barWidth:2, barHeight:30}
								);
		                }

		        });
		}
	</script>
	<footer>
		<p>
			- <strong>MPControl</strong> © 2014, un producto <strong>LPdigital</strong> -
		</p>
	</footer>
</body>
</html>
