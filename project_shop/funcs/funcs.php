<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	
	function toupper($string)
	{
		return strtoupper($string);
	}
	
	function xss($string)  // برای بحث امنیت که از حملات  xss  جلوگیری میکند 
	{
		return htmlspecialchars($string);
	}
	
	function captcha()
	{
		$str="0123456789abcdefghilklmnopqrstuvwxyz";
		$len=strlen($str)-1;
		$result="";
		for($i=0;$i<5;$i++)
		{
			$rand=rand(0,$len);
			$result.=substr($str,$rand,1);
		}
		return $result;
	}
	
	
	// order-id in order table  = status in basket table
	
	
	function returnNameProductById($val)
	{
		include("connect-tow.php");
		$sql="SELECT * FROM `product` WHERE `product-id`=? ";
		$result=$connect->prepare($sql);
		$result->bindValue(1,$val);
		$result->execute();
		foreach($result as $rows)
		{
			return $rows["name"];
		}	
	}
	
	function returnNameCatById($val)
	{
		include("connect-tow.php");
		$sql="SELECT * FROM `cat` WHERE `catid`=? ";
		$result=$connect->prepare($sql);
		$result->bindValue(1,$val);
		$result->execute();
		foreach($result as $rows)
		{
			return $rows["catname"];
		}	
	}
	
	function returnUserNameById($val)
	{
		include("connect-tow.php");
		$sql="SELECT * FROM `users` WHERE `id`=?";
		$result=$connect->prepare($sql);
		$result->bindValue(1,$val);
		$result->execute();
		foreach($result as $rows)
		{
			$name=$rows["fname"]." ".$rows["lname"];
		}
		return $name;
	}
	
	function returnNumberOrderByStatus($val)
	{
		include("connect-tow.php");
		$sql="SELECT * FROM `basket` WHERE`status`=?";
		$result=$connect->prepare($sql);
		$result->bindValue(1,$val);
		$result->execute();
		$num=0;
		foreach($result as $rows)
		{
			$num+=$rows["number"];
		}
		return $num;
	}
	
	function returnPriceOrderByStatus($val)
	{
		include("connect-tow.php");
		$sql="SELECT * FROM `basket` WHERE`status`=?";
		$result=$connect->prepare($sql);
		$result->bindValue(1,$val);
		$result->execute();
		$num=0;
		foreach($result as $rows)
		{
			$num+=$rows["price"];
		}
		return $num;
	}
	?>

</body>
</html>