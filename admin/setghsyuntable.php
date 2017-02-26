<?php
	header("Content-Type:text/html;charset=utf-8");
	$danid=$_POST['danid'];
	$ghsname=$_POST['ghsname'];
	$yundanid=$_POST['yundanid'];
	$express=$_POST['express'];
	require_once '../database.php';

	$sql="insert into ghsyuntable(ghsname,danid,yundanid,express) values('$ghsname','$danid','$yundanid','$express')";
	echo $sql;
	$re=mysql_query($sql) or die(mysql_error());
	mysql_close();
	echo "<script>alert('保存成功！');history.go(-1);</script>";
?>