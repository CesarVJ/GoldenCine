	<!-- Aqui se lleva a cabo el proceso de inicio de sesión -->
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
		include 'conexion.php';
		$conexion = abrirConexion();
		$correo = $contraseña = "";
		$error_correo="";
		$error_contraseña="";
		//echo md5("123456789");
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			//Se valida que el campo de correno no este vacio
			if(empty(trim($_POST["correo"]))){ 
				$error_correo = "No se proporciono correo";
			}else{
				$correo = trim($_POST["correo"]);
			}
			//Se valida que el campo de contraseña no este vacio
			if(empty(trim($_POST["contraseña"]))){
				$error_contraseña="No se proporciono contraseña";
			}else{
				$contraseña = trim($_POST["contraseña"]);
			}
			//Si no existen errores, se procede a verificar si es administrador o cliente
			if(empty($error_correo) && empty($error_contraseña)){
				if($correo == "root@gmail.com"){ //Es un administrador
					$consulta = "select id_administrador, correo, contraseña from administrador where correo = ?";
				}else{ // Es un cliente
					$consulta = "select id_cliente, correo, contraseña from cliente where correo = ?";
				}
				if($statement = mysqli_prepare($conexion, $consulta)){
					mysqli_stmt_bind_param($statement, "s", $param_correo);
					$param_correo = $correo;
					if(mysqli_stmt_execute($statement)){
						mysqli_stmt_store_result($statement);
						if(mysqli_stmt_num_rows($statement) == 1){ //Si el usuario fu encontrado
							mysqli_stmt_bind_result($statement, $id, $correo, $contraseña_md5);
							if(mysqli_stmt_fetch($statement)){
								if(md5($contraseña) == $contraseña_md5){ // Se valida que la contraseña guardada en la BD coincida con la proporcionada
									session_start(); // Se inicia la sesion
									$_SESSION["loggedin"] = true;
									$_SESSION["id"] = $id;
									$_SESSION["correo"] = $correo;
									$_SESSION['id_pelicula'] = "";
									if($correo == "root@gmail.com"){ // Si es administrador, se le dirije a la Cartelera del Administrador
										$_SESSION["existePelicula"] = false;
										$_SESSION["tipo"] = "Administrador";
                                        header("location: paginas/carteleraAdmin.php");
									}else{ // Si es cliente, se le dirije a la Cartelera del Cliente
										$_SESSION["tipo"] = "Cliente";
                                        header("location: paginas/carteleraCliente.php");
                                    }
								}else{ // Las contraseñas no coinciden
									echo "<script type='text/javascript'>contraseñaIncorrecta();</script>";				
								}
							}
						}else{ // EL usuario no existe
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