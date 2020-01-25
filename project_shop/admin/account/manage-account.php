<?php
	include("../../funcs/connect.php");
	include("../../funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
	body
	{
		font-family: bhoma;
	}
	@font-face
	{
		font-family: bhoma;
		src: url("../font/bhoma.ttf");
	}
	#massage
	{
		height: auto;
		width: 300px;;
		color: #272727;
		margin: auto;
		text-align: center;
		border-radius: 5px;
	}
	.input-cadr
	{
		font-size: 17px;
		font-family: bhoma;
		color: #2C2C2C;
		background-color: #FDFFA8;	
		height: 25px;
	}
	.input-btn
	{
		margin: auto;
		text-align: center;
		width: 85px;
		height: 35px;
		background: #373636;
		color: beige;
		border-radius: 10px;
		font-family: bhoma;
	}
	
</style>
</head>

<body dir="rtl"> 
	<div id="massage">
		<?php
			if(isset($_GET["empty"]))
			{ 
				echo "یکی از کادر ها خالیه لطفا همه رو پر کن";
		?>
				<style type="text/css">
					#massage
					{
						color: #272727;
						background-color: #FFB172;
						margin: auto;	
						text-align: center;
					}
				</style>
		<?php
			}
			if(isset($_GET["query_error"]))
			{ 
				echo "متاسفانه در روند بروزرسانی خطایی رخ داده لطفا مجدد تلاش کنید";
		?>
				<style type="text/css">
					#massage
					{
						color: #272727;
						background-color: #FFB172;
						margin: auto;	
						text-align: center;
					}
				</style>
		<?php
			}
			if(isset($_GET["query_ok"]))
			{
				echo "اطلاعات مورد نظرت رو با موفقیت ثبت کردیم"."<br>"."لطفا مجددا وارد حساب کاربری خود شوید";
		?>
				<style type="text/css">
					#massage
					{
						color: #272727;
						background-color: #94FF8A;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
		?>
	</div>
	
	<?php
	$sql="SELECT * FROM `admin` WHERE `username`=? ";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_SESSION["admin_login_username"]);
	$result->execute();
	foreach($result as $rows)
	{
	?>
		<form action="check-manage-account.php?id=<?=$rows["id"] ?>" method="post">
			<div>
				نام : <input type="text" name="fname" class="input-cadr" value=<?=$rows["fname"] ?>>
			</div>
			<br>
			<div>
				نام خانوادگی : <input type="text" name="lname" id="lname" class="input-cadr" value=<?=$rows["lname"] ?>>
			</div>
			<br>
			<div>
				ایمیل : <input type="email" name="mail" class="input-cadr" value=<?=$rows["email"] ?>>
			</div>
			<br>
			<div>
				نام کاربری : <input type="text" name="username" class="input-cadr" value=<?=$rows["username"] ?>>
			</div>
			<br>
			<div>
				گذرواژه : <input type="text" name="password" class="input-cadr" value=<?=$rows["password"] ?>>
			</div>
			<br>
			<div>
				<input type="submit" name="btn" value="ذخیره" class="input-btn">
			</div>
		</form>
	<?php	
	}
	?>
	
</body>
</html>