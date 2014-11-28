<?php
	include 'conexion.php';

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
            	$nombre    = $_POST['name'];
      				$apellido  = $_POST['lastname'];
      				$rut1      = $_POST['rut'];
      				$rut2      = $_POST['rut'];
      				$fechanacimiento = $_POST['date'];
      				$nro_contrato = $_POST['contrato'];
      				$empresa = $_POST['empresa'];
      				$fechainic = $_POST['dateinic'];
      				$fechafin = $_POST['datefin'];
              $obra = $_POST ['descobra'];
      				$tipo_persona = "Contratista";

              $tfoto = "archivos/".$_FILES["foto"]["name"]."";


              $sql = "INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona, foto) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona', '$tfoto')";

              $sql2 = "INSERT INTO contratista (id_contratista, rut_persona, nro_contrato, empresa_contratista, fecha_inicio_contrato, fecha_fin_contrato, descrip_obra) VALUES ('', '$rut2', '$nro_contrato', '$empresa', '$fechainic', '$fechafin', '$obra')";

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


/*

	mysql_query("INSERT INTO persona (id, rut_persona, nombre, apellido, fecha_nac, tipo_persona) VALUES('', '$rut1', '$nombre', '$apellido', '$fechanacimiento' ,'$tipo_persona' )");

	mysql_query("INSERT INTO empleado ( id_empleado, rut_persona, fecha_vinculacion, fecha_desvinculacion, tipo_contrato, cargo, id_departamento, foto) VALUES ('', '$rut2', '$fechavin', '$fechades', '$tipo_contrato', '$cargo', '$id_departamento', '$tfoto')");
*/

?>
