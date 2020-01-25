<div id="left_menu">
	<!--search box-->
	
	<div class="left_menu_top">
		<div class="left_menu_top_text">
			<img src="image/icons/icons8-people-100.png" width="60px" height="60px"> سایت دوستامون
		</div>
	</div>
			
		<div class="left_menu_center">
			<div class="left_menu_center_text">
				<ul>
					<?php
					$sql="SELECT * FROM `friends-link`";
					$result=$connect->query($sql);
					foreach($result as $rows)
					{
					?>
						<li>
							<a href="http://<?=$rows["site"] ?>" target="_blank"><?=$rows["name"] ?></a>
						</li>
					<?php	
					}
					?>
				</ul>
			</div>
		</div>
	
	
	<?php
	if(isset($_SESSION["user_login"]))	
	{
	?>
		<div class="left_menu_top">	
			<div class="left_menu_top_text">
				<img src="image/icons/icons8-basket-500.png" width="60px" height="60px"> سبد خرید شما
			</div>
		</div>
			
		<div class="left_menu_center">
			<div id="left_menu_basket_massage">
				<?php
				if(isset($_GET["delete_form_basket_error"]))
				{
					echo "در حذف محصول از سبد خرید دچار مشکل شدیم";
				?>
					<style type="text/css">
						#left_menu_basket_massage
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>
				<?php
				}
				if(isset($_GET["delete_form_basket_ok"]))
				{
					echo "محصول با موفقیت از سبد خرید حذف شد";
				?>
					<style type="text/css">
						#left_menu_basket_massage
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
				
			<div class="left_menu_basket_all">
				<div class="left_menu_basket_num">
					شماره
				</div>
				<div class="left_menu_basket_name">
					محصول
				</div>
				<div class="left_menu_basket_price">
					قیمت
				</div>
				<div class="left_menu_basket_number">
					تعداد
				</div>
				<div class="left_menu_basket_delete">
					حذف
				</div>
			</div>
			<?php
			$sql2="SELECT * FROM `basket` WHERE `user_id`=? AND `status`=0 ";
			$result2=$connect->prepare($sql2);
			$result2->bindvalue(1,$_SESSION["user_login_id"]);
			$result2->execute();
			$i=1;
			$total_price=0;
			$total_number=0;
			foreach($result2 as $rows2)
			{
				$total_price+=$rows2["price"];
				$total_number+=$rows2["number"];
			?>	
				<div class="left_menu_basket_all_row">
					<div class="left_menu_basket_num_row">
						<?=$i?>
					</div>
					<div class="left_menu_basket_name_row">
						<?= returnNameProductById($rows2["product_id"])?>
					</div>
					<div class="left_menu_basket_price_row">
						<?=$rows2["price"]?>
					</div>
					<div class="left_menu_basket_number_row">
						<?=$rows2["number"]?>
					</div>
					<div class="left_menu_basket_delete_row">
						<a href="check-delete-from-basket.php?id=<?=$rows2["id"]?>">	
							<img src="image/icons/icons8-shopping-basket-remove-500.png" width="50px" height="50px">
						</a>
					</div>
				</div>	
			<?php	
				$i++;
			}
			if(isset($rows2["id"]))
			{
			?>	
				<div id="left_menu_basket_total">
					<span style="font-weight: bold">جمع کل مبلغ : <?=$total_price ?> <span style="color: #FF0004"> تومان </span></span>
					<br>
					<span style="font-weight: bold">جمع کل تعداد : <?=$total_number ?></span>
					<br>
			<?php
					if($total_price>=30000)
					{
						$discount=($total_price*20)/100;
						$finaly_price=$total_price - $discount;
			?>
						<span style="font-weight: bold">مبلغ تخفیف : <?=$discount ?> <span style="color: #FF0004"> تومان </span></span>
			<?php		
					}
					else
					{
			?>		
						<span style="font-weight: bold">مبلغ تخفیف : <span style="color: #FF0004"> بابت اعمال تخفیف 20درصدی ، مبلغ کل باید بیشتر از 30000 تومان باشد </span></span>
			<?php	
						$finaly_price=$total_price;
					}
					
			?>	
					<br>
					<hr>
					<span style="font-weight: bold">جمع کل نهایی : <?=$finaly_price ?> <span style="color: #FF0004"> تومان </span></span>	
				</div>
				<div id="left_menu_basket_div_submit">
					<form action="order-entry.php" method="post">
						<input type="submit" id="left_menu_basket_submit" value="ثیت خرید" name="basket_submit">
					</form>
				</div>
			<?php
			}
			else
			{
			?>
				<div style="text-align: center; font-weight: bold; margin: auto; color: #FF0004; margin-bottom: 10px; ">
					سبد خرید شما خالی  می باشد.
				</div>
			<?php	
			}
			?>			
		</div>
	
	
	<div class="left_menu_top">
		
		<div class="left_menu_top_text">
			<img src="image/icons/icons8-window-search-500.png" width="60px" height="60px"> پیگیری سفارش
		</div>
	</div>
			
	<div class="left_menu_center">
		<div class="left_menu_center_text_code">
			<div id="left_menu_track_code_massage">
				<?php
				if(isset($_GET["empty_cadr_track_code"]))
				{
					echo "کادر زیر را کامل کنید";
				?>
					<style type="text/css">
						#left_menu_track_code_massage
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>
				<?php
				}
				if(isset($_GET["error_cadr_track_code"]))
				{
					echo "چنین سفارشی برای شما وجود ندارد";
				?>
					<style type="text/css">
						#left_menu_track_code_massage
						{
							color:#373737;
							background-color: #FFB7B8;
							border: 3px solid #FF0000;
							text-align: center;
						}
					</style>
				<?php
				}
				if(isset($_GET["unsend_cadr_track_code"]))
				{
					echo "سفارش شما در حال آماده سازی است و هنوز ارسال نشده است";
				?>
					<style type="text/css">
						#left_menu_track_code_massage
						{
							color:#373737;
							background-color: #B9FFB7;
							border: 3px solid #00A302;
							text-align: center;
						}
					</style>
				<?php
				}
				if(isset($_GET["send_cadr_track_code"]))
				{
					echo "سفارش شما به اداره پست تحویل داده شده است";
				?>
					<style type="text/css">
						#left_menu_track_code_massage
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
			برای پیگیری سفارش لطفا کد خود را در کادر زیر وارد کنید 
			<br>
			<br>
			<form action="check-track-order-code.php" method="post">
				<input type="text" name="track_order" class="register_input_cadr">
				<br>
				<input type="submit" name="btn" id="track_order_btn" value="پیگیری">
			</form>
		</div>
	</div>
	
	<?php	
	}
	?>	
</div>