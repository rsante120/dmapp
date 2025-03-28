<?php
/*
session_start();
session_unset();
unset($_SESSION);
$_SESSION = array();
exit;
*/
// Iniciar sesión solo si no está iniciada (evita sesiones múltiples)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Activar o desactivar el reporte de errores según el modo de depuración
$_modo_depuracion = false;
if ($_modo_depuracion) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    ini_set('display_errors', 0);
}

// Configuración horaria
date_default_timezone_set('America/Santiago');

// Incluir archivos de configuración personalizados de cada cliente o instancia
require_once("dmapp_ini_cfg.php"); 
require_once("dmapp_ini_db.php"); 

$cnx = mysqli_connect($app_db_host, $app_db_user, $app_db_pass, $app_db_base);
if (!$cnx) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($cnx, "utf8");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once("func/_mysql.php"); //Activar en caso de que funciones mysql ya no funcionen
require_once("func/_pre.php");
require_once("func/_tiempo.php");
require_once("func/_varios.php");
require_once("func/_botones.php");
require_once("func/_desarrollo.php");

$sql = "SELECT * FROM configuracion";
$res = mysql_query($sql);

if(mysql_num_rows($res) > 0){
	while($row = mysql_fetch_assoc($res)){
		$_SESSION[$app_crpt_zet][$row["cfg_codigo"]] = $row["cfg_valor"];
	}
}

?>