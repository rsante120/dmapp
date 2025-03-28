<?php

function calcular_edad($fechaNacimiento) {
  if($fechaNacimiento<>"" && $fechaNacimiento<>"0000-00-00"){
    // Convertir la fecha de nacimiento a un objeto DateTime
    $fechaNacimiento = new DateTime($fechaNacimiento);
    // Obtener la fecha actual
    $fechaActual = new DateTime('now');
    // Calcular la diferencia de años
    $edad = $fechaActual->diff($fechaNacimiento);
    // Devolver la edad
    return $edad->y;
  }
  return "";
  
}






/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function es_inyeccion_sql($input) {
  $patrones_peligrosos = [
      "/\b(select|insert|update|delete|drop|union|create|alter|truncate|exec|sleep)\b/i", // Palabras clave SQL
      "/[';#]/",      // Caracteres comunes en inyección
      "/--/",           // Comentario en línea
      "/\/\*/",         // Inicio de comentario múltiple
      "/\b(or|and)\b/i" // Operadores lógicos
  ];

  foreach ($patrones_peligrosos as $pattern) {
      if (preg_match($pattern, $input)) {
          return true;
      }
  }
  return false;
}
function _validar_param($param){
  if (es_inyeccion_sql($param)) {
      die("No se procesará la petición por temas de seguridad");
  }
  return $param;
}
function _validar_filtros(){
  foreach ($_REQUEST as $key => $value) {
    if (strpos($key, 'fil_') === 0) {
        if (es_inyeccion_sql($value)) {
            die("Solicitud inválida detectada en el filtro '$key'. No se procesará la petición por temas de seguridad");
        }
    }
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function wnav_titulo_pagina($titulo, $subtitulo){
  ?>
  <div class="mb-4">
    <h1 class="mb-2"><?php echo $titulo; ?></h1>
    <h5 class="text-700 fw-semi-bold"><?php echo $subtitulo; ?></h5>
  </div>
  <?php
}
function wnav_titulo_modal($titulo){
  ?>
  <div class="modal-header">
    <h5 class="modal-title" id="scrollingLongModalLabel2"><?php echo $titulo; ?></h5>
    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
        <span class="fas fa-times fs--1"></span>
    </button>
  </div>
  <?php
}
function wnav_mensaje_ok($mensaje){
  ?>
  <div class="alert alert-outline-success d-flex align-items-center" role="alert">
    <span class="fas fa-info-circle text-success fs-3 me-3"></span>
    <p class="mb-0 flex-1 fs-0"><? echo $mensaje; ?></p>
  </div>
  <?php
}
function wnav_mensaje_info($mensaje){
  ?>
  <div class="alert alert-outline-info d-flex align-items-center" role="alert">
    <span class="fas fa-info-circle text-info fs-3 me-3"></span>
    <p class="mb-0 flex-1 fs-0"><? echo $mensaje; ?></p>
  </div>
  <?php
}
function wnav_mensaje_error($mensaje){
  ?>
  <div class="alert alert-outline-danger d-flex align-items-center" role="alert">
    <span class="fas fa-info-circle text-danger fs-3 me-3"></span>
    <p class="mb-0 flex-1 fs-0"><? echo $mensaje; ?></p>
  </div>
  <?php
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////











function _num($valor){ // Formato de n�mero 
	$decimal = explode(".",$valor);
	$num = $decimal[1]*1;
	if($num > 0 ){
		return number_format($valor,1,",",".");
	}else{
		return number_format($valor,0,",",".");	
	}
	
}

function validar_rut($rut) {
  // Eliminar puntos y guiones
  $rut = preg_replace('/[\.\-]/', '', strtoupper($rut));

  // Validar que tenga al menos 2 caracteres (uno para el número y uno para el DV)
  if (strlen($rut) < 2) {
      return "Error en Formato RUT. Cantidad de caracteres";
  }

  // Separar número y dígito verificador
  $numero = substr($rut, 0, -1);
  $dv = substr($rut, -1);

  // Validar que el número sea numérico
  if (!ctype_digit($numero)) {
    return "Error en Formato RUT. Valor no numérico";
  }

  // Calcular dígito verificador
  $suma = 0;
  $multiplo = 2;

  for ($i = strlen($numero) - 1; $i >= 0; $i--) {
      $suma += $numero[$i] * $multiplo;
      $multiplo = ($multiplo < 7) ? $multiplo + 1 : 2;
  }

  $resto = $suma % 11;
  $dv_calculado = 11 - $resto;

  if ($dv_calculado == 11) {
      $dv_calculado = '0';
  } elseif ($dv_calculado == 10) {
      $dv_calculado = 'K';
  } else {
      $dv_calculado = (string)$dv_calculado;
  }

  // Comparar dígito verificador
  if ($dv === $dv_calculado) {
    return "";
  }else{
    return "Error en RUT. Dígito verificador incorrecto";
  }

}
?>