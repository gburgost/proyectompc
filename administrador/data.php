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
          GROUP BY fecha_entrada, fecha_salida";
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
  echo '  "fecha": "' . $row['fecha_entrada'] . '",' . "\n";
  echo '  "value1": ';
  $suma = $row['SUM(hora_salida-hora_entrada)']/10000;
  if ($suma>9) {
    echo $suma;
  }
  else{
    echo "0";
  }
  echo '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysql_close($link);
?>
