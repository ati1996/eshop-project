<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<a href="?lang=fa">فارسی</a>
	<a href="?lang=en">English</a>
	<?php
	if(isset($_GET["lang"]))
	{
		if(!file_exists("language/".$_GET["lang"].".php"))
		{
			include("language/fa.php");
		}
		else
		{
			include("language/".$_GET["lang"].".php");
		}
		
	}
	else
	{
		include("language/fa.php");
	}
	?>
	<ul>
		<li><?php echo $lang["home"]; ?></li>
		<li><?php echo $lang["about"]; ?> </li>
		<li><?php echo $lang["contact"]; ?></li>
	</ul>
	
</body>
</html>