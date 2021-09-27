<?php
$connection=mysql_connect("localhost","root","");
$db=mysql_select_db("KS");
mysql_set_charset("utf8");
if(!$connection || !$db)
{
	mysql_error();
}
?>
