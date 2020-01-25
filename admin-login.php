<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style type="text/css">
		#cap
		{
			width: 70px;
			height: 25px;
			background-color: #3BD4EC;
			color: #091C6C;
			padding: 15px;
			border-radius: 10px;
		}
	</style>
</head>

<body>
	
<?php
	session_start();
	include("func/captcha.php");
	if(isset($_GET["captcha"])){
		echo "<font color=red>"."کد امنیتی اشتباه است"."</font>"."<br/><br/>";
	}
	if(isset($_GET["empty"])){
		echo "<font color=red>"."کادرها خالی است"."</font>"."<br/><br/>";
	}
	if(isset($_GET["error"])){
		echo "<font color=red>"."نام کاربری یا گذرواژه اشتباه است "."</font>";
	}	
?>	
	
<form id="form1" name="form1" method="post" action="check-admin.php">
  <p>
    <label for="textfield">username:</label>
    <input type="text" name="txt1" id="textfield">
  </p>
  <p>
    <label for="password">Password:</label>
    <input type="password" name="txt2" id="password">
  </p>
	<div id="cap"><?php echo $captcha; ?>	</div><br>
	لطفا کد امنیتی را وارد کنید :<br><input type="text"  name="txt3" >
	<br>
  <p>
	<input type="hidden" value="<?php echo $captcha; ?>" name="hidden">
    <input type="submit" name="btn" id="submit" value="login">
  </p>
</form>
</body>
</html>