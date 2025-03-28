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
                    WHERE 1 $extra
                    ORDER BY pac_id desc ";
$paginador_fun = "filtrar_lista()";
require("../../../efaz/wnav/_paginador.php");
$res = mysql_query($sql_final);
while($row = mysql_fetch_assoc($res)){
  $ar_pacientes[] = $row;
}
//////////////////////////////////////////////////////////////////////////////////////


if(count($ar_pacientes) == 0){
  wnav_mensaje_info("La búsqueda no obtuvo resultados");
}else{
  ?>
  <table class="table table-bordered table-striped table-sm fs--1 mb-0">
  <thead>
    <tr class="bg-light">
      <th scope="col" width="83">#</th>
      <th scope="col">Rut</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col" width="100">FechaNacmto</th>
      <th scope="col" width="1">Edad</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Email</th>
      <th scope="col">Dirección</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($ar_pacientes as $key => $r_pac) {
      ?>
      <tr>
        <th scope="row"><?php  
          _boton("pencil", ";Editar paciente", "editar_paciente('".$r_pac["pac_id"]."')"); 
          _boton("file-medical", ";Ver ficha clínica", "ver_ficha('".$r_pac["pac_id"]."')");
          ?></th>
        <td scope="row"><? echo $r_pac["pac_rut"];?></td>
        <td scope="row"><? echo $r_pac["pac_nombre"];?></td>
        <td scope="row"><? echo $r_pac["pac_apellido"];?></td>
        <td scope="row"><? echo _fec($r_pac["pac_fecha_nacimiento"]);?></td>
        <td scope="row"><? echo calcular_edad($r_pac["pac_fecha_nacimiento"]);?></td>
        <td scope="row"><? echo $r_pac["pac_telefono"];?></td>
        <td scope="row"><? echo $r_pac["pac_email"];?></td>
        <td scope="row"><? echo $r_pac["pac_direccion"];?></td>
      </tr>
      <tr style="display:none">
        <td colspan="20"><? _p($r_pac);?></td>
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
  function editar_paciente(idpac){
    var a = $(".campos").serialize(); 
    AJAXPOST(url_base+"zmods/gfm/paciente/paciente_mdl_editar.php",a+"&idpac="+idpac,dvmdl,null,function(){
      ver_modGeneral(); 
    });
  }
  function ver_ficha(idpac){
    jscarga("zmods/gfm/fichas/ficha_ver.php","idpac="+idpac);
  }
</script>