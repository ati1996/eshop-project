<?php
	include("funcs/connect.php");
	include("funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>orginal index</title>
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
		
		<a name="forget_password"></a> <!--برای این است که برای نمایش پیغام صفحه به پایین تر اسکرول داشته باشد-->
		
		<div id="contant">
				
				<!--contant header box-->
				
				<di class="contant_header">
					<div class="contant_header_text">
						<img src="image/icons/icons8-forgot-password-100.png" width="90px" height="90px">	بازیابی رمز ورود
					</div>
				</di>
					
				<!--contant body box-->
			
				<div class="contant_body">
					<div class="contant_body_text">
						<div id="forget_password_massege">
							<?php
							
								if(isset($_GET["empty"]))
								{
									echo "یکی از کادر ها خالیه لطفا همه رو پر کن";
							?>
									<style type="text/css">
										#forget_password_massege
										{
											color:#373737;
											background-color: #FFB7B8;
											border: 3px solid #FF0000;
											text-align: center;
										}
									</style>
							<?php
								}
								if(isset($_GET["user_forget_password_error"]))
								{
									echo "کاربری با این مشخصات وجود نداره";
							?>
									<style type="text/css">
										#forget_password_massege
										{
											color:#373737;
											background-color: #FFB7B8;
											border: 3px solid #FF0000;
											text-align: center;
										}
									</style>
							<?php
								}
								if(isset($_SESSION["user_forget_password_ok"]))
								{
									echo "رمز عبور شما ".$_SESSION["user_forget_password"]." هست لطفا در نگهداری اون کوشا باشید";
							?>
									<style type="text/css">
										#forget_password_massege
										{
											color:#373737;
											background-color: #8AFF87;
											border: 3px solid #00A302;
											text-align: center;
										}
									</style>	
							<?php
									unset($_SESSION["user_forget_password_ok"]);
								}
							?>
						</div>
						<p>لطفا کادر های زیر رو با دقت پر کن تا بتونیم رمز عبورت رو بازیابی کنیم</p>
						<form action="check-user-forget-password.php" method="post">
							<div class="register_input">
								نام کاربری : <input type="text" name="username" id="username" class="register_input_cadr"  
													value=<?php if(isset($_GET["username"])) echo $_GET["username"]; ?>>
							</div>
							<div class="register_input">
								ایمیل: <input type="email" name="mail" id="mail" class="register_input_cadr"
											  value=<?php if(isset($_GET["mail"])) echo $_GET["mail"]; ?>> 
							</div>
							<div class="register_input">
								شماره همراه : <input type="text" name="phone" id="phone" class="register_input_cadr"
													 value=<?php if(isset($_GET["phone"])) echo $_GET["phone"]; ?>>
							</div>
							<div class="register_input">
								<input type="submit" value="بازیابی" name="btn" id="register_submit">
							</div>	
						</form>
					</div>

				</div>
				
				<!--contant footer box-->
			
				<div class="contant_footer">

				</div>
		</div>
		
		<!--left menu box-->
		
		<?php include("index-left-menu.php"); ?>	
		
	</div>
	
	<!--pages box-->
	
	<div id="pages_box">
	</div>
	 
	<!--footer box-->
	
	<?php include("index-footer.php"); ?>
	
	
</body>
</html>