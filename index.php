<?php

		session_start();
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			header("location: paginas/carteleraAdmin.php");
			exit;
		}
		include 'conexion.php';
		$conexion = abrirConexion();
		$correo = $cotraseña = "";

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty(trim($_POST["correo"]))){
				$error_correo = "Ingrese un correo";
			}else{
				$correo = trim($_POST["correo"]);
			}
			if(empty(trim($_POST["contraseña"]))){
				$error_contraseña = "Ingrese una contraseña";
			}else{
				$contraseña = trim($_POST["contraseña"]);
			}
			if(empty($error_correo) && empty($error_contraseña)){
				$consulta = "select id_administrador, correo, contraseña from administrador where correo = ?";

				if($statement = mysqli_prepare($conexion, $consulta)){
					mysqli_stmt_bind_param($statement, "s", $param_correo);
					$param_correo = $correo;

					if(mysqli_stmt_execute($statement)){
						mysqli_stmt_store_result($statement);
						if(mysqli_stmt_num_rows($statement) == 1){
							mysqli_stmt_bind_result($statement, $id_administrador, $correo, $contraseña_md5);
							if(mysqli_stmt_fetch($statement)){
								if(md5($contraseña) == $contraseña_md5){
									session_start();
									$_SESSION["loggedin"] = true;
									$_SESSION["id"] = $id_administrador;
									$_SESSION["correo"] = $correo;
									header("location: paginas/carteleraAdmin.php");
								}else{
									$error_contraseña = "Contraseña incorrecta";
									//header("location: paginas/carteleraAdmin.php");
									echo  $error_contraseña;
								}
							}
						}else{
							$error_correo = "Correo incorrecto";
							echo  $error_correo;
						}
					}else{
						echo "Algo a salido mal! :c";
					}
					mysqli_stmt_close($statement);
				}
			}
			mysqli_close($conexion);
		}
		/*
		echo "Se ha realizado la conexión con exito!";
		$admin = "select * from administrador";
		$resultado = $conexion -> query($admin);
		if($resultado->num_rows > 0){
			while($row = $resultado->fetch_assoc()){
				echo "id: " . $row["id_administrador"]. "Nombre: " . $row["nombre"]. "Correo: ". $row["correo"]."<br>";
			}
		}else{
			echo "0 results";
		}
		cerrarConexion($conexion);
		*/
		
	?>
<!DOCTYPE html>
<html>
<head>
	<title>GoldenCine</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos1.css">
</head>
<body>
<div class="fondo"></div>
<div class="contenido">
	<header>
		<nav class="menu">
			<p class="logo grid-element"><span class="span">GC</span><br> <strong>Tu cine ideal</strong></p>
			<a href="" class="grid-element" id="texto-invitado">Entrar como invitado</a>
	    </nav>
	</header>
	<ul class="nav nav-tabs" role="tablist">
  		<li class="nav-item">
    		<a class="nav-link active" id="iniciar-sesion-tab" href="#iniciar-sesion" data-toggle="tab" aria-selected="true">Iniciar Sesion</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" id="registro-tab" href="#registrarse" role="tab" data-toggle="tab" aria-selected="false">Registrarse</a>
  		</li>
	</ul>
	<div class="contenedor">

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade" id="registrarse" role="tabpanel" aria-labelledby="registro-tab">
		<form action="post" class="formulario">
			<input type="text" name="nombre" class="item" placeholder="Ingrese su nombre">
			<div id="cont-calendario">
				<img class="icono" id="calendario" src="img/calendario.svg" alt="calendario">
				<input type="date" name="nacimiento" class="item">
				<input type="email" id="correo" name="correo" class="item" placeholder="Correo">
			</div>			
			<input type="tel" name="telefono" class="item" placeholder="271-000-00-00">
			<input type="password" name="password" class="item" placeholder="Contraseña">
			<input type="password" name="confirmar-password" class="item" placeholder="Confirmar contraseña">
			<input type="submit" name="registrarse" value="Registrarse" class="boton">
        </form>
	</div>
	<d class="tab-pane fade show active" id="iniciar-sesion" aria-labelledby="iniciar-sesion-tab">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formulario " >
	<div class="grupo <?php echo (!empty($error_correo)) ? 'has-error' : ''; ?>">
	<p class="texto">Correo</p>
			<img class="icono" src="img/usuario.svg" alt="usuario">
			<input type="email" name="correo" class="item-inicio" placeholder="example@gmail.com" value="<?php echo $correo; ?>">
	</div>
	<div class="grupo <?php echo (!empty($error_contraseña)) ? 'Error' : 'Bienvenido'; ?>">
	<p class="texto">Contraseña</p>
			<img class="icono" src="img/contraseña.svg" alt="contraseña">
			<input type="password" name="contraseña" class="item-inicio" placeholder="Contraseña">
			<input type="submit" name="entrar" value="Iniciar sesión" class="boton">
	</div>
    </form>
	</div>

</div>

	</div>	
	</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="bootstrap/js/bootstrap.min.js"></script></body>
</html>