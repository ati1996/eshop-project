<?php
session_start();
ob_start();

include '../../funcs/connect.php';
$id = intval($_GET["id"]);

if(isset($id))
{

$query = "SELECT * FROM tblproducts WHERE productid = '$id'";
 $result = mysql_query($query);
 $row = mysql_fetch_array($result);

 if(mysql_num_rows($result) == 1)
 {
 //header("Content-Type: " . $row["type"]);

 exit($row["pic"]);
 }
 
}

?>