<?php 
session_start();
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
ob_start();


include 'funcs/connect.php';
	include 'funcs/funcs.php';
	include 'funcs/date.php';
	include 'funcs/num2str.php';

if(strcmp( strtoupper($_POST['captcha']),$_SESSION['captcha'])!=0)
	{
	$_SESSION['msg']="لطفا تصویر امنیتی را بررسی نمایید";
	header("location:index.php");	
	
	}
	else
	{
	$p="select * from tblusers where userid='".$_POST['us']."' and pass='".$_POST['pw']."'";
	
	$r=mysql_query($p);
	
	$k=mysql_num_rows($r);
	$rows=mysql_fetch_assoc($r);
	
	$p="update tblusers set lastlogin='".getCurrentDate()."' where userid='".$_POST['us']."' and pass='".$_POST['pw']."'";
	$r=mysql_query($p);
	if($k==1)
	{
		$_SESSION['us']=$rows['userid'];
		$_SESSION['lastlogin']=$rows['lastlogin'];
		$_SESSION['fn']=$rows['fname'];
		$_SESSION['ln']=$rows['lname'];
		$_SESSION['login']=1;
		
	}
	else
	{
		$_SESSION['msg']="لطف نام کاربری و کلمه عبور را بررسی نمایید ";
		$_SESSION['login']=0;
		
		}
		
	header("location:index.php");
	
}
?>
