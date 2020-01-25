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
			width: 300px;;
			color: #272727;
			margin: auto;
			text-align: center;
			border-radius: 5px;
			margin-bottom: 15px;
		}
		#order_all
		{
			margin: auto;
			width: 900px;
			height: 50px;
			color: #484848;
			margin-bottom: 20px;
			font-weight: bold;
		}
		#order_num
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
		#order_code
		{
			width: 75px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_date
		{
			width: 150px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_user
		{
			width: 150px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_number
		{
			width: 40px;
			height: 40px;
			background-color: #FFAAAC;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_price
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
		#order_delete
		{
			width: 75px;
			height: 40px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			background-color: #FFAAAC;
		}
		#order_print
		{
			width: 75px;
			height: 40px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
			background-color: #FFAAAC;
		}
		#order_status
		{
			width: 75px;
			height: 40px;
			text-align: center;
			float: right;
			border-top-left-radius: 10px;
			font-size: 18px;
			padding: 5px;
			margin-right: 5px;
			background-color: #FFAAAC;
		}
		
		#order_all_row
		{
			margin: auto;
			width: 900px;
			height: 50px;
			color: #484848;
			margin-bottom: 8px;
		}
		#order_num_row
		{
			width: 45px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			font-size: 18px;
			padding: 5px 0px 5px 0px;
		}
		#order_code_row
		{
			width: 75px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_date_row
		{
			width: 150px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_user_row
		{
			width: 150px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_number_row
		{
			width: 40px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_price_row
		{
			width: 95px;
			height: 40px;
			background-color: #FCD4D5;
			text-align: center;
			float: right;
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_delete_row
		{
			width: 75px;
			height: 40px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_delete_row img
		{
			margin-top: -7px;
		}
		#order_print_row
		{
			width: 75px;
			height: 40px;
			text-align: center;
			float: right; 
			margin-right: 5px;
			font-size: 18px;
			padding: 5px;
		}
		#order_print_row img
		{
			margin-top: -7px;
		}
		#order_status_row
		{
			width: 75px;
			height: 40px;
			text-align: center;
			float: right;
			font-size: 18px;
			padding: 5px;
			margin-right: 5px;
		}
		#order_status_row img
		{
			margin-top: -7px;
		}
		
	</style>
	
	<script type="text/javascript">
	function mydelete( id )
	{
		var x=confirm("واقعا میخوایی حذفش کنی ؟");
		if(x==true)
			{
				window.location.href="delete-order.php?id="+id;
			}
		else
			{
					
			}	
	}
</script>
</head>

<body>
	<div id="massage">
		<?php
			if(isset($_GET["delete_error"]))
			{
				echo "در حذف سفارش مورد نظرت با خطا مواجه شدیم";
		?>
				<style type="text/css">
					#massage
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
				echo "سفارش مورد نظرت رو با موفقیت حذف کردیم";
		?>
				<style type="text/css">
					#massage
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
			if(isset($_GET["send_error"]))
			{
				echo "در ارسال سفارش مورد نظرت با خطا مواجه شدیم";
		?>
				<style type="text/css">
					#massage
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
			if(isset($_GET["send_ok"]))
			{
				echo "سفارش مورد نظرت با موفقیت ارسال شد";
		?>
				<style type="text/css">
					#massage
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
			if(isset($_GET["unsend_ok"]))
			{
				echo "سفارش مورد نظرت با موفقیت لغو ارسال شد";
		?>
				<style type="text/css">
					#massage
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
	<div id="order_all">
		<div id="order_num">
			شماره
		</div>
		<div id="order_date">
			تاریخ خرید
		</div>
		<div id="order_code">
			کد پیگیری
		</div>
		<div id="order_user">
			کاربر
		</div>
		<div id="order_number">
			تعداد
		</div>
		<div id="order_price">
			مبلغ کل <span style="font-size: 15px; color: #FF0004">تومان</span>
		</div>
		<div id="order_delete">
			حذف
		</div>
		<div id="order_print">
			چاپ
		</div>
		<div id="order_status">
			ارسال
		</div>
	</div>
	
	<?php
	$sql="SELECT * FROM `order-tb`";
	$result=$connect->query($sql);
	$i=1;
	foreach($result as $rows)
	{
		$x=$rows["order-id"];
	?>
		<div id="order_all_row">
			<div id="order_num_row">
				<?=$i ?>
			</div>
			<div id="order_date_row">
				<?=$rows["date"] ?>*<?=$rows["time"] ?>
			</div>
			<div id="order_code_row">
				<?=$rows["order-id"] ?>
			</div>
			<div id="order_user_row">
				<?=returnUserNameById($rows["user-id"]) ?>
			</div>
			<div id="order_number_row">
				<?=returnNumberOrderByStatus($rows["order-id"]) ?>
			</div>
			<div id="order_price_row">
				<?php
					$total_price=returnPriceOrderByStatus($rows["order-id"]);
					if($total_price>=30000)
					{
						$discount=($total_price*20)/100;
						$finaly_price=$total_price - $discount;
					}
					else
					{
						$finaly_price=$total_price;
					}
					echo $finaly_price;	
				?>
			</div>
			<div id="order_delete_row">
				<a href="#" onClick="mydelete(<?= $x; ?>); ">
					<img src="../pic/icons8-delete-bin-100.png" width="50px" height="50px" title="حذف">
				</a>
			</div>
			<div id="order_print_row">
				<a href="print-order.php?id=<?=$rows["order-id"] ?>" target="_blank">
					<img src="../pic/icons8-print-100.png" width="50px" height="50px" title="چاپ">
				</a>
			</div>
			<div id="order_status_row">
	<?php
				if($rows["status"]==0)	
				{
	?>				<a href="change-send-status.php?flag=1 & id=<?=$rows["order-id"] ?>">
						<img src="../pic/icons8-in-transit-100.png" width="50px" height="50px" title="ارسال نشده">
					</a>
	<?php				
				}
				else
				{
	?>				<a href="change-send-status.php?flag=0 & id=<?=$rows["order-id"] ?>">
						<img src="../pic/icons8-checkmark-500.png" width="50px" height="50px" title="ارسال شده">
					</a>
	<?php					
				}
	?>
			</div>
		</div>
	<?php	
		$i++;
	}
	?>
	
	
</body>
</html>