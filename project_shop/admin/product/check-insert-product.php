<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");
if(isset($_POST["btn"])) // click submit
{
	$name=xss($_POST["name"]);
	$price=xss($_POST["price"]);
	$name_pic=$_FILES["pic"]["name"];
	$type_pic=$_FILES["pic"]["type"];
	$tmp_name_pic=$_FILES["pic"]["tmp_name"];
	$short_caption=xss($_POST["shortcaption"]);
	
	
	
	if(empty($_POST["name"]))  // empty name
	{
		header("location:insert-product.php?empty_name=1010");
		exit();
	}
	
	elseif(empty($_POST["price"]))  // empty price
	{
		header("location:insert-product.php?empty_price=1020");
		exit();
	}
	
	elseif(is_uploaded_file($tmp_name_pic)) // update able
	{
		
		$array_type_pic=array("image/jpeg","image/png","image/jpg","image/gif");
		
		if(in_array($type_pic,$array_type_pic))  // true pasvand
		{
			$hash=md5($name_pic.microtime()).substr($name_pic,-5,5);
			$location="pic/".$hash;
			$move=move_uploaded_file($tmp_name_pic,$location);
		
			if($move)   // upload pic
			{
				$sql="INSERT INTO `product` VALUES (NULL, ? , ? , ? , ? , ? , ? , '0' );";
				$result=$connect->prepare($sql);
				$result->bindvalue(1,$_POST["cat"]);
				$result->bindvalue(2,$name);
				$result->bindvalue(3,$price);
				$result->bindvalue(4,$location);
				$result->bindvalue(5,$short_caption);
				$result->bindvalue(6,$_POST["caption"]);
			
				$query=$result->execute();

				if($query)  // play query
				{
					header("location:insert-product.php?insert_yes=1030");
					exit();
				}

				else   // dont play query
				{
					header("location:insert-product.php?insert_no=1040");
					exit();
				}
			}
			
			else   // dont move pic
			{
				header("location:insert-product.php?dont_move=1070");
				exit();
			}
			
		}
		
		else   // false pasvand
		{
			header("location:insert-product.php?passvand_no=1060");
			exit();
		}
		
		
		
	}
	
	else  // upload unable
	{
		header("location:insert-product.php?pic_cannot_upload=1050");
			exit();
	}
	
}

else  // dont click submit
{
	header("location:insert-product.php");
	exit();
}
	
?>