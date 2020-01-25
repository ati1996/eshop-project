<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<form enctype="multipart/form-data" method="post" action="upload.php">
		<input type="file" name="file[]" id="file" multiple="multiple" >
		<input type="submit" id="submit" value="suubmit">
	</form>
	<h1 id="result"></h1>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>