<?php
require_once("../modelo/ConsultaPeliculasCartelera.php");


$conexion= abrirConexion();
$administrador = new Administrador();

if(isset($_GET["id"]) && !empty($_GET["id"])){

	$id_pelicula =$_GET["id"];
	if($_POST["titulo"]==""){
        $nomb_err = "Por favor, ingrese un nombre de pelicula";     
	}
	
	if(empty($nomb_err)){
		$param_nombre_pelicula = $_POST['titulo'];
		$param_calificacion =   $calificacion;
		$param_descripcion =  $_POST['descripcion'];
		$param_actores =  $_POST['actores'];
		$param_categoria =  $_POST['categoria'];
		$param_portada =   basename($_FILES['portada']['name']);
		$param_duracion =   $_POST['duracion'];
		$respuesta = null;

		if($portada == null){
			$respuesta = $administrador->modificarInfoPelicula($conexion,$id_pelicula,$param_nombre_pelicula, $param_calificacion, $param_descripcion, $param_actores, $param_categoria,  $portada, $param_duracion);
		}else if($categoria == null){
			$respuesta = $administrador->modificarInfoPelicula($conexion,$id_pelicula,$param_nombre_pelicula, $param_calificacion, $param_descripcion, $param_actores, $categoria, $param_portada, $param_duracion);
		}else{
			$respuesta = $administrador->modificarInfoPelicula($conexion,$id_pelicula,$param_nombre_pelicula, $param_calificacion, $param_descripcion, $param_actores, $param_categoria,  $param_portada, $param_duracion);
		}
	}
}

/*
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
$portada =   basename($_FILES['portada']['name']);
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
*/
?>