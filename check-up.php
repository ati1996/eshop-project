<?php
session_start();
if(isset($_POST["btn"])){

$con=mysqli_connect("localhost","root","","learnfiles");
$a="UPDATE `users` SET `fname` = '".$_POST["txt1"]."', `lname` = '".$_POST["txt2"]."', `city` = '".$_POST["txt3"]."', `age` = 		'".$_POST["txt4"]."', `username` = '".$_POST["txt5"]."', `password` = '".$_POST["txt6"]."' WHERE `users`.`id` = 			'".$_SESSION["m"]."';";
$b=mysqli_query($con,$a);
if($b!==0){
	header("location:admin-panel.php?okup=1010");
	exit;
}	
else{
	header("location:admin-panel.php?noup=2020");
	exit;
}	
}

?>
