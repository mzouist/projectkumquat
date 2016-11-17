<?php
session_start();
if(!isset($_SESSION["username"])){
$_SESSION["mode"] = $_POST["mode"];
header("Location: index.php");
exit(); }
?>