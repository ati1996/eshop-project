<?php
include("connect.php");
$sql="DELETE FROM `users` WHERE `users`.`id` =?";
$result=$connect->prepare($sql);
$result->bindvalue(1,$_GET["id"]);
if($result->execute())
{
	header("location:pdo.php?ok=2020");
	exit;
}
else
{
	header ("location:pdo.php?error=1010");
	exit;
}

?>