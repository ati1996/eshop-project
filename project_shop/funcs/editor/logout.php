<?php
session_start();
$_SESSION['login']=0;
$_SESSION['fn']='';
unset($_SESSION['lastlogin']);
unset($_SESSION['ln']);
header("location:index.php");
?>