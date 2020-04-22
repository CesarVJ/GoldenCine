<!DOCTYPE html>
<html>
<head>
	<title>GoldenCine</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/validaciones.js"></script>
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
		<form id="form-registro" name="form-registro" action="registro.php" onsubmit="return validarRegistro()" method="post" class="formulario" >
			<input type="text" name="nombre" class="item" placeholder="Ingrese su nombre">
			<div id="cont-calendario">
				<img class="icono" id="calendario" src="img/calendario.svg" alt="calendario">
				<input type="date" name="fecha_nacimiento" class="item">
				<input type="email" id="correo" name="correo" class="item" placeholder="Correo">
			</div>			
			<input type="tel" name="telefono" class="item" placeholder="271-000-00-00">
			<input type="password" name="contraseña" class="item" placeholder="Contraseña">
			<input type="password" name="confirmar_contraseña" class="item" placeholder="Confirmar contraseña">
			<div class="grupo-error" id="error-registro">
				<img class="icono-error" src="img/error.svg" alt="error">
				<p class="mensaje-error" id="mensaje-error-registro"></p>
			</div>
			<input type="submit" name="registrarse" value="Registrarse" class="boton">
        </form>
	</div>
	<div class="tab-pane fade show active" id="iniciar-sesion" aria-labelledby="iniciar-sesion-tab">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formulario" >
	<div class="grupo-correo">
	<p class="texto">Correo</p>
			<img class="icono" src="img/usuario.svg" alt="usuario">
			<input type="email" name="correo" class="item-inicio" placeholder="example@gmail.com" value="">
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
	<?php
		session_start();
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

            if($correo == "root@gmail.com"){
    			header("location: paginas/carteleraAdmin.php");
            }else{
                header("location: paginas/carteleraCliente.php");
			}
			exit;
		}
		include 'conexion.php';
		$conexion = abrirConexion();
		$correo = $contraseña = "";
		//echo md5("123456789");
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty(trim($_POST["correo"]))){
				echo "<script type='text/javascript'>correoIncorrecto();</script>";				
			}else{
				$correo = trim($_POST["correo"]);
			}
			if(empty(trim($_POST["contraseña"]))){
				echo "<script type='text/javascript'>contraseñaIncorrecta();</script>";				
			}else{
				$contraseña = trim($_POST["contraseña"]);
			}
			if(empty($error_correo) && empty($error_contraseña)){
				if($correo == "root@gmail.com"){
					$consulta = "select id_administrador, correo, contraseña from administrador where correo = ?";
				}else{
					$consulta = "select id_cliente, correo, contraseña from cliente where correo = ?";
				}
				if($statement = mysqli_prepare($conexion, $consulta)){
					mysqli_stmt_bind_param($statement, "s", $param_correo);
					$param_correo = $correo;
					if(mysqli_stmt_execute($statement)){
						mysqli_stmt_store_result($statement);
						if(mysqli_stmt_num_rows($statement) == 1){
							mysqli_stmt_bind_result($statement, $id, $correo, $contraseña_md5);
							if(mysqli_stmt_fetch($statement)){
								if(md5($contraseña) == $contraseña_md5){
									session_start();
									$_SESSION["loggedin"] = true;
									$_SESSION["id"] = $id;
									$_SESSION["correo"] = $correo;
                                    if($correo == "root@gmail.com"){
                                        header("location: paginas/carteleraAdmin.php");
                                    }else{
                                        header("location: paginas/carteleraCliente.php");
                                    }
								}else{
									echo "<script type='text/javascript'>contraseñaIncorrecta();</script>";				
								}
							}
						}else{
							echo "<script type='text/javascript'>correoIncorrecto();</script>";				
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
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>