<?php
	session_start();
	if(isset($_POST["btn"]))
	{
		if($_POST["txt1"]=="" || $_POST["txt2"]=="")
		{
			header("location:admin-login.php?empty=1010");
			exit;
		}
		if($_POST["hidden"]!=strtoupper($_POST["txt3"]))
		{
			header("location:admin-login.php?captcha=2020");
			exit;
		}
		else
		{
		$con=mysqli_connect("localhost","root","","learnfiles");
		$a="select * from admin where username='".$_POST["txt1"]."' && password='".$_POST["txt2"]."'";
		$b=mysqli_query($con,$a);
		$c=mysqli_num_rows($b);
		if($c!==0)
		{
			$_SESSION["x"]="1";
			header("location:admin-panel.php");
			exit;
			
		}
		else
		{
			header("location:admin-login.php?error=2020");
			exit;
		}
		}
	}

?>