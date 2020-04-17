<?php
function abrirConexion(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $database = "GoldenCine";

    $conexion = new mysqli($dbhost, $dbuser, $dbpassword, $database) or die("Fallo la conexión:%s\n".$conexion ->error);
    return $conexion;
}

function cerrarConexion($conexion){
    $conexion -> close();
}


?>