<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include("class.php");
	$object=new vares;
	$object1=new person;
	$object2=new static_class;
	echo static_class::func1();
	
	?>
</body>
</html>