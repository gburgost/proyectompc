<form method="POST" action="return false" onsubmit="return false">

	<p>
		<input id="rut" class="registrar form-control" name="rut" type="text" required autofocus/>
		<input type="reset" class="borrar btn btn-danger" value="X" />
		<span id="resultado"></span>
	</p>
	<p>
		<!--<input id="generar" class="btn btn-info" type="button" href="javascript:;" onclick="realizaProceso($('#rut').val());return false;" value="Generar"/>-->
	</p>
	<hr>
	<p id="botones">
		<button class="btn btn-success" onclick = "entrar(document.getElementById('rut').value);">Entrada</button>
		<button class="btn btn-danger" onclick = "salir(document.getElementById('rut').value);">Salida</button>
	</p>
</form>
