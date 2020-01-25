<?php
	include("funcs/connect.php");
	include("funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت خرید</title>
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
		<a name="order"></a>
		<div id="contant">
				
				<!--contant header box-->
				
				<di class="contant_header">
					<div class="contant_header_text">
						<img src="image/icons/icons8-buy-500.png" width="90px" height="90px">	ثبت خرید
					</div>
				</di>
					
				<!--contant body box-->
				
				<div class="contant_body">
					<div class="contant_body_text">
						<div id="order_entry_massage">
							<?php
							
								if(isset($_GET["empty"]))
								{
									echo "یکی از کادر ها خالیه لطفا همه رو پر کن";
							?>
									<style type="text/css">
										#order_entry_massage
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
									echo "متاسفانه در روند ثبت خرید خطایی رخ داده لطفا مجدد تلاش کنید ";					
							?>
									<style type="text/css">
										#order_entry_massage
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
									echo "خرید شما با موفقیت ثبت شد . متشکریم از انتخاب تان";
									echo "<br>";
									echo "کد پیگیری خرید شما : ".$_GET["order_id"];
							?>
									<style type="text/css">
										#order_entry_massage
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
						<div id="order_entry_note">
							1. در پست معمولی بسته طی 7 الی 10 روز به دست شما میرسد.
							<br>
							2. در پست پیشتاز بسته طی 48 ساعت به دست شما میرسد.
							<br>
							3. لطفا تمامی کادر ها را به دقت پر نمایید.
							<br>
						</div>
						<?php
						$sql3="SELECT * FROM `users` WHERE `id`='".$_SESSION["user_login_id"]."'";
						$result3=$connect->query($sql3);
						foreach($result3 as $rows3)
						{
							$phone=$rows3["phone"];
							$mail=$rows3["mail"];
						}
						?>
						<form action="check-order-entry.php" method="post">
							<div class="order_entry_input">
								نوع سفارش: <select name="order_type" class="order_entry_input_selsect">
												<option value="simple">پست معمولی</option>
												<option value="vip">پست پیشتاز</option>
											</select> 
							</div>
							<div class="order_entry_input">
								شماره همراه: <input type="text" name="phone" class="order_entry_input_cdrs" 
													value=<?php if(isset($_GET["phone"])) echo $_GET["phone"]; else
													echo $phone;?> >
							</div>
							<div class="order_entry_input">
								ایمیل: <input type="email" name="mail" class="order_entry_input_cdrs" 
											  value=<?php if(isset($_GET["mail"])) echo $_GET["mail"]; else echo $mail; ?>>
							</div>
							<div class="order_entry_input">
								کد پستی: <input type="text" name="postal_code" class="order_entry_input_cdrs" 
												value=<?php if(isset($_GET["postal_code"])) echo $_GET["postal_code"]; ?>>
							</div>
							<div class="order_entry_input">
								آدرس: <textarea name="address" cols="45" rows="4" class="order_entry_input_text"><?php if(isset($_GET["address"])) echo $_GET["address"]; ?></textarea> 
							</div>
							<div class="order_entry_input">
								توضیحات: <textarea name="descrip" cols="45" rows="4" class="order_entry_input_text"><?php if(isset($_GET["descrip"])) echo $_GET["descrip"]; ?></textarea>
							</div>
							<div class="order_entry_input">
								<input type="submit" value="ثبت نهایی" name="btn" id="order_entry_input_submit">
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
	 
	<!--footer box-->
	
	<?php include("index-footer.php"); ?>
	
	
</body>
</html>