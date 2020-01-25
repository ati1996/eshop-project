<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$connect=mysqli_connect("localhost","root","","learnfiles");
	$user=mysqli_real_escape_string($connect,$_POST["user"]);
	$pass=mysqli_real_escape_string($connect,$_POST["pass"]);
	$sql="SELECT * FROM `sqll` WHERE username='".$user."' && password='".$pass."'";
	$query=mysqli_query($connect,$sql);
	$nums=mysqli_num_rows($query);
	if($nums==1)
	{
		echo "wellcom";
		echo $user;
		echo "<br>";
		echo $pass;
	}
	else
	{
		echo "failed";
		echo $user;
		echo "<br>";
		echo $pass;
	}
	
	?>
	
</body>
</html>