<?php
require("../../../config/conf.php"); 

$idate = _validar_param($_REQUEST["idate"]);
$sql = "SELECT * FROM _atenciones WHERE ate_id='$idate'";
$res = mysql_query($sql);
$r_ate = mysql_fetch_assoc($res);


$sql = "SELECT * FROM _atenciones_ctrlgine WHERE atdet_ate_id='$idate'";
$res = mysql_query($sql);
$r_det = mysql_fetch_assoc($res);
$iddet = $r_det["atdet_id"];
_p($r_det);

?>
<table class="table table-bordered table-sm fs--1 mb-0">
  <tr>
    <td><h3 class="m-2" data-anchor="data-anchor" id="overview">Editar atención #<? echo $r_ate["ate_id"]; ?></h3></td>
  </tr>
</table>
<div id="dv_formulario">
  <div class="container"><!-- contenedor -->

    <!--R1---------------------------------------->
    <div class="row mb-3">

      <div class="col-md p-2 border">
        <h5 class="border-bottom p-1 mb-2">Motivo de consulta</h5>
        <textarea id="motivo" name="motivo" class="form-control campos" rows="5"><?
          echo $r_det["atdet_motivo"];
        ?></textarea>
      </div>

    </div>
    <!--R1---------------------------------------->


    <!--R2---------------------------------------->
    <div class="row mb-0">

          <div class="col-md-12 p-2 border">
            <h5 class="border-bottom p-1 mb-2">Anamnesis</h5>
          </div>

          <!--G1---------------------------------------->
          <div class="col-md-3 p-2 border">
            

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="edad">Edad</label>
                  <input type="text" id="edad" name="edad" class="form-control campos w100" autocomplete="off"
                          value="<? echo $r_det["atdet_edad"]; ?>">
                </div>

                <div class="mb-2" style="float:left">
                  <label class="form-label" for="ciclo_menstrual">Menstruación</label>
                  <select id="ciclo_menstrual" name="ciclo_menstrual" class="form-select campos w120"  aria-label="Default select example">
                    <option ></option>
                    <option value="1" <? if($r_det["atdet_ciclo_menstrual"]=="1"){ echo "selected";}?>>Regular</option>
                    <option value="2" <? if($r_det["atdet_ciclo_menstrual"]=="1"){ echo "selected";}?>>Irregular</option>
                    <option value="3" <? if($r_det["atdet_ciclo_menstrual"]=="1"){ echo "selected";}?>>Ausente</option>
                  </select>
                </div>

                <div class="mb-2" >
                  <label class="form-label" for="fur">Fecha última regla (FUR)</label>
                  <input type="text" id="fur" name="fur" class="form-control campos w180"  placeholder="Mes/Año" autocomplete="off"
                      value="<? echo $r_det["atdet_fur"]; ?>">
                </div>

                <div class="mb-2">
                  <label class="form-label">MAC</label>
                  <div class="input-group mb-3">
                    <div class="input-group-text">
                      <input type="checkbox" id="mac_" name="mac_" class="form-check-input campos" aria-label="Checkbox for following text input"
                          value="1" <? if($r_det["atdet_mac_txt"]=="1"){ echo "checked";}?>>
                    </div>
                    <input type="text" id="mac" name="mac" class="form-control campos"  aria-label="Text input with checkbox"
                        value="<? echo $r_det["atdet_mac_txt"]; ?>" >
                  </div>
                </div>

            
          </div><!--G1---------------------------------------->
      



          <!--G43---------------------------------------->
          <div class="col-md p-2 border">

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="forobs_G">Gestaciones</label>
                  <input type="text" id="forobs_G" name="forobs_G" class="form-control campos w80" placeholder="G" autocomplete="off"
                      value="<? echo $r_det["atdet_fo_gestaciones"]; ?>">
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="forobs_P">Partos</label>
                  <input type="text" id="forobs_P" name="forobs_P" class="form-control campos w80" placeholder="P" autocomplete="off"
                      value="<? echo $r_det["atdet_fo_partos"]; ?>">
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="forobs_A">Abortos</label>
                  <input type="text" id="forobs_A" name="forobs_A" class="form-control campos w80" placeholder="A" autocomplete="off"
                      value="<? echo $r_det["atdet_fo_abortos"]; ?>">
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="forobs_C">Cesarias</label>
                  <input type="text" id="forobs_C" name="forobs_C" class="form-control campos w80" placeholder="C" autocomplete="off"
                      value="<? echo $r_det["atdet_fo_cesarias"]; ?>">
                </div>

                <div class="mb-2">
                  <label class="form-label" for="forobs_observaciones">Observaciones </label>
                  <textarea id="forobs_observaciones" name="forobs_observaciones" class="form-control campos" rows="3"><? 
                      echo $r_det["atdet_fo_observaciones"]; 
                  ?></textarea>
                </div>
          </div>
          <!--G43---------------------------------------->


          <!--G54---------------------------------------->
          <div class="col-md p-2 border">

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="menarquia">Menarquia</label>
                  <input type="text" id="menarquia" name="menarquia" class="form-control campos w80" placeholder="" autocomplete="off"
                      value="<? echo $r_det["atdet_menarquia"]; ?>" >
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="ias">IAS</label>
                  <input type="text" id="ias" name="ias" class="form-control campos w80" placeholder="" autocomplete="off"
                      value="<? echo $r_det["atdet_ias"]; ?>">
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="sex_activo">Sex. Activ@?</label>
                  <select id="sex_activo" name="sex_activo" class="form-select campos w90"  aria-label="Default select example">
                    <option value=""></option>
                    <option value="S" <? if($r_det["atdet_sexualmente_activa"]=="S"){ echo "selected";}?>>SI</option>
                    <option value="N" <? if($r_det["atdet_sexualmente_activa"]=="N"){ echo "selected";}?>>NO</option>
                  </select>
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="usa_psv">Usa PSV</label>
                  <select id="usa_psv" name="usa_psv" class="form-select campos w90"  aria-label="Default select example">
                    <option value=""></option>
                    <option value="S" <? if($r_det["atdet_uso_preservativo"]=="S"){ echo "selected";}?>>SI</option>
                    <option value="N" <? if($r_det["atdet_uso_preservativo"]=="N"){ echo "selected";}?>>NO</option>
                  </select>
                </div>
                
                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="npsex">N° Parejas Sex</label>
                  <input type="text" id="npsex" name="npsex" class="form-control campos w80" placeholder="" autocomplete="off"
                      value="<? echo $r_det["atdet_num_par_sex"]; ?>">
                </div>


                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="orgasmo">Orgasmo</label>
                  <select id="orgasmo" name="orgasmo" class="form-select campos w150"  aria-label="Default select example">
                    <option value=""></option>
                    <option value="0" <? if($r_det["atdet_orgasmo"]=="0"){ echo "selected";}?>>Nunca</option>
                    <option value="1" <? if($r_det["atdet_orgasmo"]=="1"){ echo "selected";}?>>Casi nunca</option>
                    <option value="2" <? if($r_det["atdet_orgasmo"]=="2"){ echo "selected";}?>>En ocasiones</option>
                    <option value="3" <? if($r_det["atdet_orgasmo"]=="3"){ echo "selected";}?>>Con frecuencia</option>
                    <option value="4" <? if($r_det["atdet_orgasmo"]=="4"){ echo "selected";}?>>Casi siempre</option>
                    <option value="5" <? if($r_det["atdet_orgasmo"]=="5"){ echo "selected";}?>>Siempre</option>
                  </select>
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="lubricacion">Lubricacion</label>
                  <select id="lubricacion" name="lubricacion" class="form-select campos w150"  aria-label="Default select example">
                    <option value=""></option>
                    <option value="0" <? if($r_det["atdet_orgasmo"]=="0"){ echo "selected";}?>>Nunca</option>
                    <option value="1" <? if($r_det["atdet_orgasmo"]=="1"){ echo "selected";}?>>Casi nunca</option>
                    <option value="2" <? if($r_det["atdet_orgasmo"]=="2"){ echo "selected";}?>>En ocasiones</option>
                    <option value="3" <? if($r_det["atdet_orgasmo"]=="3"){ echo "selected";}?>>Con frecuencia</option>
                    <option value="4" <? if($r_det["atdet_orgasmo"]=="4"){ echo "selected";}?>>Casi siempre</option>
                    <option value="5" <? if($r_det["atdet_orgasmo"]=="5"){ echo "selected";}?>>Siempre</option>
                  </select>
                </div>


                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="ex_vdrl">Examen VDRL</label>
                  <input type="text" id="ex_vdrl" name="ex_vdrl" class="form-control campos w120" placeholder="" autocomplete="off"
                      value="<? echo $r_det["atdet_vdrl"]; ?>">
                </div>

                <div class="mb-2" style="float:left;margin-right:8px">
                  <label class="form-label" for="ex_pap">Examen PAP</label>
                  <input type="text" id="ex_pap" name="ex_pap" class="form-control campos w120" placeholder="" autocomplete="off"
                      value="<? echo $r_det["atdet_pap"]; ?>">
                </div>

          </div>
          <!--G54---------------------------------------->

      
    </div>
    <!--R2---------------------------------------->


    <!--R3---------------------------------------->
    <div class="row bg-100 mb-3">
          <!--G6---------------------------------------->
          <div class="col-md p-2 border">

                <div class="mb-2">
                  <label class="form-label" for="ant_qx">Antecedentes Quirúrgicos</label>
                  <textarea class="form-control campos" id="ant_qx" name="ant_qx" rows="3"><? 
                      echo $r_det["atdet_ant_qx"]; 
                      ?></textarea>
                </div>

                <div class="mb-2">
                  <label class="form-label" for="amp">Antecedentes médicos</label>
                  <textarea class="form-control campos" id="amp" name="amp" rows="3"><? 
                      echo $r_det["atdet_amp"]; 
                      ?></textarea>
                </div>

          </div>
          <!--G6---------------------------------------->

          <!--G8---------------------------------------->
          <div class="col-md p-2 border">
              

              <div class="mb-2">
                <label class="form-label">Cáncer de Mamas</label>
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <input type="checkbox" id="ant_cama_" name="ant_cama_" class="form-check-input campos" aria-label="Checkbox for following text input"
                        value="1"  <? if($r_det["atdet_ant_cama"]=="1"){ echo "checked";}?>>
                  </div>
                  <input type="text" id="ant_cama" name="ant_cama" class="form-control campos"  aria-label="Text input with checkbox"
                      value="<? echo $r_det["atdet_ant_cama_txt"]; ?>">
                </div>
              </div>

              <div class="mb-2">
                <label class="form-label">Cáncer Cérvico Uterino</label>
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <input type="checkbox" id="ant_cacu_" name="ant_cacu_" class="form-check-input campos" aria-label="Checkbox for following text input"
                        value="1"  <? if($r_det["atdet_ant_cacu"]=="1"){ echo "checked";}?>>>
                  </div>
                  <input type="text" id="ant_cacu" name="ant_cacu" class="form-control campos"  aria-label="Text input with checkbox"
                      value="<? echo $r_det["atdet_ant_cacu_txt"]; ?>">
                </div>
              </div>

              <div class="mb-0">
                <label class="form-label" for="amf">Antecedentes médicos familiares</label>
                <textarea class="form-control campos" id="amf" name="amf" rows="3"><? 
                      echo $r_det["atdet_amf"]; 
                      ?></textarea>
              </div>

          </div>
          <!--G8---------------------------------------->

    </div>
    <!--R3---------------------------------------->




    <!--R4---------------------------------------->
    <div class="row mb-3"><!-- Examen Físico de mamas -->

      <div class="col-md p-2 border">
        <h5 class="border-bottom p-1 mb-2">Examen Físico de mamas</h5>
        <textarea id="examen_mamas" name="examen_mamas" class="form-control campos" rows="3"><? 
          echo $r_det["atdet_examen_mamas"]; 
        ?></textarea>
      </div>

    </div><!-- Examen Físico de mamas -->
    <!--R4---------------------------------------->




    <!--R5---------------------------------------->
    <div class="row mb-3"><!-- Examen Ginecologico -->

      <div class="col-md p-2 border">
        <h5 class="border-bottom p-1 mb-2">Examen Ginecológico</h5>
        <textarea id="examen_gine" name="examen_gine" class="form-control campos" rows="4"><? 
          echo $r_det["atdet_examen_gine"]; 
        ?></textarea>
      </div>

    </div><!-- Examen Ginecologico -->
    <!--R5---------------------------------------->




    <!--R6---------------------------------------->
    <div class="row mb-3"><!-- Indicaciones -->
      <div class="col-md p-2 border">
        <h5 class="border-bottom p-1 mb-2">Indicaciones</h5>
        <textarea id="indicaciones" name="indicaciones" class="form-control campos" rows="4"><? 
          echo $r_det["atdet_indicaciones"]; 
        ?></textarea>
      </div>
    </div><!-- Indicaciones -->
    <!--R6---------------------------------------->



  </div><!-- contenedor -->

  <hr>

  <div style="float:right">
    <?php  
    
    _boton("cancel", "Cancelar", "cancelar_atencion()");
    _boton("save", "Guardar", "guardar_atencion('$idate','$iddet')"); 
    ?>
  </div>

</div>
<div id="dv_resultados" style="display:none">
</div>
<?php


?>
<script>
  function cancelar_atencion(){
    var msj = "\nSe perderan los datos no cuardados";
    if (confirm("¿desea cancelar la creación de la nueva atención?" + msj)) {

      cookieFormlimpiarDatosGuardados();
      ver_atenciones();
      
    }
  }
  function guardar_atencion(idate, iddet){
    var dv = document.getElementById("dv_resultados");
    var a = $(".campos").serialize(); 
    $("#dv_formulario").hide();
    $("#dv_resultados").show();
    AJAXPOST(url_base+"zmods/gfm/atencion_gine/ate_grabar_editar.php",a+"&idate="+idate+"&iddet="+iddet,dv,"L;loading");
  }
  function volver_atencion(){
    $("#dv_resultados").hide();
    $("#dv_formulario").show();
  }
</script>
<?php
jsfunc_para_cookies_formulario("atencion");