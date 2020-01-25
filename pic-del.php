<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$con= mysqli_connect("localhost","root","","learnfiles");
	$a="DELETE FROM `pic` WHERE `pic`.`id` = '".$_GET["id"]."';";
	$q="select * from pic where id='".$_GET["id"]."';";
	$query=mysqli_query($con,$q);
	$fetch=mysqli_fetch_assoc($query);
	$b=mysqli_query($con,$a);
	if($b!==0)
	{
		unlink($fetch["location"]);	
		header("location:pic.php");
		exit;
	}
	else
	{
		header("location:pic.php?error=1010");
		exit;
	}
	?>
</body>
</html>