<?php
include("funcs/connect.php");
include("funcs/funcs.php");
include("funcs/jdf.php");

if(isset($_POST["btn"]))   // click sumbit
{
	if(empty($_POST["phone"]) || empty($_POST["mail"]) || empty($_POST["postal_code"]) || empty($_POST["address"]))  
		//  one of cadrs is empty
	{
		header("location:order-entry.php?empty=8563 & phone=".$_POST["phone"]." & mail=".$_POST["mail"]." & postal_code=".$_POST["postal_code"]." & address=".$_POST["address"]." & descrip=".$_POST["descrip"]."#order");
		exit();
	}
	else   // all of cadrs are fill
	{
		$phone=xss($_POST["phone"]);
		$mail=xss($_POST["mail"]);
		$postal_code=xss($_POST["postal_code"]);
		$address=xss($_POST["address"]);
		$descrip=xss($_POST["descrip"]);
		
		$sql="INSERT INTO `order-tb` (`order-id`, `user-id`, `phone`, `mail`, `order-type`, `postal-code`, `address`, `descrip`, `date`, `time`, `status`) VALUES (NULL, ? , ? , ? , ? , ? , ? , ? , ? , ? , '0');";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$_SESSION["user_login_id"]);
		$result->bindvalue(2,$phone);
		$result->bindvalue(3,$mail);
		$result->bindvalue(4,$_POST["order_type"]);
		$result->bindvalue(5,$postal_code);
		$result->bindvalue(6,$address);
		$result->bindvalue(7,$descrip);
		$result->bindvalue(8,jdate('y/m/d'));
		$result->bindvalue(9,jdate('h:i:s'));
		$query=$result->execute();
		
		if($query)   // query is true
		{
			$sql2="SELECT * FROM `order-tb` ORDER BY `order-tb`.`order-id` DESC ";
			$result2=$connect->query($sql2);
			$query2=$result2->fetch();
			$sql3="UPDATE `basket` SET `status` =? WHERE `user_id`=? AND `status`=0 ";
			$result3=$connect->prepare($sql3);
			$result3->bindvalue(1,$query2["order-id"]);
			$result3->bindvalue(2,$_SESSION["user_login_id"]);
			$result3->execute();
			
			header("location:order-entry.php?query_ok=2365 & order_id=".$query2["order-id"]."#order");
			exit();
		}
		else   // query is false
		{
			header("location:order-entry.php?query_error=1247 & phone=".$_POST["phone"]." & mail=".$_POST["mail"]." & postal_code=".$_POST["postal_code"]." & address=".$_POST["address"]." & descrip=".$_POST["descrip"]."#order");
			exit();
		}
		
	}
}
else   // dont click submit
{
	header("location:order-entry.php");
	exit();
}















?>