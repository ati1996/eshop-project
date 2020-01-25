<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
		  
</head>
	
<body>
<?php
	session_start();
	$con= mysqli_connect("localhost","root","","learnfiles");
	if(isset($_POST["btn"])){
		if($_POST["user"]=="" || $_POST["pass"]==""){
			header("location:index.php?empty=1010 ");
			exit;
		}
	
		$a = "select * from users where username= '".$_POST["user"]."' && password='".$_POST["pass"]."'";
		$b = mysqli_query($con , $a);
		$c = mysqli_num_rows($b);
		if($c!==0){
			header("location:panel.php");
			$_SESSION["x"]=1;
			exit;
		}
		else{
			header("location:index.php?error=2020");
			exit;
		}
	}
		
?>
</body>
</html>