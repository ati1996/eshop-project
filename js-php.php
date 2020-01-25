<!doctype html>
<html>
<head>
	<script type="text/javascript">
/*		function show()
		{
			var val=document.getElementById("h1").value="hi user";
			document.getElementById("h1").innerHTML=val;
		}*/
	
	</script> 
	
	//////////////
	
	<script type="text/javascript">
		function show2()
		{
		var x="atefeh asadi";
		window.location.href="js-php.php?value="+x;
		}
	</script>
	
	
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
<!--	<h1 id="h1">atefe asadi</h1>
	<input type="submit" value="send" onClick="show()">-->
	
	/////////////
	
<?php /*?>	<?php
	$val="atefeh asadi";
	?>
	<script type="text/javascript">
	alert("<?= $val?>");
	</script><?php */?>
	
	/////////////
	
	<?php
	if(isset($_GET["value"]))
	{
		echo $_GET["value"];
	}
	else
	{
		
	}
	?>
	<input type="submit" value="send" onClick="show2()">
	
	
</body>
</html>