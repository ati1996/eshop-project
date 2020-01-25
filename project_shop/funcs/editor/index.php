<?php session_start();
ob_start();
include 'funcs/connect.php';
	include 'funcs/funcs.php';
	include 'funcs/date.php';
	include 'funcs/num2str.php';
 ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>صفحه اخبار</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style type="text/css" media="screen">
		@import url(style.css );
		@import url(tab.css );
	.style1,body ,p {font-family: "B Lotus"; font-size:12px;color:#000000}
    </style>






</head>
<body>
<div class="top"></div>
<div class="base">
<div class="middle">
<div class="logo">&nbsp; </div>
<div class="topmenu">
<div class="right"></div>
<?php include 'topmenu.php';?>
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
				
				<li><a href="?flag=j" title="">جدید ترین محصولات</a></li>
				<li><a href="?flag=p" title="">پر فروش ترین محصولات</a></li>
		</ul>
		</div>
		</div>
		<div class="about_bottom"></div>
	</div><!--Menu -->
	<p>&nbsp;</p>
	
	<?php include 'loginform.php'; ?>
	
	
	
</div><!--Right -->




<div id="left2">

<div class="post">
<div class="post_top">
  <h2>جستجو در سایت </h2>
 
</div>
<div class="post_body">
<div >
<form action="" method="post" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
    <tr>
      <td width="31%"><div align="right">
        <select name="catid">
          <?php
				$r=mysql_query("select * from tblcat");
		
				while($rows=mysql_fetch_assoc($r))
					echo '<option value="'.$rows['catid'].'">'.$rows['name'].'</option>'
				
				?>
        </select>
        &nbsp;</div></td>
      <td width="9%">دسته</td>
      <td width="49%"><label>
        <div align="right">
          <input name="namekala" type="text" id="namekala" />
          </div>
      </label></td>
      <td width="11%">نام کالا </td>
    </tr>
    <tr>
      <td><div align="right">
        <input name="emtiyaz" type="text" id="emtiyaz" value="0" />
      </div></td>
      <td>تعداد فروش </td>
      <td><div align="right">
        <input name="ta" type="text" id="ta" value="10000000000" />
        <input name="az" type="text" id="az" value="0" />
      </div></td>
      <td>قیمت کالا </td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
        <label>
        <input type="submit" name="Submit" value="جستجو" />
        </label>
      </div></td>
      </tr>
  </table>
  </form>
</div>
</div>
<div class="post_bottom"></div>
</div>




<?php  
if(isset($_POST['Submit']))
{
$p="select * from tblproducts where catid=".$_POST['catid']." and name like '%".$_POST['namekala']."%' and gheymat>=".$_POST['az']." and gheymat<=".$_POST['ta']." and emtiyaz>=".$_POST['emtiyaz']."";


}
else if(isset($_GET['cat']))
{
	$p=sprintf("select * from tblproducts where catid=%s",intval($_GET['cat']));
}
else if(isset($_GET['flag']))
{
	if($_GET['flag']=='p')
		$p=sprintf("select * from tblproducts order by emtiyaz desc limit 0,8");
	else
		$p=sprintf("select * from tblproducts order by tarikh desc limit 0,8");
}
else
	$p="select * from tblproducts order by tarikh desc";
$r=mysql_query($p);
while($rows=@mysql_fetch_assoc($r))
{

	echo '<div class="post">
<div class="post_top">
  <h2>'.$rows['name'].'</h2>
 
</div>
<div class="post_body">
<div >
<font color=black>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir=ltr>
    <tr>
      <td width="31%" rowspan="2"><p><img src="adminpanel/product/pic.php?id='.$rows['productid'].'" width=200 height=200></p>
        <p>';
		
		if($_SESSION['login']==1)
		echo '<blink style="float:left"><a href="addtobasket.php?pid='.$rows['productid'].'" style="color:green" ><img src="images/basket.png" width=30 height=30 ">افزودن به سبد خرید</a></blink>';
		else
			echo 'برای اضافه کردن به سبد خرید عضو شوید';
		
		
		
	echo'	</p></td>
      <td width="69%" colspan="2"><p>&nbsp;</p>
        <p>&nbsp;</p>
        <p align=right>'.$rows['tozihate'].'</p>
        <p>&nbsp;</p></td>
    </tr>
    <tr dir=ltr>
      <td style="background:#CCCCCC;color:#ffffff">مربوط به دسته : '.getCatName($rows['catid']).'</td>
      <td dir=ltr style="background:#CCCCCC;color:#ffffff" title="'.num2str($rows['gheymat']).' ریال" >قیمت: '.Convertnumber2farsi(addCama(strval($rows['gheymat']))).' ریال</td>
    </tr>
  </table>
  </font>
</div>
</div>
<div class="post_bottom"></div>
</div>
';

}

?>




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
