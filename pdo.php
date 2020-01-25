<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<table border="1">
		<tr bgcolor="#ED46AF">
			<td>Fname</td>
			<td>lname</td>
			<td>city</td>
			<td>delete</td>
			<td>update</td>
			
		</tr>
	
	<?php
	include("connect.php");
	include("func.php");
	$sql="select * from users;";
	$result=$connect->query($sql);
	/*foreach($result as $rows)
	{
		echo $rows["username"]."<br/>";
	}*/
	echo "<hr/>";
	while($rows=$result->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>".$rows["fname"]."<br><br>"."</td>";
			echo "<td>".$rows["lname"]."<br><br>"."</td>";
			echo "<td>".$rows["city"]."<br><br>"."</td>";
			echo "<td>"."<a href=pdo-del.php?id=".$rows["id"].">Del</a>"."</td>";
			echo "<td>"."<a href=update-pdo.php?id=".$rows["id"].">Edite</a>"."</td>";
		echo "</tr>";
	}
	
	?>
		</table>
</body>
</html>