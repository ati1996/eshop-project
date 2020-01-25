<?php
	session_start();
	if(isset($_GET["ok"])){
		echo "<font color=#239803>"."حذف آیتم با موفقیت انجام شد "."</font>"."<br/><br/>";
	}
	if(isset($_GET["error"])){
		echo "<font color=#239803>"."حذف آیتم با مشکل مواجه شد  "."</font>"."<br/><br/>";
	}
	if(isset($_GET["okup"])){
		echo "<font color=#239803>"."آیتم با موفقیت ویرایش شد "."</font>"."<br/><br/>";
	}
	if(isset($_GET["noup"])){
		echo "<font color=#239803>"."ویرایش آیتم با مشکل مواجه شد  "."</font>"."<br/><br/>";
	}
	$con=mysqli_connect("localhost","root","","learnfiles");
	$a="select *from users";
	$b=mysqli_query($con,$a);
	echo "<table border=1>";
		echo "<tr bgcolor=#FFAB00>";
			echo "<td>"."firstname"."</td>";
			echo "<td>"."lastname"."</td>";
			echo "<td>"."city"."</td>";
			echo "<td>"."age"."</td>";
			echo "<td>"."username"."</td>";
			echo "<td>"."password"."</td>";
			echo "<td>"."Delete"."</td>";
			echo "<td>"."update"."</td>";
		echo "</tr>";
	while($c=mysqli_fetch_assoc($b)){
		echo "<tr bgcolor=#F5FD48>";
			echo "<td>".$c["fname"]."</td>";
			echo "<td>".$c["lname"]."</td>";
			echo "<td>".$c["city"]."</td>";	
			echo "<td>".$c["age"]."</td>";
			echo "<td>".$c["username"]."</td>";	
			echo "<td>".$c["password"]."</td>";	
			echo "<td>"."<a href=adel.php?id1=".$c["id"].">"."Del"."</a>"."</td>";
			echo "<td>"."<a href=aup.php?id7=".$c["id"].">"."edit"."</a>"."</td>";
		echo "</tr>";
	}
echo "</table>";
?>