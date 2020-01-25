<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	if(isset($_GET["empty"])){
		echo "<font color=red>"."کادرها خالی است"."</font>"."<br/><br/>";
	}
	if(isset($_GET["error"])){
		echo "<font color=red>"."نام کاربری یا گذرواژه اشتباه است "."</font>";
	}
?>	
	
<form action="chek.php" method="post">
	username :<input type="text" name="user">
	<br/><br/>
	password :<input type="password" name="pass">
	<br/><br/>	
	<input type="submit" name="btn" value="LOGIN">
</form>




</table>
</body>
</html>