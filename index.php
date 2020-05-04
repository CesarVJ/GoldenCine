<!DOCTYPE html>
<html>

<head>
	<title>GoldenCine</title>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css?=<?php echo time();?>">
</head>

<body>
	<?php
	session_start();
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

            if($_SESSION["correo"] == "root@gmail.com"){
    			header("location: paginas/carteleraAdmin.php");
            }else{
                header("location: paginas/carteleraCliente.php");
			}
			exit;
		}
	?>
	<div class="fondo"></div>
	<div class="contenido">
		<header>
			<nav class="menu">
				<p class="logo grid-element"><span class="span">GC</span><br> <strong>Tu cine ideal</strong></p>
				<a href="paginas/carteleraInvitado.php" class="grid-element" id="texto-invitado">Entrar como
					invitado</a>
			</nav>
		</header>
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="iniciar-sesion-tab" href="#iniciar-sesion" data-toggle="tab"
					aria-selected="true">Iniciar Sesion</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="registro-tab" href="#registrarse" role="tab" data-toggle="tab"
					aria-selected="false">Registrarse</a>
			</li>
		</ul>
		<div class="contenedor">

			<div class="tab-content" id="myTabContent">
				 <!--Aqui se invoca el formulario de registro-->
				<?php require_once("paginas/formularioRegistro.html")?>
				<div class="tab-pane fade show active" id="iniciar-sesion" aria-labelledby="iniciar-sesion-tab">					
					<form action="iniciarSesion.php" method="post" class="formulario" id="form-login" name="form-login" onsubmit="return validarInicio()">
						<div class="grupo-correo">
							<p class="texto">Correo</p>
							<img class="icono" src="img/usuario.svg" alt="usuario">
							<input type="email" name="correo" class="item-inicio" placeholder="example@gmail.com"
								value="">
							<div class="grupo-error" id="error-correo">
								<img class="icono-error" src="img/error.svg" alt="error">
								<p class="mensaje-error">El correo ingresado no es valido</p>
							</div>
						</div>
						<div class="grupo-contraseña">
							<p class="texto">Contraseña</p>
							<img class="icono" src="img/contraseña.svg" alt="contraseña">
							<input type="password" name="contraseña" class="item-inicio" placeholder="Contraseña">
							<div class="grupo-error" id="error-contraseña">
								<img class="icono-error" src="img/error.svg" alt="error">
								<p class="mensaje-error">La contraseña es incorrecta</p>
							</div>
							<input type="submit" name="entrar" value="Iniciar sesión" class="boton">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="js/validaciones.js?=<?php echo time();?>"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js">
		< script src = "https://code.jquery.com/jquery-3.4.1.slim.min.js" >
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
</body>

</html>

<?php
		if (isset($_GET['error'])){
			echo "Algo ocurrio";

			if($_GET['error'] == 1){
				echo "<script type='text/javascript'>correoIncorrecto();</script>";
			}else if($_GET['error'] == 2){
				echo "<script type='text/javascript'>contraseñaIncorrecta();</script>";
			}
		}

?>