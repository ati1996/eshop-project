<?php
$con=mysqli_connect("localhost","root","","learnfiles");
$a="DELETE FROM users WHERE id=".$_GET["id1"]."";
$b=mysqli_query($con,$a);	
if($b!==0)
{
	header("location:admin-panel.php?ok=2020");
	exit;
}
else
{
	header("location:admin-panel.php?error=1010");
	exit;
}


?>