<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
	session_start();
	try{
	$connect=new PDO("mysql:host=localhost;dbname=learnfiles","root","");
	$connect->exec("set character set utf8");
	return $connect;
	}
	catch(PDOException $error){
		echo "Error in connect";
	}
	?>
</body>
</html>