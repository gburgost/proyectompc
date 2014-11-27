<?php
if(!empty($_POST['nombre'])){

   $nombre = $_POST['nombre'];

   if($nombre==='Gonzalo'){
      $return = array('telefono'=>'81564266','direccion'=>'Isabel Riquelme');
   } elseif($nombre=='Hector') {
      $return = array('telefono'=>'666666666','direccion'=>'call del diablo, Pais de las maravillas');
   } else {
      $return = array('error'=>'El nombre no esta guardado en la base de datos');
   }

   die(json_encode($return));
}
?>
