<?php
session_start();
ob_start();
if($_SESSION['login']!=1)
	header("location:../../adminlogin.php");
	
include '../../funcs/connect.php';
if(isset($_POST['catname']))
{
	$p="INSERT INTO `tblcat` (  `name` )VALUES ( '".$_POST['catname']."');";
	mysql_query($p);
	
}
?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>صفحه اخبار</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style type="text/css" media="screen">
		@import url(../../style.css );
		
	</style>






</head>
<body>
<div class="top"></div>
<div class="base">
<div class="middle">
<div class="logo">&nbsp; </div>
<div class="topmenu">
<div class="right"></div>
<div class="body">
<ul id="iconbar">
<li class="home"><a href="index.html">صفحه  </a></li>


<li><a href="tamas.html">تماس </a></li>
</ul>

</div>
<div class="left">

</div><!--Top Menu -->

<div class="content">
<div class="content_top"></div>
<div class="content_bg">



<div id="right2">

	<div class="about"><div class="about_top"></div>
	
	<?php include '../menu.php'; ?>
		<div class="about_bottom"></div>
	</div><!--Menu -->
</div><!--Right -->




<div id="left2">

<div class="post">
<div class="post_top">
  <h2><a href="#"></a>test</h2>
</div>
<div class="post_body">
<div class="text">

<table width="100%" border="0" cellspacing="2" cellpadding="2" dir="ltr">
    <tr>
      <td colspan="4" bgcolor="#DCDCDC" dir="rtl"><div align="right">
        <form name="form1" method="post" action="">
          <p>&nbsp;</p>
          <label><br>
            </label>
          <p>
            <label>عنوان دسته
            <input name="catname" type="text" id="catname">
            </label>
          </p>
          <p>
            <label>
            <input name="Submit" type="submit" class="auto-style2" value="  ثبت  ">
            </label>
            <label>
            <input name="Submit2" type="reset" class="auto-style2" value="پاک کردن">
            </label>
          </p>
        </form>
        </div></td>
      </tr>
	
	<tr>
      <td width="21%" bgcolor="#00FFFF"><div align="center" class="style1">عملیات</div></td>
      <td width="50%" bgcolor="#00FFFF"><div align="center" class="style1">عنوان</div></td>
      <td width="14%" bgcolor="#00FFFF"><div align="center" class="style1">کد دسته </div></td>
      <td width="15%" bgcolor="#00FFFF"><div align="center" class="style1">ردیف</div></td>
    </tr>
	<?php
			
		
		$r=mysql_query("select * from tblcat");
		$i=0;
		while($rows=mysql_fetch_assoc($r))
		{
			echo "<tr align=right>";
			echo "<td><a href=del.php?id=".$rows['catid'].">حذف</a></td>";
			echo "<td>".$rows['name']."</td>";
			echo "<td>".$rows['catid']."</td>";
			echo "<td>".++$i."</td>";
			echo "</tr>";
		
		}
	
	
	?>
  </table>
</div>
</div>
<div class="post_bottom"></div>
</div>



</div><!--Left -->



</div>




<div class="content_bottom"></div>
</div><!--Conetnt -->

<div class="footer">
<div class="footer_right"></div>
<div class="footer_body"><div class="text"> کلیه حقوق مادی و معنوی این وب سایت برای موبایل شاپ محفوظ می باشد <br />
</div>
</div>
<div class="footer_left"></div>
</div>  

<div class="clr"></div>



</div><!--Middle -->
</div><!--base -->
</body>
</html>
