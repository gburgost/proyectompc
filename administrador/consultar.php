<?
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
     include 'conexion.php';
     $persona  = $_POST['persona'];
     $desde    = $_POST['desde'];
     $hasta    = $_POST['hasta'];


     if ($persona == "" && $desde == "" && $hasta == "") {

          echo '<br/><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Complete los campos.</div>';

     }
          elseif ($persona == $_POST['persona'] && $desde == "" && $hasta == "")
          {
          list($nombre,$apellido) = explode(" ",$persona);
          /*El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
          htmlentities para evitar inyecciones SQL.*/
          $myusuario = mysqli_query($conexion, "SELECT * FROM persona  WHERE nombre =  '$nombre'");
          $nmyusuario = mysqli_num_rows($myusuario);

          //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
          if($nmyusuario != 0)
          {
               $consulta="SELECT * FROM persona WHERE nombre = '$nombre'";
               //$myclave = mysqli_query($conexion,$consulta );
               $result = mysqli_query($conexion, $consulta);
               $nmyclave = mysqli_num_rows($result);
               //$result= mysqli_query($conexion, $myclave);

               while ($rowx = mysqli_fetch_array($result))
               {
                    $usu  = $rowx['rut_persona'];
                    $usu1 = $rowx['nombre'];
                    $usu2 = $rowx['apellido'];
                    $usu3 = $rowx['tipo_persona'];
               }

               //Si la persona existe se imprimen los datos
               if($nmyclave != 0)
               {
                    echo '<label>Nombre: </label> '.$usu1.' '.$usu2.'.';
                    echo '<br/>';
                    echo '<label>Rut: </label> '.$usu.'.';
                    echo '<br/>';
                    echo '<label>'.$usu3.'</label>.';
                    echo '<br/><a class="" href="tarjetas.php?rut_persona='.$usu.'&nombre='.$usu1.'&apellido='.$usu2.'&tipo_persona='.$usu3.'" target="_blank">
                           <span class="icon-creditcards" aria-hidden="true"></span>Generar Tarjeta
                         </a>';
                    echo '<a type="button" class="print" href="reporte_historial.php?rut_persona='.$usu.'&desde='.$desde.'&hasta='.$hasta.'" target="_blank" aria-label="Left Align">
                           <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                         </a>';
                    echo '<table id="tSearch" class="table table-hover" cellspacing="1"> ';
                    echo '<caption>Registros</caption>';
                    echo '<thead>
                                   <tr>
                                        <th>Fecha Entrada</th>
                                        <th>Hora Entrada</th>
                                        <th>Guardia Entrada</th>
                                        <th>Fecha Salida</th>
                                        <th>Hora Salida</th>
                                        <th>Guardia Salida</th>
                                   </tr>
                              </thead>';
                    $con = new DB;
                    $historial = $con->conectar();
                    $persona= $usu;
                    $strConsulta =
                     "SELECT registro_persona.fecha_entrada,
                               registro_persona.hora_entrada,
                               registro_persona.fecha_salida,
                               registro_persona.hora_salida,
                               registro_persona.rut_guardia1,
                               guardia.nombre_guardia,
                               guardia.apellido_guardia,
                               guardia.rut_guardia


                    FROM registro_persona
                    Inner Join guardia ON registro_persona.rut_guardia = guardia.rut_guardia
                    WHERE registro_persona.rut_persona = '$persona' ORDER by cod_registro DESC";

                    $historial = mysql_query($strConsulta);
                    $numfilas = mysql_num_rows($historial);

                    for ($i=0; $i<$numfilas; $i++)
                    {
                         $fila = mysql_fetch_array($historial);

                         if($i%2 == 1)
                         {
    $ArrayFecha =explode('-', $fecha_entrada = $fila['fecha_entrada']);
     $fecha_entrada = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

     $ArrayFecha =explode('-', $fecha_salida = $fila['fecha_salida']);
     $fecha_salida = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fecha_entrada."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['nombre_guardia'].' '.$fila['apellido_guardia']."</td>";
                              echo "<td>".$fecha_salida."</td>";
                              if ($fila['hora_salida'] > '18:00:00') {
                                   echo "<td BGCOLOR='#C55E5B'>".$fila['hora_salida']."</td>";
                              }
                              else{
                                   echo "<td>".$fila['hora_salida']."</td>";
                              }
                              echo "<td>".$fila['rut_guardia1']."</td>";
                              echo "</tr>";
                         }
                         else
                         {
    $ArrayFecha =explode('-', $fecha_entrada = $fila['fecha_entrada']);
     $fecha_entrada = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

     $ArrayFecha =explode('-', $fecha_salida = $fila['fecha_salida']);
     $fecha_salida = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fecha_entrada."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['nombre_guardia'].' '.$fila['apellido_guardia']."</td>";
                              echo "<td>".$fecha_salida."</td>";
                              if ($fila['hora_salida'] > '18:00:00') {
                                   echo "<td BGCOLOR='#C55E5B'>".$fila['hora_salida']."</td>";
                              }
                              else{
                                   echo "<td>".$fila['hora_salida']."</td>";
                              }
                              echo "<td>".$fila['rut_guardia1']."</td>";
                              echo "</tr>";
                         }
                    }
                              echo "</tbody>";
                              echo "</table>";
               }
               else
               {
                    echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Completa los campos.</div>';
               }
          }
          else
          {
               echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Datos mal ingresados.</div>';
          }
          }
     else{

          list($nombre,$apellido) = explode(" ",$persona);

          /*El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
          htmlentities para evitar inyecciones SQL.*/
          $myusuario = mysqli_query($conexion, "SELECT * FROM persona  WHERE nombre =  '$nombre'");
          $nmyusuario = mysqli_num_rows($myusuario);

          //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
          if($nmyusuario != 0)
          {
               $consulta="SELECT * FROM persona WHERE nombre = '$nombre'";
               //$myclave = mysqli_query($conexion,$consulta );
               $result = mysqli_query($conexion, $consulta);
               $nmyclave = mysqli_num_rows($result);
               //$result= mysqli_query($conexion, $myclave);

               while ($rowx = mysqli_fetch_array($result))
               {
               $usu= $rowx['rut_persona'];
               $usu1= $rowx['nombre'];
               $usu2= $rowx['apellido'];
               $usu3 = $rowx['tipo_persona'];
               }

               //Si la persona existe se imprimen los datos
               if($nmyclave != 0)
               {
                    echo '<label>Nombre: </label> '.$usu1.' '.$usu2.'.';
                    echo '<br/>';
                    echo '<label>Rut: </label> '.$usu.'.';
                    echo '<br/>';
                    echo '<label>'.$usu3.'</label>.';
                    echo '<a type="button" class="print" href="reporte_historial.php?rut_persona='.$usu.'&desde='.$desde.'&hasta='.$hasta.'" target="_blank" aria-label="Left Align">
                           <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                         </a>';
                    echo '<table id="tSearch" class="table table-hover" cellspacing="1"> ';
                    echo '<caption>Registros</caption>';
                    echo '<thead>
                                   <tr>
                                        <th>Fecha Entrada</th>
                                        <th>Hora Entrada</th>
                                        <th>Guardia Entrada</th>
                                        <th>Fecha Salida</th>
                                        <th>Hora Salida</th>
                                        <th>Guardia Salida</th>
                                   </tr>
                              </thead>';
                    $con = new DB;
                    $historial = $con->conectar();
                    $persona= $usu;
                    $strConsulta =
                         "SELECT  registro_persona.fecha_entrada,
                               registro_persona.hora_entrada,
                               registro_persona.fecha_salida,
                               registro_persona.hora_salida,
                               registro_persona.rut_guardia1,
                               guardia.nombre_guardia,
                               guardia.apellido_guardia,
                               guardia.rut_guardia

                         FROM registro_persona
                         Inner Join guardia ON registro_persona.rut_guardia = guardia.rut_guardia
                         WHERE registro_persona.rut_persona = '$persona' AND registro_persona.fecha_entrada >= '$desde' AND registro_persona.fecha_salida <= '$hasta' ORDER by cod_registro DESC";

                    $historial = mysql_query($strConsulta);
                    $numfilas = mysql_num_rows($historial);

                    for ($i=0; $i<$numfilas; $i++)
                    {
                         $fila = mysql_fetch_array($historial);

                         if($i%2 == 1)
                         {
                              $ArrayFecha =explode('-', $fecha_entrada = $fila['fecha_entrada']);
                              $fecha_entrada = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

                              $ArrayFecha =explode('-', $fecha_salida = $fila['fecha_salida']);
                              $fecha_salida = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fecha_entrada."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['nombre_guardia'].' '.$fila['apellido_guardia']."</td>";
                              echo "<td>".$fecha_salida."</td>";
                              if ($fila['hora_salida'] > '18:00:00') {
                                   echo "<td BGCOLOR='#C55E5B'>".$fila['hora_salida']."</td>";
                              }
                              else{
                                   echo "<td>".$fila['hora_salida']."</td>";
                              }
                              echo "<td>".$fila['rut_guardia1']."</td>";

                              echo "</tr>";
                         }
                         else
                         {
                              $ArrayFecha =explode('-', $fecha_entrada = $fila['fecha_entrada']);
                              $fecha_entrada = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

                              $ArrayFecha =explode('-', $fecha_salida = $fila['fecha_salida']);
                              $fecha_salida = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$fecha_entrada."</td>";
                              echo "<td>".$fila['hora_entrada']."</td>";
                              echo "<td>".$fila['nombre_guardia'].' '.$fila['apellido_guardia']."</td>";
                              echo "<td>".$fecha_salida."</td>";
                              if ($fila['hora_salida'] > '18:00:00') {
                                   echo "<td BGCOLOR='#C55E5B' >".$fila['hora_salida']."</td>";
                              }
                              else{
                                   echo "<td>".$fila['hora_salida']."</td>";
                              }
                              echo "<td>".$fila['rut_guardia1']."</td>";
                              echo "</tr>";
                         }
                    }
                              echo "</tbody>";
                              echo "</table>";
               }
               else
               {
                    echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 2.</div>';
               }
          }
          else
          {
               echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 3</div>';
          }
     }


     mysqli_close($conexion);
?>
