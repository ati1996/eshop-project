<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_GET["id"]))    // click submit
{
	$sql="DELETE FROM `friends-link` WHERE `friends-link`.`id` = ? ";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$query=$result->execute();
	
	if($query)   // query is true
	{
		header("location:manage-link.php?delete_ok=1457");
		exit();
	}
	else   // query is false
	{
		header("location:manage-link.php?delete_error=2569");
		exit();
	}
}
else    // dont click submit
{
	header("location:manage-link.php");
	exit();
}










?>