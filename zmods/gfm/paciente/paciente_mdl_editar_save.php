<?php
require("../../../config/conf.php");


$idpac = _validar_param($_REQUEST["idpac"]);
$rut = _validar_param($_REQUEST["mdl_rut"]);
$nombre = _validar_param($_REQUEST["mdl_nombre"]);
$apellido = _validar_param($_REQUEST["mdl_apellido"]);
$apellido2 = _validar_param($_REQUEST["mdl_apellido2"]);
$nacimiento = _validar_param($_REQUEST["mdl_nacimiento"]);
$telefono = _validar_param($_REQUEST["mdl_telefono"]);
$correo = _validar_param($_REQUEST["mdl_correo"]);
$direccion = _validar_param($_REQUEST["mdl_direccion"]);

$sql = "UPDATE _pacientes SET
          pac_rut='$rut',
          pac_nombre='$nombre',
          pac_apellido='$apellido',
          pac_apellido2='$apellido2',
          pac_fecha_nacimiento='$nacimiento',
          pac_telefono='$telefono',
          pac_direccion='$direccion',
          pac_email='$correo'
        WHERE pac_id='$idpac'";
$res = mysql_query($sql);

wnav_mensaje_ok("Datos guardados correctamente");
?>
<div class="modal-footer">
    <?php
    _boton("arrow-left","Salir","salir_modal()"); 
    ?>
</div>
<script>
  function salir_modal(){
    if (typeof filtrar_lista === "function") {
      filtrar_lista(); // Se ejecuta solo si existe y es una función
    }
    salir_modGeneral();
  }
</script>