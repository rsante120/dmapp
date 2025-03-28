
function AJAXPOST(Pagina, Variables, Obj, MsjLoad, FuncionListo, FuncionCarga, Conexion){
	if(MsjLoad != null){
		MsjLoad = procesar_mjs(MsjLoad);
		$(Obj).html(MsjLoad);
	}

	document.body.style.cursor = "wait";
	$("a").css("cursor", "wait");
	$("#div_cargando").show('fast');

	// Crear un objeto FormData para manejar campos
    const formData = new FormData();
    const params = new URLSearchParams(Variables);
    for (const [key, value] of params.entries()) {
			formData.append(key, value); 	
    }

	// Realizar la solicitud AJAX
	$.ajax({
		 url: Pagina,
		 method: "POST",
		 data: formData,
		 processData: false, // Evitar que jQuery procese FormData
		 contentType: false, // Evitar que jQuery establezca un Content-Type predeterminado
		 beforeSend: function () {
			  if (FuncionCarga) {
					FuncionCarga();
			  }
		 },
		 success: function (response) {
			  if (Obj) {
					$(Obj).html(response).fadeIn("normal");
			  }
				js_inicializar_librerias();
			  if (FuncionListo) {
					FuncionListo(response);
			  }
		 },
		 error: function (xhr, status, error) {
			  console.error("Error en la solicitud AJAX:", status, error);
			  if (Obj) {
					$(Obj).html(`<div class="error">Error: ${error}</div>`).fadeIn("normal");
			  }
		 },
		 complete: function () {
			  $("#div_cargando").hide('fast');
			  $("a").css("cursor", "pointer");
			  document.body.style.cursor = "auto";
		 }
	});
}

function procesar_mjs(strMsj){
	let alignCSS = "center"; // alineación por defecto
	let mensaje = strMsj;

	// Si el mensaje es exactamente "R", "L" o "C"
	if (strMsj === "R" || strMsj === "L" || strMsj === "C") {
			if (strMsj === "R") alignCSS = "right";
			else if (strMsj === "C") alignCSS = "center";
			else alignCSS = "left";

			mensaje = "Espere un momento...";
	}

	// Si comienza con R; L; o C;
	else if (/^[RLC];/.test(strMsj)) {
			let partes = strMsj.split(";");
			let alineacion = partes[0];
			mensaje = partes[1] ? partes[1].trim() : '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>';

			if (alineacion === "R") alignCSS = "right";
			else if (alineacion === "C") alignCSS = "center";
			else alignCSS = "left";
	}

	// Caso por defecto (sin formato válido)
	else {
			alignCSS = "left";
			mensaje = strMsj;
	}

	return strMsj = '<div style="text-align:' + alignCSS + '">' + mensaje + '</div>';
}

function js_inicializar_librerias(){
	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
	tooltipTriggerList.forEach(function (tooltipTriggerEl) {
		new bootstrap.Tooltip(tooltipTriggerEl);
	});



}


function jscarga(pagina, extra) {
	// Separar la ruta
	var partes = pagina.split("/");

	// Construir la URL base
	var nuevaURL = "";
	if (partes.length >= 4) {
			nuevaURL += "?mod=" + encodeURIComponent(partes[0]) +
									"&app=" + encodeURIComponent(partes[1]) +
									"&sec=" + encodeURIComponent(partes[2]) +
									"&pag=" + encodeURIComponent(partes.slice(3).join("/").replace(/\.php$/, ""));
	}

	// Si extra viene con "&" al principio, se puede concatenar directo
	if (extra) {
		nuevaURL += "&"+extra;
	}
	window.location.href = nuevaURL;
}



