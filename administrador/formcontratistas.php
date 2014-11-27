<form id="fRegister" class="form" name="form" action="#" method="POST">

	<p>
		<label for="name">Nombre</label>
		<input id="name" class="form-control" name="name" type="text" />
	</p>
	<p>
		<label for="lastname">Apellido</label>
		<input id="lastname" class="form-control" name="lastname" type="text" />
	</p>

	<p>
		<label for="serial">Rut</label>
		<input id="serial" class="form-control" name="serial" type="text"  />
	</p>
	<p>
		<input id="generar" class="btn btn-info" type="button" href="javascript:;" onclick="realizaProceso($('#serial').val());return false;" value="Genrerar"/>
	</p>
	<p>
		<label for="date">Fecha Nacimiento</label>
		<input id="date" class="form-control" name="date" type="date" />
	</p>

	<p>
		<label for="contrato">Número de Contrato</label>
		<input id="contrato" class="form-control" name="contrato" type="number" />
	</p>
	<p>
		<label for="dateinic">Fecha de inicio contrato</label>
		<input id="dateinic" class="form-control" name="dateinic" type="date" />
	</p>
	<p>
		<label for="dateinic">Fecha de inicio contrato</label>
		<input id="dateinic" class="form-control" name="dateinic" type="date" />
	</p>
	<p>
		<label for="datefin">Fecha de fin contrato</label>
		<input id="datefin" class="form-control" name="datefin" type="date" />
	</p>

	<p>
		<input type="reset" class="btn btn-danger" value="Limpiar" />
		<input id="doRegister" class="btn" type="submit" value="registrar">
	</p>
	<div class="alert alert-success" role="alert"></div>
</form>
