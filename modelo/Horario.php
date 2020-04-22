<?php
class Horario{
    private $id_horario ="";
    private $dia ="";
    private $hora ="";
    private $sala = "";


    # Metodos accesores
    public function getId_horario(){
		return $this->id_horario;
	}

	public function setId_horario($id_horario){
		$this->id_horario = $id_horario;
	}

	public function getDia(){
		return $this->dia;
	}

	public function setDia($dia){
		$this->dia = $dia;
	}

	public function getHora(){
		return $this->hora;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

	public function getSala(){
		return $this->sala;
	}

	public function setSala($sala){
		$this->sala = $sala;
	}
    

}

?>