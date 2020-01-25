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
$email=$_POST["email"];

$connect=mysqli_connect("localhost","root","","quiz");
if($connect)
{
	$query="INSERT INTO `user` (`username`, `password`, `email`) VALUES ('".$username."', '".$password."', '".$email."');";
	$sql=mysqli_query($connect,$query);
	if($sql)
	{
		echo "you registed successfull";
		echo "<br> <a href=exam.php target=_blank> <input type=\"submit\" id=\"submit\" value=\"go to test\" class=\"sub_sing_up\"> </a>";
	}
	else
	{
		echo "there is an error sql";
	}
}
else
{
	echo ("there is an error connect");
}



	


?>
</body>
</html>