<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_POST["btn"]))      //click submit
{
	if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["mail"]) || empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("location:manage-account.php?empty=4158");
		exit();
	}
	else
	{
		$fname=xss($_POST["fname"]);
		$lname=xss($_POST["lname"]);
		$email=xss($_POST["mail"]);
		$username=xss($_POST["username"]);
		$password=xss($_POST["password"]);
		
		$sql="UPDATE `admin` SET `fname` = ? , `lname` = ? , `email` = ? , `username` = ? , `password` = ?  WHERE `admin`.`id` = ? ;";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$fname);
		$result->bindvalue(2,$lname);
		$result->bindvalue(3,$email);
		$result->bindvalue(4,$username);
		$result->bindvalue(5,$password);
		$result->bindvalue(6,$_GET["id"]);
		$query=$result->execute();
		
		if($query)    // query is true
		{
			header("location:manage-account.php?query_ok=4521");
			exit();
		}
		else   // query is false
		{
			header("location:manage-account.php?query_error=1457");
			exit();
		}
	}
}
else     // dont click submit
{
	header("location:manage-account.php");
	exit();
}
?>