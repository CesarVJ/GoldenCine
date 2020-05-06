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
	<link rel="stylesheet" type="text/css" href="../css/calificar.css?v=<?php echo time(); ?>">

</head>

<body>

	<?php require_once("../Menu.php") ?>
	<h1 id="fecha">Cartelera Febrero 2020</h1>
	<div class="contenedor">
		<?php
		require('../conexion.php');
		require('../modelo/Pelicula.php');

		$pelicula = new Pelicula();

		$conexion = abrirConexion();
		$consultaPeliculas="";
        if (isset($_GET['categoria'])){
			if($_GET['categoria'] == "CienciaFiccion"){
				$consultaPeliculas = "select * from pelicula where categoria = 'ciencia ficcion'";
			}else{
				$consultaPeliculas = "select * from pelicula where categoria = '".$_GET['categoria']."'";
			}
        }else{
			$consultaPeliculas = "select * from pelicula";
        }
		$listaPeliculas = $conexion -> query($consultaPeliculas);
		
		while($row = $listaPeliculas->fetch_assoc()){
			$pelicula->setPortada($row["portada"]);
			$pelicula->setId_pelicula($row["id_pelicula"]);

			//echo "id: " . $row["id_pelicula"]. "Nombre: " . $row["nombre_pelicula"]. "Descripcion: ". $row["descripcion"]."<br>";
	?>
		<div class="contenedor-pelicula-cliente">
			<a href="verInformacionPelicula.php?id=<?php echo $pelicula->getId_pelicula();?>">
				<img src="<?php echo "../img/portadas/".$pelicula->getPortada(); ?>" class="portada">
			</a>
			<a href="ReservarAsientos.php" id="btn-reservar"><button class="btn btn-primary">Reservar
					asiento</button></a>
			<button class="btn btn-warning" id="btn-calificar" type="button" data-toggle="modal"
				data-target="#mensaje-calificar<?php echo $pelicula->getId_pelicula();?>">Calificar</button>
		</div>
		<div class="modal fade" id="mensaje-calificar<?php echo $pelicula->getId_pelicula();?>" tabindex="-1"
			role="dialog" aria-labelledby="mensaje-calificar" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="mensaje-calificar">Calificar Pelicula</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						¿Que tal te parecio esta pelicula? <br>
						<div class="estrellas">
							<a id="uno" href="#" data-value="1" title="1 estrella" class="unchecked">&#9733;</a>
							<a id="dos" href="#" data-value="2" title="2 estrellas" class="unchecked">&#9733;</a>
							<a id="tres" href="#" data-value="3" title="3 estrellas" class="unchecked">&#9733;</a>
							<a id="cuatro" href="#" data-value="4" title="4 estrellas" class="unchecked">&#9733;</a>
							<a id="cinco" href="#" data-value="5" title="5 estrellas" class="unchecked">&#9733;</a>
						</div>
					</div>
					<div class="modal-footer" style="text-align:center;">
						<button style="margin: 0 auto;" type="button" class="btn btn-success"><a class="btn-calificar"
								href="../calificarPelicula.php?id=<?php echo $pelicula->getId_pelicula();?>"
								style="text-decoration:none; color:#fff;">Calificar</a></button>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
	?>
	</div>
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