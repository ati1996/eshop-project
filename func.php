<?php
function hash1($value)
{
	return md5($value);
}
function xss($value)
{
	$val=addslashes($value);
	//$string1=htmlspecialchars($val);
	$string1=strip_tags($val);
	return $string1;
}
?>