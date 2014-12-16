<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mpc');


if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare('SELECT id, nombre, apellido FROM persona WHERE (tipo_persona ="Empleado" OR tipo_persona="Contratista") AND nombre LIKE :term OR apellido LIKE :term');
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['nombre'].' '.$row['apellido'];
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>
