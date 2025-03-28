<?php
require("../../../config/conf.php");

$idpac = _validar_param($_REQUEST["idpac"]);
$sql = "SELECT * FROM _pacientes 
          LEFT JOIN _fichas on pac_id=fic_pac_id 
          WHERE pac_id='$idpac'";
$res = mysql_query($sql);
$r_fic = mysql_fetch_assoc($res);


if($r_fic["fic_folio"] == 0){
  $fecha = date("Y-m-d");
  $sql = "INSERT INTO _fichas SET
    fic_estado='V',
    fic_pac_id='$idpac',
    fic_fecha_creacion='$fecha' ";
  $res = mysql_query($sql);
  $folio = mysql_insert_id();
  if($folio===false){
    wnav_mensaje_error("Error al crear Ficha del paciente. Contacte al administrador");
    exit;
  }
  $r_fic["fic_folio"] = $folio."";
  $r_fic["fic_pac_id"] = $idpac."";
  $r_fic["fic_estado"] = "V";
  $r_fic["fic_fecha_creacion"] = $fecha."";
}
?>
<input type="hidden" id="idpac" name="idpac" class="campos" value="<? echo $idpac; ?>">
<div class="row">


  <div class="col-sm-3 border">
    
  
  
  <div class="card mb-5 mt-2">
    
    <div class="card-header hover-actions-trigger position-relative mb-6" style="min-height: 130px; ">
              <div class="bg-holder rounded-top" style="background-image: linear-gradient(0deg, #000000 -3%, rgba(0, 0, 0, 0) 83%), url(../../assets/img/generic/59.png)">
                <input class="d-none" id="upload-settings-cover-image" type="file">
                <label class="cover-image-file-input" for="upload-settings-cover-image"></label>
                <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white"></div>
              </div>
      <input class="d-none" id="upload-settings-porfile-picture" type="file">
      <label class="avatar avatar-4xl status-online feed-avatar-profile cursor-pointer" for="upload-settings-porfile-picture">
        <img class="rounded-circle img-thumbnail bg-white shadow-sm" src="../../zmods/gfm/_zassets/imgs/helen.jpg" width="200" alt="">
      </label>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-12">

                <div class="d-flex flex-wrap mb-2 align-items-center">
                  <h3 class="me-2"><?php echo $r_fic["pac_nombre"]." ".$r_fic["pac_apellido"]; ?> </h3>
                  <span class="fw-normal fs-0">u/hansolo</span>
                </div>

                <div class="d-flex d-xl-block d-xxl-flex align-items-center">
                  <div class="d-flex mb-xl-2 mb-xxl-0">
                    <h6 class="d-inline-block mb-0">1297<span class="fw-semi-bold ms-1 me-4">Followers</span></h6>
                  </div>
                  <div class="d-flex">
                    <h6 class="d-block d-xl-inline-block mb-0">3971<span class="fw-semi-bold ms-1">Following</span></h6>
                  </div>
                </div>

        </div>
      </div>
    </div>
    
  </div>
  
  
  
  
  <?php //_p($r_fic); ?> 
  </div>




  <div class="col-sm-9 border">
    <div class="row">
      <div class="col-12 col-sm-12 p-2 ">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="a_resumen" data-toggle="tab" href="#dv_resumen" role="tab" aria-controls="dv_resumen" aria-selected="true" 
              onclick="ver_resumen();">Resumen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="a_atenciones" data-toggle="tab" href="#dv_atenciones" role="tab" aria-controls="dv_atenciones" aria-selected="false"
              onclick="ver_atenciones();">Atenciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="a_cuenta" data-toggle="tab" href="#dv_cuenta" role="tab" aria-controls="dv_cuenta" aria-selected="false"
              onclick="ver_cuenta();">Cuenta</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="dv_resumen" role="tabpanel" aria-labelledby="a_resumen"></div>
          <div class="tab-pane fade" id="dv_atenciones" role="tabpanel" aria-labelledby="a_atenciones"></div>
          <div class="tab-pane fade" id="dv_cuenta" role="tabpanel" aria-labelledby="a_cuenta"></div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  $('#myTab a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
  function ver_atenciones(){
    var dv = document.getElementById("dv_atenciones");
    var a = $(".campos").serialize(); 
    AJAXPOST(url_base+"zmods/gfm/fichas/atencion_lst_datos.php",a,dv,"L;");
  }
</script>