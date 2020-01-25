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
			$a="select * from users where username=:user && password=:pass";
			$result=$connect->prepare($a);
			//$pass=hash1($_POST["password"]);
			$result->bindparam(":user",$_POST["username"]);
			$result->bindparam(":pass",$_POST["password"]);
/*			$result->bindvalue(1,$_POST["username"]);
			$result->bindvalue(2,$_POST["password"]);*/
			$result->execute();
			$num=$result->fetchColumn();
			if($num>0)
			{
				echo "شما وارد شدید";
				
			}
			else
			{
				echo "نام کاربری یا گذرواژه اشتباه است ";
			}
		}
	}
	?>
	<form method="post" name="form">
	<p>username :
	<input name="username" type="text" id="username"/>
	</p>
	<p>
	password :
	<input name="password" type="text" id="pasword"/>
	</p>
	<p>
	  <input type="submit" name="btn"  value="login"/>
	</p>
	
	</form>
</body>
</html>