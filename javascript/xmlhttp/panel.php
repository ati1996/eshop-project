<?php
if(isset($_GET["name"]))
{
	$temp=$_GET["name"];
	
	$con=mysqli_connect("localhost","root","","learnfiles");
	$query="SELECT * FROM `users` WHERE fname='".$temp."'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result))
	{
		echo ("<font color=green;> موجود است </font>");
	}
	else
	{
		echo ("<font color=blue;> موجود نمیباشد </font>");
	}
	
	
}


?>