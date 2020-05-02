<?php
	require("../modelo/Administrador.php");
	require("../modelo/Pelicula.php");
	require("../conexion.php");
	#session_start();

	$conexion= abrirConexion();
	$pelicula = new Pelicula();
	$administrador = new Administrador();

	if (isset($_GET['id'])){
		//Se asignan los datos de la pelicula a editar
		$pelicula->setId_pelicula($_GET['id']);

		$consultaPelicula = "select * from pelicula where id_pelicula = '".$pelicula->getId_pelicula()."'";
		$datosPelicula = $conexion -> query($consultaPelicula);

		//Se asignan los datos al objeto tipo pelicula actual
		$row = $datosPelicula->fetch_assoc();

		$pelicula->setNombre_pelicula($row["nombre_pelicula"]);
		$pelicula->setDescripcion($row["descripcion"]);
		$pelicula->setActores($row["actores"]);
		$pelicula->setPortada($row["portada"]);
		$pelicula->setCategoria($row["categoria"]);
		$pelicula->setDuracion($row["duracion"]);
		$pelicula->setPrecio($row["precio"]);


		$id_pelicula =$pelicula->getId_pelicula();
		$nombre_pelicula =$pelicula->getNombre_pelicula();
		$calificacion = $pelicula->getCalificacion();
		$descripcion =$pelicula->getDescripcion();
		$actores = $pelicula->getActores();
		$categoria = $pelicula->getCategoria();
		$portada = $pelicula->getPortada();
		$duracion = $pelicula->getDuracion();
		$precio = $pelicula->getPrecio();

        
        /*
		$_SESSION['id_pelicula'] = $id_pelicula;
		$_SESSION['nombre_pelicula'] = $nombre_pelicula;
		$_SESSION['calificacion'] = $calificacion;
		$_SESSION['descripcion'] = $descripcion;
		$_SESSION['actores'] = $actores;
		$_SESSION['categoria'] = $categoria;
		$_SESSION['portada'] = $portada;
		$_SESSION['duracion'] = $duracion;
        */

}
?>