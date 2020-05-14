<?php require_once("../modelo/ConsultaPeliculasCartelera.php")?>
<?php
	if(isset($_GET['horario'])){
		require '../modelo/Reservacion.php';
		$reservaciones = new Reservacion();
		$reservaciones= $reservaciones->getAsientosOcupados($_GET['horario']);
	}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Ver informacion de película</title>
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/editarPelicula.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/reservarAsientos.css?v=<?php echo time(); ?>">
</head>

<body>
	<?php require_once("../Menu.php") ?>
	<?php
require '../modelo/Horario.php';

$horarios = new Horario();
$horarios= $horarios->getHorarios($pelicula->getId_pelicula());

?>
	<h1 id="fecha">GoldenCine</h1>
	<div class="datos" style="display:none;">
		<label id="id_pelicula"><?php echo $pelicula->getId_pelicula(); ?></label>
		<label id="id_hora"><?php echo $_GET['horario']; ?></label>
		<?php
			$contador=0;
			foreach ($reservaciones as $asiento){ $contador++; ?>
			<label id="Asientos<?php echo $contador;?>"><?php echo $asiento->getAsientos();?></label>
		<?php }	?>
		<label id="numReservaciones"><?php echo $contador;?></label>
	</div>


	<form class="contenedor-g" method="post" action="comprarBoleto.php">

		<div class="contenedor-superior">
			<h3 id="primero">Selecciona tu asiento</h3>
			<h3 id="segundo">Total a pagar: <span id="precio-total">0</span>$ </h3>
		</div>
		<div class="contenedor-asientos">

			<?php 
				$filas = Array("A", "B", "C", "D");
				
					foreach($filas as $fila){?>	
						<label class=""><?php echo $fila;?></label>
					<?php	for($numColumnas=1;$numColumnas<=9;$numColumnas++){ ?>							
							<a id="<?php echo $fila.$numColumnas;?>" data-value="<?php echo $fila.$numColumnas;?>" title="<?php echo $fila.$numColumnas;?>" class="asiento unchecked btn btn-dark"><?php echo $numColumnas;?></a>
					<?php }
				}
			?>
		</div>

		<script>
			$(".asiento").click(function () {
				var precio = <?php echo $pelicula->getPrecio(); ?>;
				if ($(this).hasClass("unchecked")) {
					document.getElementById("precio-total").innerHTML=parseFloat(document.getElementById("precio-total").innerHTML) + parseFloat(precio);

				}else{
					document.getElementById("precio-total").innerHTML=parseFloat(document.getElementById("precio-total").innerHTML) - parseFloat(precio);
				}
			}); 
			
			function seleccionarHorario(horario_id){
				idPeli=document.querySelector('#id_pelicula').innerHTML;
				window.location="ReservarAsientos.php?id="+idPeli+"&horario="+horario_id;
			}
		</script>

		<div class="horarios-disponibles">
			<center>
				<h3>Horarios disponibles</h3>
			</center>
			<br>
			<div class="contenedor-horarios">
			<?php
				    foreach ($horarios as $listaHorarios){ ?>
			<center><input id="<?php echo $listaHorarios->getId_horario();?>" type="radio" name="primer-horario" onchange='seleccionarHorario("<?php echo $listaHorarios->getId_horario();?>");'>
				<label for="primer-horario"> <b>Sala <?php echo $listaHorarios->getSala();?> / Dia:</b>    <?php echo $listaHorarios->getDia();?> <b> / Hora:   <?php echo $listaHorarios->getHora();?></b></label></center><br>
			<?php }	?>
			</div>
			<center><input type="submit" class="boton" value="Proceder al pago"></center>
		</div>

		<script>
			var horarioActual = document.querySelector('#id_hora').innerHTML;
			document.querySelector(`#${CSS.escape(horarioActual)}`).checked = true;
			var numReservas = parseInt(document.querySelector("#numReservaciones").innerHTML);
			for(let i =1;i<=numReservas;i++){
				let asientos = document.querySelector("#Asientos"+i).innerHTML;
				asientos=asientos.split(',');
				asientos.forEach(deshabilitar);
				function deshabilitar(item, index){
					document.querySelector(`#${CSS.escape(item)}`).style.pointerEvents="none";
					document.querySelector(`#${CSS.escape(item)}`).style.cursor="default";
					document.querySelector(`#${CSS.escape(item)}`).style.backgroundColor="#C82333";
				}
			}
		</script>


</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"
		integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
		<script src="../js/validaciones.js?v=<?php echo time(); ?>"></script>

</body>

</html>