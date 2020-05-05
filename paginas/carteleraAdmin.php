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
				$consultaPeliculas = "select * from pelicula where categoria = 'Ciencia Ficcion'";
			}else{
				$consultaPeliculas = "select * from pelicula where categoria = '".$_GET['categoria']."'";
			}
        }else{
			$consultaPeliculas = "select * from pelicula";
        }
		$listaPeliculas = $conexion -> query($consultaPeliculas);
		
		//Mientras encuentre peliculas, se van agregando al html
		while($row = $listaPeliculas->fetch_assoc()){
			$pelicula->setPortada($row["portada"]);
			$pelicula->setId_pelicula($row["id_pelicula"]);
			$pelicula->setNombre_pelicula($row["nombre_pelicula"]);

			//echo "id: " . $row["id_pelicula"]. "Nombre: " . $row["nombre_pelicula"]. "Descripcion: ". $row["descripcion"]."<br>";
	?>
		<div class="contenedor-pelicula">
			<a href="editarInformacionPelicula.php?id=<?php echo $pelicula->getId_pelicula();?>">
				<img src="<?php echo "../img/portadas/".$pelicula->getPortada(); ?>" class="portada">
			</a>
			<button class="boton" id="btn-agregar"> <a id="agregar-horario" href="agregarHorarios.php"> Agregar
					horario</a></button>
			<button class="boton btn btn-danger" id="btn-eliminar" type="button" data-toggle="modal"
				data-target="#mensaje-eliminar<?php echo $pelicula->getId_pelicula();?>">Eliminar</button>

		</div>
		<div class="modal fade" id="mensaje-eliminar<?php echo $pelicula->getId_pelicula();?>" tabindex="-1"
			role="dialog" aria-labelledby="mensaje-eliminar" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="mensaje-eliminar">Eliminar Pelicula</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Esta a punto de eliminar la pelicula <b> <?php echo $pelicula->getNombre_pelicula();?></b> <br>
						¿Esta seguro de que desea eliminarla?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-danger"><a class="btn-eliminar"
								href="../EliminarPelicula.php?id=<?php echo $pelicula->getId_pelicula();?>">Eliminar
								Pelicula</a></button>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
	?>
		<div class="agregar">
			<a href="añadirPelicula.php">
				<span class="icon-plus"></span>
			</a>
		</div>
	</div>
	<!-- Mensaje de alerta al eliminar pelicula -->
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