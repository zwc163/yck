<?php
header("Content-Type:text/html;charset=utf-8");
	$ghsname=$_POST['ghsname'];
	$sendname=$_POST['sendname'];
	$sendphonenum=$_POST['sendphonenum'];
	$youid=$_POST['youid'];
	$sendaddress=$_POST['sendaddress'];
	require_once '../database.php';
	$sql="insert into gonghuoshang(ghsname,sendname,sendphonenum,youid,sendaddress) values('$ghsname','$sendname','$sendphonenum','$youid','$sendaddress')";
	$re=mysql_query($sql) or die(mysql_error());//执行sql语句
	echo "<script>alert('保存成功！');history.go(-1);</script>";
	 mysql_close();//关闭数据库
?>