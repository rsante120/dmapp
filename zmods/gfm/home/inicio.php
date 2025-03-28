<?php
require("../../../config/conf.php"); 

/******************************************************/
echo "<h1>Inicio modulo Clínica</h1>";
/******************************************************/
$sql = "SELECT * FROM tcfg_configuracion ";
$res = mysql_query($sql);
while($row = mysql_fetch_assoc($res)){
  _p($row);
}


?>