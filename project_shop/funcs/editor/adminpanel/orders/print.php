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

<table width="600" align="center">
  <tr>
    <td>
      <div class="post_top">
        <h2 align="center"><a href="#"></a>نسخه چاپی سفارش </h2>
    </div>
    <div class="post_body">
      <div class="text">
        
        <div align="center">
          <p><span lang="fa" xml:lang="fa"><strong>موزعین محترم توجه فرمایید<br />
          </strong>لطفا در هنگام تحویل سفارش مجموع مبلغ کالا و هزینه ارسال را   طبق فاکتور از خریدار دریافت نمایید</span></p>
          <p>&nbsp;</p>
       
	   
	         <?php
			
		
		
        $r=mysql_query("select * from tblorder where orderid=".$_GET['orderid']);
	
		$rows=mysql_fetch_assoc($r);
		
		
					$p="select * from tblbascket where userid='".$rows['userid']."' and flag=".$rows['orderid'];
					$r2=mysql_query($p);
					
					$sum=0;
					$sum2=0;
					while($rows2=mysql_fetch_assoc($r2))
					{
					$sum2+=$rows2['tedad'];
					$sum+=getProductPrice($rows2['productid']);
					}
		
		
		
				
			
		
		
	
	
	?>
	   
	   
	      <table align="center" border="0" width="100%" dir="ltr">
            <tbody>
              <tr>
                <td dir="rtl" colspan="2" align="right">&nbsp;</td>
                <td align="right" width="60%"> <?php echo $_GET['orderid']; ?> : شناسه سفارش </td>
              </tr>
              <tr>
                <td colspan="2" align="right"> نوع ارسال  : <?php echo $_GET['noesefaresh']; ?>    </td>
                <td align="right" width="60%"><p dir="rtl"> فروشنده  :موبایل شاپ </p></td>
              </tr>
              <tr>
                <td colspan="3" align="right"> تلفن فروشنده : 00000000000 - 09100000000      ایمیل فروشنده :info@mobileshop.com</td>
              </tr>
              <tr>
                <td colspan="3" align="right"> آدرس فروشنده  : تبریز- خیابان معلم -کوچه   </td>
              </tr>
              <tr>
                <td width="15%" align="right" dir="ltr"> 9191919191</td>
                <td align="right" nowrap="nowrap" width="25%"> کد پستی فروشنده:</td>
                <td align="right" width="60%"> آدرس اینترنتی فروشنده  :    www.mobileshop.com</td>
              </tr>
            </tbody>
          </table>
          <table width="100%">
            <tbody>
              <tr>
                <td width="50%" align="right">&nbsp;</td>
                <td width="50%" align="right"> تاریخ سفارش:  <?php echo $rows['tarikh']; ?> </td>
              </tr>
            </tbody>
          </table>
          <p>&nbsp;</p>
             
      
            
      
			
			
			<p>&nbsp;</p>
			<table width="100%" border="0" cellspacing="2" cellpadding="2" dir="ltr">
            
            
            <tr>
              <td width="20%" bgcolor="#00FFFF"><div align="center" class="style1">قیمت کل </div></td>
                <td width="20%" bgcolor="#00FFFF"><div align="center" class="style1">قیمت واحد </div></td>
                <td width="9%" bgcolor="#00FFFF"><div align="center" class="style1">تعداد سفارش  </div></td>
                <td width="39%" bgcolor="#00FFFF"><div align="center" class="style1">نام کالا </div></td>
                <td width="12%" bgcolor="#00FFFF"><div align="center" class="style1">ردیف</div></td>
              </tr>
            <?php
			
		
		$r=mysql_query("select * from tblorder where orderid=".$_GET['orderid']);
		$i=0;
		$rows=mysql_fetch_assoc($r);
		
		
					$p="select * from tblbascket where userid='".$rows['userid']."' and flag=".$rows['orderid'];
					$r2=mysql_query($p);
					
					
					while($rows2=mysql_fetch_assoc($r2))
					{
									
		
		
		
				
			echo "<tr align=center>";
			
			echo "<td align=center>".getproductPrice($rows2['productid'])*$rows2['tedad']."</td>";
			echo "<td align=center>".getproductPrice($rows2['productid'])."</td>";
			echo "<td align=center>".$rows2['tedad']."</td>";
			echo "<td align=center>".getproductName($rows2['productid'])."</td>";
			echo "<td>".++$i."</td>";
			echo "</tr>";
			
			
		
		}
	
	
	?>
	
	<tr>
              <td width="20%" valign="top" bgcolor="#00FFFF"><div align="center" class="style1"><?php echo $sum; ?> </div></td>
                <td width="20%" valign="top" bgcolor="#00FFFF"><div align="center" class="style1"> </div></td>
                <td width="9%" valign="top" bgcolor="#00FFFF"><div align="center" class="style1"><?php echo $sum2; ?>  </div></td>
                <td colspan="2" align="right" valign="top" bgcolor="#00FFFF"><div align="center" class="style1"> 
                  <p align="right"> <strong>نام و نام خانوادگی : </strong> <br />
                      <strong>آدرس : </strong><?php echo $rows['address']; ?><br />
                    <strong>تلفن : </strong> <?php echo $rows['tell']; ?>  <br />
                      <strong>کدپستی : </strong><?php echo $rows['codeposti']; ?><br />
                    <strong>پیغام : </strong><?php echo $rows['tozihat']; ?></p>
                  <p align="right">&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                </div>                  <div align="center" class="style1"></div></td>
              </tr>
            </table>
			
			
            <p>&nbsp;</p>
            <p>آدرس گیرنده: <?php echo $rows['address']; ?></p>
            <p>تلفن گیرنده: <?php echo $rows['tell']; ?></p>
        </div>
      </div>
  </div>  <div class="post_bottom"></div></td></tr>
</table>
</body>
</html>
<script language="javascript">
window.print();

</script>







