<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");
if(isset($_POST["btn"]))   //   click submit
{
	if(empty($_POST["title"]))    // empty title
	{
		header("location:update-news.php?empty_title=1547 & id=".$_GET["id"]." & title=".$_POST["title"]." & text=".$_POST["text"]." ");
		exit();
	}
	elseif(empty($_POST["text"]))     // empty text
	{
		header("location:update-news.php?empty_text=4596 & id=".$_GET["id"]." & title=".$_POST["title"]." & text=".$_POST["text"]."");
		exit();
	}
	else
	{
		$title=xss($_POST["title"]);
		$text=$_POST["text"];
		
		$sql="UPDATE `news` SET `title` = ? , `text` = ?  WHERE `news`.`id` = ? ;";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$title);
		$result->bindvalue(2,$text);
		$result->bindvalue(3,$_GET["id"]);
		$query=$result->execute();
		
		if($query)
		{
			header("location:manage-news.php?update_ok=4712");
			exit();
		}
		else
		{
			header("location:manage-news.php?update_error=3251");
			exit();
		}
	}
}
else    // dont click submit
{ 
	header("location:update-news.php");
	exit();
}


















?>