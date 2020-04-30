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
			//echo "id: " . $row["id_pelicula"]. "Nombre: " . $row["nombre_pelicula"]. "Descripcion: ". $row["descripcion"]."<br>";
	?>
				<div class="contenedor-pelicula">
					<img src="<?php echo "../img/portadas/".$pelicula->getPortada(); ?>" class="portada">
					<button class="boton" id="btn-apartar">Apartar Boleto</button>
					<button class="boton" id="btn-calificar">Calificar</button>
				</div>
	<?php
		}
	?>
	</div>
</body>
</html>