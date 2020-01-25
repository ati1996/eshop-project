<?php
session_start();
ob_start();
if($_SESSION['login']!=1)
	header("location:../../adminlogin.php");
	
include '../../funcs/connect.php';
include '../../funcs/funcs.php';
include '../../funcs/date.php';
if(isset($_POST['catid'])&&isset($_POST['name']))
{
	$n=$_FILES['pic']['tmp_name'];
	
	$fp=fopen($n,'r');
	$pic=fread($fp,filesize($n));
	


	$p=sprintf("INSERT INTO `tblproducts` (  `catid` , `name` , `gheymat` , `pic` , `tozihate` , `emtiyaz`, `tarikh` )
VALUES ( '%s', '%s', '%s', 0x%s , '%s', '0', '%s');",$_POST['catid'],$_POST['name'],$_POST['gheymat'],bin2hex($pic),$_POST['tozihat'],getCurrentDate());
	mysql_query($p);
	
}
?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>صفحه اخبار</title>
<script language="javascript" src="../../editor/ckeditor.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<style type="text/css" media="screen">
		@import url(../../style.css );
		p,div,table{color:#333333; font-family:"B Lotus"}
	</style>




<script language="javascript">
	function checkinput(x1,x2,x3)
	{
		if(x1=='')
		{
			alert('لطفا نام کالا را وارد نمایید');
			document.getElementById('name').focus();
			return false;
		}
		else if(x2=='')
		{
			alert('لطفا دسته کالا را وارد نمایید');
			document.getElementById('catid').focus();
			return false;
		}
		else if(x3=='')
		{
			alert('لطفا قیمت کالا را وارد نمایید');
			document.getElementById('gheymat').focus();
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
  <h2><a href="#"></a>فرم مدیریت کالا ها </h2>
</div>
<div class="post_body">
<div class="text">

<table width="100%" border="0" cellspacing="2" cellpadding="2" dir="ltr">
    <tr>
      <td colspan="7" bgcolor="#DCDCDC" dir="rtl">
	  
	  <form action="" method="post"  enctype="multipart/form-data" onsubmit="return checkinput(name.value,catid.value,gheymat.value);">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
        <tr>
          <td><label>
            <div align="right">
              <label>
              <select name="catid">
			                  <?php
				$r=mysql_query("select * from tblcat");
		
				while($rows=mysql_fetch_assoc($r))
					echo '<option value="'.$rows['catid'].'">'.$rows['name'].'</option>'
				
				?>
              </select>
              </label>
              </div>
          </label></td>
          <td>دسته مربوطه </td>
          <td><label>
            <div align="right">
              <input name="name" type="text" id="name" />
            </div>
          </label></td>
          <td>نام کالا </td>
        </tr>
        <tr>
          <td><label>
            <div align="right">
              <input name="pic" type="file" id="pic" />
              </div>
          </label></td>
          <td>تصویر </td>
          <td><div align="right">
            <input name="gheymat" type="text" id="gheymat" />
          </div></td>
          <td>قیمت</td>
        </tr>
        <tr>
          <td colspan="3"><div align="right">
            <textarea name="tozihat" cols="40" id="tozihat" class="ckeditor"></textarea>
          </div></td>
          <td>توضیحات</td>
        </tr>
        <tr>
          <td colspan="4"><div align="center">
            <label>
            <input name="Submit" type="submit" class="auto-style2" value="  ثبت  " />
            </label>
            <label>
            <input name="Submit2" type="reset" class="auto-style2" value="پاک کردن" />
            </label>
          </div></td>
          </tr>
      </table>
	  </form>
	  </td>
    </tr>
	
	<tr>
      <td width="10%" bgcolor="#00FFFF"><div align="center" class="style1">عملیات</div></td>
	  <td width="25%" bgcolor="#00FFFF"><div align="center" class="style1">تصویر کالا </div></td>
	  <td width="25%" bgcolor="#00FFFF"><div align="center" class="style1">قیمت کالا </div></td>
	  <td width="29%" bgcolor="#00FFFF"><div align="center" class="style1">دسته کالا </div></td>
      <td width="23%" bgcolor="#00FFFF"><div align="center" class="style1">نام کالا </div></td>
      <td width="8%" bgcolor="#00FFFF"><div align="center" class="style1">کد کالا </div></td>
      <td width="5%" bgcolor="#00FFFF"><div align="center" class="style1">ردیف</div></td>
    </tr>
	<?php
			
		
		$r=mysql_query("select * from tblproducts");
		$i=0;
		while($rows=mysql_fetch_assoc($r))
		{
			echo "<tr align=right>";
			echo "<td><a href=del.php?id=".$rows['productid']." title='برای حذف کالا بر روی این ذکمه کلیک کنید'><img src='../../images/delete.gif' width=20 height=20></a></td>";
			echo "<td><img src='pic.php?id=".$rows['productid']."' width=100 height=100/></td>";
			echo "<td>".addCama(strval($rows['gheymat']))."</td>";
			echo "<td>".getCatName($rows['catid'])."</td>";
			echo "<td>".$rows['name']."</td>";
			echo "<td>".$rows['productid']."</td>";
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
