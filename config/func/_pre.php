<?php
function _p($arr){
	?><pre><?php print_r($arr); ?></pre><?php
}	
function _pdev($strsql){
	global $_modo_depuracion;
	for ($i=0; $i < 5; $i++) { 
		$strsql = str_replace("\t\t","\t",$strsql);
	}
	if($_modo_depuracion){
		?><div class="dvdep"><pre><?php print_r($strsql); ?></pre></div><?php
	}
}
?>