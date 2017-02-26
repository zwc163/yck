<?php
header("Content-Type:text/html;charset=utf-8");
	$plategoodsname=$_POST['plategoodsname'];
	$goodsname=$_POST['goodsname'];
	$ghsname=$_POST['ghsname'];
	$pay=$_POST['pay'];
	$express=$_POST['express'];
	require_once '../database.php';
	$sql="insert into goodsname(plategoodsname,goodsname,ghsname,pay,express) values('$plategoodsname','$goodsname','$ghsname','$pay','$express')";
	$re=mysql_query($sql) or die(mysql_error());//执行sql语句
	echo "<script>alert('保存成功！');history.go(-1);</script>";
	 mysql_close();//关闭数据库
?>