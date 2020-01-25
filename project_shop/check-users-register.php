<?php 
include("funcs/connect.php");
include("funcs/funcs.php");

if(isset($_POST["btn"]))    //click submit
{
	if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["mail"]) || empty($_POST["phone"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["repassword"]) || empty($_POST["recaptcha"])) 				//empty one of cadrs
	{
		header("location:users-register.php?empty=5254 & fname='".$_POST["fname"]."' & lname='".$_POST["lname"]."' & mail='".$_POST["mail"]."' & phone='".$_POST["phone"]."' & username='".$_POST["username"]."'#register");
		exit();       // این مقادیر رو ارسال میکنیم تا بعد از ارور کادر ها همچنان پر باشند
	}
	
	else    //fill all of cadrs
	{
		if(strlen($_POST["phone"])<11)    //phone number dosent have 11 number
		{
			header("location:users-register.php?phone_number=5254 & fname='".$_POST["fname"]."' & lname='".$_POST["lname"]."' & mail='".$_POST["mail"]."' & phone='".$_POST["phone"]."' & username='".$_POST["username"]."'#register");
			exit();     // این مقادیر رو ارسال میکنیم تا بعد از ارور کادر ها همچنان پر باشند
		}
		else  //phone number has 11 number
		{
			if($_POST["password"] != $_POST["repassword"])   // diffrent passwords
			{
				header("location:users-register.php?diffrent_password=8475 & fname='".$_POST["fname"]."' & lname='".$_POST["lname"]."' & mail='".$_POST["mail"]."' & phone='".$_POST["phone"]."' & username='".$_POST["username"]."'#register");
				exit();   // این مقادیر رو ارسال میکنیم تا بعد از ارور کادر ها همچنان پر باشند
			}

			else    //same passwords
			{
				if($_POST["captcha"] != $_POST["recaptcha"])   //diffrent captcha code
				{
					header("location:users-register.php?diffrent_captcha=12654 & fname='".$_POST["fname"]."' & lname='".$_POST["lname"]."' & mail='".$_POST["mail"]."' & phone='".$_POST["phone"]."' & username='".$_POST["username"]."'#register");
					exit();    // این مقادیر رو ارسال میکنیم تا بعد از ارور کادر ها همچنان پر باشند
				}

				else  // same captcha code  and everythings is ok
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
						header("location:users-register.php?query_ok=12348#register");
						exit();
					}

					else   // query is false
					{
						header("location:users-register.php?query_error=4589 & fname='".$_POST["fname"]."' & lname='".$_POST["lname"]."' & mail='".$_POST["mail"]."' & phone='".$_POST["phone"]."' & username='".$_POST["username"]."'#register");
						exit();    // این مقادیر رو ارسال میکنیم تا بعد از ارور کادر ها همچنان پر باشند
					}

				}
			}
		}
		
	}
}

else       // dont click submit
{
	header("location:users-register.php#register");
	exit();
}




?>