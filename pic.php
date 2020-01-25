<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<table border="1" align="center" width="500px">
		<tr>
			<td align=center>شماره</td>
			<td align=center>نام</td>
			<td align=center>تصویر</td>
			<td align=center>حذف</td>
		</tr>
		<?php
		$i=1;
		$con= mysqli_connect("localhost","root","","learnfiles");
		$a="SELECT * FROM `pic`";
		$b=mysqli_query($con,$a);
		while($c=mysqli_fetch_assoc($b))
		{
			echo "<tr align=center>";
				echo "<td align=center>".$i."</td>";
				echo "<td align=center>pic".$i."</td>";
				echo "<td align=center><img src=".$c["location"]." width=200 height=150 alt=".$c["location"]."></td>";
				echo "<td align=center><a href=pic-del.php?id=".$c["id"].">del</a></td>";
				$i++;
			echo "</tr>";
			
		}
		?>
		
	</table>
</body>
</html>