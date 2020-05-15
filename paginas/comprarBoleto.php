<?php
    if(!empty(trim($_POST["Asientos-seleccionados"])) & !empty(trim($_POST['primer-horario'])) && !empty(trim($_POST['precio-total']))){
		$asientosSeleccionados=trim($_POST["Asientos-seleccionados"]);
		$horarioElegido =trim($_POST['primer-horario']);
		$precioTotal = trim($_POST['precio-total']);

		require '../conexion.php';
		$conexion=abrirConexion();
		$datosHorario= ejecutarConsulta("SELECT dia, hora, sala from Horario where id_horario = '". $horarioElegido."';",$conexion);


	}else{
		header("location:javascript://history.go(-1)");
	}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Administrador</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/carteleras.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../css/fontello.css">
    <link rel="stylesheet" type="text/css" href="../css/comprarBoleto.css?v=<?php echo time(); ?>">

</head>

<body>

    <?php require_once("../Menu.php") ?>
    <form class="contenedor-general container" method="post" action="pagoExitoso.php?horario=<?php echo $horarioElegido."&asientos=".$asientosSeleccionados."&precio=".$precioTotal;?>">
			<div class="contenedor-pago">
				<h1 id="titulo">Tarjeta de Debito</h1>

				<div class="nombre-titular">
					<p>Nombre del titular:</p>
					<input type="text" name="nombre-titular" class="texto">
				</div>

				<div class="numero-tarjeta">
					<p>Número de la tarjeta:</p>
					<input type="text" name="numero-tarjeta" class="texto">
				</div>

				<div class="fecha-expiracion">
					<p>Fecha de expiración:</p>
					<input type="month" name="fecha-expiracion" class="texto">
				</div>

				<div class="codigo-seguridad">
					<p>Código de seguridad:</p>
					<input id="codigo-seguridad" type="number" max="999" name="codigo-seguridad" class="texto">
				</div>
			</div>

			<div class="mostrar-pago">
				<h1>Total a pagar: <span id="total-pagar"> <?php echo $precioTotal;?></span></h1>
                <h1>Usted ha seleccionado<span id="cantidad"></span></h1>
				<h2>Los asientos: <?php echo $asientosSeleccionados; ?></h2>
                <h3>Boletos en horario de <?php echo $datosHorario[0][1]; ?> </h3>
				<h3>el día <?php echo $datosHorario[0][0]; ?> </h3>
                <h3>en la sala <?php echo $datosHorario[0][2]; ?> </h3>


                


			 <a href="#" onclick="window.history.go(-1); return false;"><button id="btn-regresar" class="btn btn-outline-danger btn-lg btn-block">Regresar</button></a>
				<input type="submit" id="btn-comprar" class="btn btn-success btn-lg btn-block" value="Comprar Boleto(s)">
			</div>
		</form>
    

    <script src="../js/validaciones.js?v=<?php echo time(); ?>"></script>
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