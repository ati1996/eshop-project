<?php
	include("../../funcs/connect.php");
	include("../../funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
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
			font-size: 17px;
			font-family: bhoma;
			color: #2C2C2C;
			background-color: #FDFFA8;	
			height: 25px;
		}
		#comment
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
		
			if(isset($_GET["empty_name"]))
			{ 
				echo "کادر نام خالی است";
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
			if(isset($_GET["empty_comment"]))
			{ 
				echo "کادر متن نظر خالی است";
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
	
	<form action="check-edit-comment.php?id=<?=$_GET["id"] ?> & name=<?=$_GET["name"] ?> & comment=<?=$_GET["comment"] ?>" method="post">
		<div>
			نام : <input type="text" name="name" id="name" value="<?php if(isset($_GET["name"])) echo $_GET["name"]; ?>">
		</div>
		<br>
		<div>
			متن نظر : <textarea name="comment" id="comment" cols="50" rows="4">
							<?php if(isset($_GET["comment"])) echo $_GET["comment"]; ?>
					</textarea>
		</div>
		<br>
		<div>
			<input type="submit" name="btn" value="Edit" id="btn">
		</div>
	
	</form>
			 
</body>
</html>