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
		#mytable
		{
			margin-right: 10px;
			font-size: 22px;
			text-align: center;
			/*border: dashed 2px;*/
			border-bottom: none;
		}
		#mytable th
		{
			background-color: #A5FFB8;
			border:2px solid #009E1D;
		}
		#mytable td
		{
			background-color: #BAD8FF;
			border:2px solid #003FB9;
		}
		#company_name
		{
			font-size: 40px;
			margin-right: 50px;
			font-weight: bolder;
			font-style: italic;
			margin-bottom: 20px;
			margin-top: 20px;
		}
	</style>
</head>

<body dir="rtl"> 
<div id="company_name">
		لرن فایلز	
	</div>
	<?php
	$sql="SELECT * FROM `order-tb` WHERE `order-id`=?";
	$result=$connect->prepare($sql);
	$result->bindvalue(1,$_GET["id"]);
	$result->execute();
	foreach($result as $rows)
	{
	?>
		<table width="795" height="520" id="mytable">
		  <tbody>
			<tr>
			  <th width="205" height="50" scope="row">تاریخ و ساعت خرید</th>
			  <td width="574"><?=$rows["date"]?> *** <?=$rows["time"] ?></td>
			</tr>
			<tr>
			  <th width="205" height="50" scope="row">نام و نام خانوادگی مشتری</th>
			  <td width="574"><?=returnUserNameById($rows["user-id"]) ?></td>
			</tr>
			<tr>
			  <th height="50" scope="row">شماره تماس مشتری</th>
			  <td><?=$rows["phone"] ?></td>
			</tr>
			<tr>
			  <th height="75" scope="row">آدرس مشتری</th>
			  <td><?=$rows["address"] ?></td>
			</tr>
			<tr>
			  <th height="100" scope="row">محصولات</th>
			  <td>
				<?php
				$sql2="SELECT * FROM `basket` WHERE `status`=?";
				$result2=$connect->prepare($sql2);
				$result2->bindvalue(1,$_GET["id"]);
				$result2->execute();
				foreach($result2 as $rows2)
				{
					echo returnNameProductById($rows2["product_id"]); 
					echo "&nbsp;/";
				}
		
				?>
				</td>
			</tr>
			<tr>
			  <th height="50" scope="row">تعداد کل محصولات</th>
			  <td><?=returnNumberOrderByStatus($rows["order-id"]) ?></td>
			</tr>
			<tr>
			  <th height="50" scope="row">جمع کل مبلغ</th>
			  <td>
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
				  تومان </td>
			</tr>
			<tr>
			  <th height="50" scope="row">شماره تماس شرکت</th>
			  <td>021-12345678</td>
			</tr>
			<tr>
			  <th height="75" scope="row">آدرس شرکت</th>
			  <td>تهران خیایان تجریش</td>
			</tr>
		  </tbody>
		</table>
	<?php	
	}
	?>
	
	<script > 
		// نمایش صفحه چاپ اطلاعات صفحه به محض لود شدن صفحه
		// به جای این کار میتوانستیم یک دکمه سابمیت بگذاریم و با زدن دکمه صفحه پرینت باز شود
		window.print(); 
	</script>
	

</body>
</html>