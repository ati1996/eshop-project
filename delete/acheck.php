<?php
	if(isset($_POST["btn"])){
		if($_POST["txt1"]=="" || $_POST["txt2"]==""){
			header("location:alogin.php?empty=10");
			exit;
		}
		$con=mysqli_connect("localhost","root","","learnfiles");
		$a="select * from admin where username='".$_POST["txt1"]."' && password='".$_POST["txt2"]."'";
		$b=mysqli_query($con,$a);
		$c=mysqli_num_rows($b);
		if($c!==0){
			header("location:apanel.php");
			exit;
		}
		else{
			header("location:alogin.php?error=30");
			exit;
		}
	}

?>
