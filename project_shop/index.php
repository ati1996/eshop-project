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
	
	<!--shop box--> <!--popiular products-->
	
	<div id="shop_div">
		<div id="shop_div_header">
			محبوب ترین محصولات
		</div>
		<?php
		$sql3="SELECT * FROM `product` ORDER BY `product`.`score` DESC LIMIT 0,5";
		$result3=$connect->query($sql3);
		foreach($result3 as $rows3)
		{
		?>
			<a href="index-read-more.php?id=<?=$rows3["product-id"] ?>#read_more">
				<div class="shop_box">
					<div class="shop_box_img">
						<img src="admin/product/<?=$rows3["pic"] ?>" width="200px" height="200ox">
					</div>
					<div class="shop_box_text">
						<?=$rows3["name"] ?>
					</div>
				</div>
			</a>
		<?php	
		}
		?>
		
	</div>
	
	<!--contant and menu box-->
	
	<div id="contant_and_menus">
		
		<!--right menu box-->
		
		<?php include("index-right-menu.php"); ?>
		
		<!--contant box-->
		<a name="post"></a>
		
		<div id="contant">
			<div id="search_div">
			<div id="search_div_header">
				جستوجو محصولات
			</div>
			<form action="" method="post">
				نام محصول : <input type="text" name="search_name" class="search_cadrs">
				دسته محصول : <select name="search_cat" class="search_cadrs">
								<?php
									$sql ="SELECT * FROM `cat`";
									$result=$connect->query($sql);
									foreach ($result as $rows)
									{
										echo "<option value=".$rows["catid"].">".$rows["catname"]."</option>";
									}
								?>
							</select>
				قیمت : از <input type="text" name="search_min_name" class="search_cadrs">
				تا <input type="text" name="search_max_name" class="search_cadrs">
				<input type="submit" name="search_btn" value="جستوجو" id="search_submit"> 
			</form>
		</div>
<?php
			// به جای این که تمام قسمت هایی که برای صفحه اصلی نوشته بودیم برای دسته بندی ها هم بنویسیم 
			// میتوانیم شرط بگذاریم که اگر cat-id ست شده بود 
			// sql2 این مقدار را بگیرد 
			// و اگر نبود مقدار دیگری بگیرد 
			// و بقیه کد ها برای هر دو قسمت به طور یکسان انجام شود
			
			if(isset($_POST["search_btn"]))
			{
				$sql2="SELECT * FROM `product` WHERE `cat-id`='".$_POST["search_cat"]."' and `name` like '%".$_POST["search_name"]."%' and `price`>='".$_POST["search_min_name"]."' and `price`<='".$_POST["search_max_name"]."'";
			}
			elseif(isset($_GET["cat_id"]))
			{					
					$sql2="SELECT * FROM `product` WHERE `cat-id`='".$_GET["cat_id"]."'  ORDER BY `product`.`product-id` DESC LIMIT ".$_GET["page"].", 2";
			}
			elseif(isset($_GET["page"]))
			{
				$sql2="SELECT * FROM `product`  ORDER BY `product`.`product-id` DESC LIMIT ".$_GET["page"].", 2";
			}
			else
			{
				$sql2="SELECT * FROM `product`  ORDER BY `product`.`product-id` DESC LIMIT 0, 2";
			}
				$result2=$connect->query($sql2);
				foreach($result2 as $rows2)
				{
?>
					<!--contant header box-->
					
					
					<di class="contant_header">
						<a id="<?=$rows2["product-id"] ?>"></a>
						<div class="contant_header_text">
							<a href="index-read-more.php?id=<?=$rows2["product-id"] ?>#read_more">
								<img src="image/icons/icons8-new-500.png" width="90px" height="90px">	<?=$rows2["name"] ?>
							</a>
						</div>
					</di>

					<!--contant body box-->
					
					<div class="contant_body">
						<div class="contant_body_img">
							<img src="admin/product/<?=$rows2["pic"] ?>">
						</div>
						<div class="contant_body_text">
							<div><?=$rows2["shortcaption"] ?></div>
							<hr>
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
							<img src="image/icons/icons8-administrator-male-100.png" width="50px" height="50px;" title="نویسنده" > عاطفه اسدی
						</span>
						<?php
						if(isset($_SESSION["user_login"]))
						{
						?>
							<span class="contant_footer_score">
							<a href="check-scoring.php?id=<?=$rows2["product-id"] ?>#scoring" title="امتیاز دهی "><img src="image/icons/icons8-star-filled-500.png" width="50px" height="50px;" > <?=$rows2["score"] ?>
							</a>
							</span>
						<?php	
						}
						?>
						<span class="contant_footer_comente">
							<a href="index-read-more.php?id=<?=$rows2["product-id"] ?>#add_comment" title="نظرات"><img src="image/icons/icons8-comments-500.png" width="50px" height="50px;" >  اگه دوست داشتی نظر بده
							</a>
						</span>
						<span class="contant_footer_read_more">
							<a href="index-read-more.php?id=<?=$rows2["product-id"] ?>#read_more" title="ادامه مطلب"><img src="image/icons/icons8-continuous-mode-500.png" width="50px" height="50px;" > بریم به ادامه مطلب
							</a>
						</span>

					</div>
<?php
				}
?>
		</div>
		
		<!--left menu box-->
		
		<?php include("index-left-menu.php"); ?>	
		
	</div>
	
	<!--pages box-->
	
	<div id="pages_box">
		<?php
		if(isset($_GET["cat_id"]))
		{
			$sql4="SELECT * FROM `product` WHERE `cat-id`='".$_GET["cat_id"]."'";
		}
		else
		{
			$sql4="SELECT * FROM `product`";
		}
		$result4=$connect->query($sql4);
		$num2=$result4->rowcount();
		$k=2;
		for($j=0;$j<ceil($num2/$k);$j++)
		{
			if(isset($_GET["cat_id"]))
			{
		?>
				<a href="index.php?page=<?=($k*$j) ?> && cat_id=<?=$_GET["cat_id"] ?>">
					<div class="page_num"> <?=($j+1) ?> </div>
				</a>
		<?php	
			}
			else
			{
		?>		
				<a href="index.php?page=<?=($k*$j) ?>">		
					<div class="page_num"> <?=($j+1) ?> </div>
				</a>
		<?php		
			}
		}
		?>
	</div>
	 
	<!--footer box-->
	
	<?php include("index-footer.php"); ?>
	
	
</body>
</html>