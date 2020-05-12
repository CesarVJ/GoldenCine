<?php require_once("../modelo/ConsultaPeliculasCartelera.php")?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar horarios</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
		<div id="portada-vista" class="inserta-portada portada-activa" style="background-image: url('<?php echo "../img/portadas/".$pelicula->getPortada(); ?>')">
			</div>

		<div class="formacion-horario">
			<form action="" method="">
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
				<input type="text" name="sala-pelicula">
			</div>
			<center><input type="submit" name="enviar" class="boton" value="Agregar horario"></center>
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
					<li><?php echo $listaHorarios->getDia(); echo $listaHorarios->getHora();?> Sala <?php echo $listaHorarios->getSala();?> </li>

			<?php }	?>
				</ul>
	    		<ul>
	    			<li>Horario #<span class="basura"></span></li>
	    		</ul>
	    	</div>
	    	<center><button class="boton">Aceptar</button></center>
	    </div>
	</div>

</body>
</html>