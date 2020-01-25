<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
	.kadr{
		border: 1px #FF6500 solid;
	}	
	
</style>
		  
</head>
	
<body> 
<?php
	if(isset($_GET["empty"]))
	{
		echo "<font color=#BD0408 >"."کادرها خالی است"."</font>";
	}
	if(isset($_GET["ok"]))
	{
		echo "<font color=#0E9D26>"."ثبت نام با موفقیت انجام شد "."</font>";
	}
	if(isset($_GET["error"]))
	{
		echo "<font color=#930955>"."ثبت نام با خطا مواجه شد "."</font>";
	}
?>
<form name="regform" method="post" action="reg-check.php">
	firstname :<br/><input name="txt1" type="text" class="kadr"/><br/><br/>
	lastname :<br/><input name="txt2" type="text" class="kadr"/><br/><br/>
	city :<br/><input name="txt3" type="text" class="kadr"/><br/><br/>
	age :<br/><input name="txt4" type="text" class="kadr"/><br/><br/>
	username :<br/><input name="txt5" type="text" class="kadr"/><br/><br/>
	passsword :<br/><input name="txt6" type="text" class="kadr" /><br/><br/><br/>
	<input name="btn" type="submit" value="register" class="kadr"/>
	
			
</form>
</body>
</html>