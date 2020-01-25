<?php

include("funcs/connect.php");
include("funcs/jdf.php");

if(isset($_POST["btn"]))  //click submit
{
	$sql="UPDATE `users` SET `last-date-login`=? ,`last-time-login`=? WHERE `id`=? ";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,jdate('y/m/d'));
	$result->bindvalue(2,jdate('h:i:s'));
	$result->bindvalue(3,$_SESSION["user_login_id"]);
	$result->execute();

	unset($_SESSION["user_login"]);
	unset($_SESSION["user_login_fname"]);
	unset($_SESSION["user_login_lname"]);
	unset($_SESSION["last_date_login"]);
	unset($_SESSION["last_time_login"]);
	header("location:index.php#login");
	exit();
}
else  //dont click submit
{
	header("location:index.php#login");
	exit();
}

?>