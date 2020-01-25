<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
	echo date("y/m/d");
	echo "<br>";
	echo date("Y/M/D");
	echo "<br>";
	echo date("y*m*d");
	echo "<br>";
	$end=basename("dfgwrhwr/wrghwh/wrhrw/aaaaaaa.php");
	echo $end;
	echo "<br>";
	$end=basename("dfgwrhwr/wrghwh/wrhrw/aaaaaaa.php","php");
	echo $end;
	echo "<br>";
	echo "\"";
	echo "<br>";
	$a="hi my friend";
	echo $a;
	echo "<br>";
	$b=str_replace("friend","world",$a);
	echo $b;
	echo "<br>";
	echo ord("H");
	echo "<br>";	
	echo ord("h");
	echo "<br>";
	echo ord("$");
	echo "<br>";
	echo chr(73);
	echo "<br>";
	echo chr("73");
	echo "<br>";
	echo "aa            aa";
	echo "<br>";
	echo trim("a            a");
	echo "<br>";
	echo trim("         learn");
	echo "<br>";
	$e="hi firends and coworkers";
	echo strstr($e,"f");
	?>
</body>
</html>