<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	if(isset($_POST["btn"]))
	{
		if($_POST["text"]=="" || $_POST["title"]=="" || $_POST["email"]=="")
		{	
			echo "<font color=red><b>کادری خالی است </b></font>";
		}
		else
		{
			mail($_POST["email"],$_POST["title"],$_POST["text"]);
			echo "<font color=green><b> ایمیل شما ارسال شد </b></font>";
		}
	}
	?>
<form id="form1" name="email" method="post" >
  <table width="378" border="1" style="color: #6A0507;">
    <tbody>
      <tr>
        <td width="162" bgcolor="#EC8A8C" style="text-align: center"><strong>ایمیل </strong></td>
        <td width="200"><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td bgcolor="#EC8A8C" style="text-align: center"><strong>عنوان پیام</strong></td>
        <td><input type="text" name="title" id="tittle"></td>
      </tr>
      <tr>
        <td bgcolor="#EC8A8C" style="text-align: center"><strong>متن پیام</strong></td>
        <td><textarea name="text" id="text"></textarea></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="btn" id="btn" value="ارسال"></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>