<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

	<?php
		$one="11111";
		$two="22222";
		$three=$one;
		$three  .=$two;
		echo $three;
		function pain($room="office",$color="red")
		{
			return "the color of the {$room} is {$color}";
		}
		echo "<br>";
		echo pain();
		echo "<br>";
		echo pain("blue");
	?>
</body>
</html>