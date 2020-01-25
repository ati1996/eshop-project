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
	$_SESSION["m"]=$_GET["id7"];
	$con=mysqli_connect("localhost","root","","learnfiles");
	$a="select * from users where id='".$_SESSION["m"]."';";
	$b=mysqli_query($con,$a);
	if($b!==0){
		$c=mysqli_fetch_assoc($b);
	?>
	<form method="post" action="acheck.php">
		<table >
			<tr>
				<td>firstname :</td>
				<td><input name="txt1"type="text"value="<?php echo $c["fname"];?>"/></td>
			</tr>
			<tr>
				<td>lastname : :</td>
				<td><input name="txt2"type="text"value="<?php echo $c["lname"];?>"/></td>
			</tr>
			<tr>
				<td>city :</td>
				<td><input name="txt3"type="text"value="<?php echo $c["city"];?>"/></td>
			</tr>
			<tr>
				<td>age :</td>
				<td><input name="txt4"type="text"value="<?php echo $c["age"];?>"/></td>
			</tr>
			<tr>
				<td>username :</td>
				<td><input name="txt5"type="text"value="<?php echo $c["username"];?>"/></td>
			</tr>
			<tr>
				<td>password :</td>
				<td><input name="txt6"type="text"value="<?php echo $c["password"];?>"/></td>
			</tr>
			<tr >
				<td>
					<br/><input type="submit" name="btn" value="update"/>
				</td>
			</tr>
			
		</table>
	</form>
	
	<?php
	}
	?>
	
</body>
</html>