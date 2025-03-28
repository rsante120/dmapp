<?php
session_start();
error_reporting(0); 
require_once("dmapp_ini_cfg.php"); 
if($_REQUEST["mdl"] == ""){
	$_REQUEST["mdl"] = 10;
}
?>