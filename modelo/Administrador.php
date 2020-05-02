
<?php
class Administrador{

    private $id= "";
    private $nombre= "";
    private $correo = "";
    private $contraseña = "";


    public function modificarInfoPelicula($conexion,$id_pelicula,$nombre_pelicula, $calificacion, $descripcion, $actores, $categoria, $portada, $duracion , $precio){
		echo $descripcion ."". $actores."". $categoria."".$duracion;

		if($portada== null || $portada == ""){
            $sql = "UPDATE pelicula SET nombre_pelicula=?, descripcion=?, duracion=?, actores=?, calificacion=?, categoria=? , precio=? WHERE id_pelicula=?";
        }else{
            $sql = "UPDATE pelicula SET nombre_pelicula=?, descripcion=?, duracion=?, actores=?, calificacion=?, categoria=?, precio=? portada=? WHERE id_pelicula=?";
		}


		if($stmt = mysqli_prepare($conexion, $sql)){
            if($portada== null || $portada == ""){
                mysqli_stmt_bind_param($stmt,"ssdsdsds", $nombre_pelicula, $descripcion, $duracion, $actores, $calificacion, $categoria, $precio, $id_pelicula);
            }else{
                mysqli_stmt_bind_param($stmt,"ssdsdsdss", $nombre_pelicula,  $descripcion, $duracion, $actores, $calificacion, $categoria,$precio, $portada, $id_pelicula);
            }
            
            echo "Id: ".$id_pelicula;
            
            if(mysqli_stmt_execute($stmt)){
				$imagenes = '../img/portadas/';
				$imagenSubida = $imagenes . $portada;                                        
				if (move_uploaded_file($_FILES['portada']['tmp_name'], $imagenSubida)) {
					echo "Imagen Guardada";
				} else {
				   echo "Error al descargar imagen";
				}                
				header("location: ../paginas/carteleraAdmin.php");
                exit();
            } else{
                echo "Ocurrio un error al editar la informacion, intentelo de nuevo.";
            }
            mysqli_stmt_close($stmt);
        }
		

        #$sql = "UPDATE pelicula SET id_pelicula = '".$id_pelicula."' , nombre_pelicula = '".$nombre_pelicula."', descripcion = '".$descripcion."', duracion= ".$duracion." , actores = '".$actores."' , calificacion = ".$calificacion.", portada = '".$portada."' , categoria = '".$categoria."' WHERE id ='".$id_pelicula."'";
        #$sql = "UPDATE pelicula SET id_pelicula = '999' WHERE id_pelicula = 'P2'";

        #$res = mysqli_query($this->$conexion, $sql);
        #if($res){
        #    return true;
        #}else{
        #    return false;
        #}
    }

    public function eliminarPelicula($conexion, $id_pelicula){
		$sql = "DELETE FROM pelicula WHERE id_pelicula = ?";
		if($stmt = mysqli_prepare($conexion, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $param_id);
			$param_id = $id_pelicula;
			if(mysqli_stmt_execute($stmt)){
				header("location: index.php");
				exit();
			} else{
				echo "No se pudo eliminar la pelicula";
			}
		}
		# Se cierra la conexion
		mysqli_stmt_close($stmt);
		mysqli_close($conexion);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

}
?>



