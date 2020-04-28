<?php
session_start();
require("../modelo/Administrador.php");
require("../conexion.php");

$administrador = new Administrador();
$conexion= abrirConexion();

//echo print_r($_SESSION);
$id_pelicula =  trim($_SESSION['id_pelicula']);
$nombre_pelicula = trim($_POST['titulo']);
$calificacion =   trim($_SESSION['calificacion']);
$descripcion =  trim($_POST['descripcion']);
$actores =  trim($_POST['actores']);
$categoria =  trim($_POST['categoria']);
$portada =   trim($_POST['portada']);
$duracion =   trim($_POST['duracion']);
$respuesta = null;
if($portada == null){
	$respuesta = $administrador->modificarInfoPelicula($conexion,$id_pelicula,$nombre_pelicula, $calificacion, $descripcion, $actores, $categoria,  trim($_SESSION['portada']), $duracion);
}else if($categoria == null){
	$respuesta = $administrador->modificarInfoPelicula($conexion,$id_pelicula,$nombre_pelicula, $calificacion, $descripcion, $actores, $pelicula-> trim($_SESSION['categoria']), $portada, $duracion);
}else{
	$respuesta = $administrador->modificarInfoPelicula($conexion,$id_pelicula,$nombre_pelicula, $calificacion, $descripcion, $actores, $categoria, $portada, $duracion);
}
if($respuesta){
	echo "Todo bien";
}else{
	echo "Todo mal";
}

?>