<?php include 'funcs/connect.php';
	include 'funcs/funcs.php';
	include 'funcs/date.php';
	include 'funcs/num2str.php';
 
 if(isset($_POST['us'])&&isset($_POST['pw']))
{
	
	


	$p=sprintf("INSERT INTO `tblusers` ( `userid` , `fname` , `lname` , `tell` , `address` , `pass`  )
VALUES ('%s', '%s', '%s', '%s', '%s', '%s');",$_POST['us'],$_POST['fn'],$_POST['ln'],$_POST['tell'],$_POST['address'],$_POST['pw']);
	$r=mysql_query($p);
	if($r)
		$msg= '<font color=green>ثبت نام با موفقیت انجام شد  برای استفاده از امکانات سایت با اطلاعات خود وارد شوید</font>';
	else
		$msg="<font color=red>خطا در ثبت اطلاعات</font>";
}
 
 ?>
 
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>صفحه اخبار</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style type="text/css" media="screen">
		@import url(style.css );
		@import url(tab.css );
	.style1 {font-family: "B Lotus"}
    .style3 {font-family: "B Lotus"; color: #0000FF; }
    </style>



<script language="javascript">
	function checkinput(x1,x2,x3)
	{
		if(x1=='')
		{
			alert('لطفا نام کاربری را وارد نمایید');
			document.getElementById('us').focus();
			return false;
		}
		else if(x2=='')
		{
			alert('لطفا کلمه عبور را وارد نمایید');
			document.getElementById('pw').focus();
			return false;
		}
		else if(x3!=x2)
		{
			alert('اشتباه در وارد کردن کلمه های عبور');
			document.getElementById('pw').focus();
			return false;
		}
		else
			return true;
	
	
	}


</script>



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
<div class="post_top">
  <h2>لطفا فرم ثبت نام را با دقت پر نمایید </h2>
</div>
<div class="post_body">
<div >
  <p>&nbsp;</p>
  <form action="" method="post" onsubmit="return checkinput(us.value,pw.value,pw2.value);">
  <p align="center"><?php echo $msg; ?></p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
    <tr>
      <td width="58%"><label>
        <div align="right">
          <input name="us" type="text" id="us" />
          </div>
      </label></td>
      <td width="42%"><span class="style3">نام کاربری </span></td>
    </tr>
    <tr>
      <td><div align="right">
        <input name="fn" type="text" id="fn" />
      </div></td>
      <td><span class="style3">نام</span></td>
    </tr>
    <tr>
      <td><div align="right">
        <input name="ln" type="text" id="ln" />
      </div></td>
      <td><span class="style3">نام خانوادگی </span></td>
    </tr>
    <tr>
      <td><div align="right">
        <input name="tell" type="text" id="tell" />
      </div></td>
      <td><span class="style3">تلفن</span></td>
    </tr>
    <tr>
      <td><div align="right">
        <input name="address" type="text" id="address" />
      </div></td>
      <td><span class="style3">آدرس</span></td>
    </tr>
    <tr>
      <td><div align="right">
        <input name="pw" type="password" id="pw" />
      </div></td>
      <td><span class="style3">پسورد</span></td>
    </tr>
    <tr>
      <td><div align="right">
        <input name="pw2" type="password" id="pw2" />
      </div></td>
      <td><span class="style3">تکرار پسورد </span></td>
    </tr>
    <tr>
      <td colspan="2"><p>&nbsp;</p>
        <p>
          <label>
          <div align="center">
            <div align="center">
              <input type="submit" name="Submit3" value="   ثبت نام   " />
              <input type="reset" name="Submit32" value="پاک کردن" />
            </div>
            <div align="center"></div>
          
          
        </td>
      </tr>
  </table>
  </form>
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
