<!doctype html>
<html>
<head>
	<script type="text/javascript" src="func/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="func/jquery.form.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#form1").submit(function(){
				var set={target:"#show",beforeSubmit:before};
				$("#form1").axSubmit(set);
				return false;
			});
		});
		function before()
		{
			$("#show").html("<font color=pink> در حال آپلود فایل ...</font>");
		}
	</script>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div id="show"></div>
	<form enctype="multipart/form-data" method="post" action="check-ajax-upload.php" id="form1">
		file name<input type="file" name="file" >
		<br/>
		<input type="submit" name="btn" value="send">
	</form>
</body>
</html>