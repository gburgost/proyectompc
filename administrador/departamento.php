<?php
/*definición de la función*/
/*ejecución de la función*/
                    $conexion=mysql_connect('localhost', 'root', '')
                    or die("Problemas en la conexion");
                    mysql_select_db("mpc",$conexion) or
                    die("Problemas en la seleccion de la base de datos");
                    $ssql="SELECT id_departamento, CONCAT( nombre_departamento ) AS FNAME FROM departamento order by FNAME";
                    saca_menu_desplegable2($ssql,1,'FNAMES');
/*definición de la función*/
						function saca_menu_desplegable2($ssql,$valor,$nombre){
					   echo "<select id='id_departamento' name='id_departamento' class='form-control' >";
					   echo "<option value=''>Seleccione Departamento</option> ";
					   $resultado=mysql_query($ssql);
					   while ($fila=mysql_fetch_row($resultado)){
					     if ($fila[0]==$valor){
					       echo "<option selected value='$fila[1]'>$fila[1]</option>";
					     }
					     else{
					       echo "<option value='$fila[1]'>$fila[1]</option>";
					     }
					  }
					   echo "</select>";
					}
?>
