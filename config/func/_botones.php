<?php
function _boton($icono, $titulo, $jsfunc, $ar_style = array()){
    global $_SESSION;
    //Formas de llamar a la funcion

    //_boton("fa_icono","leyenda","js_funcion(1)"); -> Boton con icono y leyenda
    //_boton("fa_icono","leyenda;msjPopUp","js_funcion(1)"); -> Boton con icono y leyenda y msjPopUp
    //_boton("fa_icono","leyenda;msjPopUp","js_funcion(1)"); -> Boton con icono y leyenda y msjPopUp

    $titulo_info = explode(";",$titulo);

    $title = $titulo_info[0]."";
    $popup = $titulo_info[1]."";

    if($title <> ""){
        $stilo = 'style="margin-right: 10px !important;"';
    }
   
    $id_boton_unico = uniqid();
    ?>

    <a  id="<? echo $id_boton_unico; ?>" 
        href="javascript:<?php echo $jsfunc; ?>;" 
        onclick="js_bloquear_boton('<? echo $id_boton_unico; ?>');" 
        class="btn btn-phoenix-secondary me-1 mb-1 icon btn_sistema <?=$color;?> <?=$css_popup;?>"<?php
        if($popup <> ""){
            ?> data-bs-toggle="tooltip" data-bs-placement="bottom" title="<? echo $popup; ?>" <?php
        } ?>><? 
        if($icono<>""){ 
            ?><span class="fas fa-<?=$icono?>"></span><?php
        } 
        if($title <> ""){
            ?><span style="margin:5px"><?php  echo $titulo_info[0]; ?></span><?php
        }
        ?>
    </a>

    <a href="#" id="cargando_<? echo $id_boton_unico; ?>" style="display:none;font-style: italic;" 
        class="btn btn-phoenix-secondary me-1 mb-1 icon btn_sistema<?=$color;?> <?=$css_popup;?>"><?php 
        if($icono <> ""){ 
            ?><span class="fas fa-<?=$icono?>"></span><?php
        } 
        if($title <> ""){
            ?><span style="margin:5px"><?php  echo $titulo_info[0]; ?></span><?php
        }
        ?>
        </a>
  <?
} 







?>