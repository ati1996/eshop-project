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
		#title
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
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
</head>

<body dir="rtl">
	<div id="massage">
		<?php
		
			if(isset($_GET["empty_title"]))
			{
				echo "کادر عنوان خبر خالی است.";
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
			if(isset($_GET["empty_text"]))
			{
				echo "کادر متن خبر خالی است.";
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
			if(isset($_GET["query_error"]))
			{
				echo "ثبت با خطا مواجه شد.";
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
			if(isset($_GET["query_ok"]))
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
		?>
	</div>
	
	<form action="check-insert-news.php" method="post">
		<div id="titlediv">
			عنوان خبر <br> <textarea id="title" name="title" cols="50" rows="4"></textarea>
		</div>
		
		<div id="textdiv">
			متن خبر <textarea name="text" id="text" class="ckeditor" cols="45" rows="5"></textarea>
		</div>
		<br>
		<div id="btndiv">
			<input type="submit" value="افزودن خبر" name="btn" id="btn">
		</div>
	</form>
</body>
</html>