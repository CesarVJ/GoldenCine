<?php
class Pelicula{
    private $id_pelicula ="";
    private $nombre_pelicula = "";
    private $calificacion =0.0;
    private $descripcion ="";
    private $actores = "";
	private $categoria = "";
	private $portada = "";
	private $duracion = 0;
	private $precio = 0.0;
	private $num_calif = 0;


	



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

	public function getNum_calif(){
		return $this->num_calif;
	}

	public function setNum_calif($num_calif){
		$this->num_calif = $num_calif;
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

	public function getPortada(){
		return $this->portada;
	}

	public function setPortada($portada){
		$this->portada = $portada;
	}

	public function getDuracion(){
		return $this->duracion;
	}

	public function setDuracion($duracion){
		$this->duracion = $duracion;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}



}

?>