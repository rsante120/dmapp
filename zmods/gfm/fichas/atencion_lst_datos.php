<?php
require("../../../config/conf.php"); 

$idpac = _validar_param($_REQUEST["idpac"]);

$sql = "SELECT * FROM _atenciones  WHERE ate_pac_id='$idpac' order by ate_fecha desc, ate_id desc ";
$res = mysql_query($sql);
while($row = mysql_fetch_assoc($res)){
  $ar_atenciones[] = $row;
}


if(count($ar_atenciones) == 0){
  wnav_mensaje_info("Paciente No tiene atenciones previas");
  _boton("plus", "Nueva Atención", "nueva_atencion()");
}else{
  ?>
  <table class="table table-bordered table-striped table-sm fs--1 mb-0">
    <tr>
      <td><h3 class="m-2" data-anchor="data-anchor" id="overview">Atenciones</h3></td>
      <td width="150" class="pt-2" >
        <?php
        _boton("plus", "Nueva Atención", "nueva_atencion()");
        ?>
      </td>
    </tr>
  </table>
  <?php
    foreach ($ar_atenciones as $key => $r_ate) {
      ?>
      <table class="table table-bordered  table-sm fs--1 mb-0">
      <tbody>
        <tr class="bg-light">
          <th width="60">Folio</th>
          <th width="80">Fecha</th>
          <th width="150">Atención</th>
          <th></th>
        </tr>
      <tr>
        <td class="text-center"><? echo $r_ate["ate_id"];?></td>
        <td><? echo _fec($r_ate["ate_fecha"]);?></td>
        <td><? echo $r_ate["ate_glosa"];?></td>
        <td><? echo str_replace("\n", "<br>", $r_ate["ate_motivo_consulta"]); ?>
            <a  data-bs-toggle="collapse" href="#collapseExample<? echo $r_ate["ate_id"];?>" role="button" aria-expanded="false" aria-controls="collapseExample">
              <br>Ver más</a>
        </td>
      </tr>
      <tr>
        <td colspan="20" class="p-0">
          <div class="collapse" id="collapseExample<? echo $r_ate["ate_id"];?>">
            <div class="border p-3 rounded m-1">
              <p>
                <?php echo str_replace("\n", "<br>", $r_ate["ate_detalle"]); ?>
              </p>
            </div>
          </div>
        </td>
      </tr>
      </tbody>
      </table>
      <?php
    }
}
?>
<script>
  function nueva_atencion(){
    var dv = document.getElementById("dv_atenciones");
    var a = $(".campos").serialize(); 
    AJAXPOST(url_base+"zmods/gfm/fichas/atencion_nuevo.php",a,dv);
  }
</script>