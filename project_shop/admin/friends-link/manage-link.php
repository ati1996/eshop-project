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
			width: 250px;
			text-align: center;	
			color: #272727;
			margin: auto;
			border-radius: 5px;
		}
		#new_link
		{
			width: 240px;
			height: 290px;
			float: right;
			margin-left: 20px;
			margin-top: 20px;
			padding: 5px;
		}
		#manage_link
		{
			width: 550px;
			height: 500px;
			float: right;
			margin-top: 40px;
			font-size: 16px;
		}
		#new_name
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
			height: 25px;
		}
		#new_site
		{
			font-size: 16px;
			font-family: bhoma;
			color: #484848;
			background-color: #FDFFA8;	
			height: 25px;
		}
		#new_btn
		{
			margin: auto;
			text-align: center;
			width: 80px;
			height: 35px;
			background: #373636;
			color: beige;
			border-radius: 10px;
			margin-top: 10px;
			margin-left: 10px;
			font-family: bhoma;	
			margin-bottom: 50px;
		}
		#all_link
		{
			width: 550px;
			margin: auto;
			height: 50px;
			color: #484848;
			margin-bottom: 20px;
		}
		#number_link
		{
			width: 45px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			border-top-right-radius: 10px;
			font-size: 18px;
			padding: 5px 0px 5px 0px;
			font-weight: bold;
		}
		#name_link
		{
			width: 175px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			font-weight: bold;
		}
		#site_link
		{
			width: 205px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			font-weight: bold;
		}
		#delete_link
		{
			width: 80px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			border-top-left-radius: 10px;
			font-size: 18px;
			padding: 5px;
		}
		#all_link_row
		{
			width: 550px;
			margin: auto;
			height: 50px;
			color: #484848;
			margin-top: 5px;	
		}
		#number_link_row	
		{
			width: 45px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			font-size: 18px;
			padding: 5px 0px 5px 0px;
		}
		#name_link_row
		{
			width: 175px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#site_link_row
		{
			width: 205px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#delete_link_row
		{
			width: 80px;
			height: 40px;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#delete_link_row img
		{
			margin-top: -9px;
		}
	</style>
</head>

<body dir="rtl">
	<div id="massage">
		<?php
		if(isset($_GET["empty_name"]))
		{
			echo "کادر نام پیوند رو کامل کن";
		?>
			<style type="text/css">
				#new_name
				{
					font-size: 16px;
					font-family: bhoma;
					color: #484848;
					background-color: #FF6568;	
					height: 25px;
				}
				#new_name:hover
				{
					background-color: #FDFFA8;
				}
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
		if(isset($_GET["empty_site"]))
		{
			echo "کادر نام سایت رو کامل کن";
		?>
			<style type="text/css">
				#new_site
				{
					font-size: 16px;
					font-family: bhoma;
					color: #484848;
					background-color: #FF6568;	
					height: 25px;
				}
				#new_site:hover
				{
					background-color: #FDFFA8;
				}
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
		if(isset($_GET["new_query_error"]))
		{
			echo "در ثبت پیوند جدید دچار مشکل شدیم";
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
		if(isset($_GET["new_query_ok"]))
		{
			echo "پیوند رو با موفقیت ثبت کردیم";
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
		if(isset($_GET["delete_error"]))
		{
			echo "در حذف پیوند دچار مشکل شدیم";
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
		if(isset($_GET["delete_ok"]))
		{
			echo "پیوند رو با موفقیت حذف کردیم";
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
	<div id="new_link">
		<form action="check-new-link.php" method="post">
			<div >
				نام پیوند جدید <br> <input type="text" name="new_name" id="new_name"> 
			</div>
			<div>
				 آدرس پیوند جدید <br> <input type="text" name="new_site" id="new_site">
			</div>
			<br>
			<div>
				<input type="submit" name="btn" id="new_btn" value="افزودن پیوند">
			</div>
			
		</form>
	</div>
	<div id="manage_link">
		<div id="all_link">
			<div id="number_link">
				شماره
			</div>
			<div id="name_link">
				نام پیوند
			</div>
			<div id="site_link">
				سایت پیوند
			</div>
			<div id="delete_link">
				حذف
			</div>
		</div>
		
		<?php
		$sql="SELECT * FROM `friends-link`";
		$result=$connect->query($sql);
		$i=1;
		foreach($result as $rows)
		{
		?>
			<div id="all_link_row">
				<div id="number_link_row">
					<?=$i ?>
				</div>
				<div id="name_link_row">
					<?=$rows["name"] ?>
				</div>
				<div id="site_link_row">
					<?=$rows["site"] ?>
				</div>
				<div id="delete_link_row">
					<a href="check-delete-link.php?id=<?=$rows["id"] ?>"><img src="../pic/icons8-delete-bin-100.png" width="60px" height="60px"></a>
				</div>
			</div>
		<?php
			$i++;
		}
		?>
	</div>
	
</body>
</html>