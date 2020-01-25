<?php
if(isset($_GET["id"]))
{
	include("../../funcs/connect.php");
	$sql="DELETE FROM `cat` WHERE `cat`.`catid` = ?";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$query=$result->execute();
	if($query)
	{
		header("location:cat-manage.php?delok=1010");
		exit();	
	}
	else
	{
		header("location:cat-manage.php?delnot=1012");
		exit();
	}
	
	
	
}
else
{
	header("location:cat-manage.php");
	exit();
}

?>