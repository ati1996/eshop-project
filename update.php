<!doctype html>
<html>
<head>
<style type="text/css">
	input{
		border: 1px solid #008A0F;
	}	
</style>	
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	session_start();
	$_SESSION["m"]=$_GET["id1"];
	$con=mysqli_connect("localhost","root","","learnfiles");
	$a="select *from users where id='".$_SESSION["m"]."';";
	$b=mysqli_query($con,$a);
	if($b!==0){
		$c=mysqli_fetch_assoc($b);
	
	?>
	<form name="form1" method="post" action="check-up.php"><table width="200" border="0">
  <tbody>
    <tr>
      <td>fname:</td>
      <td><input type="text" name="txt1" id="textfield" value="<?php echo $c["fname"]; ?>"/></td>
    </tr>
    <tr>
      <td>lname:</td>
      <td><input type="text" name="txt2" id="textfield2" value="<?php echo $c["lname"]; ?>"></td>
    </tr>
    <tr>
      <td>city:</td>
      <td><input type="text" name="txt3" id="textfield3" value="<?php echo $c["city"]; ?>"></td>
    </tr>
    <tr>
      <td>age:</td>
      <td><input type="text" name="txt4" id="textfield4" value="<?php echo $c["age"]; ?>"></td>
    </tr>
    <tr>
      <td>username:</td>
      <td><input type="text" name="txt5" id="textfield5" value="<?php echo $c["username"]; ?>"></td>
    </tr>
    <tr>
      <td>password:</td>
      <td><input type="text" name="txt6" id="textfield6" value="<?php echo $c["password"]; ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn" id="btn" value="update"></td>
      </tr>
  </tbody>
</table>

</form>
	<?php
		}
	?>	

</body>
</html>