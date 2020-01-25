<?php
include("funcs/connect.php");
include("funcs/funcs.php");

if(isset($_POST["btn"]))    //click btn
{
	if(empty($_POST["username"]))    //empty username
	{
		header("location:index.php?empty_username=1524#login");
		exit();
	}
	elseif(empty($_POST["password"]))   //empty password
	{
		header("location:index.php?empty_password=8544 & username='".$_POST["username"]."''#login");
		exit();
	}
	elseif(empty($_POST["recaptcha"]))
	{
		header("location:index.php?empty_captch=1457 & username='".$_POST["username"]."''#login");
		exit();
	}
	else   //fill username and password
	{
		if($_POST["recaptcha"]!=$_POST["captcha"])
		{
			header("location:index.php?error_captch=1457 & username='".$_POST["username"]."''#login");
			exit();
		}
		else
		{
			$sql="SELECT count(*) FROM `users` WHERE `username`=? && `password`=?";
			$result=$connect->prepare($sql);
			$result->bindvalue(1,$_POST["username"]);
			$result->bindvalue(2,$_POST["password"]);
			$result->execute();
			$sql2="SELECT * FROM `users` WHERE `username`=?";
			$result2=$connect->prepare($sql2);
			$result2->bindvalue(1,$_POST["username"]);
			$result2->execute();
			foreach($result2 as $rows2)
			{
				$fname=$rows2["fname"];
				$lname=$rows2["lname"];
				$userid=$rows2["id"];
				$last_date=$rows2["last-date-login"];
				$last_time=$rows2["last-time-login"];
			}
			$query=$result->fetchColumn();
			if($query==1)  // query is true
			{
				$_SESSION["user_login"]=1;
				$_SESSION["user_login_fname"]=$fname;
				$_SESSION["user_login_lname"]=$lname;
				$_SESSION["user_login_id"]=$userid;
				$_SESSION["last_date_login"]=$last_date;
				$_SESSION["last_time_login"]=$last_time;
				header("location:index.php?user_login_ok=4153#login");
				exit();
			}
			else   // query is false
			{
				header("location:index.php?user_login_error=2516#login");
				exit();
			}
		}
	}
}
else     //dont click btn
{
	header("location:index.php#login");
	exit();
}


?>