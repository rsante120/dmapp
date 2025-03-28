<?php
require("../../../config/conf.php"); 

$idpac = _validar_param($_REQUEST["idpac"]);
$sql = "SELECT * FROM _pacientes WHERE pac_id='$idpac'";
$res = mysql_query($sql);
$r_pac = mysql_fetch_assoc($res);

?>


<table class="table table-bordered table-sm fs--1 mb-0">
  <tr>
    <td><h3 class="m-2" data-anchor="data-anchor" id="overview">Nueva atención</h3></td>
    <td width="150" class="pt-2" >
        <?php  _boton("reload", "recargar", "nueva_atencion()"); ?>
        <script>
          function nueva_atencion(){
            var dv = document.getElementById("dv_atenciones");
            var a = $(".campos").serialize(); 
            AJAXPOST(url_base+"zmods/gfm/fichas/atencion_nuevo.php",a,dv,"L;");
          }
        </script>
      </td>
  </tr>
</table>

<div class="container"><!-- contenedor -->

  <!--R1---------------------------------------->
  <div class="row mb-3">

    <div class="col-md p-2 border">
      <h5 class="border-bottom p-1 mb-2">Motivo de consulta</h5>
      <textarea id="motivo" name="motivo" class="form-control campos" rows="5"> </textarea>
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
                        value="<? echo calcular_edad($r_pac["pac_fecha_nacimiento"]); ?>">
              </div>

              <div class="mb-2" style="float:left">
                <label class="form-label" for="ciclo_menstrual">Menstruación</label>
                <select id="ciclo_menstrual" name="ciclo_menstrual" class="form-select campos w120"  aria-label="Default select example">
                  <option selected=""></option>
                  <option value="1">Regular</option>
                  <option value="2">Irregular</option>
                  <option value="3">Ausente</option>
                </select>
              </div>

              <div class="mb-2" >
                <label class="form-label" for="fur">Fecha última regla (FUR)</label>
                <input type="text" id="fur" name="fur" class="form-control campos w180"  placeholder="Mes/Año" autocomplete="off" value="">
              </div>

              <div class="mb-2">
                <label class="form-label">MAC</label>
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <input type="checkbox" id="mac_" name="mac_" value="" class="form-check-input campos" aria-label="Checkbox for following text input" />
                  </div>
                  <input type="text" id="mac" name="mac" value="" class="form-control campos"  aria-label="Text input with checkbox" />
                </div>
              </div>

          
        </div><!--G1---------------------------------------->
    



        <!--G43---------------------------------------->
        <div class="col-md p-2 border">

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="forobs_G">Gestaciones</label>
                <input type="text" id="forobs_G" name="forobs_G" value="" class="form-control campos w80" placeholder="G" autocomplete="off" >
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="forobs_P">Partos</label>
                <input type="text" id="forobs_P" name="forobs_P" value="" class="form-control campos w80" placeholder="P" autocomplete="off" >
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="forobs_A">Abortos</label>
                <input type="text" id="forobs_A" name="forobs_A" value="" class="form-control campos w80" placeholder="A" autocomplete="off" >
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="forobs_C">Cesarias</label>
                <input type="text" id="forobs_C" name="forobs_C" value="" class="form-control campos w80" placeholder="C" autocomplete="off" >
              </div>

              <div class="mb-2">
                <label class="form-label" for="forobs_observaciones">Observaciones </label>
                <textarea id="forobs_observaciones" name="forobs_observaciones" class="form-control campos" rows="3"></textarea>
              </div>
        </div>
        <!--G43---------------------------------------->


        <!--G54---------------------------------------->
        <div class="col-md p-2 border">

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="menarquia">Menarquia</label>
                <input type="text" id="menarquia" name="menarquia" value="" class="form-control campos w80" placeholder="" autocomplete="off" >
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="ias">IAS</label>
                <input type="text" id="ias" name="ias" value="" class="form-control campos w80" placeholder="" autocomplete="off" >
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="sex_activo">Sex. Activ@?</label>
                <select id="sex_activo" name="sex_activo" class="form-select campos w90"  aria-label="Default select example">
                  <option selected=""></option>
                  <option value="S">SI</option>
                  <option value="N">NO</option>
                </select>
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="usa_psv">Usa PSV</label>
                <select id="usa_psv" name="usa_psv" class="form-select campos w90"  aria-label="Default select example">
                  <option selected=""></option>
                  <option value="S">SI</option>
                  <option value="N">NO</option>
                </select>
              </div>
              
              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="npsex">N° Parejas Sex</label>
                <input type="text" id="npsex" name="npsex" value="" class="form-control campos w80" placeholder="" autocomplete="off" >
              </div>


              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="orgasmo">Orgasmo</label>
                <select id="orgasmo" name="orgasmo" class="form-select campos w150"  aria-label="Default select example">
                  <option selected=""></option>
                  <option value="0">Nunca</option>
                  <option value="1">Casi nunca</option>
                  <option value="2">En ocasiones</option>
                  <option value="3">Con frecuencia</option>
                  <option value="4">Casi siempre</option>
                  <option value="5">Siempre</option>
                </select>
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="lubricacion">Lubricacion</label>
                <select id="lubricacion" name="lubricacion" class="form-select campos w150"  aria-label="Default select example">
                  <option selected=""></option>
                  <option value="0">Nunca</option>
                  <option value="1">Casi nunca</option>
                  <option value="2">En ocasiones</option>
                  <option value="3">Con frecuencia</option>
                  <option value="4">Casi siempre</option>
                  <option value="5">Siempre</option>
                </select>
              </div>


              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="ex_vdrl">Examen VDRL</label>
                <input type="text" id="ex_vdrl" name="ex_vdrl" value="" class="form-control campos w120" placeholder="" autocomplete="off" >
              </div>

              <div class="mb-2" style="float:left;margin-right:8px">
                <label class="form-label" for="ex_pap">Examen PAP</label>
                <input type="text" id="ex_pap" name="ex_pap" value="" class="form-control campos w120" placeholder="" autocomplete="off" >
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
                <textarea class="form-control campos" id="ant_qx" name="ant_qx" rows="3"></textarea>
              </div>

              <div class="mb-2">
                <label class="form-label" for="amp">Antecedentes médicos</label>
                <textarea class="form-control campos" id="amp" name="amp" rows="3"></textarea>
              </div>

        </div>
        <!--G6---------------------------------------->

        <!--G8---------------------------------------->
        <div class="col-md p-2 border">
            

            <div class="mb-2">
              <label class="form-label">Cáncer de Mamas</label>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input type="checkbox" id="ant_cama_" name="ant_cama_" value="" class="form-check-input campos" aria-label="Checkbox for following text input" />
                </div>
                <input type="text" id="ant_cama" name="ant_cama" value="" class="form-control campos"  aria-label="Text input with checkbox" />
              </div>
            </div>

            <div class="mb-2">
              <label class="form-label">Cáncer Cérvico Uterino</label>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input type="checkbox" id="ant_cacu_" name="ant_cacu_" value="" class="form-check-input campos" aria-label="Checkbox for following text input" />
                </div>
                <input type="text" id="ant_cacu" name="ant_cacu" value="" class="form-control campos"  aria-label="Text input with checkbox" />
              </div>
            </div>

            <div class="mb-0">
              <label class="form-label" for="amf">Antecedentes médicos familiares</label>
              <textarea class="form-control campos" id="amf" name="amf" rows="3"> </textarea>
            </div>

        </div>
        <!--G8---------------------------------------->

  </div>
  <!--R3---------------------------------------->




  <!--R4---------------------------------------->
  <div class="row mb-3"><!-- Diagnostico -->

    <div class="col-md p-2 border">
      <h5 class="border-bottom p-1 mb-2">Diagnostico</h5>
      <textarea id="diagnostico" name="diagnostico" class="form-control campos" rows="5"></textarea>
    </div>

  </div><!-- Diagnostico -->
  <!--R4---------------------------------------->




  <!--R5---------------------------------------->
  <div class="row mb-3"><!-- Indicaciones -->
    <div class="col-md p-2 border">
      <h5 class="border-bottom p-1 mb-2">Indicaciones</h5>
      <textarea id="indicaciones" name="indicaciones" class="form-control campos" rows="5"></textarea>
    </div>
  </div><!-- Indicaciones -->
  <!--R5---------------------------------------->



</div><!-- contenedor -->


<hr>
<div style="float:right">
<?php  
_boton("cancel", "Cancelar", "cancelar_nueva_atencion()");
_boton("save", "Guardar", "nueva_atencion()"); ?>
</div>


<script>
  function cancelar_nueva_atencion(){
    
  }
  function guardarDatosEnCookie() {
    const campos = document.querySelectorAll('.campos');
    const datos = {};

    campos.forEach(campo => {
      const tag = campo.tagName.toLowerCase();

      if (campo.type === "checkbox") {
        datos[campo.id] = campo.checked;
      } else if (tag === "textarea" || tag === "input" || tag === "select") {
        datos[campo.id] = campo.value.trim(); // puedes quitar el trim() si no lo deseas
      }
    });

    const datosJSON = JSON.stringify(datos);
    document.cookie = "datosFormulario=" + encodeURIComponent(datosJSON) + "; path=/; max-age=" + (60 * 60 * 24); // 1 día

    //console.clear();
    //console.log("Datos guardados en cookie:");
    //console.log(datos);
  }

  function cargarDatosDesdeCookie() {
    const cookies = document.cookie.split(';');
    let datos = {};

    cookies.forEach(cookie => {
      const [nombre, valor] = cookie.trim().split('=');
      if (nombre === 'datosFormulario') {
        try {
          datos = JSON.parse(decodeURIComponent(valor));
        } catch (e) {
          //console.warn("Error al parsear la cookie datosFormulario:", e);
        }
      }
    });

    Object.keys(datos).forEach(id => {
      const el = document.getElementById(id);
      if (el) {
        if (el.type === "checkbox") {
          el.checked = datos[id];
        } else {
          el.value = datos[id];
        }
      }
    });

    if (Object.keys(datos).length > 0) {
      //console.log("📥 Datos cargados desde cookie:");
      //console.log(datos);
    }
  }

  function inicializarAutoGuardadoCampos() {
    const campos = document.querySelectorAll('.campos');
    if (!campos.length) return;

    cargarDatosDesdeCookie();

    campos.forEach(campo => {
      campo.removeEventListener('change', guardarDatosEnCookie);
      campo.removeEventListener('input', guardarDatosEnCookie);

      campo.addEventListener('change', guardarDatosEnCookie);
      campo.addEventListener('input', guardarDatosEnCookie);
    });

    //console.log("Auto-guardado de campos inicializado.");
  }
  function limpiarDatosGuardados() {
    document.cookie = "datosFormulario=; path=/; max-age=0";
    //console.log("Cookie 'datosFormulario' eliminada.");
  }

  inicializarAutoGuardadoCampos();
</script>

  
