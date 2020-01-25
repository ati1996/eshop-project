<?php
	include("../../funcs/connect.php");
	include("../../funcs/funcs.php");
?>
<!doctype html>
<html><head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script type="text/javascript" src="../../funcs/editor/editor/ckeditor.js"></script>
	<script type="text/javascript" src="../../funcs/jquery-3.4.1.min.js"></script>
	
	<!--این قسمت پایین نمیدونم چرا کار نمیکنه کدش دقیقا مثل کد سورس فیلم لرن فایلزه و کارش اینه که وقتی صفحه کامل لود شد مقدار دسته رو همون مقدار دسته ی محصول انتخابی قرار میده-->
	<!--<script type="text/javascript">
	$(document).ready(function() {
    	$("#cat").val("<?php /*?><?php echo $_GET["cat"]; ?><?php */?>");
		});
	</script>-->
	
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
		#name
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
			height: 25px;
		}
		#cat
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
			height: 25px;
		}
		#price
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
			height: 25px;
		}
		#pic
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;	
		}
		#shortcaption
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
		}
		#score
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
			height: 25px;
		}
		#btn
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
		#massage
		{
			height: 30px;
			width: 250px;;
			color: #272727;
			margin: auto;
			text-align: center;
			border-radius: 5px;
		}

	</style>
	
	
	
</head>

<body dir="rtl">
	<div id="massage">
		<?php
		
			if(isset($_GET["empty_name"]))
			{ 
				echo "کادر نام محصول خالی است";
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
		
			if(isset($_GET["empty_price"]))
			{ 
				echo "کادر قیمت محصول خالی است";
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
		
			if(isset($_GET["upload_unable"]))
			{
				echo "عکسی آپلود نشد";
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
		
			if(isset($_GET["pasvanderror"]))
			{
				echo "پسوند عکس نامعتبر است";
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
		
			if(isset($_GET["moveerror"]))
			{
				echo "خطا در آپلود فایل";
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
	
	<form action="check-update-product.php?id= <?= $_GET["id"]; ?> & name= <?= $_GET["name"] ?> & shortcaption=<?= $_GET["shortcaption"] ?> & caption=<?= $_GET["caption"] ?> & cat= <?= $_GET["cat"]?> & price= <?= $_GET["price"]?> & catname= <?= $_GET["catname"]?>" method="post" enctype="multipart/form-data">
		<div id="namediv">
			نام محصول <input type="text" id="name" name="name" value="<?php if(isset($_GET["name"])) echo $_GET["name"]; ?>">
		</div>
		<br>
		
		<div id="catdiv"> 
			دسته <select id="cat" name="cat">
				<?php
					$sql ="SELECT * FROM `cat`";
					$result=$connect->query($sql);
					foreach ($result as $rows)
					{
						echo "<option value=".$rows["catid"]." >".$rows["catname"]."</option>";
					}
				?>
				</select>
			
			<p> <font color=#FF0004>حواست باشه</font> که اسم دسته ی محصول قبل از آپدیت جدید <?php echo $_GET["catname"]; ?> بود </p>
		</div>
		<br>
		
		<div id="pricediv"> 
			قیمت <input type="text" id="price" name="price" value="<?php if(isset($_GET["price"])) echo $_GET["price"]; ?>">
		</div>
		<br>
		
		<div id="picdiv">
			تصویر <input type="file" id="pic" name="pic">
		</div>
		<br>
		
		<div id="short_captiondiv">
			توضیح مخنصر <br> <textarea id="shortcaption" name="shortcaption" cols="50" rows="4">
								<?php if(isset($_GET["shortcaption"])) echo $_GET["shortcaption"]; ?>
							</textarea>
		</div>
		
		<div id="captiondiv">
			توضیحات <textarea name="caption" id="caption" class="ckeditor" cols="45" rows="5" >
						<?php if(isset($_GET["caption"])) echo $_GET["caption"]; ?>
					</textarea>
		</div>
		<br>
		
		<div id="scorediv">
			امتیاز <input type="text" id="score" name="score">
		</div>
		<br>
		
		<div id="btndiv">
			<input type="submit" value="Update" name="btn" id="btn">
		</div>
		<br>
		
	
	</form>

</body>
</html>