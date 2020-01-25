<?php
session_start();
ob_start();
if($_SESSION['login']!=1)
	header("location:../../adminlogin.php");
	
include '../../funcs/connect.php';
include '../../funcs/funcs.php';
if(isset($_POST['catid'])&&isset($_POST['name']))
{
	$n=$_FILES['pic']['tmp_name'];
	
	$fp=fopen($n,'r');
	$pic=fread($fp,filesize($n));
	


	$p=sprintf("INSERT INTO `tblproducts` (  `catid` , `name` , `gheymat` , `pic` , `tozihate` , `emtiyaz` )
VALUES ( '%s', '%s', '%s', 0x%s , '%s', '0');",$_POST['catid'],$_POST['name'],$_POST['gheymat'],bin2hex($pic),$_POST['tozihat']);
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
  <h2><a href="#"></a>فرم مدیریت سفارشات </h2>
</div>
<div class="post_body">
<div class="text">

<table width="100%" border="0" cellspacing="2" cellpadding="2" dir="ltr">
   
	
	<tr>
      <td width="20%" bgcolor="#00FFFF"><div align="center" class="style1">عملیات</div></td>
	  <td width="14%" bgcolor="#00FFFF"><div align="center" class="style1">تلفن</div></td>
	  <td width="24%" bgcolor="#00FFFF"><div align="center" class="style1">جمع کل  </div></td>
	  <td width="10%" bgcolor="#00FFFF"><div align="center" class="style1">تعداد سفارش   </div></td>
      <td width="16%" bgcolor="#00FFFF"><div align="center" class="style1">تاریخ سفارش </div></td>
      <td width="11%" bgcolor="#00FFFF"><div align="center" class="style1">کد کاربری </div></td>
      <td width="5%" bgcolor="#00FFFF"><div align="center" class="style1">ردیف</div></td>
    </tr>
	<?php
			
		
		$r=mysql_query("select * from tblorder");
		$i=0;
		while($rows=mysql_fetch_assoc($r))
		{
		
					$p="select * from tblbascket where userid='".$rows['userid']."' and flag=".$rows['orderid'];
					$r2=mysql_query($p);
					
					$sum=0;
					$sum2=0;
					while($rows2=mysql_fetch_assoc($r2))
					{
					$sum2+=$rows2['tedad'];
					$sum+=getProductPrice($rows2['productid']);
					}
		
		
		
		if($rows['flag']==0)
		$s="<a href='changestatus.php?id=".$rows['orderid']."&flag=1'><font color=red>معلق</font></a>";
		else
		$s="<a href='changestatus.php?id=".$rows['orderid']."&flag=0'><font color=green>ارسال شده</font></a>";
		
			echo "<tr align=right>";
			echo "<td>&nbsp;".$s." &nbsp; | &nbsp; <a href=del.php?id=".$rows['orderid']." title='برای حذف کالا بر روی این ذکمه کلیک کنید'><img src='../../images/delete.gif' width=20 height=20></a> &nbsp;|&nbsp; <a href=print.php?orderid=".$rows['orderid']." >print</a> </td>";
			echo "<td>".$rows['tell']."</td>";
			echo "<td>".addCama(strval($sum))."</td>";
			echo "<td>".$sum2."</td>";
			echo "<td>".$rows['tarikh']."</td>";
			echo "<td title='".$rows['lastlogin']."'>".$rows['userid']."</td>";
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
