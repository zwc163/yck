<?php 
	session_start();
	 header("content-type:text/html;charset=utf-8");
	 require_once '../database.php';
	$fileid=trim($_GET[id]);
//	$sql="delete from filetable where fileid='$fileid' and username='$_SESSION[\'username\']'";
	$sql="update filetable set visable='1' where fileid='$fileid'";
	$re=mysql_query($sql) or die(mysql_error());//执行sql语句
	echo "<script>alert(\"操作成功！\");history.go(-1);</script>";
?>