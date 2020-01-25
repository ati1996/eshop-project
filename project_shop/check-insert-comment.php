<?php
include("funcs/connect.php");
include("funcs/funcs.php");

if(isset($_POST["btn"]))  // click submit
{
	if(empty($_POST["name"]))    // empty name
	{
		header("location:index-read-more.php?empty_comment_name=4587 & id=".$_GET["pro_id"]." & name=".$_POST["name"]." & mail=".$_POST["mail"]." & site=".$_POST["site"]." & comment=".$_POST["comment"]."#insertcomment");
		exit();
		
		/*$url="index-read-more.php?empty_comment_name=4587&id=".$_GET["pro_id"]."&name=".$_POST["name"]."&mail=".$_POST["mail"]."&site=".$_POST["site"]."&comment=".$_POST["comment"]."#comment_langar";
 		$url=str_replace(PHP_EOL, '', $url);
 		header("Location: $url");      //header  سادده ارور میداد و از این روش استفاده کردم و جواب داد 
		exit();*/
	}
	elseif(empty($_POST["comment"]))   // empty comment
	{
		header("location:index-read-more.php?empty_comment=8514 & id=".$_GET["pro_id"]." & name=".$_POST["name"]." & mail=".$_POST["mail"]." & site=".$_POST["site"]." & comment=".$_POST["comment"]."#insertcomment");
		exit();
	}
	else  // fill name and comment
	{
		$name=xss($_POST["name"]);
		$mail=xss($_POST["mail"]);
		$site=xss($_POST["site"]);
		$comment=xss($_POST["comment"]);
		
		$sql="INSERT INTO `comment` (`id`, `id-product`, `name`, `mail`, `site`, `comment`, `status`) VALUES (NULL, ? , ? , ? , ? , ? , '0');";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$_GET["pro_id"]);
		$result->bindvalue(2,$name);
		$result->bindvalue(3,$mail);
		$result->bindvalue(4,$site);
		$result->bindvalue(5,$comment);
		$query=$result->execute();
		if($query)
		{
			header("location:index-read-more.php?queryok=8925 & id=".$_GET["pro_id"]."#insertcomment");
			exit();
		}
		else
		{
			header("location:index-read-more.php?queryerror=1256 & id=".$_GET["pro_id"]."#insertcomment");
			exit();
		}
	}
}
else  // dont click submit
{
	header("location:index-read-more.php?id='".$_GET["pro_id"]."'#insertcomment");
	exit();
}





?>