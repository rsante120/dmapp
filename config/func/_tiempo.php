<?php
function _mes($num){
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	return $meses[$num-1];
} 
function _meses(){
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	return $meses;
} 

function _mes2($num){
	$meses = array("Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
	return $meses[$num-1];
}
function _meses2(){
	$meses = array("Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
	return $meses;
} 

function _mes3($mes){
	$meses = array("Jan" => "01", "Feb" => "02", "Mar" => "03", "Apr" => "04", "May" => "05", "Jun" => "06", "Jul" => "07", "Aug" => "08", "Sep" => "09", "Oct" => "10", "Nov" => "11", "Dec" => "12");
	return $meses[$mes];
}
function _meses3(){
	$meses = array("Jan" => "01", "Feb" => "02", "Mar" => "03", "Apr" => "04", "May" => "05", "Jun" => "06", "Jul" => "07", "Aug" => "08", "Sep" => "09", "Oct" => "10", "Nov" => "11", "Dec" => "12");
	return $meses;
} 


function _mes4($mes){
	$meses = array("01" => "Ene", "02" => "Feb", "03" => "Mar", "04" => "Abr", "05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Ago", "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dic");
	return $meses[$mes];
}
function _meses4(){
	$meses = array("01" => "Ene", "02" => "Feb", "03" => "Mar", "04" => "Abr", "05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Ago", "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dic");
	return $meses;
} 

function _dia($num){
	$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");	
	return $dias[$num-1];
}
function _dias(){
	$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");	
	return $dias;
}


function _fec($fecha,$entrada = "Y-m-d",$salida = "d/m/Y"){
	$dias = _dias();
	$meses = _meses();
	$meses_corto = _meses2();
	
	$fecha = substr($fecha,0,10);
	switch($entrada){
			case "Y-m-d":
					list($ano, $mes, $dia) = explode("-", $fecha);
					break;
			case "Ymd":
					$ano = substr($fecha,0,4);
					$mes = substr($fecha,4,2);
					$dia = substr($fecha,6,2);
					break;
			case "d-m-Y":
					list($dia, $mes, $ano) = explode("-", $fecha);
					break;
			case "d/m/Y":
					list($dia, $mes, $ano) = explode("/", $fecha);
					break;
	}
	switch($salida){
			case "full":
					$diasemana = jddayofweek(cal_to_jd(CAL_GREGORIAN, $mes, $dia, $ano), 0); 
					$salida = $dias[$diasemana]." ".intval($dia)." de ".$meses[$mes - 1].", ".$ano;
					break;
			case "Y-m-d":
					$salida = str_replace("Y",$ano,$salida);
					$salida = str_replace("m",$mes,$salida);
					$salida = str_replace("d",$dia,$salida);
					if($salida == "--"){
							$salida = "0000-00-00";
					}
					break;
			case "d/m/Y":
					$salida = str_replace("Y",$ano,$salida);
					$salida = str_replace("m",$mes,$salida);
					$salida = str_replace("d",$dia,$salida);
					if($salida == "//" || $salida == "00/00/0000"){
							$salida = "";
					}
					break;
			case "d-m-Y":
					$salida = str_replace("Y",$ano,$salida);
					$salida = str_replace("m",$mes,$salida);
					$salida = str_replace("d",$dia,$salida);
					if($salida == "--"){
							$salida = "00-00-0000";
					}
					break;
	}
	return $salida;
}

?>