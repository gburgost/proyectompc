<form id="fRegister" class="form" name="form" action="registro_empleado.php" method="POST">

	<p>
		<label for="rut">Código</label>
		<input id="rut" class="form-control" name="rut" type="text" required />
		<span id="resultado"> </span>
	</p>
	<p>
		<!--<input id="generar" class="btn btn-info" type="button" href="javascript:;" onclick="realizaProceso($('#rut').val());return false;" value="Generar"/>-->
	</p>
	<hr>
	<p>
		<input type="reset" class="btn btn-danger" value="Limpiar"/>
		<button id="doRegister" type="submit" class="btn btn-success" onclick = "this.form.action = 'procesar_salida.php'" value="accion 1">Salida</button>
	</p>
</form>
