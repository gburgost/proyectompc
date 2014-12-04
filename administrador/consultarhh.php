<?
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
     include 'conexion.php';
     $desde    = $_POST['desde'];

     if ($desde == "") {

          echo '<br/><div class="alert alert-danger" role="alert">Complete los campos.</div>';

     }
     else{
          $ArrayFecha =explode('-', $mes1 = $_POST['desde']);
          $mes1 = $ArrayFecha[0] ."-".$ArrayFecha[1] ."-1" ;
          $ArrayFecha =explode('-', $mes2 = $_POST['desde']);
          $mes2 = $ArrayFecha[0] ."-".$ArrayFecha[1] ."-30" ;


          echo '<table id="tSearch" class="table table-hover" cellspacing="1"> ';
          echo '<caption>Horas trabajadas del personal</caption>';
          echo "<thead>
                    <tr>
                         <th>Nombre</th>
                         <th align='center'>Horas Normales</th>
                         <th align='center'>Horas Extras</th>
                         <th align='center'>Total Horas</th>
                    </tr>
               </thead>";

          $result = mysqli_query($conexion,
               "SELECT
                         persona.rut_persona,
                         persona.nombre,
                         persona.apellido,
                         registro_persona.fecha_entrada,
                         registro_persona.fecha_salida,
                         SUM(hora_salida-hora_entrada)
          FROM registro_persona
          Inner Join persona ON registro_persona.rut_persona = persona.rut_persona
          WHERE tipo_persona = 'Empleado' AND fecha_entrada >= '$mes1' AND fecha_salida <= '$mes2'
          GROUP BY rut_persona");



          while($row=mysqli_fetch_array($result))
          {
                    $hora = $row['SUM(hora_salida-hora_entrada)'];
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['nombre'].' '.$row['apellido']. "</td>";
                    echo "<td>";
                    $horaex = (($hora) / 10000)-180;
                    $horat = ($hora) / 10000;
                    echo  $horat;
                    echo "</td>";
                    echo "<td>";
                    if ($horaex < 0) {
                         echo "0";
                    }else{
                         echo $horaex;
                    }
                    echo "</td>";
                    echo "<td> total</td>";
                    echo "</tr>";

          }
          echo "<tbody>";
          echo "</table>";


     }

     mysqli_close($conexion);
?>
