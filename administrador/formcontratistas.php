<form id="fRegister" class="form" name="form" action="registro_contratista.php" enctype="multipart/form-data" method="POST">

	<p>
		<label for="name">Nombre</label>
		<input id="name" class="form-control" name="name" type="text" />
	</p>
	<p>
		<label for="lastname">Apellido</label>
		<input id="lastname" class="form-control" name="lastname" type="text" />
	</p>

	<p>
		<label for="rut">Rut</label>
		<input id="rut" class="form-control" name="rut" type="text"  />
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
		<label for="empresa">Empresa</label>
		<input id="empresa" class="form-control" name="empresa" type="text" />
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
		<label for="descobra">Descripcion Obra</label>
		<textarea id="descobra" class="form-control" name="descobra" type="text"></textarea>
	</p>
	<p>
		<label for="foto">Foto de Contratista</label>
		<input name="foto" type="file" class="" id="foto" />
	</p>
	<hr>
	<p>
		<input type="reset" class="btn btn-danger" value="Limpiar" />
		<input id="doRegister" class="btn btn-success" type="submit" value="Registrar">
	</p>
</form>
