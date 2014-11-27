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
        <h1>Administrador</h1>
      </div>
    </header>
    <section>
      <article id="aRegister">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <form action=".php" method="POST">
                <h2>Login</h2>
                <br>
                <label for="usuario">Usuario: </label>
                <input type="text" id="usuario" class="form-control" name="usuario" required />
                <br>
                <label for="pass">Contraseña: </label>
                <input type="password" id="pass" class="form-control" name="pass" required />
                <br>
                <p id="botones">
                  <button name="limpiar" type="reset" class="btn btn-danger">Borrar</button>
                  <button name="entrar" type="submit" class="btn btn-success">Ingresar</button>
                </p>

              </form>
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

