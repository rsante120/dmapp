<?php
require("../../../config/conf.php"); 

$idate = 0;
$iddet = 0;
try {
  $idate = _validar_param($_REQUEST["idate"]);
  $iddet = _validar_param($_REQUEST["iddet"]);

  $idpac = _validar_param($_REQUEST["idpac"]);
  $motivo = _validar_param($_REQUEST["motivo"]);
  $edad = _validar_param($_REQUEST["edad"]);
  $ciclo_menstrual = _validar_param($_REQUEST["ciclo_menstrual"]);
  $fur = _validar_param($_REQUEST["fur"]);
  $mac_ = _validar_param($_REQUEST["mac_"]);
  $mac = _validar_param($_REQUEST["mac"]);
  $forobs_G = _validar_param($_REQUEST["forobs_G"]);
  $forobs_P = _validar_param($_REQUEST["forobs_P"]);
  $forobs_A = _validar_param($_REQUEST["forobs_A"]);
  $forobs_C = _validar_param($_REQUEST["forobs_C"]);
  $forobs_observaciones = _validar_param($_REQUEST["forobs_observaciones"]);
  $menarquia = _validar_param($_REQUEST["menarquia"]);
  $ias = _validar_param($_REQUEST["ias"]);
  $sex_activo = _validar_param($_REQUEST["sex_activo"]);
  $usa_psv = _validar_param($_REQUEST["usa_psv"]);
  $npsex = _validar_param($_REQUEST["npsex"]);
  $orgasmo = _validar_param($_REQUEST["orgasmo"]);
  $lubricacion = _validar_param($_REQUEST["lubricacion"]);
  $ex_vdrl = _validar_param($_REQUEST["ex_vdrl"]);
  $ex_pap = _validar_param($_REQUEST["ex_pap"]);
  $ant_qx = _validar_param($_REQUEST["ant_qx"]);
  $amp = _validar_param($_REQUEST["amp"]);
  $ant_cama = _validar_param($_REQUEST["ant_cama"]);
  $ant_cama_ = _validar_param($_REQUEST["ant_cama_"]);
  $ant_cacu = _validar_param($_REQUEST["ant_cacu"]);
  $ant_cacu_ = _validar_param($_REQUEST["ant_cacu_"]);
  $amf = _validar_param($_REQUEST["amf"]);
  $examen_mamas = _validar_param($_REQUEST["examen_mamas"]);
  $examen_gine = _validar_param($_REQUEST["examen_gine"]);
  $indicaciones = _validar_param($_REQUEST["indicaciones"]);

  $fecha = date("Y-m-d");
  $resumen = $examen_mamas."\n".$examen_gine;


  $sql = "UPDATE _atenciones SET 
            ate_tipo='ctrlgine',
            ate_fecha = '$fecha',
            ate_pac_id = '$idpac',
            ate_glosa = 'Control Ginecológico',
            ate_motivo = '$motivo',
            ate_resumen = '$resumen',
            ate_indicaciones = '$indicaciones'
            WHERE ate_id='$idate' ";
  $res = mysql_query($sql);

  
  $sql = "UPDATE  _atenciones_ctrlgine SET
            atdet_ate_id = '$idate',
            atdet_motivo = '$motivo',
            atdet_edad = '$edad',
            atdet_ciclo_menstrual = '$ciclo_menstrual',
            atdet_mac = '$mac_',
            atdet_mac_txt = '$mac',
            atdet_fur = '$fur',
            atdet_amp = '$amp',
            atdet_amf = '$amf',
            atdet_ant_qx = '$ant_qx',
            atdet_fo_gestaciones = '$forobs_G',
            atdet_fo_partos = '$forobs_P',
            atdet_fo_abortos = '$forobs_A',
            atdet_fo_cesarias = '$forobs_C',
            atdet_fo_observaciones = '$forobs_observaciones',
            atdet_ant_cama = '$ant_cama_',
            atdet_ant_cama_txt = '$ant_cama',
            atdet_ant_cacu = '$ant_cacu_',
            atdet_ant_cacu_txt = '$ant_cacu',
            atdet_menarquia = '$menarquia',
            atdet_ias = '$ias',
            atdet_sexualmente_activa = '$sex_activo',
            atdet_uso_preservativo = '$usa_psv',
            atdet_num_par_sex = '$npsex',
            atdet_orgasmo = '$orgasmo',
            atdet_lubricacion = '$lubricacion',
            atdet_vdrl = '$ex_vdrl',
            atdet_pap = '$ex_pap',
            atdet_exf_pa = '',
            atdet_exf_estatura = '',
            atdet_exf_peso = '',
            atdet_examen_mamas = '$examen_mamas',
            atdet_examen_gine = '$examen_gine',
            atdet_indicaciones = '$indicaciones' 
        WHERE atdet_id='$iddet' ";
  $res = mysql_query($sql);

  wnav_mensaje_ok("Atención guardada correctamente");


  ?>
  <hr>
  <div style="float:right">
    <?php  
    _boton("check", "Ir a atenciones", "ver_atenciones()"); 
    ?>
  </div>
  <script>
    cookieFormlimpiarDatosGuardados();
  </script>
  <?

} catch (Exception $ex) {
  if($ex->getCode() == 2 && $idate > 0){
    sleep(10);
    $sql = "DELETE FROM _atenciones where ate_id='$idate'";
    $res = mysql_query($sql);
  }
  wnav_mensaje_error("Error al crear atencion <br>".$ex->getMessage());
  ?>
  <hr>
  <div style="float:left">
    <?php  
    _boton("arrow-left", "volver", "volver_atencion()");
    ?>
  </div>
  <?
}