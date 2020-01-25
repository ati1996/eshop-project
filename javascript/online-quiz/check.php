<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$connect=mysqli_connect("localhost","root","","quiz");
		if($connect)
		{
			$query="SELECT * FROM `answers`";
			$sql=mysqli_query($connect,$query);
			if($sql)
			{
				$arr=explode(",",$_POST["result"]);
	?>
	
				<table width="536" border="1">
				  <tbody>
					<tr>
					  <th width="128" scope="col"> question numbrr</th>
					  <th width="127" scope="col">your answer</th>
					  <th width="127" scope="col">true answer</th>
					  <th width="126" scope="col">result</th>
					 
					</tr>
	
	
	<?php
				for($i=0;$i<5;$i++)
				{
					$row=mysqli_fetch_row($sql);
	?>
				
					<tr>
					  <td height="41"><?php echo $arr[$i][0]; ?></td>
					  <td><?php echo $arr[$i][2]; ?></td>
					  <td><?php echo $row[1]; ?></td>
					
					  
				
				  
	<?php
	
					
					if($arr[$i][2]==$row[1])
					{
						$result= " true";
					}
					else
					{
						$result= " false";
					}
					echo "<br>";
					
	?>
						<td><?php echo $result; ?></td>
					</tr>
					  
					  <?php
			}
					  ?>
				</tbody>
				</table>
	<?php
			}
			else
			{
				echo "there is an error sql";
			}
		}
		else
		{
			echo ("there is an error connect");
		}
	?>
	
	
</body>
</html>