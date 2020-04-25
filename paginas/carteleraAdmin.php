<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/fontello.css">
</head>
<body>

<?php require_once("../Menu.html") ?>
	<h1 id="fecha">Cartelera Febrero 2020</h1>
	<div class="contenedor">
		<div class="contenedor-pelicula">
		<?php include_once('../portadas.php')?>
 			<img src="<?php echo $portada; ?>" id="portada">
			<button class="boton" id="btn-agregar">Agregar horario</button>
			<button class="boton" id="btn-eliminar">Eliminar</button>
		</div>
		<div class="contenedor-pelicula">
		<?php include_once('../portadas.php')?>
 			<img src="../img/portadas/joker.jpg" id="portada">
			<button class="boton" id="btn-agregar">Agregar horario</button>
			<button class="boton" id="btn-eliminar">Eliminar</button>
		</div>
		<div class="agregar">
			<a href="agregarPelicula.php">
			<span class="icon-plus"></span>
</a>
	    </div>
	</div>
</body>
</html>