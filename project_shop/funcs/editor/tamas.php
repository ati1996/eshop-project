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
<title>تماس با ما</title>

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
<div class="post_top"><h2><a href="#">تماس با ما</a></h2></div>
<div class="post_body">
<div class="text">

<div class="wpcf7" id="wpcf7-f16-p17-o1"><form action="/%D8%AA%D9%85%D8%A7%D8%B3-%D8%A8%D8%A7-%D9%85%D8%A7/#wpcf7-f16-p17-o1" method="post" class="wpcf7-form">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="16" />
<input type="hidden" name="_wpcf7_version" value="3.1.2" />
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f16-p17-o1" />
<input type="hidden" name="_wpnonce" value="e8dd44d558" />
</div>
<p>نام شما (الزامی)<br />
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" /></span> </p>
<p>ایمیل شما (الزامی)<br />
    <span class="wpcf7-form-control-wrap your-email"><input type="text" name="your-email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40" /></span> </p>
<p>موضوع<br />
    <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" class="wpcf7-form-control wpcf7-text" size="40" /></span> </p>
<p>پیام شما<br />
    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" class="wpcf7-form-control  wpcf7-textarea" cols="40" rows="10"></textarea></span> </p>
<p><input type="submit" value="ارسال" class="wpcf7-form-control  wpcf7-submit" /></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>

</div></div>
<div class="post_bottom"></div>
</div>


</div><!--Left -->

</div>
<div class="content_bottom"></div>
</div><!--Conetnt -->

<div class="footer">
<div class="footer_right"></div>
<div class="footer_body"><div class="text"><center>
کلیه حقوق مادی و معنوی این وب سایت برای تهران وی پی ان محفوظ می باشد.<br>
ریپ و بهینه شده توسط پیسی نانو | www.pcnano.ir <br>
</center>
</div></div>
<div class="footer_left"></div>
</div>  

<div class="clr"></div>



</div><!--Middle -->
</div><!--base -->
</body>
</html>
