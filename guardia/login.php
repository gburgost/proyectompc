<?php
session_start();
if (isset($_SESSION['autentica']))
{
  echo '<script>location.href = "index.php";</script>';
}
else
{
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>MPC registros</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <script src="../scripts/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script src="../scripts/functions.js"></script>
  <script src="../scripts/prefixfree.min.js"></script>
  <script src="../scripts/jquery.dataTables.js"></script>
  <script src="../scripts/jquery-barcode.js"></script>
  </head>
  <body>
  <div id="mainWrapper">
    <header id="titleContent">
        <figure id="logo">
        <img src="../img/logompc.png" alt="mpc" width="100" />
      </figure>
      <div class="titulos login">
        <h1>Guardia</h1>
      </div>
    </header>
    <section>
      <article id="aRegister">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <form method="POST" action="return false" onsubmit="return false">
                <h2>Login</h2>
                <br>
                <div id="resultado"></div>
                <label for="user">Usuario: </label>
                <input type="text" id="user" class="form-control" name="user" required />
                <br>
                <label for="pass">Contraseña: </label>
                <input type="password" id="pass" class="form-control" name="pass" required />
                <br>
                <p id="botones">
                  <button name="limpiar" type="reset" class="btn btn-danger">Borrar</button>
                  <button class="btn btn-success" onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">Ingresar</button>
                </p>
              </form>
              <script>
                function Validar(user, pass)
                {
                  $.ajax({
                    url: "controlprueba.php",
                    type: "POST",
                    data: "user="+user+"&pass="+pass,
                    success: function(resp){
                      $('#resultado').fadeIn(1000).html(resp);
                    }
                  });
                }
                </script>
            </div>
            <div class="col-md-3">
            </div>
          </div>
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
<?php
}
?>

