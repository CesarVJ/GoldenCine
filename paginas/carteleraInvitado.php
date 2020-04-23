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
    
	<header class="container">
		<h1 style="display:inline-block;" id="fecha">Cartelera Febrero 2020</h1>
		<a id="regresar-inicio" href="../index.php" class="btn btn-lg btn-outline-primary" >Regresar al formulario de registro</a>
	</header>	

	<div id="contenedor-invitado" class="contenedor">
		<div class="contenedor-pelicula">
		<?php include_once('../portadas.php')?>
 			<img src="<?php echo $portada; ?>" id="portada">
		</div>
		<div class="contenedor-pelicula">
		<?php include_once('../portadas.php')?>
 			<img src="../img/portadas/joker.jpg" id="portada">
		</div>
	</div>
	<aside id="contenedor-anuncio">
		<div id="anuncio"> 
			<img id="imagen-anuncio" src="../img/portadas/transformers.jpg" alt="">
			<h3 class="frase">¡Disgruta de las mejores peliculas con GoldenCine!</h3>
			
		</div>
	</aside>
</body>
</html>