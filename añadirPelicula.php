<?php
    include 'conexion.php';
    include 'modelo/Pelicula.php';
    $existePelicula = false;
    $num_peliculas=0;
    $pelicula = new Pelicula();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $conexion = abrirConexion();
        $id_pelicula = $nombre_pelicula = $descripcion = $actores=$portada=$categoria = "";
        $duracion = $calificacion = 0; 
        #echo "Se abrio la conexion";
        if(!empty(trim($_POST["titulo"])) && !empty(basename($_FILES['portada']['name']))
                && !empty(trim($_POST["descripcion"])) && !empty(trim($_POST["duracion"])) 
                    &&  !empty(trim($_POST["actores"])) && !empty(trim($_POST["categoria"]))){                        

            $peliculaNueva = "select * from pelicula where Nombre_pelicula = '".trim($_POST["titulo"])."' ";
            $resultado = $conexion -> query($peliculaNueva);
            if($resultado->num_rows > 0){
     
                $existePelicula=true;
                header("location: paginas/añadirPelicula.php");
                while($row = $resultado->fetch_assoc()){
                    #echo "id: " . $row["id_pelicula"]. "Nombre: " . $row["nombre_pelicula"]. "Descripcion: ". $row["descripcion"]."<br>";
                    #echo "<span style='font-weight:bold;color:red;'>La pelicula ya existe.</span>";
                }
            }else{
                //Se obtiene el numero de peliculas existentes
                $peliculas = "select id_pelicula from pelicula";
                $resultado = mysqli_query($conexion, $peliculas);
                if($resultado){
                    $num_peliculas = mysqli_num_rows($resultado);
                    mysqli_free_result($resultado);
                }
                //Se crea el insert en sql
                $consulta = "insert into pelicula(id_pelicula, nombre_pelicula, descripcion, duracion, actores, calificacion, portada, categoria) values(?, ?, ?, ?, ?, ?, ?, ?)";
                if($statement = mysqli_prepare($conexion, $consulta)){      
                    //Se asignan los datos del formulario a un objeto de tipo Pelicula          
                    $pelicula->setId_pelicula("P".($num_peliculas + 1)."");
                    $pelicula->setNombre_pelicula(trim($_POST["titulo"]));
                    $pelicula->setDescripcion(trim($_POST["descripcion"]));
                    $pelicula->setActores(trim($_POST["actores"]));
                    $pelicula->setPortada(basename($_FILES['portada']['name']));
                    $pelicula->setCategoria(trim($_POST["categoria"]));
                    $pelicula->setDuracion(trim($_POST["duracion"]));
                    
                    //Se inserta la nueva pelicula
                    mysqli_stmt_bind_param($statement, "ssssssss",$pelicula->getId_pelicula(), $pelicula->getNombre_pelicula(), $pelicula->getDescripcion(), $pelicula->getDuracion(), $pelicula->getActores(), $pelicula->getCalificacion(), $pelicula->getPortada(), $pelicula->getCategoria());
        
                    if(mysqli_stmt_execute($statement)){
                        header("location: paginas/carteleraAdmin.php");
                        require_once("modelo/AlmacenaPortada.php");
                    } else{
                        echo "Algo ha salido mal";
                    }
                    mysqli_stmt_close($statement);
                } 
            }
            mysqli_close($conexion);                        
        }
    }
    /*
     $id_pelicula = $pelicula->getId_pelicula();
     $nombre_pelicula = $pelicula->getNombre_pelicula();
     $descripcion = $pelicula->getDescripcion();
     $actores= $pelicula->getActores();
     $portada=$pelicula->getPortada();
     $categoria =$pelicula->getCategoria();
     $duracion =$pelicula->getDuracion();
     $calificacion = $pelicula->getCalificacion();
    */
?>