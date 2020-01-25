<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
	if(isset($_GET["empty"])){
		echo "<font color=#031EA4>"."نام کاربری یا گذرواژه خالی است"."</font>"."<br/>";
	}
	if(isset($_GET["error"])){
		echo "<font color=#D00003>"."نام کاربری یا گذرواژه اشتباه است "."</font>"."<br/>";
	}
?>
	
<h4> نام کاربری و رمز عبور خود را وارد کنید</h4>
<form method="post" action="acheck.php">
	username : <br/> <input name="txt1" type="text" /><br/><br/>
	password : <br/> <input name="txt2" type="text" /><br/><br/><br/>
	<input name="btn" type="submit" value="ورود ادمین"/>
</form>	
	
</body>
</html>