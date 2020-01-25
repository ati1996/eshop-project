<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_GET["flag"]) && isset($_GET["id"]))
{
	$sql="UPDATE `order-tb` SET `status` = ? WHERE `order-tb`.`order-id` = ?;";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["flag"]);
	$result->bindvalue(2,$_GET["id"]);
	$query=$result->execute();
	if($query)
	{
		if($_GET["flag"]==1)
		{
			header("location:manage-order.php?send_ok=4587");
			exit();
		}
		elseif($_GET["flag"]==0)
		{
			header("location:manage-order.php?unsend_ok=1475");
			exit();
		}
	}
	else
	{
		header("location:manage-order.php?send_error=2574");
		exit();
	}
}
else
{
	header("location:manage-order.php");
	exit();
}





















?>