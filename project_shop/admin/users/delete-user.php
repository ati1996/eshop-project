<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_GET["id"]))   //click submit
{
	$sql="DELETE FROM `users` WHERE `users`.`id` = ?";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$query=$result->execute();
	if($query)  //query is true
	{
		header("location:manage-users.php?deleteok=1578");
		exit();
	}
	else   //query is false
	{
		header("location:manage-users.php?deleteerror=1578");
		exit();
	}
}
else    //dont click submit
{
	header("location:manage-users.php");
	exit();
}

?>