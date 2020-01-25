<?php
	include("funcs/connect.php");
	include("funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>online shop</title>
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
		
		<a name="read_more"></a>   <!--برای این است که برای نمایش پیغام صفحه به پایین تر اسکرول داشته باشد-->

		<div id="contant">
			<?php
			$sql2="SELECT * FROM `product` WHERE `product-id`='".$_GET["id"]."'";
			$result2=$connect->query($sql2);
			foreach($result2 as $rows2)
			{
			?>
				
				<!--contant header box-->
				
				<di class="contant_header">
					<div class="contant_header_text">
						<img src="image/icons/icons8-new-500.png" width="90px" height="90px">	<?=$rows2["name"] ?>
					</div>
				</di>
					
				<!--contant body box-->
			
				<div class="contant_body">
					<div class="contant_body_img">
						<img src="admin/product/<?=$rows2["pic"] ?>">
					</div>
					<div class="contant_body_text">
						  <?=$rows2["caption"] ?> 
					<hr>
					<div class="show_price">
						<img src="image/icons/icons8-product-500.png" width="55px" height="55px">
						<div class="show_price_text"> از سری محصولات<?=returnNameCatById($rows2["cat-id"]) ?></div>
					</div>
					<div class="show_price">
						<img src="image/icons/icons8-price-tag-100.png" width="55px" height="55px">
						<div class="show_price_text"><?=$rows2["price"] ?> تومان</div>
					</div>
						<?php
								if(isset($_SESSION["user_login"]))
								{
								?>
									<div class="add_to_basket">
									<a href="check_add_to_basket.php?pro_id=<?=$rows2["product-id"] ?> && price=<?=$rows2["price"] ?>">
										<img src="image/icons/icons8-shopping-basket-add-500.png" width="55px" height="55px">
										<div class="add_to_basket_text">افزدن به سبد خرید</div>
									</a>
									</div>										
								<?php	
								}
								?>
					</div>

				</div>
				
				<!--contant footer box-->
				
				<div class="contant_footer">
					<span class="contant_footer_wirter">
						<img src="image/icons/icons8-administrator-male-100.png" width="50px" height="50px;" > عاطفه اسدی
					</span>
				</div>
			<?php
			}
			?>
			
			<div class="comment_all">
				<div id="comment_insert_header">
					<a name="add_comment"></a> 	
					<a name="insertcomment"></a>
					<!--برای این است که برای نمایش پیغام صفحه به پایین تر اسکرول داشته باشد-->
					<img src="image/icons/icons8-chat-bubble-500.png" width="60px" height="60px"> ثبت نظر جدید
				</div>
				<div class="comment_insert">
					<div id="comment_insert_massage">
						<?php
							
							if(isset($_GET["empty_comment_name"]))
							{
								echo "کادر نام خالیه لطفا پرش کن";
						?>
								<style type="text/css">
									#comment_insert_massage
									{
										color:#373737;
										background-color: #FFB7B8;
										border: 3px solid #FF0000;
										text-align: center;
									}
								</style>
						<?php
							}
							if(isset($_GET["empty_comment"]))
							{
								echo "کادر متن نظر خالیه لطفا پرش کن";
						?>
								<style type="text/css">
									#comment_insert_massage
									{
										color:#373737;
										background-color: #FFB7B8;
										border: 3px solid #FF0000;
										text-align: center;
									}
								</style>
						<?php
							}
							if(isset($_GET["queryok"]))
							{
								echo "نظرت با موفقیت ارسال شد و در صف تایید توسط ادمین است.";
						?>
								<style type="text/css">
									#comment_insert_massage
									{
										color:#373737;
										background-color: #B9FFB7;
										border: 3px solid #00A302;
										text-align: center;
									}
								</style>
						<?php
							}
							if(isset($_GET["queryerror"]))
							{
								echo "در ثبت نظر دچار مشکل شدیم لطفا مجدد تلاش کنید";
						?>
								<style type="text/css">
									#comment_insert_massage
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
					
					
					<form action="check-insert-comment.php?pro_id=<?=$_GET["id"]?>" method="post">
						<div class="register_input">
							نام: <input type="text" name="name" id="name" class="comment_insert_form" 
										value=<?php if(isset($_GET["name"])) echo $_GET["name"]; ?>>
						</div> 
						<div class="register_input">
							ایمیل: <input type="email" name="mail" id="mail" class="comment_insert_form" 
										value=<?php if(isset($_GET["mail"])) echo $_GET["mail"]; ?>>
						</div>
						<div class="register_input">
							سایت: <input type="text" name="site" id="site" class="comment_insert_form" 
										value=<?php if(isset($_GET["site"])) echo $_GET["site"]; ?>>
						</div>
						<div class="register_input">
								متن نظر: <textarea name="comment" id="comment" cols="45" rows="5" style="background-color: #FDFFCF"><?php if(isset($_GET["comment"])) echo $_GET['comment']; ?></textarea>
						</div>
						<div class="register_input">
								<input type="submit" value="ارسال نظر" name="btn" id="comment_submit" >
						</div>
					</form>
				</div>
			</div>
			<div id="show_comment">
				<div id="show_comment_title">
					<img src="image/icons/icons8-messaging-500.png" width="60px" height="60px"> 		 نظرات کاربران
				</div>
				<?php
				$sql3="SELECT * FROM `comment` WHERE `id-product`='".$_GET["id"]."' && `status`=1 ";
				$result3=$connect->query($sql3);
				foreach($result3 as $rows3)
				{
				?>
					<div id="show_comment_top">
						<img src="image/icons/icons8-customer-100.png" width="50px" height="50px">
						<?=$rows3["name"] ?>
					</div>
					<div id="show_comment_down">
						<?=$rows3["comment"] ?>
					</div>
				<?php
				}
				?>

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