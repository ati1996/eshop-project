<?php
	include("../../funcs/connect.php");
	include("../../funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
	<script type="text/javascript" src="../../funcs/editor/editor/ckeditor.js"></script>
<meta charset="utf-8">
<title>Untitled Document</title>
	
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

	</style>
	
	<script type="text/javascript" src="../../funcs/jquery-3.4.1.min.js" ></script>
	
	
	
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
		
			if(isset($_GET["insert_yes"]))
			{
				echo "با موفقیت ثبت شد";
		?>
				<style type="text/css">
					#massage
					{
						color: #272727;
						background-color: #94FF8A;
						margin: auto;	
						text-align: center;
					}
				</style>
	<?php
			}
		
			if(isset($_GET["insert_no"]))
			{
				echo "ثبت با خطا مواجه شد";
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
		
			if(isset($_GET["pic_cannot_upload"]))
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
		
			if(isset($_GET["passvand_no"]))
			{
				echo "پسوند عکس نا معنبر است";
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
			
			if(isset($_GET["dont_move"]))
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
	
	<form action="check-insert-product.php" method="post" enctype="multipart/form-data">
		<div id="namediv">
			نام محصول <input type="text" id="name" name="name" >
		</div>
		<br>
		
		<div id="catdiv">
			دسته <select id="cat" name="cat" >
				<?php
					$sql ="SELECT * FROM `cat`";
					$result=$connect->query($sql);
					foreach ($result as $rows)
					{
						echo "<option value=".$rows["catid"].">".$rows["catname"]."</option>";
					}
					
				?>
				</select>
		</div>
		<br>
		
		<div id="pricediv"> 
			قیمت <input type="text" id="price" name="price">
		</div>
		<br>
		
		<div id="picdiv">
			تصویر <input type="file" id="pic" name="pic">
		</div>
		<br>
		
		<div id="short_captiondiv">
			توضیح مخنصر <br> <textarea id="shortcaption" name="shortcaption" cols="50" rows="4"></textarea>
		</div>
		
		<div id="captiondiv">
			توضیحات <textarea name="caption" id="caption" class="ckeditor" cols="45" rows="5"></textarea>
		</div>
		<br>
		
		<div id="scorediv">
			امتیاز <input type="text" id="score" name="score">
		</div>
		<br>
		
		<div id="btndiv">
			<input type="submit" value="افزودن محصول" name="btn" id="btn">
		</div>
		<br>
		
	
	</form>

</body>
</html>