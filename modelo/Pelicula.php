<?php
class Pelicula{
    private $id_pelicula ="";
    private $nombre_pelicula = "";
    private $calificacion =0.0;
    private $descripcion ="";
    private $actores = "";
    private $categoria = "";



    // Metodos accesores
    public function getId_pelicula(){
		return $this->id_pelicula;
	}

	public function setId_pelicula($id_pelicula){
		$this->id_pelicula = $id_pelicula;
	}

	public function getNombre_pelicula(){
		return $this->nombre_pelicula;
	}

	public function setNombre_pelicula($nombre_pelicula){
		$this->nombre_pelicula = $nombre_pelicula;
	}

	public function getCalificacion(){
		return $this->calificacion;
	}

	public function setCalificacion($calificacion){
		$this->calificacion = $calificacion;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getActores(){
		return $this->actores;
	}

	public function setActores($actores){
		$this->actores = $actores;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

}

?>