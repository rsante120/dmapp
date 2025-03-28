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
  $param = str_replace("'","`",$param);
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







/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function jsfunc_para_cookies_formulario($formuNombre){
  ?>
  <script>
    function cookieFormGuardarDatosEnCookie() {
      const campos = document.querySelectorAll('.campos');
      const datos = {};

      campos.forEach(campo => {
        const tag = campo.tagName.toLowerCase();

        if (campo.type === "checkbox") {
          datos[campo.id] = campo.checked;
        } else if (tag === "textarea" || tag === "input" || tag === "select") {
          datos[campo.id] = campo.value.trim(); // puedes quitar el trim() si no lo deseas
        }
      });

      const datosJSON = JSON.stringify(datos);
      document.cookie = "<?=$formuNombre?>DatosFormulario=" + encodeURIComponent(datosJSON) + "; path=/; max-age=" + (60 * 60 * 24); // 1 día

      //console.clear();
      //console.log("Datos guardados en cookie:");
      //console.log(datos);
    }

    function cookieFormCargarDatosDesdeCookie() {
      const cookies = document.cookie.split(';');
      let datos = {};

      cookies.forEach(cookie => {
        const [nombre, valor] = cookie.trim().split('=');
        if (nombre === '<?=$formuNombre?>DatosFormulario') {
          try {
            datos = JSON.parse(decodeURIComponent(valor));
          } catch (e) {
            //console.warn("Error al parsear la cookie <?=$formuNombre?>DatosFormulario:", e);
          }
        }
      });

      Object.keys(datos).forEach(id => {
        const el = document.getElementById(id);
        if (el) {
          if (el.type === "checkbox") {
            el.checked = datos[id];
          } else {
            el.value = datos[id];
          }
        }
      });

      if (Object.keys(datos).length > 0) {
        //console.log("Datos cargados desde cookie:");
        //console.log(datos);
      }
    }

    function cookieFormInicializarAutoGuardadoCampos() {
      const campos = document.querySelectorAll('.campos');
      if (!campos.length) return;

      cookieFormCargarDatosDesdeCookie();

      campos.forEach(campo => {
        campo.removeEventListener('change', cookieFormGuardarDatosEnCookie);
        campo.removeEventListener('input', cookieFormGuardarDatosEnCookie);

        campo.addEventListener('change', cookieFormGuardarDatosEnCookie);
        campo.addEventListener('input', cookieFormGuardarDatosEnCookie);
      });

      //console.log("Auto-guardado de campos inicializado.");
    }
    function cookieFormlimpiarDatosGuardados() {
      document.cookie = "<?=$formuNombre?>DatosFormulario=; path=/; max-age=0";
      //console.log("Cookie '<?=$formuNombre?>DatosFormulario' eliminada.");
    }
    cookieFormInicializarAutoGuardadoCampos();
  </script>


  <?php
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////









/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function logs_agregar_registro($usuario, $accion, $detalle){
  $sql_log = "INSERT INTO log_eventos (log_usuario, log_accion, log_detalle)
              VALUES ('$usuario', '$accion', '$detalle')";
  mysql_query($sql_log);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function construirNuevaURL($pagina, $extra = '') {
  // Separar la ruta por "/"
  $partes = explode("/", $pagina);
  
  // Verificar que tenga al menos 4 partes
  if (count($partes) >= 4) {
      // Construir los parámetros
      $mod = urlencode($partes[0]);
      $app = urlencode($partes[1]);
      $sec = urlencode($partes[2]);
      $pag = implode("/", array_slice($partes, 3));
      $pag = preg_replace('/\.php$/', '', $pag); // quitar .php del final
      $pag = urlencode($pag);

      $nuevaURL = "?mod={$mod}&app={$app}&sec={$sec}&pag={$pag}";

      // Agregar extra si existe
      if (!empty($extra)) {
          // Asegurarse de no duplicar "&" si ya viene con uno
          $nuevaURL .= "&" . ltrim($extra, "&");
      }

      return $nuevaURL;
  }

  // Si no tiene suficientes partes, retornar cadena vacía o algo por defecto
  return '';
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>