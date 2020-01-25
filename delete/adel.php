<?php 
$con=mysqli_connect("localhost","root","","learnfiles");
$a="delete from users where id=".$_GET["id1"]."";
$b=mysqli_query($con,$a);
if($b!==0){
	header("location:apanel.php?ok=2020");
	exit;
}
else {
	header("location:apanel.php?error=2020");
	exit;
}
?>
