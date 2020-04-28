<?php
	require("../modelo/Pelicula.php");
	require("../conexion.php");
	$conexion= abrirConexion();
	$pelicula = new Pelicula();
	if (isset($_GET['id'])){
		//Se asignan los datos de la pelicula a editar
		$pelicula->setId_pelicula($_GET['id']);

		$consultaPelicula = "select * from pelicula where id_pelicula = '".$pelicula->getId_pelicula()."'";
		$datosPelicula = $conexion -> query($consultaPelicula);

		$row = $datosPelicula->fetch_assoc();
		$pelicula->setNombre_pelicula($row["nombre_pelicula"]);
		$pelicula->setDescripcion($row["descripcion"]);
		$pelicula->setActores($row["actores"]);
		$pelicula->setPortada($row["portada"]);
		$pelicula->setCategoria($row["categoria"]);
		$pelicula->setDuracion($row["duracion"]);


		echo $pelicula->getId_pelicula();
		echo $pelicula->getNombre_pelicula();
		echo $pelicula->getDescripcion();
		echo $pelicula->getActores();
		echo $pelicula->getPortada();
		echo $pelicula->getCategoria();
		echo $pelicula->getDuracion();
		echo $pelicula->getCalificacion();

	} else {
		header("location:CarteleraAdmin.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Agregar película</title>
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/editarPelicula.css?v=<?php echo time(); ?>">
	<script src="../js/validaciones.js"></script>
</head>

<body>

	<?php require_once("../Menu.html") ?>
	<h1 id="fecha">Editar informacion de película</h1>
	<form id="form-añadirPelicula" action="../añadirPelicula.php" method="post" name="form-anañadirPelicula"
		onsubmit="return validarAñadirPelicula()">
		<div class="margen">

			<div class="inserta-portada">
				<span> <input type="file" name="portada" value="Inserta portada"
						accept=".jpg, .png, .svg, .jpeg"></span>
			</div>

			<div class="titulo">
				<label>Titulo:</label>
				<input type="text" name="titulo" class="caja" value="<?php echo $pelicula->getNombre_pelicula(); ?>">
			</div>

			<div class="contenedor-descripcion">
				<p id="titulo-descripcion">Descripción de la película:</p>
				<input type="textarea" name="descripcion" class="descripcion">
			</div>

			<div class="duracion">
				<label for="duracion">Duración:</label>
				<input type="text" name="duracion" class="caja">
				<div class="categoria">
					<label for="categoria">Categoria:</label>
					<select name="categoria" id="categoria">
						<option>Selecciona categoria</option>
						<option value="Accion">Accion</option>
						<option value="Aventura">Aventura</option>
						<option value="Ciencia-Ficcion">Ciencia Ficcion</option>
						<option value="Terror">Terror</option>
						<option value="Drama">Drama</option>
						<option value="Comedia">Comedia</option>
						<option value="Infantiles">Infantiles</option>
						<option value="Otro">Otro</option>
					</select>
				</div>
			</div>

			<div class="actores">
				<label for="actores">Actores:</label>
				<input type="text" name="actores" class="caja">
			</div>

			<div class="boton-agregar">
				<input type="submit" value="Añadir película" class="boton">
			</div>
			<div class="grupo-error" id="error-añadir">
				<img class="icono-error" src="../img/error.svg" alt="error">
				<p class="mensaje-error" id="mensaje-error-añadirPelicula">
				<?php 
					include("../añadirPelicula.php");
					if($existePelicula == true){
				?>
						La pelicula ya existe
				<?php
					}else{
				?>
						Holaa
				<?php	
					}				
				?>

				</p>
			</div>
		</div>
	</form>
	</div>


</body>

</html>