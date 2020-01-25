<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_GET["id"]))  // click release link
{
	$sql="DELETE FROM `comment` WHERE `comment`.`id` = ?";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$query=$result->execute();
	if($query)    // query is true
	{
		header("location:manage-comment.php?delete_ok=8547");
		exit();
	}
	else   // query is false
	{
		header("location:manage-comment.php?delete_error=5236");
		exit();
	}	
}
else   // dont click rekease link
{
	header("location:manage-comment.php");
	exit();
}
?>