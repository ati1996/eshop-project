<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include("connect.php");
	include("func.php");
	if(isset($_POST["btn"]))
	{
			if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			echo "کادرها خالی میباشد";
		}
		else
		{
			$a="INSERT INTO `users` (`username`, `password`) VALUES (:user, :pass);";
			$pass=hash1($_POST["password"]);
			$result=$connect->prepare($a);
			$result->bindparam(":user",$_POST["username"]);
			$result->bindparam(":pass",$pass);
			$query=$result->execute();
			if($query>0)
			{
				echo "درج شد";
			}
			else
			{
				echo "مشکل در درج";
			}
			
		}
	}
	?>
	<form method="post">
		username : <input type="text" name="username"><br/>
		password : <input type="text" name="password"><br/>
		: <input type="submit" name="btn" value="insert"><br/>
		
	</form>
</body>
</html>