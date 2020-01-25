<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$connect=mysqli_connect("localhost","root","","learnfiles");
	
	if(isset($_POST["btn"]))
	{
		$address=$_FILES["csv"]["tmp_name"];
		$type=$_FILES["csv"]["type"];
		if($type=="application/vnd.ms-excel")
		{
			$open=fopen($address,"r");
			while(($get=fgetcsv($open,1000,","))!==false)
			{
  				$sql="INSERT INTO `import`  VALUES (NULL, '".$get[0]."', '".$get[1]."', '".$get[2]."');";
				$query=mysqli_query($connect,$sql);
				
			}
			if($query)
			{
				echo "اطلاعات با موفقیت ثبت شد";
			}
			else
			{
				echo "خطا در درج اطلاعات";
			}
		}
		else
		{
			echo "پسوند نا معتبر است ";
		}
	}
	
	?>
	
	
	<form name="frmcsv" enctype="multipart/form-data" method="post">
		<p><input type="file" name="csv"></p>
		<p><input type="submit" value="ارسال" name="btn"></p>
	</form>
</body>
</html>