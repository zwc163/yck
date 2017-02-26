<?php
function test()
{
	$g[0]=1;
	$g[1]=2;
	return $g;
}
$a=test();
echo $a[0];
echo $a[1];
require_once '../database.php';
$sql="insert into test(danid,dd) values('12','123')";
//	echo $sql;
$re=mysql_query($sql) or die(mysql_error());
$sql="insert into test(danid,dd) values('112','1223')";
//	echo $sql;
$re=mysql_query($sql) or die(mysql_error());
?>