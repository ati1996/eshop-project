<?php
session_start();
ob_start();
if($_SESSION['login']!=1)
	header("location:../../adminlogin.php");
	
include '../../funcs/connect.php';
if(isset($_GET['id']))
{
	$p="delete from tblorder where orderid=".$_GET['id'];
	mysql_query($p);
	header("location:index.php");
	
}
?>

