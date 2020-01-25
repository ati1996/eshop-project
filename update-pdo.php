<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include("connect.php");
	$sql="select * from users where id='".$_GET["id"]."'";
	$result=$connect->query($sql);
	while($rows=$result->fetch(PDO::FETCH_ASSOC))
	{
	$_SESSION["id"]=$rows["id"];
	
	?>

	<form method="post" action="check-pdo-update.php">
		fname <input type="text" name="fname" value="<?php echo $rows["fname"]?>"><br>
		lname <input type="text" name="lname" value="<?php echo $rows["lname"]?>" ><br>
		city <input type="text" name="city" value="<?php echo $rows["city"]?>"><br>
		age <input type="text" name="age" value="<?php echo $rows["age"]?>"><br>
		username <input type="text" name="user" value="<?php echo $rows["username"]?>"><br>
		password <input type="text" name="pass" placeholder="password"><br>
		<input type="submit" name="btn" value="edite" >
	</form>
	<?PHP
		}
	?>
</body>
</html>