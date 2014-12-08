<?php
// Connect to MySQL
$link = mysql_connect( 'localhost', 'root', '' );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( 'mpc', $link );
if ( !$db ) {
  die ( 'Error selecting database \'chart\' : ' . mysql_error() );
}

// Fetch the data
$query = "SELECT
             persona.rut_persona,
             persona.nombre,
             persona.apellido,
             registro_persona.fecha_entrada,
             registro_persona.fecha_salida,
             SUM(hora_salida-hora_entrada)
          FROM registro_persona
          Inner Join persona ON registro_persona.rut_persona = persona.rut_persona
          WHERE tipo_persona = 'Empleado'
          GROUP BY rut_persona";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "category": "' . $row['fecha_entrada'] . '",' . "\n";
  echo '  "value1": ' . $row['SUM(hora_salida-hora_entrada)']/10000 . ',' . "\n";
  echo '  "value2": ' . $row['SUM(hora_salida-hora_entrada)'] /10000 . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysql_close($link);
?>
