<?php
if(isset($_POST["btn"]))
{
	if($_POST["txt1"]=="" || $_POST["txt2"]=="" || $_POST["txt3"]=="" || $_POST["txt4"]=="" || $_POST["txt5"]=="" || $_POST["txt6"]=="" )
	{
		header("location:register.php?empty=1010");
		exit;
	}
	$con=mysqli_connect("localhost","root","","learnfiles");
	$a="INSERT INTO `users` VALUES (NULL , '".$_POST["txt1"]."', '".$_POST["txt2"]."', '".$_POST["txt3"]."', '".$_POST["txt4"]."', '".$_POST["txt5"]."', '".$_POST["txt6"]."');";
	$b=mysqli_query($con,$a);
	if($b)
	{
		header("location:register.php?ok=2020");
		exit;
	}
	else
	{
		header("location:register.php?error=3030");
		exit;
	}
	
}


?>
