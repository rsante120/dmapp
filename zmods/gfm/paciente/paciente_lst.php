<?php
require("../../../config/conf.php");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
wnav_titulo_pagina("Pacientes", "Listado de pacientes");
//////////////////////////////////////////////////////////////////////////////////////////////////////////


?>
<table class="table table-bordered table-sm fs--1 mb-0 table-info" style="background-color:#f2f8ff;"> 
    <tr> 
        <td width="130"><b>Rut </b><br>
            <input type="text" name="fil_rut" class="campos" value="<? echo $_REQUEST["fil_rut"]; ?>" style="width:120px">
            </td> 
        <td width="250"><b>Nombre</b><br>
            <input type="text" name="fil_nombre" class="campos" value="<? echo $_REQUEST["fil_nombre"]; ?>" style="width:250px">
            </td> 
        <td style="vertical-align:bottom">
            <?php  _boton("search","Filtrar" , "filtrar_lista()"); ?>
        </td>
        <td width="116" style="vertical-align:bottom;text-align:right">
            <?php   _boton("plus","Nuevo","nuevo_paciente()","success");  ?>
        </td>
    </tr>
</table>

<div id="dv_resultados"></div>

<script>
  $(document).ready(function() { 
    filtrar_lista();
  });
  function filtrar_lista(){
    var dv = document.getElementById("dv_resultados");
    var a = $(".campos").serialize(); 
    AJAXPOST(url_base+"zmods/gfm/paciente/paciente_lst_datos.php",a,dv);
  }
  function nuevo_paciente(){
    var a = $(".campos").serialize(); 
    AJAXPOST(url_base+"zmods/gfm/paciente/paciente_mdl_nuevo.php",a,dvmdl,null,function(){
      ver_modGeneral(); 
    });
  }
</script>
