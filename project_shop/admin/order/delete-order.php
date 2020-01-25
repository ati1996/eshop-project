<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_GET["id"]))
{
	$sql="DELETE FROM `order-tb` WHERE `order-tb`.`order-id` = ?";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$query=$result->execute();
	if($query)
	{
		$sql2="DELETE FROM `basket` WHERE `status`=?";
		$result2=$connect->prepare($sql2);
		$result2->bindvalue(1,$_GET["id"]);
		$result2->execute();
		header("location:manage-order.php?delete_ok=5697");
		exit();
	}
	else
	{
		header("location:manage-order.php?delete_error=26354");
		exit();
	}
}
else
{
	header("location:manage-order.php");
	exit();
}


















?>