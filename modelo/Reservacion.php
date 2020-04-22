<?php
class Reservacion{
    private $id_reservacion ="";
    private $asientos = "";

	public function getId_reservacion(){
		return $this->id_reservacion;
	}

	public function setId_reservacion($id_reservacion){
		$this->id_reservacion = $id_reservacion;
	}

	public function getAsientos(){
		return $this->asientos;
	}

	public function setAsientos($asientos){
		$this->asientos = $asientos;
	}

    

}

?>