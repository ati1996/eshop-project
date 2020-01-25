<?php session_start();
ob_start();
include 'funcs/connect.php';
	include 'funcs/funcs.php';
	include 'funcs/date.php';
	include 'funcs/num2str.php';
	
	if(isset($_POST['noesefaresh'])&&isset($_POST['address']))
{
	
	$p=sprintf("INSERT INTO `tblorder` ( `userid` , `tarikh` , `saat` , `address` , `codeposti` , `tell` , `tozihat` , `miladidate` , `email` , `noesefaresh` )VALUES ('%s', '%s', '%s','%s', '%s', '%s','%s', '%s', '%s','%s');",$_SESSION['us'],getCurrentDate(),'',$_POST['address'],$_POST['codeposti'],$_POST['tell'],$_POST['tozihat'],date("Y").date("m").date("d"),$_POST['email'],$_POST['noesefaresh']);
	//echo $p;
	mysql_query($p);
	$p="select * from tblorder order by orderid desc";
	$r=mysql_query($p);
	$rows=mysql_fetch_assoc($r);
	$o=$rows['orderid'];
	$p="update tblbascket set flag='".$rows['orderid']."' where flag=0 and userid='".$_SESSION['us']."'";
	mysql_query($p);
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> خرید آفلاین</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style type="text/css" media="screen">
		@import url(style.css );
		@import url(tab.css );
	</style>


</head>
<body>
<div class="top"></div>
<div class="base">
<div class="middle">
<div class="logo">&nbsp; </div>
<div class="topmenu">
<div class="right"></div>
<?php include 'topmenu.php'; ?>
<div class="left">

</div><!--Top Menu -->

<div class="content">
<div class="content_top"></div>
<div class="content_bg">



<div id="right2">
<div class="about"><div class="about_top"></div><div class="about_body">	
		<div class="menu_title">
		  <h6>دسته بندی موبایل ها </h6>
		</div><div class="text">		
		<ul>
				<?php
				$p="select * from tblcat";
				$r=mysql_query($p);
				while($row=mysql_fetch_assoc($r))
				echo '<li><a href="?cat='.$row['catid'].'" title="">'.$row['name'].'</a></li>';
				
				?>
				
		</ul>
		</div>
		</div>
		<div class="about_bottom"></div>
	</div><!--Menu -->
	<p>&nbsp;</p>				
<?php include 'loginform.php'; ?>
		<!--Menu -->
</div><!--Right -->


<div id="left2">
<div class="post">
<div class="post_top"><h2><a href="#">خرید آفلاین</a></h2></div>
<div class="post_body">
<div class="text">
<table style="width: 625px; text-align: center;" dir="ltr" border="0" align="center">
<tr bgcolor="#292929" align="center" style="color:#dfdfdf;">
<td style="width: 161px; height: 23px;">شماره کارت</td>
<td style="height: 23px; width: 161px;">شماره حساب</td>
<td style="height: 23px; width: 117px;">بانک مقصد</td>
<td style="width: 104px; height: 23px;">به نام</td>
</tr>
</table>
<table style="width: 625px; text-align: center;" dir="ltr" border="0" align="center">
<tr bgcolor="#ff9300" align="center" style="height: 22px;">
<td style="width: 161px">6037 9913 0973 0000 </td>
<td style=" width: 161px;">033 765 355 0000</td>
<td style="width: 117px;">ملی</td>
<td style="width: 104px;">آقای علی علوی </td>
</tr>
<tr bgcolor="#ff9300" align="center" style="height: 22px;">
<td colspan="4">IR81 0170 0000 0033 7653 5500 09</td>
</tr>
</table>
<div style="font:12px BYekan;">
  <p>1- بسته سفارشی شما متناسب با توع پست از 3 تا 10 روز دیگر به دست شما خواهد رسید</p>
  <p>&nbsp;</p>
  <p>2- بعد از دریافت بسته هزینه را به مامور پست بدهید</p>
  <p>&nbsp;  </p>
  <p>
  
  <?php 
  if(isset($_POST['noesefaresh'])&&isset($_POST['address']))
  echo '<font color=green>شماره سفارش شما '. $o . ' می باشد</font>'; ?>
  <br />  
      <br />
          </p>
</div>

<form action="" method="POST">
<table border="0" width="600" cellpadding="5">
<tr>
<td width="150">نوع سفارش : </td>
<td>
<select name="noesefaresh" id="noesefaresh">
  <option value="سفارشی">پست سفارشی</option>
  <option value="پیشتاز">پیشتاز</option>
</select>  <span style="opacity:0.5"></span></td>
</tr>
<tr>
<td width="150">آدرس ایمیل : </td>
<td><input name="email" type="text" id="email" value="" /> 
<span style="opacity:0.5">( مثال : example@example.com )</span></td>
</tr>
<tr>
<td width="150">تلفن : </td>
<td><input name="tell" type="text" id="tell" value="" /></td>
</tr>
<tr>
<td width="150">آدرس : </td>
<td><textarea name="address" cols="35" rows="5" id="address"></textarea></td>
</tr>
<tr>
<td width="150">کد پستی  : </td>
<td><input name="codeposti" type="text" id="codeposti" value="" /></td>
</tr>
<tr>
<td width="150">توضیحات : </td>
<td>
<textarea name="tozihat" cols="35" rows="5" style="width:200px;height:120px;"></textarea></td>
</tr>
<tr>
<td width="150"></td>
<td>
<input type="hidden" name="submit" value="true" />
<input type="submit" value="ثبت نهایی" style="cursor:pointer;" /></td>
</tr>
</table>
</form>
</div></div>
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
