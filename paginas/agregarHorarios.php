<?php require_once("../modelo/ConsultaPeliculasCartelera.php")?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar horarios</title>
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/agregarHorarios.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/editarPelicula.css?v=<?php echo time(); ?>">
</head>
<body>

	<?php require_once("../Menu.php") ?>
	<?php
require '../modelo/Horario.php';

$horarios = new Horario();
$horarios= $horarios->getHorarios($pelicula->getId_pelicula());
?>

	<h1 id="fecha">Agregar horarios</h1>

	<div class="contenedor-agregar-horarios">
		<h1 id="titulo"><?php echo $pelicula->getNombre_pelicula();?></h1>
		<div id="portada-vista" class="inserta-portada portada-activa"
			style="background-image: url('<?php echo "../img/portadas/".$pelicula->getPortada(); ?>')">
		</div>

		<div class="formacion-horario">
			<form action="../agregarHorario.php?id=<?php echo $pelicula->getId_pelicula();?>" method="post">
				<div id="dia">
					<label for="dia-pelicula">Día:</label>
					<input type="date" name="dia-pelicula">
				</div>
				<div id="hora">
					<label for="hora-pelicula">Hora:</label>
					<input type="time" name="hora-pelicula">
				</div>
				<div id="sala">
					<label for="sala-pelicula">Sala:</label>
					<input type="number" name="sala-pelicula">
				</div>
				<center><input type="submit" name="enviar" class="btn btn-success btn-lg" value="Agregar horario"></center>
			</form>
		</div>

		<div class="horarios-agregados">

			<div class="contenedor-agregados">
				<center>
					<h4>Horarios agregados</h4>
				</center>
				<ul>
					<?php
				    foreach ($horarios as $listaHorarios){ ?>
					<li><?php echo $listaHorarios->getDia()." "; echo $listaHorarios->getHora();?> Sala
						<?php echo $listaHorarios->getSala();?> </li>

					<?php }	?>
				</ul>
			</div>
			<center><button class="btn btn-outline-primary btn-lg btn-block" style="margin-top:1rem;">Regresar</button></center>
		</div>
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