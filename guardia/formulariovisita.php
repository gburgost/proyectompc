<form id="fRegister" class="form" name="form" action="registro_visita.php"  method="POST">

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
	<hr>
	<p>
		<input type="reset" class="btn btn-danger" value="Limpiar" />
		<input id="doRegister" class="btn btn-success" type="submit" value="Registrar">
	</p>
</form>



