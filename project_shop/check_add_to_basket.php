<?php
include("funcs/connect.php");
if(isset($_SESSION["user_login_id"]) and isset($_GET["pro_id"]))
{
	$sql="INSERT INTO `basket` (`id`, `user_id`, `product_id`, `price`, `number`, `status`) VALUES (NULL, ? , ? , ? , '1', '0');";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_SESSION["user_login_id"]);
	$result->bindvalue(2,$_GET["pro_id"]);
	$result->bindvalue(3,$_GET["price"]);
	$query=$result->execute();
	
	if($query)
	{
		header("location:index.php?add_to_basket_ok=5632");
		exit();
	}
	else
	{
		header("location:index.php?add_to_basket_error=7369");
		exit();
	}
}
else
{
	header("location:index.php");
	exit();
}












?>