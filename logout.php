<?php
session_start();
$_SESSION["x"]="0";
header("location:admin-login.php");
exit;
?>