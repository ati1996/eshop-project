<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>	
	<?php
/*	include "myclass1.php";
	include "myclass2.php";*/
	function __autoload($classname)
	{
		include $classname.".php";
	}
	$object=new myclass1;
	$object->name="atefeh";
	$object->family="asadi";
	$object->email="arfbrnaern@.com";
	echo $object;
	echo $object;
	?>
</body>
</html>