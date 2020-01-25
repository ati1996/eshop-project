<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" >
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	
$username=$_POST["username"];
$password=$_POST["password"];

$connect=mysqli_connect("localhost","root","","quiz");
if($connect)
{
	$query="SELECT * FROM `user` WHERE username='".$username ."' && password='".$password."' ";
	$sql=mysqli_query($connect,$query);
	$row=mysqli_num_rows($sql);
	if($row)
	{
		echo "you are wellcome";
		echo "<br> <a href=exam.php target=_blank> <input type=\"submit\" id=\"submit\" value=\"go to test\" class=\"sub_sing_up\"> </a>";
	}
	else
	{
		echo "there is not as this user";
	}
}
else
{
	echo ("there is an error connect");
}



	


?>
</body>
</html>