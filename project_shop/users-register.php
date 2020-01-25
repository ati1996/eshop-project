<?php
	include("funcs/connect.php");
	include("funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت نام کاربر جدید</title>
	<link rel="stylesheet" href="index-style.css" >
</head>

<body dir="rtl">
	
	<!--header box-->
	
	<?php include("index-header.php"); ?>
	
	<!--shop box-->
	
	<div id="shop_box">
	</div>
	
	<!--contant and menu box-->
	
	<div id="contant_and_menus">
		
		<!--right menu box-->
		
		<?php include("index-right-menu.php"); ?>
		
		<!--contant box-->
		
		<a name="register"></a>  <!--برای این است که برای نمایش پیغام صفحه به پایین تر اسکرول داشته باشد-->
		
		<div id="contant">
				
				<!--contant header box-->
				
				<di class="contant_header">
					<div class="contant_header_text">
						<img src="image/icons/icons8-add-user-male-100.png" width="90px" height="90px">	ثبت نام کاربر جدید
					</div>
				</di>
					
				<!--contant body box-->
			
				<div class="contant_body">
					<div class="contant_body_text">
						<div id="register_massege">
							<?php
							
								if(isset($_GET["empty"]))
								{
									echo "یکی از کادر ها خالیه لطفا همه رو پر کن";
							?>
									<style type="text/css">
										#register_massege
										{
											color:#373737;
											background-color: #FFB7B8;
											border: 3px solid #FF0000;
											text-align: center;
										}
									</style>
							<?php
								}
								if(isset($_GET["phone_number"]))
								{
									echo "تعداد ارقام شماره همراه باید 11 رقم باشد";
							?>
									<style type="text/css">
										#register_massege
										{
											color:#373737;
											background-color: #FFB7B8;
											border: 3px solid #FF0000;
											text-align: center;
										}
									</style>
							<?php
								}
								if(isset($_GET["diffrent_password"]))
								{
									echo "گذرواژه ها متفاوته . لطفا گذرواژه های یکسان وارد کنید.";
							?>
									<style type="text/css">
										#register_massege
										{
											color:#373737;
											background-color: #FFB7B8;
											border: 3px solid #FF0000;
											text-align: center;
										}
									</style>
							<?php
								}
							
								if(isset($_GET["diffrent_captcha"]))
								{
									echo "کد امنیتی اشتباهه . لطفا کد صحیح رو وارد کنید.";
							?>
									<style type="text/css">
										#register_massege
										{
											color:#373737;
											background-color: #FFB7B8;
											border: 3px solid #FF0000;
											text-align: center;
										}
									</style>
							<?php
								}
							
							
								if(isset($_GET["query_error"]))
								{
									echo "متاسفانه در روند ثبت نام خطایی رخ داده لطفا مجدد تلاش کنید";
							?>
									<style type="text/css">
										#register_massege
										{
											color:#373737;
											background-color: #FFB7B8;
											border: 3px solid #FF0000;
											text-align: center;
										}
									</style>
							<?php
								}
							
								if(isset($_GET["query_ok"]))
								{
									echo "ثبت نام با موفقیت انجام شد . حالا دیگه تو یکی از دوستای مایی.";
							?>
									<style type="text/css">
										#register_massege
										{
											color:#373737;
											background-color: #B9FFB7;
											border: 3px solid #00A302;
											text-align: center;
										}
									</style>
							<?php
								}
							?>
						</div>
						
						<form action="check-users-register.php" method="post">
							
							<div class="register_input">
								نام: <input type="text" name="fname" id="fname" class="register_input_cadr" 
											value=<?php if(isset($_GET["fname"])) echo $_GET["fname"]; ?>>
							</div>
							<div class="register_input">
								نام خانوادگی: <input type="text" name="lname" id="lname" class="register_input_cadr" 
													 value=<?php if(isset($_GET["lname"])) echo $_GET["lname"]; ?>>
							</div>							
							<div class="register_input">
								ایمیل: <input type="email" name="mail" id="mail" class="register_input_cadr" 
											  value=<?php if(isset($_GET["mail"])) echo $_GET["mail"]; ?>> 
							</div>
							<div class="register_input">
								شماره همراه : <input type="text" name="phone" id="phone" class="register_input_cadr" 
													 value=<?php if(isset($_GET["phone"])) {echo $_GET["phone"];} 
													 else {echo "09";}?> maxlength="11">
							</div>
							<div class="register_input">
								نام کاربری : <input type="text" name="username" id="username" class="register_input_cadr" 
													value=<?php if(isset($_GET["username"])) echo $_GET["username"]; ?>>
							</div>
							<div class="register_input">
								گذرواژه : <input type="password" name="password" id="password" class="register_input_cadr">
							</div>
							<div class="register_input">
								تکرار گذرواژه : <input type="password" name="repassword" id="repassword" class="register_input_cadr">
							</div>
							<br>
							<div class="register_input">
								<?php
									$captcha=captcha();
								?>
								<p id="captcha_code"><?=$captcha ?></p>
								<input type="hidden" value="<?=$captcha ?>" name="captcha">   
								لطفا کد بالا رو توی این کادر بنویس <input type="text" name="recaptcha" id="recaptcha" class="register_input_cadr" >
							</div>
							<div class="register_input">
								<input type="submit" value="ثبت نام" name="btn" id="register_submit">
							</div>	

						</form>
					</div>
				</div>
				
				<!--contant footer box-->
			
				<div class="contant_footer">
					<span id="contant_footer_text">
						<img src="image/icons/icons8-love-circled-500.png" width="50px" height="50px">	امیدواریم دوستی خوب و پایداری رو با هم داشته باشیم.
					</span>
				</div>
		</div>
		
		<!--left menu box-->
		
		<?php include("index-left-menu.php"); ?>	
	</div>
	 
	<!--footer box-->
	
	<div id="footer">
	</div>
	
</body>
</html>