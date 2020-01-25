
<?php
	session_start();
	if($_SESSION["x"]=="1"){
		if(isset($_GET["ok"]))
		{
			echo "<font color=#00cc33 >". "اطلاعات با موفقیت حذف شد"."</font>"."<br/><br/>";
		}
		if(isset($_GET["error"]))
		{
			echo "<font color=#FF0000 >". "مشکل در حذف"."</font>"."<br/><br/>";
		}
		if(isset($_GET["okup"]))
		{
			echo "<font color=#00cc33 >". "update okkkk"."</font>"."<br/><br/>";
		}
		if(isset($_GET["noup"]))
		{
			echo "<font color=#FF0000 >". "nooot update"."</font>"."<br/><br/>";
		}

	
	$con=mysqli_connect("localhost","root","","learnfiles");
	$a="select * from users";
	$b=mysqli_query($con,$a);
	echo "<table border=1>";
	echo "<tr bgcolor=#E9E80E>";
		echo "<td>"."fname"."</td>";
		echo "<td>"."lname"."</td>";
		echo "<td>"."city"."</td>";
		echo "<td>"."age"."</td>";
		echo "<td>"."username"."</td>";
		echo "<td>"."password"."</td>";
		echo "<td>"."delete"."</td>";
		echo "<td>"."update"."</td>";

	echo "</tr>";
	while($c=mysqli_fetch_assoc($b))
	{
		echo "<tr bgcolor=#00E279>";
			echo "<td>".$c["fname"]."</td>";
			echo "<td>".$c["lname"]."</td>";
			echo "<td>".$c["city"]."</td>";
			echo "<td>".$c["age"]."</td>";
			echo "<td>".$c["username"]."</td>";
			echo "<td>".$c["password"]."</td>";
			echo "<td>".$c["id"]."<a href=delet.php?id1=".$c["id"].">"."del"."</a>"."</td>";
			echo "<td>".$c["id"]."<a href=update.php?id1=".$c["id"].">"."edit"."</a>"."</td>";
		echo "</tr>";
	}
	echo "</table>";
echo "<a href=logout.php>  خروج </a>";
	}
else
{
	header("location:admin-login.php");
	exit;
}
?>

