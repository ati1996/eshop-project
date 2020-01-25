	<?php  // connecting to database
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