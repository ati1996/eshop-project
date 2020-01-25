<?php
include("funcs/connect.php");
include("funcs/funcs.php");

if(isset($_POST["btn"]))  //click submit
{
	if(empty($_POST["username"]) || empty($_POST["mail"]) || empty($_POST["phone"]))  //empty one of cadrs
	{
		header("location:user-forget-password.php?empty=5849 & username='".$_POST["username"]."' & mail='".$_POST["mail"]."' & phone='".$_POST["phone"]."'#forget_password");
		exit();
	} 
	else  // fill all of cadrs
	{
		$sql="SELECT count(*) FROM `users` WHERE `username`=? && `mail`=? && `phone`=? ";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$_POST["username"]);
		$result->bindvalue(2,$_POST["mail"]);
		$result->bindvalue(3,$_POST["phone"]);
		$result->execute();
		$sql2="SELECT * FROM `users` WHERE `username`=? && `mail`=? && `phone`=? ";
		$result2=$connect->prepare($sql2);
		$result2->bindvalue(1,$_POST["username"]);
		$result2->bindvalue(2,$_POST["mail"]);
		$result2->bindvalue(3,$_POST["phone"]);
		$result2->execute();
		foreach($result2 as $rows2)
		{
			$pass=$rows2["password"];
		}
		$query=$result->fetchColumn();
		if($query==1)  // query is true
		{
			$_SESSION["user_forget_password_ok"]=1;
			$_SESSION["user_forget_password"]=$pass;
			header("location:user-forget-password.php?user_forget_password_ok=45879#forget_password");
			exit();
		}
		else   // query is false
		{
			header("location:user-forget-password.php?user_forget_password_error=2569#forget_password");
			exit();
		}
	}
}
else  //dont click submit
{
	header("location:user-forget-password.php#forget_password");
	exit();
}

?>

