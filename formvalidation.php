<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	if(isset($_POST["btn"]))
	{
		if(empty($_POST["user"]))
			$empty1="Empty";
		else
			$val1=$_POST["user"];
		
		if(empty($_POST["pass"]))
			$empty2="Empty";
		else
			$val2=$_POST["pass"];
		
		if(empty($_POST["email"]))
			$empty3="Empty";
		else
			$val3=$_POST["email"];
		
		if(strlen($_POST["user"])<4)
			$low="lower than 4";
		
		if($_POST["user"]!="" && $_POST["pass"]!="" && $_POST["email"]!="")
			echo "<font color=green>"."اطلاعات با موفقیت ارسال شد"."</font>";	
		
		
	}
	?>
	<form method="post" >
		<table width="474" >
  <tbody>
    <tr>
      <td width="62">username</td>
      <td width="144"><input type="text" name="user" value="<?php if(isset($val1)) echo $val1; ?>"></td>
		<td width="252"><?php if(isset($empty1)) echo "<font color=red>". $empty1 . " and </font>";  ?>
		<?php if(isset($low)) echo "<font color=red>". $low . "</font>";  ?></td>
    </tr>
    <tr>
      <td>password</td>
      <td><input type="text" name="pass" value="<?php if(isset($val2)) echo $val2; ?>"></td>
		<td><?php if(isset($empty2)) echo "<font color=red>". $empty2 . "</font>";  ?></td>
    </tr>
    <tr>
      <td>email</td>
      <td><input type="email" name="email" value="<?php if(isset($val3)) echo $val3; ?>"></td>
		<td><?php if(isset($empty3)) echo "<font color=red>". $empty3 . "</font>";  ?></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn" value="send"> </td>
		
      </tr>
  </tbody>
</table>

	</form>
</body>
</html>