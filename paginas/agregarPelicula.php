<!DOCTYPE html>
<html>

<head>
	<title>Agregar película</title>
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/editarPelicula.css?v=<?php echo time(); ?>">
</head>

<body>

	<?php require_once("../Menu.html") ?>
	<h1 id="fecha">Agregar película</h1>
	<form action="">
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
				<button class="boton">Añadir película</button>
			</div>



	</form>
	</div>


</body>

</html>