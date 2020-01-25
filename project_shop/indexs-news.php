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
			
			<?php
			$sql3="SELECT * FROM `news` WHERE `id`=? ";
			$result3=$connect->prepare($sql3);
			$result3->bindvalue(1,$_GET["id"]);
			$result3->execute();
			foreach($result3 as $rows3)
			{
			?>	
				<di class="contant_header">
					<div class="contant_header_text">
					<img src="image/icons/icons8-single-page-mode-500.png" width="90px" height="90px">	<?=$rows3["title"] ?>

					</div>
				</di>
					
				<!--contant body box-->
			
				<div class="contant_body">
					<div class="contant_body_text">
						<?=$rows3["text"] ?>
					</div>

				</div>
			<?php	
			}
			?>

				
				<!--contant footer box-->
			
				<div class="contant_footer">
					<span class="contant_footer_wirter">
						کی اینو نوشته : عاطفه اسدی
					</span>

				</div>

		</div>
		
		<!--left menu box-->
		
		<?php include("index-left-menu.php"); ?>	
		
	</div>
	
	<!--pages box-->
	 
	<!--footer box-->
	
	<?php include("index-footer.php"); ?>
	
	
</body>
</html>