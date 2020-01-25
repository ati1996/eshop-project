<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>eshop admin login</title>

<style type="text/css">
	body
		{
			background-image: url("pic/229485.jpg");		
			background-attachment: fixed;
		}
	@font-face
		{
			font-family: bhoma;
			src: url("font/bhoma.ttf");
		}
	.input-login
		{
			margin-top: 15px;
			background-color: #FDFFA8;	
			height: 25px;
		}
	.main-box
		{
			width: 310px;
			height: 210px;
			padding: 70px;
			padding-top: 50px;
			font-size: 24px;
			background-color: #484848;
			border-radius: 10px;
			color: beige;
		}
	#submit
		{
			margin: auto;
			text-align: center;
			width: 80px;
			height: 50px;
			background: #373636;
			color: beige;
			border-radius: 10px;
			margin-top: 40px;
			margin-left: 10px;
		}
	.text-box
		{
			font-size: 28px;
			font-family: bhoma;
			color: #484848;
		}
	#pic
		{
			margin-top: 20px;
		}

	#text_empty
		{
			margin-top: 15px;
			font-family: bhoma;
			font-size: 24px;
		}
</style>

</head>

<body>
	
	<center>
	<img src="pic/drl.png" width="170px" height="170" id="pic">
	<div class="text-box" ><b> ورود مدیر </b></div> <br>
	<div class="main-box">
	<form action="" method="post">
		username : <input type="text" class="input-login" id="username" name="username"  ><br>
		password : <input type="password" class="input-login" id="password" name="password" ><br>
		<input type="submit" value="Login" id="submit" name="btn" >		   
	</form>
	
		
		
	<?php 
	include("../funcs/connect.php");
	if(isset($_POST["btn"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			echo '<div id="text_empty">کادری خالی میباشد</div>';
	?>
				<style type="text/css">
					.input-login
					{
						margin-top: 15px;
						background-color: #FF8F91;
						height: 25px;
					}
					.input-login:hover
					{
						background-color: #FDFFA8;
					}
				<style>
	<?php	
			
		}
		else
		{
			$sql="SELECT * FROM `admin` WHERE username=? AND password=?";
			$result=$connect->prepare($sql);
			$result->bindValue(1,$_POST["username"]);
			$result->bindValue(2,$_POST["password"]);
			$result->execute();
			$nums=$result->fetchColumn();
			if($nums==1)
			{
				$_SESSION["admin_login"]=1;
				$_SESSION["admin_login_username"]=$_POST["username"];
				header("location:panel.php?user=".$_POST['username']);
				exit();
			}
			else
			{
				echo '<div id="text_empty">کاربری با این مشخصات یافت نشد</div>';
	?>
					<style type="text/css">
						.input-login
						{
							margin-top: 15px;
							background-color: #FFB656;
							height: 25px;
						}
						.input-login:hover
						{
							background-color: #FDFFA8;
						}
					<style>
	<?php
			}
		}
	}
	?>
	</div>
	</center>
	
	
	<script type="text/javascript" src="../funcs/jquery-3.4.1.min.js" ></script>
	<script type="text/javascript" >
		var username=document.getElementById("username");
		var password=document.getElementById("password");
		var submit=document.getElementById("submit");

		username.onmouseover=function(){
			username.style.backgroundColor= "#F7ED7C"; 
		 };
		username.onmouseout=function(){
			username.style.backgroundColor= "#FDFFA8"; 
		 };

		password.onmouseover=function(){
			password.style.backgroundColor= "#F7ED7C"; 
		 };
		password.onmouseout=function(){
			password.style.backgroundColor= "#FDFFA8"; 
		 }; 
		
		submit.onmouseover=function(){
		submit.style.backgroundColor= "#5A5A5A"; 
		 };
		
		submit.onmouseout=function(){
			submit.style.backgroundColor= "#373636"; 
		 };
	</script>
</body>
</html>