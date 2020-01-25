<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_POST["btn"]))   // click submit
{
	if(empty($_POST["new_name"]))    // empty name cadr
	{
		header("location:manage-link.php?empty_name=12563");
		exit();
	}
	elseif(empty($_POST["new_site"]))     // empty site cadr
	{
		header("location:manage-link.php?empty_site=15963");
		exit();
	}
	else   // fill all of cadrs
	{
		$name=xss($_POST["new_name"]);
		$site=xss($_POST["new_site"]);
		$sql="INSERT INTO `friends-link` (`id`, `name`, `site`) VALUES (NULL, ? , ? );";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$name);
		$result->bindvalue(2,$site);
		$query=$result->execute();
		if($query)
		{
			header("location:manage-link.php?new_query_ok=8541");
			exit();
		}
		else
		{
			header("location:manage-link.php?new_query_error=4596");
			exit();
		}
	}
}
else   // dont click submit
{
	header("location:manage-link.php");
	exit();
}












?>