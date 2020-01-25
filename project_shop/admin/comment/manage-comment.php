<?php
	include("../../funcs/connect.php");
	include("../../funcs/funcs.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
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
		#massege
		{
			height: 30px;
			width: 300px;;
			color: #272727;
			margin: auto;
			text-align: center;
			border-radius: 5px;
			margin-bottom: 15px;
		}
		#comment_all
		{
			margin: auto;
			width: 900px;
			height: 50px;
			color: #484848;
			margin-bottom: 20px;
		}
		#comment_number
		{
			width: 45px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			border-top-right-radius: 10px;
			font-size: 18px;
			padding: 5px 0px 5px 0px;
		}
		#comment_pro_name
		{
			width: 100px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#comment_text
		{
			width: 325px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#comment_sender
		{
			width: 160px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#comment_release
		{
			width: 60px;
			height: 40px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			background-color: #FFAAAC;
		}
		#comment_delete
		{
			width: 60px;
			height: 40px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			background-color: #FFAAAC;
		}
		#comment_edit
		{
			width: 60px;
			height: 40px;
			text-align: center;
			float: right;
			border-top-left-radius: 10px;
			font-size: 18px;
			padding: 5px;
			margin-right: 5px;
			background-color: #FFAAAC;
		}
		#comment_all_row
		{
			margin: auto;
			width: 900px;
			height: 110px;
			color: #484848;
			margin-bottom: 10px;
			margin-top: 10px;
		}
		#comment_number_row
		{
			width: 45px;
			height: 100px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			font-size: 18px;
			padding: 5px 0px 5px 0px;
		}
		#comment_pro_name_row
		{
			width: 100px;
			min-height: 100px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#comment_text_row
		{
			width: 325px;
			height: 100px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			overflow-y: scroll;
		}
		#comment_sender_row
		{
			width: 160px;
			height: 100px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#comment_sender_row a
		{
			text-decoration: none;
			color: #760001;
		}
		#comment_release_row
		{
			width: 70px;
			height: 50px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
		}
		#comment_release_row img
		{
			margin-top: -5px;
		}
		#comment_delete_row
		{
			width: 70px;
			height: 50px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
		}
		#comment_delete_row img
		{
			margin-top: -5px;
		}
		#comment_edit_row
		{	width: 70px;
			height: 50px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
		}
		#comment_edit_row img
		{
			margin-top: -5px;
		}
	</style>
		  

<body>
	
	<div id="massege">
		<?php
			if(isset($_GET["release_ok"]))
			{
				echo "نظر با موفقیت منتشر شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #94FF8A;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
			if(isset($_GET["release_error"]))
			{
				echo "در منتشر کردن نظر با خطا مواجه شدیم ";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #FFB172;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
			if(isset($_GET["delete_ok"]))
			{
				echo "نظر با موفقیت حذف شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #94FF8A;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
			if(isset($_GET["delete_error"]))
			{
				echo "در حذف کردن نظر با خطا مواجه شدیم ";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #FFB172;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
			if(isset($_GET["edit_ok"]))
			{
				echo "نظر با موفقیت ویرایش شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #94FF8A;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
			if(isset($_GET["edit-error"]))
			{
				echo "در ویرایش کردن نظر با خطا مواجه شدیم ";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #FFB172;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
			if(isset($_GET["unrelease_ok"]))
			{
				echo "نظر با موفقیت از حالت انتشار برداشته شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #94FF8A;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
			if(isset($_GET["unrelease_error"]))
			{
				echo "در عدم منتشر کردن نظر با خطا مواجه شدیم ";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #FFB172;
						margin: auto;	
						text-align: center;
						margin-bottom: 15px;
					}
				</style>
		<?php
			}
		?>
	</div>
	
	<div id="comment_all">
		<div id="comment_number">
			<b>شماره</b>
		</div>
		<div id="comment_pro_name">
			<b>اسم محصول</b>
		</div>
		<div id="comment_text">
			<b>متن پیام</b>
		</div>
		<div id="comment_sender">
			<b>فرستنده</b>
		</div>
		<div id="comment_release">
			<b>انتشار</b>
		</div>
		<div id="comment_delete">
			<b>حذف</b>
		</div>
		<div id="comment_edit">
			<b>ویرایش</b>
		</div>
	</div>
	
	<?php
		$i=1;
		$sql="SELECT * FROM `comment` ORDER BY `comment`.`id` DESC";
		$result=$connect->query($sql);
		foreach($result as $rows)
		{
	?>
		<div id="comment_all_row">		
			<div id="comment_number_row">
				<?=$i ?>
			</div>
			<div id="comment_pro_name_row">
	<?php
				$sql2="SELECT * FROM `product` WHERE `product-id`='".$rows["id-product"]."'";
				$result2=$connect->query($sql2);
				foreach($result2 as $rows2)
				{
					echo $rows2["name"];
				}
	?>		
			</div>
			<div id="comment_text_row">
				<?=$rows["comment"] ?>
			</div>
			<div id="comment_sender_row">
				<?=$rows["name"] ?>
				<br>
				<?=$rows["mail"] ?>
				<br>
				<a href="http://<?=$rows["site"] ?>" target="_blank"><?=$rows["site"] ?></a>
			</div>
			<div id="comment_release_row">
	<?php
				if($rows["status"]==1)
				{
	?>				<a href="check-unrelease-comment.php?id=<?=$rows["id"] ?>">
						<img src="../pic/icons8-checkmark-500.png" width="60px" alt="release" title="عدم انتشار">
					</a>
	<?php
				}
				elseif($rows["status"]==0)
				{
	?>		
					<a href="check-release-comment.php?id=<?=$rows["id"] ?>">
						<img src="../pic/icons8-unchecked-checkbox-100.png" width="60px" alt="release" title="انتشار">
					</a>
	<?php
				}
	?>	
			</div>
			<div id="comment_delete_row">
				<a href="check-delete-comment.php?id=<?=$rows["id"] ?>">
					<img src="../pic/icons8-delete-bin-100.png" width="60px" alt="delete">
				</a>
			</div>
			<div id="comment_edit_row">
				<a href="edit-comment.php?id=<?=$rows["id"] ?> & name=<?=$rows["name"] ?> & comment=<?=$rows["comment"] ?>">
					<img src="../pic/icons8-edit-200.png" width="60px" alt="edit">
				</a>
			</div>
		</div>
	<?php
		$i++;
		}
		
	?>
	
</body>
</html>