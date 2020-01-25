<?php
include("../../funcs/connect.php");
include("../../funcs/funcs.php");

if(isset($_POST["btn"]))   // click submit
{ 
	$name=xss($_POST["name"]);
	$price=$_POST["price"];
	
	if(empty($_POST["name"]))  // empty name
	{ 
		header("location:update-product.php?empty_name=1010 & id=".$_GET["id"]." & name=".$_GET["name"]." & cat=".$_GET["cat"]." & catname=".$_GET["catname"]." & caption=".$_GET["caption"]." & shortcaption=".$_GET["shortcaption"]." & price=".$_GET["price"]." ");
		exit();
	}
	
	elseif(empty($_POST["price"]))  // empty price
	{
		header("location:update-product.php?empty_price=1020 & id=".$_GET["id"]." & name=".$_GET["name"]." & cat=".$_GET["cat"]." & catname=".$_GET["catname"]." & caption=".$_GET["caption"]." & shortcaption=".$_GET["shortcaption"]." & price=".$_GET["price"]."");
		exit();
	}
	
	else  // fill name & price 
	{
		$name_pic=$_FILES["pic"]["name"];
		$type_pic=$_FILES["pic"]["type"];
		$tmp_name_pic=$_FILES["pic"]["tmp_name"];
		
		if(empty($tmp_name_pic)) // empty pic
		{
			$sql="UPDATE `product` SET `cat-id` = ? , `name` = ? , `price` = ? , `shortcaption` = ? , `caption` = ? WHERE `product`.`product-id` = ? ;";
			$result=$connect->prepare($sql);
			$result->bindvalue(1,$_POST["cat"]);
			$result->bindvalue(2,$_POST["name"]);
			$result->bindvalue(3,$_POST["price"]);
			$result->bindvalue(4,$_POST["shortcaption"]);
			$result->bindvalue(5,$_POST["caption"]);
			$result->bindvalue(6,$_GET["id"]);
			$query=$result->execute();
			
			if($query)  // play query
			{
				header("location:manage-product.php?updateok=1020 & name=".$_GET["name"]." & catname=".$_GET["catname"]."");
				exit(); 
			}
			
			else  // dont play query
			{
				header("location:manage-product.php?updateerror=1030 & name=".$_GET["name"]." & catname=".$_GET["catname"]."");
				exit();
			}

		}
		
		else  // select pic
		{
			
			if(is_uploaded_file($tmp_name_pic))  // upload able
			{
				$array_type_pic=array("image/jpeg","image/png","image/jpg","image/gif");
				
				if(in_array($type_pic,$array_type_pic))  // true pasvand
				{
					
					$hash=md5($name_pic.microtime()).substr($name_pic,-5,5);
					$location="pic/".$hash;
					$move=move_uploaded_file($tmp_name_pic,$location);
					
					if($move)  // upload & move pic
					{		
						
						$sql2="UPDATE `product` SET `cat-id` = ? , `name` = ? , `price` = ? , `pic` = ? , `shortcaption` = ? , `caption` = ? WHERE `product`.`product-id` = ? ;";
						$result2=$connect->prepare($sql2);
						$result2->bindvalue(1,$_POST["cat"]);
						$result2->bindvalue(2,$_POST["name"]);
						$result2->bindvalue(3,$_POST["price"]);
						$result2->bindvalue(4,$location);
						$result2->bindvalue(5,$_POST["shortcaption"]);
						$result2->bindvalue(6,$_POST["caption"]);
						$result2->bindvalue(7,$_GET["id"]);
						$query2=$result2->execute();
						
						if($query2)  // play query
						{
							unlink($_SESSION["delete_pic"]);
							header("location:manage-product.php?updateok=1040 & name=".$_GET["name"]." & catname=".$_GET["catname"]."");
							exit();
						}
						
						else   // dont play query
						{
							header("location:manage-product.php?updateerror=1030 & name=".$_GET["name"]." & catname=".$_GET["catname"]."");
							exit();
						}
						
					}
					
					else  // dont upload & move pic
					{
						header("location:update-product.php?moveerror=1020 & id=".$_GET["id"]." & name=".$_GET["name"]." & cat=".$_GET["cat"]." & catname=".$_GET["catname"]." & caption=".$_GET["caption"]." & shortcaption=".$_GET["shortcaption"]." & price=".$_GET["price"]."");
						exit();
					}
				}
				else  // false pasvand
				{
					header("location:update-product.php?pasvanderror=1020 & id=".$_GET["id"]." & name=".$_GET["name"]." & cat=".$_GET["cat"]." & catname=".$_GET["catname"]." & caption=".$_GET["caption"]."& shortcaption=".$_GET["shortcaption"]." & price=".$_GET["price"]."");
					exit();
				}
			}
			
			else // upload unable
			{
				header("location:update-product.php?upload_unable=1020 & id=".$_GET["id"]." & name=".$_GET["name"]." & cat=".$_GET["cat"]." & catname=".$_GET["catname"]." & caption=".$_GET["caption"]." & shortcaption=".$_GET["shortcaption"]." & price=".$_GET["price"]."");
				exit();
			}
		}
		
	}
	 
	
}
else   // dont click submit
{
	header("location:update-product.php");
	exit();
}



?>