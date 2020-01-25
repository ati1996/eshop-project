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
<?php if($_SESSION['login']!=1)
{
?>
<div class="about"><div class="about_top"></div><div class="about_body">	
		<div class="menu_title">
		  <h6>فرم ورود به سایت </h6>
		</div><div class="text">		
		<form method="post" action="check.php">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
            <tr>
              <td><div align="right"><span class="style1">
              </span></div>                <span class="style1"><label>
                <?php echo $_SESSION['msg']; ?>
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
              <td colspan="2" align="center"><p class="style1">
                <label >
                <img src="funcs/captcha.php" />
              </p>
                <p class="style1">
                  <label>
                  <input name="captcha" type="text" id="captcha" />
                  </label>
                </p>
                <span class="style1" >
                <div align="center" class="style1">
                  <input type="submit" name="Submit2" value="پاک کردن" />
                  <input type="submit" name="Submit" value="   ورود   " />
                </div>
                </label>
				</span>
                <span class="style1">
                
                <label>
                <div align="center" class="style2">
                  <p><span class="style5"><a href="forget.php" class="style3 style2">رمز عبور خود را فراموش کرده ام</a></span></p>
                  <p><span class="style1"><a href="register.php" class="style2">ثبت نام نکرده ام</a></span></p>
                </div>
                
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
	<?php  }
	else
	{
	?>
	
	<div class="about"><div class="about_top"></div><div class="about_body">	
		<div class="menu_title">
		  <h6>اطلاعات کاربری شما </h6>
		</div><div class="text">		
		<form method="post" action="logout.php">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
            <tr>
              <td width="53%" height="22"><div align="right"><?php echo $_SESSION['fn'].' '.$_SESSION['ln'] ?> </div></td>
              <td width="47%"><span class="style1">:خوش آمدید </span></td>
            </tr>
            <tr>
              <td colspan="2">
                <span class="style1">
                <label>
                <div align="center">آخرین ورود شما: <?php echo $_SESSION['lastlogin']; ?>
                </div>
                </span>
                <div align="center" class="style1">
                  <span class="style1">
                  <input type="submit" name="Submit" value="   خروج   " />
                    </span></div>
                <span class="style1">
                </label>
				</span>
                <span class="style1">
                
                <label></label>
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
	<?php } ?>
	<p>&nbsp;</p>
	
		<div class="about"><div class="about_top"></div><div class="about_body">	
		<div class="menu_title">
		  <h6>سبد خرید شما </h6>
		</div><div class="text">		
		<form method="post" action="logout.php">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" dir="ltr">
            <tr>
              <td width="100%">
                <span class="style1">
                <label>
                </span><span class="style1">
                </label>
				</span>
                <span class="style1">
                
                <label></label>
              </span>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#00CCFF thin dotted">
                  <tr style="border:#00CCFF thin dotted">
                    <td width="11%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center">حذف</div></td>
                    <td width="9%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center">تعداد</div></td>
					<td width="28%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center">قیمت</div></td>
                    <td width="40%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center">نام کالا </div></td>
                    <td width="12%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center">ردیف</div></td>
                  </tr>
                  
                    <?php    
					
					$p="select * from tblbascket where userid='".$_SESSION['us']."' and flag=0";
					$r=mysql_query($p);
					$i=0;
					$sum=0;
					$sum2=0;
					while($rows=mysql_fetch_assoc($r))
					{
					$sum2+=$rows['tedad'];
					$sum+=getProductPrice($rows['productid']);
					echo "<tr style=\"border:#00CCFF thin dotted\"><td><img src='images/bullet_delete.png' ></td>
                    <td align=center>".$rows['tedad']."</td>
					<td align=left>".getProductPrice($rows['productid'])."</td>
                    <td align=right>".getproductName($rows['productid'])."</td>
                    <td align=center>".++$i."</td></tr>";
					}
					
					 ?>  
					     <tr style="border:#00CCFF thin dotted">
                    <td width="11%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center"></div></td>
                    <td width="9%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center"><?php echo $sum2; ?></div></td>
					<td width="28%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted"><div align="center"><?php echo $sum; ?></div></td>
                    <td width="40%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted">جمع کل خرید </td>
                    <td width="12%" bgcolor="#CCCCCC" style="border:#00CCFF thin dotted">&nbsp;</td>
					     </tr> 
              </table></td>
            </tr>
          </table>
		  </form>
		  <p>
		    <label>
		    <div align="center">
		      <form id="form1" name="form1" method="post" action="kharid.php">
		        <input type="submit" name="Submit3" value="ثبت خرید" />
          </form>
	        </div>
		    </label>
		  </p>
		  </div>
		</div>
		<div class="about_bottom"></div>
	</div>
	
	
	
</body>
</html>
