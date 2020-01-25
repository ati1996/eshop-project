<?php
include("../funcs/connect-tow.php");
include("../funcs/jdf.php");
session_start();

$sql="UPDATE `admin` SET `last-date-login`=? ,`last-time-login`=?  WHERE `username`=?  ";
$result=$connect->prepare($sql);
$result->bindvalue(1,jdate('y/m/d'));
$result->bindvalue(2,jdate('h:i:s'));
$result->bindvalue(3,$_SESSION["admin_login_username"]);
$result->execute();


$_SESSION["admin_login"]=0;
header("location:../index.php");
exit();

?>
