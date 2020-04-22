<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/fontello.css">
</head>
<body>

	<nav id="navegacion">
		<ul id ="menu">
			<li><a href="">Cartelera</a></li>
			<li name="categorias" id="categorias"><a href="">Categorias</a>
				<ul>
					<li><a href="">Acción</a></li>
					<li><a href="">Aventura</a></li>
					<li><a href="">Ciencia Ficción</a></li>
					<li><a href="">Terror</a></li>
					<li><a href="">Drama</a></li>
					<li><a href="">Comedia</a></li>
					<li><a href="">Infantiles</a></li>
					<li><a href="">Otro</a></li>
				</ul>						
			</li>
			<li id="cerrar-sesion"><a href="../cerrarSesion.php">Cerrar Sesión</a></li>
		</ul>
	</nav>
    <h1 id="fecha">Cartelera Febrero 2020</h1>
	<div class="contenedor">
		<div class="pelicula">
		<?php include_once('../portadas.php')?>
 			<img src="<?php echo $portada; ?>" id="portada">
			<button class="boton" id="btn-agregar">Agregar horario</button>
			<button class="boton" id="btn-eliminar">Eliminar</button>
		</div>
		<div class="agregar">
			<span class="icon-plus"></span>
	    </div>
	</div>
</body>
</html>