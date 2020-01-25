<?php session_start();
include 'funcs/connect.php';
include 'funcs/funcs.php';
if(isset($_GET['pid']))
{
		$p=sprintf("INSERT INTO `tblbascket` ( `userid` , `productid` )VALUES ('%s', '%s');",$_SESSION['us'],$_GET['pid']);
	mysql_query($p);
	
	$p=sprintf("update tblproducts set emtiyaz=emtiyaz+1 where productid='%s'",$_GET['pid']);
	mysql_query($p);
	
	
}
?>
<script language="javascript">
window.history.back()
</script>