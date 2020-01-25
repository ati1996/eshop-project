<?php
require("../../funcs/connect.php");
if(isset($_GET["id"]))
{
	$sql="DELETE FROM `product` WHERE `product`.`product-id` = ?";
	$result=$connect->prepare($sql);
	$result->bindValue(1,$_GET["id"]);
	$query=$result->execute();
	if($query)
	{
		
		unlink($_SESSION["delete_pic"]);
		header("location:manage-product.php?deleteok=1020");
		exit();
	}
	else
	{
		header("location:manage-product.php?deleteerror=1030");
		exit();	
	}
}
else
{
	header("location:manage-product.php");
	exit();
}









?>