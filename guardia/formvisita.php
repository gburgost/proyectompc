<form method="POST" action="return false"  onsubmit="return false">

	<p>
		<input id="rut" class="registrar form-control" name="rut" type="text" required />
		<input type="reset" class="borrar btn btn-danger" value="X" />
	</p>
	<div class="row">
		<div class="col-md-6">
				<p>
					<label for="visitado">Visita a: </label>
					<input id="visitado" name="visitado" class="auto form-control" type="text"/>
				</p>
		</div>
		<div class="col-md-6">
			<p>
				<label for="empresa">Empresa: </label>
				<input id="empresa" name="empresa"type="text" class="form-control /">
			</p>
		</div>
	</div>
	<span id="resultado"></span>
	<hr>
	<p id="botones">
		<button class="btn btn-success" onclick = "entrar(document.getElementById('rut').value, document.getElementById('visitado').value, document.getElementById('empresa').value);">Entrada</button>
		<button class="btn btn-danger" onclick = "salir(document.getElementById('rut').value);">Salida</button>
	</p>
</form>
