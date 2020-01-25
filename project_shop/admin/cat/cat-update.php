<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>update category</title>
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
	#update_btn
	{
		margin: auto;
		text-align: center;
		width: 65px;
		height: 35px;
		background: #373636;
		color: beige;
		border-radius: 10px;
		margin-top: 40px;
		margin-left: 10px;
		font-family: bhoma;	
		margin-bottom: 50px;
	}
	#update_name
	{
		font-size: 16px;
		font-family: bhoma;
		color: #484848;
		background-color: #FDFFA8;	
		height: 25px;
	}
	#text
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
	<div >
		اسم جدید مورد نظرتو وارد کن 
	</div>
	<center>
		<div id="text">
		<?php 
		include("../../funcs/connect.php");
		include("../../funcs/funcs.php");
		if(isset($_GET["id"]))
		{
			if(isset($_POST["update_btn"]))
			{
				if(empty($_POST["update_name"]))
				{
						echo "کادر نام محصول رو کامل کن ";
		?>
						<style type="text/css">
							#update_name
							{
								font-size: 16px;
								font-family: bhoma;
								color: #484848;
								background-color: #FF6568;	
								height: 25px;
							}
							#update_name:hover
							{
								background-color: #FDFFA8;
							}
							#text
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
					$str1=xss($_POST["update_name"]);
					$str2=toupper($str1);
					$sql="UPDATE `cat` SET `catname` = ? WHERE `cat`.`catid` = ?;";
					$result=$connect->prepare($sql);
					$result->bindvalue(1,$str2);
					$result->bindvalue(2,$_GET["id"]);
					$query=$result->execute();
					if($query)
					{
						header("location:cat-manage.php?updateok=1010");
						exit();
					}
					else
					{
						header("location:cat-manage.php?updatenot=2010");
						exit();
					}
				}
			}
		}
		else
		{
			header("location:cat-manage.php");
			exit();
		}
		?>
		</div>
		
		
	
	<form action="" method="post">
		<input type="text" id="update_name" name="update_name" value="<?php echo $_GET["name"]; ?>">
		<input type="submit" id="update_btn" name="update_btn" value="Update">
	</form>
	</center>
	
	
	
	<script type="text/javascript" src="../../funcs/jquery-3.4.1.min.js" ></script>
	<script type="text/javascript" >
		var new_name=document.getElementById("update_name");
		var new_btn=document.getElementById("update_btn");

		update_name.onmouseover=function(){
			update_name.style.backgroundColor= "#F7ED7C"; 
		 };
		update_name.onmouseout=function(){
			update_name.style.backgroundColor= "#FDFFA8"; 
		 };

		update_btn.onmouseover=function(){
			update_btn.style.backgroundColor= "#5A5A5A"; 
		 };
		update_btn.onmouseout=function(){
			update_btn.style.backgroundColor= "#373636"; 
		 }; 
		
		
	</script>
</body>
</html>