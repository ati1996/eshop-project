<!doctype html>
<html>
<head>
	<script type="text/javascript" src="func/jquery-3.4.1.min.js">
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btn").click(function(){
				$("#txt").html("<b><font color=blue>اطلاعات در حال ارسال میباشد</font></b>");
				var btn="ok";
				var onvan=$("#txt1").val();
				var matn=$("#txt2").val();
				$.post("ajax-index.php",{phponvan:onvan,phpmatn:matn,btn:btn},function(data){$("#txt").html(data);});
				
			});
		});
		
		$(document).ready(function(){
			$("#btn2").click(function(){
				$("#txt").html("<b><font color=blue>لطفا منتظر بمانید ...</font></b>");
				var showbtn="ok";
				$.post("ajax-index.php",{showbtn:showbtn},function(data){$("#table").html(data);});
				
			});
		});
	
	
	
	
	</script>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div id="txt">	</div>
	<br>
	title : <input type="text" id="txt1">
	<br/><br/>
	text : <input type="text" id="txt2">
	<br/><br/>
	<input type="submit" id="btn" value="send">
	<input type="submit" id="btn2" value="show">
	<div id="table"> </div>
</body>
</html>