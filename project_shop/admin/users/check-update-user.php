<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_POST["btn"]))   //click submit
{
	if(empty($_POST["fname"]))    // empty fname
	{
		header("location:update-user.php?empty_fname=25483 && id='".$_GET["id"]."' && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	elseif(empty($_POST["lname"]))   // empty lname
	{
		header("location:update-user.php?empty_lname=2935 && id='".$_GET["id"]."' && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	elseif(empty($_POST["mail"]))    // empty mail
	{
		header("location:update-user.php?empty_mail=24277 && id='".$_GET["id"]."'  && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	elseif(empty($_POST["phone"]))    // empty phone
	{
		header("location:update-user.php?empty_phone=21152 && id='".$_GET["id"]."'  && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	elseif(empty($_POST["username"]))    // empty username
	{
		header("location:update-user.php?empty_username=83282 && id='".$_GET["id"]."'  && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	elseif(empty($_POST["password"]))    // empty password
	{
		header("location:update-user.php?empty_password=45238 && id='".$_GET["id"]."'  && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	elseif(strlen($_POST["phone"])<11)   //phone number dosent have 11 number
	{
		header("location:update-user.php?phone_number=9631 && id='".$_GET["id"]."'  && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	else   // fill all of cadrs
	{
		$fname=xss($_POST["fname"]);
		$lname=xss($_POST["lname"]);
		$mail=xss($_POST["mail"]);
		$phone=xss($_POST["phone"]);
		$username=xss($_POST["username"]);
		$password=xss($_POST["password"]);
		
		$sql="UPDATE `users` SET `fname` = ? , `lname` = ? , `mail` = ? , `phone` = ? , `username` = ? , `password` = ?  WHERE `users`.`id` = ?;";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$fname);
		$result->bindvalue(2,$lname);
		$result->bindvalue(3,$mail);
		$result->bindvalue(4,$phone);
		$result->bindvalue(5,$username);
		$result->bindvalue(6,$password);
		$result->bindvalue(7,$_GET["id"]);
		$query=$result->execute();
		
		if($query)    // query is true
		{
			header("location:manage-users.php?update_ok=3597");
			exit();
		}
		else   // query is false
		{
			header("location:manage-users.php?update_error=4782");
			exit();
		}
	}
		
}
else    // dont click submit
{
	header("location:update-user.php");
	exit();
}


?>