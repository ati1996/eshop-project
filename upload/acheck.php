<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
	<?php 
	$name=$_FILES["file"]["name"];
	$type=$_FILES["file"]["type"];
	$tmp=$_FILES["file"]["tmp_name"];
	if(isset($_POST["btn"]))
	{
		if($_FILES["file"]["error"])
		{
			echo "ERROR!!";
		}
		else
		{
			if(is_uploaded_file($tmp))
			{
				$ext=array("image/jpeg","image/jpg","image/png","image/gif");
				if(in_array($type,$ext))
				{
					$filename=md5($name.microtime()).substr($name,-5,5);
					$move=move_uploaded_file($tmp,"picture/".$filename);
					if($move)
					{
						echo "<font color:green>"."فایل با موفقیت آپلود شد "."</font>";
					}
					else
					{
						echo  "<font color:red>"."آپلود فایل با مشکل مواجه شد "."</font>";
					}
				}
				else
				{
					echo "<font color:red>"."پسوند فایل شما مجاز نیست"."</font>";
				}
			}
			else
			{
				echo "http can not upload";
			}
		}
	}
	
	?>
</body>
</html>