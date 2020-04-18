<?php
function verificarUsuario($conexion, $consulta){
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
									//header("location: paginas/carteleraAdmin.php");
								}
							}
						}else{
                            echo "<script type='text/javascript'>correoIncorrecto();</script>";	
                            return 1;			
						}
					}else{
                        echo "Algo a salido mal! :c";
                        return 0;
					}
					mysqli_stmt_close($statement);
				}
}

?>