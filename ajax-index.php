<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	if(isset($_POST["btn"]))
	{
		$onvan=$_POST["phponvan"];
		$matn=$_POST["phpmatn"];
		include("connect.php");
		$sql="INSERT INTO `ajax` (`id`, `title`, `text`) VALUES (NULL, '".$onvan."', '".$matn."');";
		$result=$connect->prepare($sql);
		$query=$result->execute();
		if($query>0)
		{
			echo "<font color=green> اطلاعات ثبت شد</font>";
		}
		else
		{
			echo "<font color=red>خطا در درج</font>";
		}
		
	}
	
	if(isset($_POST["showbtn"]))
	{
		?>
		<table border="1">
			<tr bgcolor="#53EF0D">
				<td>عنوان خبر</td>
				<td>متن خبر </td>
				<td>حذف </td>
			</tr>
		<?php
		$sql2="SELECT * FROM `ajax`";
		include("connect.php");
		$result2=$connect->prepare($sql2);
		$query2=$result2->execute();
		while($rows=$result2->fetch(PDO::FETCH_ASSOC))
		{
			echo "<tr>";
				echo "<td>".$rows["title"]."</td>";
				echo "<td>".$rows["text"]."</td>";
				echo "<td><a href=ajax-index.php?id=".$rows["id"].">حذف</a></td>";
			echo "</tr>";
		}
		echo "</table>";
		
	}
	if(isset($_GET["id"]))
		{
			$sql3="DELETE FROM `ajax` WHERE `ajax`.`id` ='".$_GET["id"]."' ";
			include("connect.php");
			$result3=$connect->prepare($sql3);
			$query3=$result3->execute();
			if($query3>0)
			{
				echo "حذف با موفقیت انجام شد ";
			}
			else
			{
				echo "خطا در حذف ";
			}
		}
	?>           
</body>
</html>