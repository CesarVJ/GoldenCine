<?php 
include 'modelo/Horario.php';
include 'Conexion.php';


if(isset($_GET["id"])){
    if(!empty(trim($_POST["dia-pelicula"])) && !empty(trim($_POST["hora-pelicula"])) && !empty(trim($_POST["sala-pelicula"]))){
            $conexion= abrirConexion();

            $mismosHorarios = "select * from Horario where dia = '".trim($_POST["dia-pelicula"])."'  and hora = '".trim($_POST["hora-pelicula"])."' and sala = '".trim($_POST["sala-pelicula"])."'";
            $resultado = $conexion -> query($mismosHorarios);
            if($resultado->num_rows > 0){
                header('location: paginas/agregarHorarios.php?error=1');
            }else{
                $horarioNuevo = new Horario();
                $horarios = "select id_horario from Horario";
                $resultado = mysqli_query($conexion, $horarios);
                if($resultado){
                    $num_horarios = mysqli_num_rows($resultado);
                    mysqli_free_result($resultado);
                }
                $consulta = "insert into Horario(id_horario, dia, hora, sala, Peliculaid_pelicula) values(?, ?, ?, ?, ?)";
                if($statement = mysqli_prepare($conexion, $consulta)){  
                    $horarioNuevo->setId_horario($num_horarios +1);
                    $horarioNuevo->setDia(trim($_POST["dia-pelicula"]));
                    $horarioNuevo->setHora(trim($_POST["hora-pelicula"]));
                    $horarioNuevo->setSala(trim($_POST["sala-pelicula"]));

                    mysqli_stmt_bind_param($statement,"sssis",$horarioNuevo->getId_horario(), $horarioNuevo->getDia(), $horarioNuevo->getHora(), $horarioNuevo->getSala(),trim($_GET["id"]));
                    if(mysqli_stmt_execute($statement)){
                        header('location: paginas/agregarHorarios.php?id='.$_GET["id"]);
                    }else{
                        echo "Algo ha salido mal!";
                    }
                    mysqli_stmt_close($statement);
                }else{
                    echo "No funciono";
                }
            }
            mysqli_close($conexion);                        
    }else{
        echo "Faltan datos";
    }
}






?>