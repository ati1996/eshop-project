<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
		  
</head>
	
<body>
<?php
	session_start();
	if(!isset($_SESSION["x"])){
		header("location:index.php");
		exit;
	}
	echo "wellcom";

		
?>
</body>
</html>