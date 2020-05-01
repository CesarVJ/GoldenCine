<?php require_once("../modelo/ConsultaPeliculasCartelera.php")?>
<!DOCTYPE html>
<html>

<head>
	<title>Agregar película</title>
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
	<h1 id="fecha">Editar informacion de película</h1>
	<form id="form-editarInformacionPelicula" action="cambioExitoso.php?id=<?php echo $id_pelicula;?>" method="post" name="form-editarInformacionPelicula"
		onsubmit="return validarModificarPelicula()" enctype="multipart/form-data">
		<div class="margen">

			<div class="inserta-portada portada-activa" style="background-image: url('<?php echo "../img/portadas/".$pelicula->getPortada(); ?>')">
				<span> <input type="file" name="portada" id="portada" value="Inserta portada"
						accept=".jpg, .png, .svg, .jpeg"></span>
			</div>

			<div class="titulo">
				<label>Titulo:</label>
				<input type="text" name="titulo" id="titulo" class="caja" value="<?php echo $pelicula->getNombre_pelicula(); ?>">
			</div>

			<div class="contenedor-descripcion">
				<p id="titulo-descripcion">Descripción de la película:</p>
				<textarea name="descripcion" class="descripcion"><?php echo $pelicula->getDescripcion();?></textarea>
			</div>

			<div class="duracion">
				<label for="duracion">Duración:</label>
				<input type="text" name="duracion" class="caja" value="<?php echo $pelicula->getDuracion();?>">
				<div class="categoria">
					<label for="categoria">Categoria:</label>
					<select name="categoria" id="categoria">
						<option>Selecciona categoria</option>
						<option value="Accion">Accion</option>
						<option value="Aventura">Aventura</option>
						<option value="Ciencia Ficcion">Ciencia Ficcion</option>
						<option value="Terror">Terror</option>
						<option value="Drama">Drama</option>
						<option value="Comedia">Comedia</option>
						<option value="Infantiles">Infantiles</option>
						<option value="Otro">Otro</option>
					</select>
					<script>
                        (function(){
                            var categoria = '<?php echo $categoria; ?>';
                            if(categoria === "Accion" ){
                                document.getElementById('categoria').value="Accion";
                            }else if(categoria === "Aventura"){
                                document.getElementById('categoria').value="Aventura";
                            }else if(categoria === "Ciencia Ficcion"){
                                document.getElementById('categoria').value="Ciencia Ficcion";
                            }else if(categoria ==="Terror" ){
                                document.getElementById('categoria').value="Terror";
							}else if(categoria ==="Drama" ){
                                document.getElementById('categoria').value="Drama";
							}else if(categoria === "Comedia"){
                                document.getElementById('categoria').value="Comedia";
							}else if(categoria === "Infantiles"){
                                document.getElementById('categoria').value="Infantiles";
							}else{
                                document.getElementById('categoria').value="Otro";
							}
                        })();
  
                    </script>
				</div>
			</div>

			<div class="actores">
				<label for="actores">Actores:</label>
				<input type="text" name="actores" class="caja" value="<?php echo $pelicula->getActores();?>">
			</div>

			<div class="boton-agregar">
				<input type="submit" value="Actualizar informacion" class="btn btn-success">
			</div>
			<div class="grupo-error" id="error-añadir">
				<img class="icono-error" src="../img/error.svg" alt="error">
				<p class="mensaje-error" id="mensaje-error-añadirPelicula">
				</p>
			</div>
		</div>
	</form>

	</div>
    <script src="js/validaciones.js"></script>
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