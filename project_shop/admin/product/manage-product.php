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
		#product_all
		{
			margin: auto;
			width: 900px;
			height: 50px;
			color: #484848;
			margin-bottom: 10px;
		}
		#product_number
		{
			width: 50px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			border-top-right-radius: 10px;
			font-size: 18px;
			padding: 5px;
		}
		#product_name
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
		#product_cat
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
		#product_price
		{
			width: 95px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#product_pic
		{
			width: 165px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#product_delete
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
		#product_update
		{
			width: 85px;
			height: 40px;
			text-align: center;
			float: right;
			margin-right: 5px;
			border-top-left-radius: 10px;
			font-size: 18px;
			padding: 5px;
			background-color: #FFAAAC;
		}
		#product_all_row
		{
			margin: auto;
			width: 900px;
			height: 160px;
			margin-top: 5px;
			color: #484848;
		}
		#product_number_row
		{
			width: 50px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			font-size: 18px;
			padding: 5px;
			margin-top: 57px;
		}
		#product_name_row
		{
			width: 160px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			margin-top: 57px;
		}
		#product_cat_row
		{
			width: 160px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			margin-top: 57px;
		}
		#product_price_row
		{
			width: 95px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			margin-top: 57px;
		}
		#product_pic_row
		{
			width: 165px;
			height: 40px;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#product_delete_row
		{
			width: 90px;
			height: 52px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			/*padding-top: 2px;*/
			margin-top: 57px;
		}
		#product_update_row
		{
			width: 90px;
			height: 52px;
			text-align: center;
			float: right;
			margin-right: 10px;
			font-size: 18px;
			/*padding-top: 2px;*/
			margin-top: 57px;
		}
		#product_pic_row img
		{
			width: 150px;
			height: 150px;
		}
		.product_btn
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
	#massege
	{
		height: 30px;
		width: 250px;;
		color: #272727;
		margin: auto;
		text-align: center;
		border-radius: 5px;
		margin-bottom: 15px;
	}
	
	</style>
	
	<script type="text/javascript">
		function mydelete( id )
		{

			var x=confirm("واقعا میخوایی حذفش کنی ؟");
			if(x==true)
				{
					window.location.href="delete-product.php?id="+id;
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
			echo "در حذف محصول با خطا مواجه شدیم";
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
			echo "محصول رو با موفقیت حذف کردیم";
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
		
		if(isset($_GET["updateok"]))
		{
			echo " با موفقیت آپدیت شد " . $_GET["catname"] . " از دسته ی " . $_GET["name"] . " محصول ";
	?>
			<style type="text/css">
				#massege
				{
					width: 400px;
					color: #272727;
					background-color: #94FF8A;
					margin: auto;	
					text-align: center;
					margin-bottom: 15px;
				}
			</style>
	<?php
		}
		
		if(isset($_GET["updateerror"]))
		{
			echo " با خطا مواجه شد " . $_GET["catname"] . " از دسته ی " . $_GET["name"] . " آپدیت محصول ";
	?>
			<style type="text/css">
				#massege
				{
					width: 400px;
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
	
	<div id="product_all"> 
		<div id="product_number">
			<b>شماره</b>
		</div>
		<div id="product_name">
			<b>نام محصول</b>
		</div>
		<div id="product_cat">
			<b>نام دسته</b>
		</div>
		<div id="product_price">
			<b>قیمت</b>
		</div>
		<div id="product_pic">
			<b>تصویر</b>
		</div>
		<div id="product_delete">
			<b>حذف</b>
		</div>
		<div id="product_update">
			<b>اصلاح</b>
		</div>
	</div>
	
	<div id="product_all_row">
	<?php
		$sql="SELECT * FROM `product` ORDER BY `product`.`product-id` DESC";
		$result=$connect->query($sql);
		
		$i=1;
		foreach($result as $rows)
		{	
		$x=$rows["product-id"];
		$_SESSION["delete_pic"]=$rows["pic"];
	?>	
		<div id="product_all_row">
		<div id="product_number_row">
			<?php echo $i; ?>
		</div>
		<div id="product_name_row">
			<?php echo $rows["name"]; ?>
		</div>
		<div id="product_cat_row">
			<?php 
			$sql2="SELECT * FROM `cat` WHERE `cat`.`catid`='".$rows["cat-id"]."'";
			$result2=$connect->query($sql2);
			foreach($result2 as $row)
			{
				echo $row["catname"]; 
			}
			?>
		</div>
		<div id="product_price_row">
			<?php echo $rows["price"]; ?>
		</div>
		<div id="product_pic_row">
			<?php echo  "<img id=img src=".$rows["pic"].">"; ?>
		</div>
		<div id="product_delete_row">
			<a href="#" onClick="mydelete(<?= $x; ?>); ">
				<img src="../pic/icons8-trash-200.png" width="52px" height="52px;" alt="delete">
				<!--<input type="submit" value="Delete" class="product_btn"  name="delete_btn"  >-->
			</a>
		</div>
		<div id="product_update_row">
			<a href="update-product.php?id=<?php echo $rows["product-id"]; ?> & name= <?php echo $rows["name"]; ?> & cat= <?php echo $rows["cat-id"]; ?> & price= <?php echo $rows["price"]; ?> & pic= <?php echo $rows["pic"]; ?> & caption= <?php echo $rows["caption"]; ?> & shortcaption= <?php echo $rows["shortcaption"]; ?> & catname= <?php echo $row["catname"]; ?> ">
				<img src="../pic/icons8-edit-200.png" width="52px;" height="52px;" alt="update">
				<!--<input type="submit" value="Update" class="product_btn" name="update_btn">-->
			</a>
		</div>
		</div>
	<?php
		$i++;
		}
	?>
		
</body>
</html>