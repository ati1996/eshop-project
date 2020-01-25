<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" >
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div id="mainexam">
	<?php

	$connect=mysqli_connect("localhost","root","","quiz");
	if($connect)
	{
		$query="SELECT * FROM `questions`";
		$sql=mysqli_query($connect,$query);
		if($sql)
		{
			$count=mysqli_num_rows($sql);
			for($i=0;$i<$count;$i++)
			{
				$row=mysqli_fetch_row($sql);
				echo $row[1];		
	?>
				<fieldset>
				<b>1 </b><input type="radio" name=<?php echo $row[0];  ?>>
				<b>2 </b><input type="radio" name=<?php echo $row[0];  ?>>
				<b>3 </b><input type="radio" name=<?php echo $row[0];  ?>>
				<b>4 </b><input type="radio" name=<?php echo $row[0];  ?>>
				</fieldset>
	<?php
			}
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
		<input type="button" id="result" value="see result" class="sub_sing_up">
		<h3 id="javab"> </h3>
	
	
	
	</div>
	
	<script type="text/javascript" src="jquery-3.4.1.min.js" ></script>
	<script type="text/javascript" src= "exam.js" ></script>
</body>
</html>
