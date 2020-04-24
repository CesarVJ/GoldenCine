<!DOCTYPE html>
<html>
<head>
	<title>Agregar película</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css">
	<link rel="stylesheet" type="text/css" href="../css/editarPelicula.css">
</head>
<body>

<?php require_once("../Menu.html") ?>

	<h1 id="fecha">Editar película</h1>
	<div class="margen">
		<div class="inserta-portada">
			<span>Inserta portada</span>
		</div>

		<div class="titulo">
			<label>Titulo:</label>
			<input type="text" name="titulo" class="caja">
		</div>

		<div class="descripcion">
			<p>Descrpción de la película:</p>
			<textarea class="area"></textarea>
		</div>

		<div class="duracion">
			<label for="duracion">Duración:</label>
			<input type="text" name="duracion" class="caja">
		</div>

		<div class="actores">
			<label for="actores">Actores:</label>
			<input type="text" name="actores" class="caja">
		</div>

		<div class="boton-agregar">
			<button class="boton">Añadir película</button>
		</div>
	</div>

</body>
</html>