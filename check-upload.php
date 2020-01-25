<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
$con= mysqli_connect("localhost","root","","learnfiles");
$name=$_FILES["file"]["name"];
$type=$_FILES["file"]["type"];
$size=$_FILES["file"]["size"];
$tmp=$_FILES["file"]["tmp_name"];
echo $name;
echo "<br/>";
echo $type;
echo "<br/>";
echo floor($size/1024);
echo $tmp;
echo "<br/>";
echo "<hr/>";
if(isset($_POST["btn"]))
{
	if($_FILES["file"]["error"]!==0)
	{
		echo "ERROR1";
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
					$loc="picture/".$filename;
					$a="INSERT INTO `pic`  VALUES (NULL, 'pic', '".$loc."');";
					mysqli_query($con,$a);
					echo "فایل شما با موفقیت آپلود شد ";
				}
				else
				{
					echo "فایل مورد نظر آپلود نشد";
				}  
			}
			else
			{
				echo "پسوند فایل شما مجاز نمی باشد";
			}
		}
		else
		{
			echo "http can not upload";
		}
	}
}
?>
</html>