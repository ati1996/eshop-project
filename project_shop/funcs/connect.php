<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php  // connecting to database
	session_start();
	$host="localhost";
	$db="shopdb";
	$username_con="root";
	$password_con="";
	try
	{
		$connect=new PDO("mysql:host=$host;dbname=$db",$username_con,$password_con);
		$connect->query("set character set utf8");
	}
	catch(PDOException $error)
	{
		echo "error to connection ".$error->getLine();
	}
	
	?>
	
</body>
</html>