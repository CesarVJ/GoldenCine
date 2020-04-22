<?php
class Tarjeta{
    private $numero_tarjeta ="";
    private $fecha_vencimiento = "";
    private $codigo_seguridad ="";
    private $saldo = 0.0;
   
    public function retirar(){

    }
    public function abonar(){
        
    }

    # Metodos accesores
    public function getNumero_tarjeta(){
		return $this->numero_tarjeta;
	}

	public function setNumero_tarjeta($numero_tarjeta){
		$this->numero_tarjeta = $numero_tarjeta;
	}

	public function getFecha_vencimiento(){
		return $this->fecha_vencimiento;
	}

	public function setFecha_vencimiento($fecha_vencimiento){
		$this->fecha_vencimiento = $fecha_vencimiento;
	}

	public function getCodigo_seguridad(){
		return $this->codigo_seguridad;
	}

	public function setCodigo_seguridad($codigo_seguridad){
		$this->codigo_seguridad = $codigo_seguridad;
	}

	public function getSaldo(){
		return $this->saldo;
	}

	public function setSaldo($saldo){
		$this->saldo = $saldo;
	}

}

?>