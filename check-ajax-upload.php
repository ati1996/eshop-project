<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	if(isset($_FILES["file"]))
	{
		$tmp=$_FILES["file"]["tmp_name"];
		$name="picture/".$_FILES["file"]["name"];
		if(move_uploaded_file($tmp,$name))
		{
			echo "<font color=green><b> فایل با موفقیت آپلود شد</b> </font>";
		}
		else 
		{
			echo "<font color=red><b> خطا در آپلود فابل</b> </font>";
		}
	}
	else
	{
		echo "<font color=blue><b> فایلی آپلود نشده است </b> </font>";
	}
	?>
</body>
</html>