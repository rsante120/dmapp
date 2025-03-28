<?php
require("../../../config/conf.php"); 

//////////////////////////////////////////////////////////////////////////////////////
//Armar where para busqueda en listado////////////////////////////////////////////////
_validar_filtros();
$extra ="";
if($_REQUEST["fil_rut"]<>""){
  $extra .= " and pac_rut like '%".$_REQUEST["fil_rut"]."%' ";
}
if($_REQUEST["fil_nombre"]<>""){
  $arr = explode(" ", trim($_REQUEST["fil_nombre"]));
  foreach ($arr as $strfil) {
    $extra.= " and (pac_nombre like '%$strfil%' or pac_apellido like '%$strfil%')";
  }
}
//////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////
//PROCESAR QUERY POR PAGINADOR////////////////////////////////////////////////////////
$paginador_sql = "SELECT * FROM _pacientes 
                    LEFT JOIN _fichas on pac_id=fic_pac_id 
                    WHERE 1 $extra ";
$paginador_fun = "filtrar_lista()";

require("../../../efaz/wnav/_paginador.php");
$res = mysql_query($sql_final);
while($row = mysql_fetch_assoc($res)){
  $ar_fichas[] = $row;
}
//////////////////////////////////////////////////////////////////////////////////////


if(count($ar_fichas) == 0){
  ?>
  <div class="alert alert-outline-info d-flex align-items-center" role="alert">
    <span class="fas fa-info-circle text-warning fs-3 me-3"></span>
    <p class="mb-0 flex-1">La búsqueda no obtuvo resultados</p>
  </div>
  <?php
}else{
  ?>
  <table class="table table-bordered table-striped table-sm fs--1 mb-0">
  <thead>
    <tr class="bg-light">
      <th scope="col" width="1">#</th>
      <th scope="col" width="100">Rut</th>
      <th scope="col">Paciente</th>
      <th scope="col" width="100">FechaCreación</th>
      <th scope="col" width="100">Ult.Atención</th>
      <th scope="col" width="1">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($ar_fichas as $key => $r_fic) {
      ?>
      <tr>
        <th scope="row"><?php
          _boton("file-medical", ";Ver ficha clínica", "ver_ficha('".$r_fic["pac_id"]."')");
          ?></th>
        <td scope="row"><? echo $r_fic["pac_rut"];?></td>
        <td scope="row"><? echo $r_fic["pac_nombre"]. " " .$r_fic["pac_apellido"]. " " .$r_fic["pac_apellido2"];?></td>
        <td scope="row"><? echo _fec($r_fic["fic_fecha_creacion"]);?></td>
        <td scope="row"><? echo _fec($r_fic["fic_ultima_atencion"]);?></td>
        <td scope="row" class="txt_center"><? echo $r_fic["fic_estado"];?></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
<?php
echo $paginador_dibujo;
}
?>
<script>
  function editar_ficiente(idpac){
    var a = $(".campos").serialize(); 
    AJAXPOST(url_base+"zmods/gfm/paciente/paciente_mdl_editar.php",a+"&idpac="+idpac,dvmdl,null,function(){
      ver_modGeneral(); 
    });
  }
  function ver_ficha(idpac){
    jscarga("zmods/gfm/fichas/ficha_ver.php","idpac="+idpac);
  }
</script>