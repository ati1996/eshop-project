<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>cat-manage</title>
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
	#new-cat-btn
	{
		margin: auto;
		text-align: center;
		width: 80px;
		height: 35px;
		background: #373636;
		color: beige;
		border-radius: 10px;
		margin-top: 40px;
		margin-left: 10px;
		font-family: bhoma;	
		margin-bottom: 50px;
	}
	#new-cat-name
	{
		font-size: 16px;
		font-family: bhoma;
		color: #484848;
		background-color: #FDFFA8;	
		height: 25px;
	}
	#new-cat-img
	{
		margin-bottom: -50px;
	}
	#new-massege
	{
		height: 30px;
		width: 250px;
		color: #272727;
		margin: auto;
		text-align: center;
		border-radius: 5px;
	}
	#cat_all
	{
		margin: auto;
		width: 500px;
		height: 40px;
		margin-top: 60px;
		color: #484848;
	}
	#cat_id
	{
		width: 60px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right;
		border-top-right-radius: 10px;
		font-size: 18px;
		padding: 5px;
	}
	#cat_name
	{
		width: 175px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
		/*border-top-left-radius: 10px;*/
	}
	#cat_delete
	{
		width: 105px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right; 
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
	}
	#cat_update
	{
		width: 105px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right;
		margin-right: 5px;
		border-top-left-radius: 10px;
		font-size: 18px;
		padding: 5px;
	}
	#cat_all_row
	{
		margin: auto;
		width: 500px;
		margin-top: 15px;
		color: #484848;
	}
	#cat_id_row
	{
		width: 60px;
		height: 40px;
		background-color: #FCD4D5;
		text-align: center;
		float: right;
		font-size: 18px;
		padding: 5px;
		margin-top: 2px;
	}
	#cat_name_row
	{
		width: 175px;
		height: 40px;
		background-color: #FCD4D5;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
		margin-top: 2px;
	}
	#cat_delete_row
	{
		width: 115px;
		height: 52px;
		text-align: center;
		float: right; 
		margin-right: 5px;
		font-size: 18px;
		/*padding-top: 2px;*/
		/*margin-top: 2px;*/
	}
	#cat_update_row
	{
		width: 115px;
		height: 52px;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		/*padding-top: 2px;*/
		/*margin-top: 2px;*/
	}
	.cat_btn
	{
		margin: auto;
		text-align: center;
		width: 80px;
		height: 45px;
		background: #373636;
		color: beige;
		border-radius: 10px;
		font-family: bhoma;
	}
	#cat_massege
	{
		height: 30px;
		width: 250px;;
		color: #272727;
		margin: auto;
		text-align: center;
		border-radius: 5px;
	}
	
	
	
</style>
	
	<script type="text/javascript">
		function mydelete(id)
		{
			var x=confirm("واقعا میخوایی حذفش کنی ؟");
			if(x==true)
				{
					window.location.href="cat-delete.php?id="+id;
				}
			else
				{
					
				}
		}
	</script>
</head>

<body dir="rtl">
	
	<div id="new-massege">
	<?php
	include("../../funcs/connect.php");
	include("../../funcs/funcs.php");
	if(isset($_POST["new-cat-btn"]))
	{
		if(empty($_POST["new-cat-name"]))
		{
			echo "کادر نام محصول رو کامل کن ";
	?>
			<style type="text/css">
				#new-cat-name
				{
					font-size: 16px;
					font-family: bhoma;
					color: #484848;
					background-color: #FF6568;	
					height: 25px;
				}
				#new-cat-name:hover
				{
					background-color: #FDFFA8;
				}
				#new-massege
				{
					color: #272727;
					background-color: #FFB172;
					margin: auto;	
					text-align: center;
				}
			</style>
	<?php
		}
		else
		{
			$strl1=xss($_POST["new-cat-name"]);
			$str2=toupper($strl1);
			$sql="INSERT INTO `cat` (`catid`, `catname`) VALUES (NULL, ?);";
			$result=$connect->prepare($sql);
			$result->bindValue(1,$str2);
			$query=$result->execute();
			if($query)
			{
				echo "دسته رو با موفقیت ثبت کردیم";
	?>
				<style type="text/css">
					#new-massege
					{
						color: #272727;
						background-color: #94FF8A;
						margin: auto;	
						text-align: center;
					}
				</style>
	<?php
			}
			else
			{
				echo "در ثبت دسته با خطا مواجه شدیم";
	?>
				<style type="text/css">
					#new-massege
					{
						color: #272727;
						background-color: #FFB172;
						margin: auto;	
						text-align: center;
					}
				</style>
		<?php
			}
		}
	}
	?>
	</div>
	<div id="new-cat-img"><img src="../pic/icons8-plus-500.png" width="60px"></div>
	<form method="post" action="">
		نام دسته جدید <input type="text" id="new-cat-name" name="new-cat-name">
		<input type="submit" value="افزودن دسته" id="new-cat-btn" name="new-cat-btn">
	</form>
	
	
	
	<div id="cat_massege">
	<?php // پیغام نتیجه حذف 
		
		if(isset($_GET["delok"]))
		{
			echo "دسته رو با موفقیت حذف کردیم";
	?>
			<style type="text/css">
				#cat_massege
				{
					
					color: #272727;
					background-color: #94FF8A;
					margin: auto;	
					text-align: center;
				}
			</style>
	<?php
		}
		if(isset($_GET["delnot"]))
		{
			echo "در حذف دسته با خطا مواجه شدیم";
	?>
			<style type="text/css">
				#cat_massege
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
		
	<?php   // پیغام نتیجه آپدیت
		if(isset($_GET["updateok"]))
		{
			echo "دسته رو با موفقیت اصلاح کردیم";
	?>
			<style type="text/css">
				#cat_massege
				{
					
					color: #272727;
					background-color: #94FF8A;
					margin: auto;	
					text-align: center;
				}
			</style>
	<?php
		}
		if(isset($_GET["updatenot"]))
		{
			echo "در اصلاح دسته دچار مشکل شدیم";
	?>
			<style type="text/css">
				#cat_massege
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
	
	<div id="cat_all">
		<div id="cat_id">
			<b>شماره</b>
		</div>
		<div id="cat_name">
			<b>نام دسته</b>
		</div>
		<div id="cat_delete">
			<b> حذف</b>
		</div>
		<div id="cat_update">
			<b>اصلاح</b>
		</div>
	</div>
	<div id="cat_all_row">
	<?php
		$sql2="SELECT * FROM `cat` ORDER BY `cat`.`catid` DESC";
		$result2=$connect->query($sql2);
		
		$i=1;
		foreach($result2 as $rows)
		{
			$x=$rows["catid"];
	?>
			<div id="cat_id_row">
				<?php echo $i ?>
			</div>
			<div id="cat_name_row">
				<?php echo $rows["catname"]; ?>
			</div>
			<div id="cat_delete_row">
				<a href="#" onClick="mydelete(<?php echo $x; ?>);"> 
					<img src="../pic/icons8-trash-200.png" width="52px" alt="delete">
					<!--<input type="submit" value="delete" class="cat_btn"  name="delete_btn"  >-->
				</a>
			</div>
			<div id="cat_update_row">
				<a href="cat-update.php?id=<?php echo $rows["catid"]; ?> & name=<?php echo $rows["catname"]; ?>">
					<img src="../pic/icons8-edit-200.png" width="52px" alt="update">
					<!--<input type="submit" value="Update" class="cat_btn" name="update_btn_main">-->
				</a>
			</div>

	<?php	
			$i++;
		}
	?>
	</div> 

	<script type="text/javascript" src="../../funcs/jquery-3.4.1.min.js" ></script>
	<script type="text/javascript" >
		var new_name=document.getElementById("new-cat-name");
		var new_btn=document.getElementById("new-cat-btn");

		new_name.onmouseover=function(){
			new_name.style.backgroundColor= "#F7ED7C"; 
		 };
		new_name.onmouseout=function(){
			new_name.style.backgroundColor= "#FDFFA8"; 
		 };

		new_btn.onmouseover=function(){
			new_btn.style.backgroundColor= "#5A5A5A"; 
		 };
		new_btn.onmouseout=function(){
			new_btn.style.backgroundColor= "#373636"; 
		 }; 
		
		
	</script>
</body>
</html>