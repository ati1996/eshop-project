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
	#user_all
	{
		margin: auto;
		width: 900px;
		height: 50px;
		color: #484848;
		margin-bottom: 10px;
	}
	#user_number
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
	#user_username
	{
		width: 130px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
	}
	#user_name
	{
		width: 130px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
	}
	#user_phone
	{
		width: 110px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
	}
	#user_mail
	{
		width: 210px;
		height: 40px;
		background-color: #FFAAAC;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
	}
	#user_delete
	{
		width: 85px;
		height: 40px;
		text-align: center;
		float: right; 
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
		background-color: #FFAAAC;
	}
	#user_update
	{
		width: 85px;
		height: 40px;
		text-align: center;
		float: right;
		border-top-left-radius: 10px;
		font-size: 18px;
		padding: 5px;
		margin-right: 5px;
		background-color: #FFAAAC;
	}
	#user_all_row
	{
		margin: auto;
		width: 900px;
		height: 50px;
		color: #484848;
		margin-bottom: 10px;
	}
	#user_number_row
	{
		width: 45px;
		height: 40px;
		background-color: #FCD4D5;
		text-align: center;
		float: right;
		font-size: 18px;
		padding: 5px 0px 5px 0px;
		margin-top: 10px;	
	}
	#user_username_row
	{
		width: 130px;
		height: 40px;
		background-color: #FCD4D5;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
		margin-top: 10px;
	}
	#user_name_row
	{
		width: 130px;
		height: 40px;
		background-color: #FCD4D5;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
		margin-top: 10px;
	}
	#user_phone_row
	{
		width: 110px;
		height: 40px;
		background-color: #FCD4D5;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
		margin-top: 10px;
	}
	#user_mail_row
	{
		width: 210px;
		height: 40px;
		background-color: #FCD4D5;
		text-align: center;
		float: right;
		margin-right: 5px;
		font-size: 18px;
		padding: 5px;
		margin-top: 10px;
	}
	#user_delete_row
	{
		width: 103px;
		height: 50px;
		text-align: center;
		float: right; 
		margin-right: 5px;
		font-size: 18px;
		/*padding-top: 2px;*/
		margin-top: 10px;
	}
	#user_update_row
	{
		width: 103px;
		height: 50px;
		text-align: center;
		float: right;
		font-size: 18px;
		/*padding-top: 2px;*/
		margin-top: 10px;
	}
	.user_btn
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
	
</style>
	
<script type="text/javascript">
	function mydelete( id )
	{
		var x=confirm("واقعا میخوایی حذفش کنی ؟");
		if(x==true)
			{
				window.location.href="delete-user.php?id="+id;
			}
		else
			{
					
			}
			
	}
</script>
</head>

<body>
	
	<div id="massege">
	<?php
		if(isset($_GET["deleteerror"]))
		{
			echo "در حذف کاربر مورد نظرت با خطا مواجه شدیم";
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
		if(isset($_GET["deleteok"]))
		{
			echo "کاربر مورد نظرت رو با موفقیت حذف کردیم";
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
		if(isset($_GET["update_error"]))
		{
			echo "در آپدیت کاربر مورد نظرت با خطا مواجه شدیم";
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
		if(isset($_GET["update_ok"]))
		{
			echo "کاربر مورد نظرت رو با موفقیت آپدیت کردیم";
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
	?>
	</div>

	<div id="user_all">
		<div id="user_number">
			<b>شماره</b>
		</div>
		<div id="user_username">
			<b>نام کاربری</b>
		</div>
		<div id="user_name">
			<b>نام و نام خانوادگی</b>
		</div>
		<div id="user_phone">
			<b>شماره همراه</b>
		</div>
		<div id="user_mail">
			<b>ایمیل</b>
		</div>
		<div id="user_delete">
			<b>حذف</b>
		</div>
		<div id="user_update">
			<b>آپدیت</b>
		</div>
	</div>
	
	<div id="user_all_row">
		<?php
		$sql="SELECT * FROM `users`";
		$result=$connect->query($sql);
		$i=1;
		foreach($result as $rows)
		{
			$x=$rows["id"];
		?>
		<div id="user_number_row">
			<b><?=$i ?></b>
		</div>
		<div id="user_username_row">
			<b><?=$rows["username"]?></b>
		</div>
		<div id="user_name_row">
			<b><?=$rows["fname"] ?> <?=$rows["lname"] ?></b>
		</div>
		<div id="user_phone_row">
			<b><?=$rows["phone"]?></b>
		</div>
		<div id="user_mail_row">
			<b><?=$rows["mail"]?></b>
		</div>
		<div id="user_delete_row">
			<a href="#" onClick="mydelete(<?= $x; ?>); ">
				<img src="../pic/icons8-delete-male-user-100.png" width="50px" alt="delete">
				<!--<input type="submit" value="Delete" class="user_btn"  name="delete_btn"  >-->
			</a>
		</div>
		<div id="user_update_row">
			<a href="update-user.php?id=<?=$rows["id"]?> & fname=<?=$rows["fname"]?> & lname=<?=$rows["lname"] ?> & mail=<?=$rows["mail"] ?> & phone=<?=$rows["phone"] ?> & username=<?=$rows["username"] ?> & password=<?=$rows["password"] ?>">
				<img src="../pic/icons8-edit-user-100 (1).png" width="50px" alt="update">
				<!--<input type="submit" value="Update" class="user_btn" name="update_btn">-->
			</a>
		</div>
		<?php
			$i++;
		}
		?>
		
	</div>

</body>
</html>