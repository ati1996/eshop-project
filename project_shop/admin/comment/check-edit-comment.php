<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_POST["btn"]))   // click submit
{
	if(empty($_POST["name"]))   // empty name
	{
		header("location:edit-comment.php?empty_name=25896 & id='".$_GET["id"]."' & name='".$_POST["name"]."' & comment='".$_POST["comment"]."'");
		exit();
	}
	elseif(empty($_POST["comment"]))  // empty comment
	{
		header("location:edit-comment.php?empty_comment=47856 & id='".$_GET["id"]."' & name='".$_POST["name"]."' & comment='".$_POST["comment"]."'");
		exit();
	}
	else    // fill all of cadrs
	{
		$name=xss($_POST["name"]);
		$comment=xss($_POST["comment"]);
		
		$sql="UPDATE `comment` SET `name` = ? , `comment` = ? WHERE `comment`.`id` = ?;";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$name);
		$result->bindvalue(2,$comment);
		$result->bindvalue(3,$_GET["id"]);
		$query=$result->execute();
		if($query)     // query is ture
		{
			header("location:manage-comment.php?edit_ok=12563");
			exit();
		}
		else    // query is false
		{
			header("location:manage-comment.php?edit-error=8541");
			exit();
		}
	}
}
else   // dont click submit
{
	header("location:edit-comment.php");
	exit();
}

?>