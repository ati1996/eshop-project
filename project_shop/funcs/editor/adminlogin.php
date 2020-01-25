<?php
session_start();
ob_start();

include 'funcs/connect.php';
	include 'funcs/funcs.php';
	include 'funcs/date.php';
	include 'funcs/num2str.php';
	
	
	$p="select * from tbladminusers where userid='".$_POST['us']."' and pass='".$_POST['pw']."'";
	
	$r=mysql_query($p);
	
	$k=mysql_num_rows($r);
	
	
	if($k==1)
	{
		$_SESSION['us']=$rows['userid'];
		
		$_SESSION['login']=1;
		header("location:adminpanel/index.php");	
	}
	else
		$_SESSION['login']=0;
		
		
		
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css" media="screen">
		@import url(style.css );
		@import url(tab.css );
	.style1 {font-family: "B Lotus"}
    .style2 {color: #0000FF}
.style3 {color: #FF0000}
.style4 {font-family: "B Nazanin"; }
.style5 {font-family: "B Lotus"; color: #0000FF; }
.style1,body ,p {font-family: "B Lotus"; font-size:12px;color:#000000}
</style>

</head>

<body>
<table align="center" width="200">
<tr>
<td>
<div class="about" align="center"><div class="about_top"></div><div class="about_body" align="center">	
		<div class="menu_title">
		  <h6>فرم ورود به سایت </h6>
		</div><div class="text">		
		<form method="post" action="">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
            <tr>
              <td><div align="right"><span class="style1">
              </span></div>                <span class="style1"><label>
                <div align="right">
                  <input name="us" type="text" id="us" />
                </div>
                </label>
              </span></td>
              <td><span class="style1">:نام کاربری </span></td>
            </tr>
            <tr>
              <td><div align="right">
                <input name="pw" type="text" id="pw" />
              </div></td>
              <td><span class="style1">:کلمه عبور </span></td>
            </tr>
            <tr>
              <td colspan="2"><span class="style1">
                <div align="center" class="style1">
                  <input type="submit" name="Submit2" value="پاک کردن" />
                  <input type="submit" name="Submit" value="   ورود   " />
                </div>
				</label>
				</span>
                <span class="style1">
                
                <label>
                </label>
</span></td>
            </tr>
          </table>
		  </form>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		</div>
		</div>
		<div class="about_bottom"></div>
</div>
</td></tr></table>
	
</body>
</html>
