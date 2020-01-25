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
			margin-bottom: 25px;
		}
		#news_all
		{
			margin: auto;
			width: 900px;
			height: 50px;
			color: #484848;
			margin-bottom: 10px;
		}
		#news_number
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
		#news_title
		{
			width: 640px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#news_delete
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
		#news_update
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
		#news_all_row
		{
			margin: auto;
			width: 900px;
			height: 50px;
			color: #484848;
			margin-top: 10px;
		}
		#news_number_row
		{
			width: 45px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			font-size: 18px;
			padding: 5px 0px 5px 0px;
		}
		#news_title_row
		{
			width: 640px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#news_delete_row
		{
			width: 95px;
			height: 50px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			/*padding-top: 2px;*/
		}
		#news_update_row
		{
			width: 100px;
			height: 50px;
			text-align: center;
			float: right;
			font-size: 18px;
			/*padding-top: 2px;*/
		}
	</style>
	<script type="text/javascript">
	function mydelete(id)
	{
		var x=confirm("آیا واقعا میخوایی حذفش کنی؟");
		if(x==true)
		{
			window.location.href="delete-news.php?id="+id;
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
		if(isset($_GET["delete_error"]))
			{
				echo "حذف با خطا مواجه شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #FFB172;
						text-align: center;
					}
				</style>
		<?php
			}
			if(isset($_GET["delete_ok"]))
			{
				echo "با موفقیت حذف شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #94FF8A;
						text-align: center;
					}
				</style>
	<?php
			}
			if(isset($_GET["update_error"]))
			{
				echo "آپدیت با خطا مواجه شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #FFB172;
						text-align: center;
					}
				</style>
		<?php
			}
			if(isset($_GET["update_ok"]))
			{
				echo "با موفقیت آپدیت شد";
		?>
				<style type="text/css">
					#massege
					{
						color: #272727;
						background-color: #94FF8A;
						text-align: center;
					}
				</style>
	<?php
			}
		?>
	</div>
	<div id="news_all">
		<div id="news_number">
			شماره
		</div>
		<div id="news_title">
			عنوان خبر
		</div>
		<div id="news_delete">
			حذف
		</div>
		<div id="news_update"> 
			آپدیت
		</div>
	</div>
	
<?php
	$sql="SELECT * FROM `news` ";
	$result=$connect->query($sql);
	$result->execute();
	$i=1;
	foreach($result as $rows)
	{
		$x=$rows["id"];
?>
		<div id="news_all_row">
		<div id="news_number_row">
			<?=$i ?>
		</div>
		<div id="news_title_row">
			<?=$rows["title"] ?>
		</div>
		<div id="news_delete_row">
			<a href="#" onClick="mydelete(<?=$x ?>);">
				<img src="../pic/icons8-delete-bin-100.png" width="50px" alt="update">
			</a>
		</div>
		<div id="news_update_row">
			<a href="update-news.php?id=<?=$rows["id"] ?> & title=<?=$rows["title"] ?> & text=<?=$rows["text"] ?>">
				<img src="../pic/icons8-edit-200.png" width="50px" alt="update">
			</a>
		</div>
	</div>
<?php	
		$i++;
	}
?>
		
</body>
</html>