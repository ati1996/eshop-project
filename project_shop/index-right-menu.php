<div id="right_menu">
	
	<!--first box-->  <!-- products box-->
	<a name="login"></a>  <!--برای این است که برای نمایش پیغام صفحه به پایین تر اسکرول داشته باشد--> 
	<div class="right_menu_top">
		<div class="right_menu_top_text">
			<img src="image/icons/icons8-product-500.png" width="60px" height="60px"> محصولات
		</div>
	</div>
			
	<div class="right_menu_center">		
		<div class="right_menu_center_text">
			<ul>
				<?php
				$sql="SELECT * FROM `cat`";
				$result=$connect->query($sql);
				foreach($result as $rows)
				{
				?>
					<li>
						<a href="index.php?page=0 && cat_id=<?=$rows["catid"] ?>"><?=$rows["catname"] ?></a>
					</li>	
				<?php	
				}
				?>
			</ul>
		</div>
	</div>
	
	<!--second box -->  <!--loging in box-->
	<?php 
	if(isset($_SESSION["user_login"]))  //اگر کاربر لاگ این کرده بود این باکس نشان داده میشود
	{
	?>

	<div class="right_menu_top">
		<div class="right_menu_top_text">
			<img src="image/icons/icons8-user-100.png" width="60px" height="60px"> پنل کاربری شما 
		</div>
	</div>
			
	<div class="right_menu_center">
		<div class="right_menu_center_text">

			<p><?=$_SESSION["user_login_fname"]?>  <?=$_SESSION["user_login_lname"]?>  عزیز خوش اومدی</p>
			<br>
			<p>آخرین ورود شما :<br> <?=$_SESSION["last_date_login"] ?>    <?=$_SESSION["last_time_login"] ?></p>
			<a href="#" >
				<img src="admin/pic/icons8-edit-user-100.png" width="60px" id="edit_profile_img">
				ویرایش پروفایل
			</a>
			<br><br>
			<form action="users-logout.php" method="post">
				<input type="submit" name="btn" value="خروج" id="logout_submit">
			</form>

		</div>
	</div>
	<?php
	}
	
	else  // اگر کاربر لاگ این نکرده بود این باکس نمایش داده شود
	{
	?>
	<!--second box -->  <!--log in box-->
	
	<div class="right_menu_top">
		<div class="right_menu_top_text">
			<img src="image/icons/icons8-login-500.png" width="60px" height="60px"> ورود کاربران 
		</div>
	</div>
			
	<div class="right_menu_center">
		<div class="right_menu_center_text">
			<div id="login_massege">
			<?php
				if(isset($_GET["empty_username"]))
				{
					echo "کادر نام کاربری رو لطفا پر کن";
			?>
					<style type="text/css">
						#login_massege
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>
			<?php
				}
				if(isset($_GET["empty_password"]))
				{
					echo "کادر گذرواژه رو لطفا پر کن";
			?>
					<style type="text/css">
						#login_massege
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>
			<?php
				}
				if(isset($_GET["empty_captch"]))
				{
					echo "کادر کد امنیتی رو لطفا پر کن";
			?>
					<style type="text/css">
						#login_massege
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>
			<?php
				}
				if(isset($_GET["error_captch"]))
				{
					echo "کد امنیتی رو صحیح وارد کنید";
			?>
					<style type="text/css">
						#login_massege
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>
			<?php
				}
				if(isset($_GET["user_login_error"]))
				{
					echo "کاربری با این مشخصات وجود ندارد";
			?>
					<style type="text/css">
						#login_massege
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>	
			<?php
				}
				
			?>
			</div>
			
			<form action="check-users-login.php" method="post">
				نام کاربری :<input type="text" name="username" id="login_username" value=<?php if(isset($_GET["username"])) 			echo $_GET["username"];  ?>><br>
				رمز عبور :<input type="password" name="password" id="login_password"><br><br>
								<?php
									$captcha=captcha();
								?>
								<p id="captcha_code"><?=$captcha ?></p>
								<input type="hidden" value="<?=$captcha ?>" name="captcha">   
								لطفا کد بالا رو توی این کادر بنویس <input type="text" name="recaptcha" id="recaptcha" class="register_input_cadr" style="background-color: #FDFFA8">
							<br>
							<input type="submit" value="ورود" name="btn" id="login_submit"><br><br>
				<a href="user-forget-password.php#forget_password" id="a_forget_password">رمزمو فراموش کردم</a><br>
				<a href="users-register.php#register" id="a_not_singup">الان میخوام ثبت نام کنم</a>
				
				
			</form>
		</div>
	</div>
	<?php
	}
	?>
</div>