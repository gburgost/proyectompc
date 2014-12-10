<?
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
     include 'conexion.php';
     $desde    = $_POST['desde'];
     $hasta    = $_POST['hasta'];

    /* $ArrayFecha =explode('-', $desde);
     $x = $ArrayFecha[0] ."".$ArrayFecha[1] ."".$ArrayFecha[2];

     $ArrayFecha =explode('-', $hasta);
     $y = $ArrayFecha[0] ."".$ArrayFecha[1] ."".$ArrayFecha[2];

     $rango = ($y - $x) + 1; */

     $x = date_create($desde);
     $y = date_create($hasta);
     $rango = date_diff($x, $y);
     $dias = $rango->format('%a') +1;


     if (($dias >= '7')AND($dias<='7'))
     {
          if ($desde == '') {

          echo '<br/><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Complete los campos.</div>';
          }
          elseif ($hasta == '') {
               echo '<br/><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Complete los campos.</div>';
          }
          else
          {
              /* $ArrayFecha =explode('-', $desde);
               $desde = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

               $ArrayFecha =explode('-', $hasta);
               $hasta = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];*/
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
               WHERE tipo_persona = 'Empleado'  AND fecha_entrada >= '$desde' AND fecha_salida <= '$hasta'
               GROUP BY rut_persona");



               while($row=mysqli_fetch_array($result))
               {
                         $hora = $row['SUM(hora_salida-hora_entrada)'];
                         echo "<tbody>";
                         echo "<tr>";
                         echo "<td>" . $row['nombre'].' '.$row['apellido']. "</td>";
                         echo "<td>";
                         $horaex = (($hora) / 10000)-45;
                         $horat = ($hora) / 10000;
                         if ($horat >= 45) {
                              echo "45";
                         }else{
                              echo  $horat;
                         }
                         echo "</td>";
                         echo "<td>";
                         if ($horaex < 0) {
                              echo "0";
                         }else{
                              echo $horaex;
                         }
                         echo "</td>";
                         echo "<td>";
                         echo $horat;
                         echo "</td>";
                         echo "</tr>";

               }
               echo "<tbody>";
               echo "</table>";


          }
     }
     else
     {
          echo '<br/><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Seleccione un rango de <strong>7 días</strong>.</div>';
     }



     mysqli_close($conexion);
?>
