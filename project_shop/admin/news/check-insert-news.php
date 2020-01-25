<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_POST["btn"]))       // click submit
{
	if(empty($_POST["title"]))    // empty title
	{
		header("location:insert-news.php?empty_title=1547");
		exit();
	}
	elseif(empty($_POST["text"]))     // empty text
	{
		header("location:insert-news.php?empty_text=4596");
		exit();
	}
	else      // fill all of them
	{
		$title=xss($_POST["title"]);
		$text=$_POST["text"];
		
		$sql="INSERT INTO `news` (`id`, `title`, `text`) VALUES (NULL, ? , ? );";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$title);
		$result->bindvalue(2,$text);
		$query=$result->execute();
		
		if($query)
		{
			header("location:insert-news.php?query_ok=4712");
			exit();
		}
		else
		{
			header("location:insert-news.php?query_error=3251");
			exit();
		}
	}
}
else      // dont click submit
{
	header("location:insert-news.php");
	exit();
}

?>