<?php
include 'connect.php';

function getCatName($catid)
{
	$p="select * from tblcat where catid=".$catid;
	$r=mysql_query($p);
	$row=mysql_fetch_assoc($r);
	return $row['name'];

}

function getproductName($pid)
{
	$p="select * from tblproducts where productid=".$pid;
	$r=mysql_query($p);
	$row=mysql_fetch_assoc($r);
	return $row['name'];

}

function getproductPrice($pid)
{
	$p="select * from tblproducts where productid=".$pid;
	$r=mysql_query($p);
	$row=mysql_fetch_assoc($r);
	return $row['gheymat'];

}
function addCama($n)
{ 
	$n2="";
	$k=0;
	for($i=strlen($n)-1;$i>=0;$i--)
	{$k++;
		if($k%3==0)
		{	if($i==0)
				$n2=$n[$i].$n2;
			else
				$n2=','.$n[$i].$n2;
			
		}
		else
		{
		$n2=$n[$i].$n2;
		
		}
		
	
	}
	

	return $n2;

}



?>
