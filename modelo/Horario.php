<?php
class Horario{
    private $id_horario ="";
    private $dia ="";
    private $hora ="";
    private $sala = "";



	public function getHorarios($idPelicula){
		$conexion = abrirConexion();
		$listaHorarios = array();
		$consultaHorarios = "select * from Horario where Peliculaid_pelicula = '".$idPelicula."'";
		$datos = $conexion -> query($consultaHorarios);

		if($datos->num_rows > 0){
			$contador=0;
			while($row = $datos->fetch_assoc()){
				$listaHorarios[$contador] = new Horario();
				$listaHorarios[$contador]->setId_horario($row['id_horario']);
				$listaHorarios[$contador]->setDia($row['dia']);
				$listaHorarios[$contador]->setHora($row['hora']);
				$listaHorarios[$contador]->setSala($row['sala']);
				$contador+=1;
			}
		}
		return $listaHorarios;
	}

	public function getHorariosPorFecha($idPelicula, $fecha){
		$conexion = abrirConexion();
		$listaHorarios = array();
		$consultaHorarios = "select * from Horario where Peliculaid_pelicula = '".$idPelicula."' and dia = '".$fecha."'";
		$datos = $conexion -> query($consultaHorarios);

		if($datos->num_rows > 0){
			$contador=0;
			while($row = $datos->fetch_assoc()){
				$listaHorarios[$contador] = new Horario();
				$listaHorarios[$contador]->setId_horario($row['id_horario']);
				$listaHorarios[$contador]->setDia($row['dia']);
				$listaHorarios[$contador]->setHora($row['hora']);
				$listaHorarios[$contador]->setSala($row['sala']);
				$contador+=1;
			}
		}
		return $listaHorarios;
	}

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