<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
	.kadr {
		border: 1px #F2066B solid;
	}
	
</style>	
		  
</head>
	
<body> 
	
	<?php
		if(isset($_GET["empty"]))
		{
			echo "<font color=#FF0000 >". "کادر ها خالی میباشد"."</font>";
		}
		if(isset($_GET["ok"]))
		{
			echo "<font color=#00cc33 >". "اطلاعات با موفقیت ثبت شد"."</font>";
		}
		if(isset($_GET["error"]))
		{
			echo "<font color=#FF0000 >". "مشکل در ثبت نام"."</font>";
		}		
	 
	?>
	
<form name="form1" method="post" action="reg-check.php">
<p>
  <label for="textfield">fname:<br>
  </label>
  <input type="text" name="txt1" id="textfield" class="kadr">
</p>
<p>
  <label for="textfield2">lname:</label>
</p>
<p>
  <input type="text" name="txt2" id="textfield2" class="kadr">
</p>
<p>
  <label for="textfield3">city:<br>
  </label>
  <input type="text" name="txt3" id="textfield3" class="kadr">
</p>
<p>
  <label for="textfield4">age:<br>
  </label>
  <input type="text" name="txt4" id="textfield4" class="kadr">
</p>
<p>
  <label for="textfield5">username:<br>
  </label>
  <input type="text" name="txt5" id="textfield5" class="kadr">
</p>
<p>
  <label for="textfield6">password:</label>
</p>
<p>
  <input type="text" name="txt6" id="textfield6" class="kadr">
</p>
<p>
  <input type="submit" name="btn" id="btn" value="register" class="kadr">
</p>
	</form>
</body>
</html>