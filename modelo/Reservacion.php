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

	function getAsientosOcupados($id_horario){
		$conexion = abrirConexion();
		$listaAsientos = array();
		$consultaAsientos = "select asientos from Reservacion where Horarioid_horario = '".$id_horario."'";
		$datos = $conexion -> query($consultaAsientos);

		if($datos->num_rows > 0){
			$contador=0;
			while($row = $datos->fetch_assoc()){
				$listaAsientos[$contador] = new Reservacion();
				$listaAsientos[$contador]->setAsientos($row['asientos']);
				$contador+=1;
			}
		}
		return $listaAsientos;
	}

    

}

?>