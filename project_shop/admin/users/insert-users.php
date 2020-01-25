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
		height: 30px;
		width: 250px;;
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
			if(isset($_GET["phone_number"]))
			{ 
				echo "تعداد ارقام تلفن همراه باید 11 رقم تا باشه";
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
				echo "کاربر مورد نظرت رو با موفقیت ثبت کردیم";
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
			if(isset($_GET["query_error"]))
			{ 
				echo "متاسفانه در روند ثبت نام خطایی رخ داده لطفا مجدد تلاش کنید";
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
		?>
	</div>
	
	<form action="check-insert-user.php" method="post">
		<div>
			نام : <input type="text" name="fname" class="input-cadr" value=<?php if(isset($_GET["fname"])) echo $_GET["fname"];?>>
		</div>
		<br>
		<div>
			نام خانوادگی : <input type="text" name="lname" id="lname" class="input-cadr" value=<?php if(isset($_GET["lname"])) echo $_GET["lname"];?>>
		</div>
		<br>
		<div>
			ایمیل : <input type="email" name="mail" class="input-cadr" value=<?php if(isset($_GET["mail"])) echo $_GET["mail"];?>>
		</div>
		<br>
		<div>
			شماره همراه : <input type="text" name="phone" class="input-cadr" value='<?php if(isset($_GET["phone"])) echo $_GET["phone"];?>' maxlength="11">
		</div>
		<br>
		<div>
			نام کاربری : <input type="text" name="username" class="input-cadr" value=<?php if(isset($_GET["username"])) echo $_GET["username"];?>>
		</div>
		<br>
		<div>
			گذرواژه : <input type="text" name="password" class="input-cadr" value=<?php if(isset($_GET["password"])) echo $_GET["password"];?>>
		</div>
		<br>
		<div>
			<input type="submit" name="btn" value="افزودن کاربر" class="input-btn">
		</div>
	</form>	
	
</body>
</html>