<?php
	include 'conexion.php';

  if(empty($_POST["name"])){
      echo "<script>
              alert('Debe ingresar un nombre');
              location.href='index.php';</script>";
    }else if (empty($_POST["lastname"])){
      echo "<script>
              alert('Debe ingresar un apellidos');
              location.href='index.php';</script>";
    }else if (empty($_POST["rut"])){
      echo "<script>
              alert('Debe ingresar un rut');
              location.href='index.php';</script>";
    }else if (empty($_POST["date"])){
      echo "<script>
              alert('Debe ingresar una fecha');
              location.href='index.php';</script>";
    }else if (empty($_POST["cargo"])){
      echo "<script>
              alert('Debe ingresar el cargo');
              location.href='index.php';</script>";
    }else if (empty($_POST["tipo_contrato"])){
      echo "<script>
              alert('Debe ingresar el tipo de contrato');
              location.href='index.php';</script>";
    }else if (empty($_POST["fechavin"])){
      echo "<script>
              alert('Debe ingresar una fecha');
              location.href='index.php';</script>";
    }else if (empty($_POST["id_departamento"])){
      echo "<script>
              alert('Debe ingresar el departamento');
              location.href='index.php';</script>";
    }
    else{
	/*move_uploaded_file($_FILES["foto"]["tmp_name"],"archivos/" . $_FILES["foto"]["name"]);
	$tfoto = "archivos/".$_FILES["foto"]["name"]."";*/

	if ((($_FILES["foto"]["type"] == "image/gif") ||
    ($_FILES["foto"]["type"] == "image/jpeg") ||
    ($_FILES["foto"]["type"] == "image/pjpeg")) &&
    ($_FILES["foto"]["size"] < 2000000)) {

    //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
      if ($_FILES["foto"]["error"] > 0) {
        echo $_FILES["foto"]["error"] . "<br />";
      } else {
          // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
          if (file_exists("archivos/" . $_FILES["foto"]["name"])) {
            echo $_FILES["foto"]["name"] . " ya existe. ";
          } else {
           // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
            move_uploaded_file($_FILES["foto"]["tmp_name"],
            "archivos/" . $_FILES["foto"]["name"]);
            	$nombre = $_POST['name'];
      				$apellido = $_POST['lastname'];
      				$rut1 = $_POST['rut'];
      				$rut2 = $_POST['rut'];
      				$fechanacimiento = $_POST['date'];
      				$id_departamento = $_POST['id_departamento'];
      				$cargo = $_POST['cargo'];
      				$tipo_contrato = $_POST['tipo_contrato'];
      				$fechavin = $_POST['fechavin'];
      				$fechades = $_POST['fechades'];
      				$tipo_persona = "Empleado";

              $tfoto = "archivos/".$_FILES["foto"]["name"]."";


              $sql = "INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona, foto) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona', '$tfoto')";

              $sql2 = "INSERT INTO empleado (id_empleado, rut_persona, fecha_vinculacion, fecha_desvinculacion, tipo_contrato, cargo, id_departamento) VALUES ('', '$rut2', '$fechavin', '$fechades', '$tipo_contrato', '$cargo', '$id_departamento')";

              mysqli_query($conexion, $sql) or die(mysql_error($conexion));
              mysqli_query($conexion, $sql2) or die(mysql_error($conexion));


              echo "<script>
              alert('Registro realizado con exito');
              location.href='index.php';</script>";
              exit();

          }
      }
    } else {
        // Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
        echo "Archivo no permitido";
    }
  }


/*

	mysql_query("INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona' )");

	mysql_query("INSERT INTO empleado ( id_empleado, rut_persona, fecha_vinculacion, fecha_desvinculacion, tipo_contrato, cargo, id_departamento, foto) VALUES ('', '$rut2', '$fechavin', '$fechades', '$tipo_contrato', '$cargo', '$id_departamento', '$tfoto')");
*/

?>
