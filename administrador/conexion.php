<?php

	define("DB_HOST","localhost" );
 	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_DATABASE", "mpc" );


		$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);


class DB{
	var $conect;

	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	function DB(){
		$this->BaseDatos = "mpc";
		$this->Servidor = "localhost";
		$this->Usuario = "root";
		$this->Clave = "";
	}

	 function conectar() {
		if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
			echo"<h1> [:(] Error al conectar a la base de datos</h1>";
			exit();
		}
		if (!@mysql_select_db($this->BaseDatos,$con)){
			echo "<h1> [:(] Error al seleccionar la base de datos</h1>";
			exit();
		}
		$this->conect=$con;
		return true;
	}
}


?>
