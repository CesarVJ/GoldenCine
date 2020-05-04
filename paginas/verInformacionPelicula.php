<?php require_once("../modelo/ConsultaPeliculasCartelera.php")?>
<!DOCTYPE html>
<html>

<head>
	<title>Ver informacion de película</title>
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/editarPelicula.css?v=<?php echo time(); ?>">
	<script src="../js/validaciones.js"></script>
</head>

<body>

	<?php require_once("../Menu.php") ?>
	<h1 id="fecha">Informacion de película</h1>
	<form id="form-verInformacionPelicula" action="ReservarAsientos.php?id=<?php echo $id_pelicula;?>" method="post" name="form-verInformacionPelicula">
		<div class="margen visual">

			<div id="portada-vista" class="inserta-portada portada-activa" style="background-image: url('<?php echo "../img/portadas/".$pelicula->getPortada(); ?>')">
			</div>

			<div class="titulo">
				<h2 id="nombre_pelicula" class="caja"><?php echo $pelicula->getNombre_pelicula();?></h2>
			</div>

			<div class="contenedor-descripcion">
				<!--<p id="titulo-descripcion">Descripción de la película:</p>-->
				<p class="descripcion vista"><?php echo $pelicula->getDescripcion();?></p>
			</div>

			<div class="duracion">
				<label for="duracion"><b>Duración:</b><?php echo $pelicula->getDuracion();?> minutos</label>
				<div class="categoria">
					<label><b>Categoria: </b><?php echo $pelicula->getCategoria();?></label>
				</div>
			</div>

			<div class="actores">
				<label><b>Actores:</b> <?php echo $pelicula->getActores();?></label>
			</div>

			<div class="boton-reservar">
				<input id="reservar-asiento" type="submit"  value="Reservar asiento" class="btn btn-success">
			</div>
			<div class="grupo-error" id="error-añadir">
				<img class="icono-error" src="../img/error.svg" alt="error">
				<p class="mensaje-error" id="mensaje-error-añadirPelicula">
				</p>
			</div>
		</div>
	</form>

	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>



</body>

</html>