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
		
		<div id="contant">
				
				<!--contant header box-->
				
				<di class="contant_header">
					<div class="contant_header_text">
						
					</div>
				</di>
					
				<!--contant body box-->
			
				<div class="contant_body">
					<div class="contant_body_img">
						
					</div>
					<div class="contant_body_text">
						
					</div>

				</div>
				
				<!--contant footer box-->
			
				<div class="contant_footer">
					<span class="contant_footer_wirter">
						کی اینو نوشته : عاطفه اسدی
					</span>
					<span class="contant_footer_comente">
						<a href="#">اگه دوست داشتی نظر بده</a>
					</span>
					<span class="contant_footer_read_more">
						<a href="index-read-more.php?id=<?=$rows2["product-id"] ?>">بریم به ادامه مطلب</a>
					</span>

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