<?php
date_default_timezone_set('Pacific/Honolulu');

$sqlHost = 'localhost';
$sqlUser = 'kumquat_ics414'; //*************   create new SQL user in cPanel
$sqlPass = 'ics414';
$sqlDatabase = 'kumquat_users'; //***********   be sure to connect your new SQL user to your CAMPUS database


$conn = mysql_connect($sqlHost, $sqlUser, $sqlPass);
	if (!$conn){
 die("Database Connection Failed" . mysql_error());
}

$db = mysql_select_db($sqlDatabase);
	if (!$db){
 die("Database Selection Failed" . mysql_error());
}

?>