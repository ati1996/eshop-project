<?php
include("funcs/connect.php");
include("funcs/funcs.php");

if(isset($_POST["btn"]))  // click submit
{
	if(empty($_POST["track_order"]))   // cadr is empty
	{
		header("location:index.php?empty_cadr_track_code=2374");
		exit();
	}
	else    // cadr is fill
	{
		$sql="SELECT * FROM `order-tb` WHERE `user-id`=?";
		$result=$connect->prepare($sql);
		$result->bindvalue(1,$_SESSION["user_login_id"]);
		$result->execute();
		foreach($result as $rows)
		{
			if($rows["order-id"] == $_POST["track_order"])   // این سفارش برای همین کاربر است
			{
				if($rows["status"]==1)
				{
					header("location:index.php?send_cadr_track_code=4514");
					exit();
				}
				else
				{
					header("location:index.php?unsend_cadr_track_code=9954");
					exit();
				}
			}
			else    // چنین سفارشی برای این کاربر وجود ندارد
			{
				header("location:index.php?error_cadr_track_code=2854");
				exit();
			}
		}
	}
}
else   // dont click submit
{
	header("location:index.php");
	exit();
}


















?>