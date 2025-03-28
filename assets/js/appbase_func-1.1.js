//////////////////////////////////////////////////////

// Enable Buton...
function js_bloquear_boton(nombre_boton) {
  $("#"+nombre_boton).hide();
  $("#cargando_"+nombre_boton).show();
  setTimeout(function() {
      const elemento = document.getElementById(nombre_boton);
      if (elemento !== null) {
          // El elemento existe, puedes acceder a sus propiedades 
          $("#"+nombre_boton).show();
          $("#cargando_"+nombre_boton).hide();
      }else{
          // El elemento no existe, haz algo diferente o no hagas nada
          console.log('El boton ya no existe en el HTML: '+nombre_boton);
      }
  }, 2500);
}

function js_modal_size(opt){
	$('#modGeneral_child').removeClass('modal-sm');
	$('#modGeneral_child').removeClass('modal-lg');
	$('#modGeneral_child').removeClass('modal-xl');
	var clase = "";
	switch (opt) {
		case 'S':
			clase = "modal-sm";
			break;
		case 'L':
			clase = "modal-lg";
		break;
		case 'XL':
			clase = "modal-xl";
		break;
	}
	$('#modGeneral_child').addClass(clase);
}
function js_modal_salir(){
	var dv = document.getElementById("modGeneral_lugar");
	dv.innerHTML = "";
	$('#modGeneral').modal('hide'); 
}
/*******************************************
function alerta_js(msj){ 
	$("#texto_alerta_pop").html(msj);
	$('#modAlertas').modal('show');
}
function alerta_sonido(msj){
	sonido_error();
	$("#texto_alerta_pop").html(msj);
	$('#modAlertas').modal('show');
}
function exito_js(msj){ 
	$("#texto_exito_pop").html(msj);
	$('#modExitos').modal('show');
}

function val_obligatorio(campo){
	var existe = $("#"+campo).prop("disabled");
	if(!existe){
		$("#"+campo).removeClass("alerta");
		var valor = document.getElementById(campo).value + ""; 
		if(valor == ""){
			$("#"+campo).addClass("alerta");
			alert("Indique todos los campos obligatorios (*).");
			document.getElementById(campo+"").focus();
			return false;
		}
		return true;
	}else{
		return true;
	}
} 
function mostrar_ocultar(valor){
	$("#"+valor).toggle("fast");
}
/******************************************/
function simbolos(a){
	do{
		a = a.replace('+','%2B');
		a = a.replace('%u2013','-');
	}
	while(a.indexOf('+') >= 0 || a.indexOf('%u2013') >= 0);
	return a;
}