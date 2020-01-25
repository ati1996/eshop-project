<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_POST["btn"]))   // click submit
{
	if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["mail"]) || empty($_POST["phone"]) || empty($_POST["username"]) || empty($_POST["password"]))   // empty one of cadrs
	{
		header("location:insert-users.php?empty=83282 && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	elseif(strlen($_POST["phone"])<11)   //phone number dosent have 11 number
	{
		header("location:insert-users.php?phone_number=8954 && fname='".$_POST["fname"]."' && lname='".$_POST["lname"]."' && mail='".$_POST["mail"]."' &&  phone='".$_POST["phone"]."' && username='".$_POST["username"]."' && password='".$_POST["password"]."'");
		exit();
	}
	else   //  everything is ok
	{
		$fname=xss($_POST["fname"]);
		$lname=xss($_POST["lname"]);
		$mail=xss($_POST["mail"]);
		$phone=xss($_POST["phone"]);
		$username=xss($_POST["username"]);
		$password=xss($_POST["password"]);
		
		$sql="INSERT INTO `users` (`id`, `fname`, `lname`, `mail`, `phone`, `username`, `password`, `last-date-login`, `last-time-login`) VALUES (NULL, ? , ? , ? , ? , ? , ? , '0', '0');";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$fname);
		$result->bindvalue(2,$lname);
		$result->bindvalue(3,$mail);
		$result->bindvalue(4,$phone);
		$result->bindvalue(5,$username);
		$result->bindvalue(6,$password);
		$query=$result->execute();
		
		if($query)    // query is true
		{
			header("location:insert-users.php?query_ok=12348");
			exit();
		}

		else   // query is false
		{
			header("location:insert-users.php?query_error=4589 & fname='".$_POST["fname"]."' & lname='".$_POST["lname"]."' & mail='".$_POST["mail"]."' & phone='".$_POST["phone"]."' & username='".$_POST["username"]."' & password='".$_POST["password"]."' ");
			exit();    // این مقادیر رو ارسال میکنیم تا بعد از ارور کادر ها همچنان پر باشند
		}
	}
}
else    // dont click submit
{
	header("location:insert-user.php");
	exit();
}


?>