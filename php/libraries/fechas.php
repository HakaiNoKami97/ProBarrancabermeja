<?php
/**
*
*/
class fechas
{
	private $arrayMeses,$arrayDias;

	function __construct()
	{
		$this->arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   					 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

		$this->arrayDias = array( 'Domingo', 'Lunes', 'Martes',
   				'Miercoles', 'Jueves', 'Viernes', 'Sabado');
	}

	public function formato1($fechaHora){
		$fechaFormateada = date('d',strtotime($fechaHora))."/".date('m',strtotime($fechaHora))."/".date('Y',strtotime($fechaHora));
		return $fechaFormateada;
	}
	//$arrayDias[date('w',strtotime($fechaHora))].", ".date('d',strtotime($fechaHora))." de ".$arrayMeses[date('m',strtotime($fechaHora))-1]." del ".date('Y',strtotime($fechaHora))." (".date('h:i a', strtotime($fechaHora)).")",
	public function formato2($fechaHora){//lunes 8 de marzo de 2017
		$fechaFormateada = $this->arrayDias[date('w',strtotime($fechaHora))].", ".date('d',strtotime($fechaHora))." de ".$this->arrayMeses[date('m',strtotime($fechaHora))-1]." del ".date('Y',strtotime($fechaHora));
		return $fechaFormateada;
	}

	public function formato3($fechaHora){//lunes 8 de marzo
		$fechaFormateada = $this->arrayDias[date('w',strtotime($fechaHora))]." ".date('d',strtotime($fechaHora))." de ".$this->arrayMeses[date('m',strtotime($fechaHora))-1];
		return $fechaFormateada;
	}

	public function formato4($fechaHora){//marzo 8 de 2017
		$fechaFormateada = $this->arrayMeses[date('m',strtotime($fechaHora))-1]." ".date('d',strtotime($fechaHora))." de ".date('Y',strtotime($fechaHora));
		return $fechaFormateada;
	}

	public function formato5($fechaHora){//dia_mes_año corto - 29_11_17
		$fechaFormateada = date('d',strtotime($fechaHora))."_".date('m',strtotime($fechaHora))."_".date('y',strtotime($fechaHora));
		return $fechaFormateada;
	}

	public function formato6($fechaHora){//
		$fechaFormateada = date('d',strtotime($fechaHora))."-".date('m',strtotime($fechaHora))."-".date('Y',strtotime($fechaHora));
		return $fechaFormateada;
	}

	public function sumardias($fecha,$dias){
		$nuevaFecha = $fecha;
		$nuevaFecha = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
		$nuevaFecha = date ( 'Y-m-d' , $nuevaFecha );
		return $nuevaFecha;
	}
}
?>