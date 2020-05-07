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
	<link rel="stylesheet" type="text/css" href="../css/reservarAsientos.css?v=<?php echo time(); ?>">
	<script src="../js/validaciones.js"></script>
</head>

<body>
	<?php require_once("../Menu.php") ?>
	<h1 id="fecha">GoldenCine</h1>

	<form class="contenedor-g" method="post" action="comprarBoleto.php">

		<div class="contenedor-superior">
			<h3 id="primero">Selecciona tu asiento</h3>
			<h3 id="segundo">Total a pagar: $ <span></span></h3>
		</div>
		<div class="contenedor-asientos">
			<label class="asiento">A</label>
			<button class="asiento">1</button>
			<button class="asiento">2</button>
			<button class="asiento">3</button>
			<button class="asiento">4</button>
			<button class="asiento">5</button>
			<button class="asiento">6</button>
			<button class="asiento">7</button>
			<button class="asiento">8</button>
			<button class="asiento">9</button>

			<label class="asiento">B</label>
			<button class="asiento">1</button>
			<button class="asiento">2</button>
			<button class="asiento">3</button>
			<button class="asiento">4</button>
			<button class="asiento">5</button>
			<button class="asiento">6</button>
			<button class="asiento">7</button>
			<button class="asiento">8</button>
			<button class="asiento">9</button>

			<label class="asiento">C</label>
			<button class="asiento">1</button>
			<button class="asiento">2</button>
			<button class="asiento">3</button>
			<button class="asiento">4</button>
			<button class="asiento">5</button>
			<button class="asiento">6</button>
			<button class="asiento">7</button>
			<button class="asiento">8</button>
			<button class="asiento">9</button>

			<label class="asiento">D</label>
			<button class="asiento">1</button>
			<button class="asiento">2</button>
			<button class="asiento">3</button>
			<button class="asiento">4</button>
			<button class="asiento">5</button>
			<button class="asiento">6</button>
			<button class="asiento">7</button>
			<button class="asiento">8</button>
			<button class="asiento">9</button>
		</div>

		<div class="horarios-disponibles">
			<center>
				<h3>Horarios disponibles</h3>
			</center>

			<center><select name="dia" id="dia" size="1">
					<option>Lunes</option>
					<option>Martes</option>
					<option>Miercoles</option>
					<option>Jueves</option>
					<option>Viernes</option>
					<option>Sabado</option>
					<option>Domingo</option>
				</select></center>
			<br>
			<center><input type="radio" name="primer-horario">
				<label for="primer-horario">11:00 - 12:30</label></center><br>

			<center><input type="radio" name="segundo-horario">
				<label for="segundo-horario">12:30 - 14:00</label></center><br>

			<center><input type="radio" name="tercer-horario">
				<label for="tercer-horario">14:00 - 15:30</label></center><br>

			<center><input type="radio" name="cuarto-horario">
				<label for="cuarto-horario">15:30 - 17:00</label></center><br>
			<center><input type="submit" class="boton" value="Proceder al pago"></center>
		</div>


</form>
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