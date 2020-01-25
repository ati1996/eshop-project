<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_GET["id"]))    // click submit
{
	$sql="DELETE FROM `news` WHERE `news`.`id` = :id";   
	$result=$connect->prepare($sql);
	$result->bindparam(":id",$_GET["id"]);  // به جای bindvalue میتوان از این روش استفاده کرد
	$query=$result->execute();
	
	if($query)    // query is true
	{
		header("location:manage-news.php?delete_ok=7458");
		exit();
	}
	else    // query is false
	{
		header("location:manage-news.php?delete_error=1423");
		exit();
	}
}
else    // dont click submit
{
	header("location:manage-news.php");
	exit();
}


?>