<?php
    include 'conexion.php';
    $nombre = $correo = $contraseña = $confirmar_contraseña = $fecha_nacimiento = $telefono = "";
    $error="";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $conexion = abrirConexion();
        $existeUsuario = false;
        if(empty(trim($_POST["nombre"])) || empty(trim($_POST["fecha_nacimiento"])) || empty(trim($_POST["correo"])) || empty(trim($_POST["contraseña"]))){

        }else{
            $consulta = "select correo from cliente where correo = ?";
            if($statement = mysqli_prepare($conexion, $consulta)){
                mysqli_stmt_bind_param($statement, "s", $param_correo);   
                $param_correo = trim($_POST["correo"]);
                if(mysqli_stmt_execute($statement)){
                    mysqli_stmt_store_result($statement);
                    if(mysqli_stmt_num_rows($statement) !=0){
                        $existeUsuario=true;
                    }else{
                        $nombre = trim($_POST["nombre"]);
                        $correo = trim($_POST["correo"]);
                        $fecha_nacimiento = trim($_POST["fecha_nacimiento"]);
                        $telefono = trim($_POST["telefono"]);
                    }
                }else{
                    echo "Ah ocurrido un error! :(";
                }
                mysqli_stmt_close($statement);
            }
        }
        if(strlen(trim($_POST["contraseña"])) >= 8){
            $contraseña = trim($_POST["contraseña"]);
        }
        if(!empty(trim($_POST["confirmar_contraseña"]))){
            $confirmar_contraseña = trim($_POST["confirmar_contraseña"]);
        }

        $clientes = "select id_cliente from cliente";
        $resultado = mysqli_query($conexion, $clientes);
        if($resultado){
            $num_clientes = mysqli_num_rows($resultado);
            /*
            if($num_clientes){
                echo "Numero de clientes: " . $num_clientes;
            }*/
            mysqli_free_result($resultado);
        }

        if(!empty($correo) && !empty($contraseña) && !empty($confirmar_contraseña) && !$existeUsuario){
            $consulta = "insert into cliente(id_cliente, Nombre_cliente, Fecha_nacimiento, correo, telefono, contraseña) values(?, ?, ?, ?, ?, ?)";
            if($statement = mysqli_prepare($conexion, $consulta)){                
                mysqli_stmt_bind_param($statement, "ssssss",$param_id, $param_nombre, $param_fecha_nacimiento, $param_correo, $param_telefono, $param_contraseña);
                $param_id = "C".$num_clientes;
                $param_nombre= $nombre;
                $param_fecha_nacimiento = $fecha_nacimiento;
                $param_correo = $correo;
                $param_telefono = $telefono;
                $param_contraseña = md5($contraseña);
    
                if(mysqli_stmt_execute($statement)){
                    header("location: index.php");
                } else{
                    echo "Algo ha salido mal";
                }
                mysqli_stmt_close($statement);
            }      
        }else{
            $error ="Usuario ya existe";
            header("location: index.php");
        } 
        mysqli_close($conexion);
    }
?>

