<form id="fRegister" class="form" name="form" action="registro_empleado.php" enctype="multipart/form-data"  method="POST">

	<p>
		<label for="name">Nombre</label>
		<input id="name" class="form-control" name="name" type="text" required/>
	</p>
	<p>
		<label for="lastname">Apellido</label>
		<input id="lastname" class="form-control" name="lastname" type="text" required/>
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
		<label for="departamento">Departamento</label>
		<?php include 'departamento.php'; ?>
	</p>
	<p>
		<label for="cargo">Cargo</label>
		<input id="cargo" class="form-control" name="cargo" type="text" />
	</p>
	<p>
		<label for="tipo_contrato">Tipo Contrato</label>
		<select name="tipo_contrato" class="form-control" id="tipo_contrato">
			<option>Seleccione Tipo Contrato</option>
			<option>Plazo fijo</option>
			<option>Indefinido</option>
		</select>
	</p>
	<p>
		<label for="fechavin">Fecha de Vinculación</label>
		<input id="fechavin" class="form-control" name="fechavin" type="date" />
	</p>
	<p>
		<label for="fechades">Fecha de Desvinculación</label>
		<input id="fechades" class="form-control" name="fechades" type="date" />
	</p>
	<p>
		<label for="foto">Foto de Empleado</label>
		<input name="foto" type="file" class="" id="foto" />
	</p>
	<hr>
	<p>
		<input type="reset" class="btn btn-danger" value="Limpiar" />
		<input id="doRegister" class="btn btn-success" type="submit" value="Registrar">
	</p>
</form>



