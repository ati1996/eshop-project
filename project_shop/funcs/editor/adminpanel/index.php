<?php session_start();
ob_start();
if($_SESSION['login']!=1)
	header("location:../adminlogin.php");
	
	
	?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>صفحه اخبار</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style type="text/css" media="screen">
		@import url(../style.css );
		@import url(../tab.css );
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

	<div class="about"><div class="about_top"></div><div class="about_body">	
		<div class="menu_title"><h6>نوشته‌های تازه </h6></div><div class="text">		
		<ul>
				<li><a href="cat/index.php" title="">مدیریت دسته ها </a></li>
				<li><a href="product/" title="">مدیریت کالا ها </a></li>
				<li><a href="users/index.php" title="">مدیریت کاربران </a></li>
				<li><a href="orders/index.php" title="">سفارشات </a></li>
				<li><a href="report/index.php" title="">گزارشات </a></li>
		</ul>
		</div>
		</div>
		<div class="about_bottom"></div>
	</div><!--Menu -->
</div><!--Right -->




<div id="left2">

<div class="post">
<div class="post_top">
  <h2><a href="#"></a></h2>
</div>
<div class="post_body">
<div class="text">

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
