<?php
require("modelo/Pelicula.php");
require("conexion.php");
require("modelo/Administrador.php");

session_start();
$conexion= abrirConexion();
$pelicula = new Pelicula();
$administrador = new Administrador();

if (isset($_GET['id'])){
    //Se asignan los datos de la pelicula a editar
    $pelicula->setId_pelicula($_GET['id']);

    //$consultaPelicula = "select * from pelicula where id_pelicula = '".$pelicula->getId_pelicula()."'";
    //$datosPelicula = $conexion -> query($consultaPelicula);

    $administrador->eliminarPelicula($conexion,$pelicula->getId_pelicula());

} else{
    echo "Algo ha salido mal";
}

?>