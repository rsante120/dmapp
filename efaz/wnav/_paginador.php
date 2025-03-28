<?php 


if($paginador_sql==""){
	echo "- Completar consulta SQL <br>";
}

$_paginador["sql_limpio"] = preg_replace('/\s+/', ' ', trim($paginador_sql));
$_paginador["query_cont"] = preg_replace('/^SELECT\s.+?\sFROM/i', 'SELECT COUNT(*) AS total_registros FROM', $_paginador["sql_limpio"]);

$_paginador["res"] = mysql_query($_paginador["query_cont"]);
$_paginador["row"] = mysql_fetch_array($_paginador["res"]);


$_paginador["cantidad_registros"] = $_paginador["row"]["total_registros"] * 1;

$_paginador["registros_x_pagina"] = $paginador_qxp * 1;
if($paginador_qxp == ""){
	$_paginador["registros_x_pagina"] = 20;
}

if($_REQUEST["pag_pagina_actual"] == ""){
	$_paginador["pagina_actual"] = 1;
}else{
	$_paginador["pagina_actual"] = $_REQUEST["pag_pagina_actual"]*1;
}

$_paginador["cantidad_total_paginas"] = intval($_paginador["cantidad_registros"] / $_paginador["registros_x_pagina"]);
if(($_paginador["cantidad_registros"] % $_paginador["registros_x_pagina"]) > 0){
	$_paginador["cantidad_total_paginas"]++;
}
$_paginador["inicio_paginador"] = ($_paginador["pagina_actual"] - 1) * $_paginador["registros_x_pagina"];

$sql_final .= $paginador_sql." LIMIT ".$_paginador["inicio_paginador"].", ".$_paginador["registros_x_pagina"];
		
$_paginador["inicio_paginador"] = $_paginador["pagina_actual"] - 10;
if($_paginador["inicio_paginador"] < 1){
	$_paginador["inicio_paginador"] = 1;
}
$_paginador["limite"] = $_paginador["inicio_paginador"] + 20;
if($_paginador["limite"] > $_paginador["cantidad_total_paginas"]){
	$_paginador["limite"] = $_paginador["cantidad_total_paginas"];
}

if($paginador_fun==""){
	echo "- Completar funcion que filtra el listado<br>";
}
$_paginador["funcion_ir_pag"] = $paginador_fun;



if ($_paginador["cantidad_registros"] > 0) {
	$paginador_dibujo = '
	<nav aria-label="Page navigation example">
			<ul class="pagination mb-0">';

	// Flecha izquierda (anterior)
	$pagina_anterior = max(1, $_paginador["pagina_actual"] - 1);
	$paginador_dibujo .= '
			<li class="page-item">
					<a class="page-link" href="#" onclick="javascript:pag_ir_pagina(' . $pagina_anterior . ');">
							<svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
									<path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path>
							</svg>
					</a>
			</li>';

	// Primeros puntos si aplica
	if ($_paginador["inicio_paginador"] > 1) {
			$paginador_dibujo .= '
			<li class="page-item"><a class="page-link" href="#" onclick="javascript:pag_ir_pagina(1);">1</a></li>
			<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
	}

	// Botones de página
	for ($i = $_paginador["inicio_paginador"]; $i <= $_paginador["limite"]; $i++) {
			$active = ($i == $_paginador["pagina_actual"]) ? ' active" aria-current="page' : '';
			$paginador_dibujo .= '
			<li class="page-item' . $active . '">
					<a class="page-link" href="#" onclick="javascript:pag_ir_pagina('.$i.');">'.$i.'</a>
			</li>';
	}

	// Últimos puntos si aplica
	if ($_paginador["limite"] < $_paginador["cantidad_total_paginas"]) {
			$paginador_dibujo .= '
			<li class="page-item disabled"><a class="page-link" href="#">...</a></li>
			<li class="page-item"><a class="page-link" href="#" onclick="javascript:pag_ir_pagina(' . $_paginador["cantidad_total_paginas"] . ');">' . $_paginador["cantidad_total_paginas"] . '</a></li>';
	}

	// Flecha derecha (siguiente)
	$pagina_siguiente = min($_paginador["cantidad_total_paginas"], $_paginador["pagina_actual"] + 1);
	$paginador_dibujo .= '
			<li class="page-item">
					<a class="page-link" href="#" onclick="javascript:pag_ir_pagina(' . $pagina_siguiente . ');">
							<svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
									<path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
							</svg>
					</a>
			</li>';

	$paginador_dibujo .= '
			</ul>
	</nav>
	<span>
	<input type="hidden" name="pag_pagina_actual" id="pag_pagina_actual" value="' . $_paginador["pagina_actual"] . '" class="campos">
	<span>Cantidad total: <b>' . _num($_paginador["cantidad_registros"]) . '</b> registros</span>
	<script>
		function pag_ir_pagina(p){
			document.getElementById("pag_pagina_actual").value = p;
			'.$_paginador["funcion_ir_pag"].';
		}
	</script>
	';
}

?>


