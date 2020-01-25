<?php
include("funcs/connect.php");

if(isset($_GET["id"]))   // click submit
{
	$sql="UPDATE `product` SET `score` = `score` + 1 WHERE `product`.`product-id` = ?;";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$query=$result->execute();
	
	if($query)   // query is true
	{
		header("location:index.php#".$_GET["id"]."");
		exit();
	}
	else   // query is false
	{
		header("location:index.php#'".$_GET["id"]."'");
		exit();
	}
}
else   // dont click submit
{ 
	header("location:index.php");
	exit();
}












?>