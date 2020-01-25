<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$str="0123456789abcdefghijklmnopqrstuvwxyz";
	$max=strlen($str)-1;
	$result="";
	for($i=0;$i<5;$i++)
	{
		$random=rand(0,$max);
		$char=substr($str,$random,1);
		$result.=$char;
	}
	$captcha=strtoupper($result);
	?>
</body>
</html>