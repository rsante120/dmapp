<?php
require("../../../config/conf.php");

switch ($_REQUEST["modo"]) {
    case "validar_rut":
        $sql = "SELECT * from _pacientes where pac_rut='".$_REQUEST["mdl_rut"]."'";
        $res = mysql_query($sql);
        if(mysql_num_rows($res)>0){
            echo "El rut ya esta asociado a otro paciente";
        }else{
            $arres = validar_rut($_REQUEST["mdl_rut"]);
            if($arres<>""){
                echo $arres;
            }else{
                echo "Rut OK!";
            }
        }
        break;

}

?>
