<?php
class Usuarios
{
    public function  __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'root';
        $dbname = 'mpc';

        mysql_connect($dbhost, $dbuser, $dbpass);

        mysql_select_db($dbname);
    }

    public function buscarUsuario($nombre){
        $datos = array();

        $sql = "SELECT * FROM persona
                WHERE nombre LIKE '%$nombre%'
                OR apellido LIKE '%$nombre%'";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['nombre'] . ' ' .
                                        $row['apellido'],
                             "fecha" => $row['fecha_nac'],
                             "rut" => $row['rut_persona']);
        }

        return $datos;
    }
}
?>
