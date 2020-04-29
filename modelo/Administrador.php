
<?php
class Administrador{

    private $id= "";
    private $nombre= "";
    private $correo = "";
    private $contraseña = "";


    public function modificarInfoPelicula($conexion,$id_pelicula,$nombre_pelicula, $calificacion, $descripcion, $actores, $categoria, $portada, $duracion  ){
        #$sql = "UPDATE pelicula SET id_pelicula = '".$id_pelicula."' , nombre_pelicula = '".$nombre_pelicula."', descripcion = '".$descripcion."', duracion= ".$duracion." , actores = '".$actores."' , calificacion = ".$calificacion.", portada = '".$portada."' , categoria = '".$categoria."' WHERE id ='".$id_pelicula."'";
        #$sql = "UPDATE pelicula SET id_pelicula = '999' WHERE id_pelicula = 'P2'";

        $res = mysqli_query($this->$conexion, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
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



