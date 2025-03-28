<?php
require("../../../config/conf.php");
wnav_titulo_modal("Editar Paciente");

$idpac = _validar_param($_REQUEST["idpac"]);

$sql = "SELECT * FROM _pacientes where pac_id='$idpac'";
$res = mysql_query($sql);
$r_pac = mysql_fetch_assoc($res);

?>
<div class="modal-body">
    <input type="hidden" id="idpac" name ="idpac" class="campos w200" value="<?php echo $idpac; ?>">
    <div id="dv_mdl_formulario">
        <table class="table table-bordered table-sm"> 
            <thead>
                <tr>
                    <th colspan="2">Información General</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td width="180">RUT</td>
                <td>
                    <?php
                        if($r_pac["pac_rut"]<>""){
                            ?>
                            <input type="text" id="mdl_rut" name ="mdl_rut" class="campos w120" style="float:left" readonly
                                value="<?php echo $r_pac["pac_rut"]; ?>"><?php
                        }else{
                            ?>
                            <input type="text" id="mdl_rut" name ="mdl_rut" class="campos w120" style="float:left"
                                onchange="evaluar_rut()"
                                value="<?php echo $r_pac["pac_rut"]; ?>"><?php
                        }
                    ?>
                    <div id="dv_rut" style="float:left;margin-left:8px"></div>
                </td>
            </tr>
            <tr>
                <td width="180">Nombre</td>
                <td><input type="text" id="mdl_nombre" name ="mdl_nombre" class="campos w200" 
                        value="<?php echo $r_pac["pac_nombre"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Apellido Paterno</td>
                <td><input type="text" id="mdl_apellido" name ="mdl_apellido" class="campos w200" 
                        value="<?php echo $r_pac["pac_apellido"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Apellido Materno</td>
                <td><input type="text" id="mdl_apellido2" name ="mdl_apellido2" class="campos w200" 
                        value="<?php echo $r_pac["pac_apellido2"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td><input type="date" id="mdl_nacimiento" name ="mdl_nacimiento" class="campos w140"
                        value="<?php echo $r_pac["pac_fecha_nacimiento"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" id="mdl_telefono" name ="mdl_telefono" class="campos w150" 
                        value="<?php echo $r_pac["pac_telefono"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input type="text" id="mdl_correo" name ="mdl_correo" class="campos w300" 
                        value="<?php echo $r_pac["pac_email"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td><input type="text" id="mdl_direccion" name ="mdl_direccion" class="campos w300" 
                        value="<?php echo $r_pac["pac_direccion"]; ?>">
                </td>
            </tr>
            </tbody>
        </table>
        <div class="modal-footer">
            <?php
            _boton("arrow-left","Salir","salir_modGeneral()"); 
            _boton("save","Guardar","guardar_paciente()"); 
            ?>
        </div>
    </div>    
    <div id="dv_mdl_operacion"></div>
</div>

<script>
    function guardar_paciente(){
        var dv = document.getElementById("dv_mdl_operacion");
        $("#dv_mdl_formulario").hide();
        var a = $(".campos").serialize(); 
		AJAXPOST(url_base+"zmods/gfm/paciente/paciente_mdl_editar_save.php",a,dv,false,function(){ 
            $("#dv_mdl_operacion").show();
		});
    }
    function evaluar_rut(){
        var dv = document.getElementById("dv_rut");
        var a = $(".campos").serialize(); 
		AJAXPOST(url_base+"zmods/geafemme/paciente/paciente_mdl_ajax.php",a+"&modo=validar_rut",dv);
    }
</script>