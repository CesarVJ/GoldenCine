<?php
class Cliente{
    private $id_cliente ="";
    private $Nombre_cliente = "";
    private $contraseña ="";
    private $Fecha_nacimiento ="";
    private $telefono = "";
    private $correo = "";


    
    public function registrarse(){

    }
    public function iniciarSesion(){
        
    }
    public function consultarCartelera(){
        
    }
    public function reservarAsiento(){
        
    }
    public function comprarBoleto(){
        
    }
    public function calificarPelicula(){
        
    }
    
    //Metodos accesores
    public function getId_cliente(){
		return $this->id_cliente;
	}

	public function setId_cliente($id_cliente){
		$this->id_cliente = $id_cliente;
	}

	public function getNombre_cliente(){
		return $this->Nombre_cliente;
	}

	public function setNombre_cliente($Nombre_cliente){
		$this->Nombre_cliente = $Nombre_cliente;
	}

	public function getContraseña(){
		return $this->contraseña;
	}

	public function setContraseña($contraseña){
		$this->contraseña = $contraseña;
	}

	public function getFecha_nacimiento(){
		return $this->Fecha_nacimiento;
	}

	public function setFecha_nacimiento($Fecha_nacimiento){
		$this->Fecha_nacimiento = $Fecha_nacimiento;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

}

?>