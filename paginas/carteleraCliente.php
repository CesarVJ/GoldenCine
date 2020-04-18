<!DOCTYPE html>
<html>
<head>
	<title>Cliente</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css">
</head>
<body>

	<nav id="navegacion">
		<a href="">Cartelera</a>
		<select name="categorias" id="categorias" size="1">
			<option>Fecha</option>
			<option>Calificación</option>
			<option>Nombre</option>
		</select>
		<a href="../cerrarSesion.php">Cerrar Sesión</a>
	</nav>
    <h1 id="fecha">Cartelera Febrero 2020</h1>
	<div class="contenedor">
		<div class="pelicula">
 			<img src="../img/1.jpg" id="portada">
			<button class="boton" id="btn-agregar">Apartar boleto</button>
			<button class="boton" id="btn-eliminar">Calificar</button>
		</div>
	</div>

</body>
</html>