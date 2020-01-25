<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?PHP
	if(isset($_POST["btn"]))
	{
		$sall=$_POST["year"];
		switch(($sall-4)%12)
		{
			case 0  : $zodiac="Rat";      break;
			case 1  : $zodiac="Ox";       break;	
			case 2  : $zodiac="Tiger";    break;
			case 3  : $zodiac="Rabbit";   break;
			case 4  : $zodiac="Drogon";   break;
			case 5  : $zodiac="Snake";    break;
			case 6  : $zodiac="Horse";    break;
			case 7  : $zodiac="Goat";     break;
			case 8  : $zodiac="Monkey";   break;
			case 9  : $zodiac="Rooster";  break;
			case 10 : $zodiac="Dog";      break;
			case 11 : $zodiac="Pig";      break;
		}
		echo "<h4>".$sall." is the year of the ".$zodiac."</h4>";
	}
	?>
	<h1>تقویم چینی</h1>
	<br/><br/><br/>
	<h3>لطفا در کارد زیر سال تولد خود را به میلادی وارد کنید </h3>
	<form method="post">
		<input type="text" name="year">
		<input type="submit" name="btn" value="محاسبه کن">
	</form>
	<br/>
</body>
</html>