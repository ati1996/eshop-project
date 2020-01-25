<?php
include("funcs/connect.php");

if(isset($_GET["id"]))
{
	$sql="DELETE FROM `basket` WHERE `basket`.`id` = ?";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$query=$result->execute();
	
	if($query)
	{
		header("location:index.php?delete_form_basket_ok=8542");
		exit();
	}
	else
	{
		header("location:index.php?delete_form_basket_error=8542");
		exit();
	}
}
else
{
	header("location:index.php");
	exit();
}









?>