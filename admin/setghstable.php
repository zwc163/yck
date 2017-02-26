<?php
	header("Content-Type:text/html;charset=utf-8");
	$paytime=$_POST['paytime'];
	$goodsname=$_POST['goodsname'];
	$address=$_POST['address'];
	$receivename=$_POST['receivename'];
	$telephone=$_POST['telephone'];
	$buynum=$_POST['buynum'];
	$size=$_POST['size'];
	$danid=$_POST['danid'];
	$ghsname=$_POST['ghsname'];
	$express=$_POST['express'];
	$sendname=$_POST['sendname'];
	$sendphonenum=$_POST['sendphonenum'];
	$youid=$_POST['youid'];
	$sendaddress=$_POST['sendaddress'];
	require_once '../database.php';
	$sql="select * from ghstable where ghsname='$ghsname' and express='$express'";
	$re=mysql_query($sql) or die(mysql_error());
	$n = mysql_num_rows($re);
	if(!$n)
	{
		echo "<script>alert('请先上传该供货商的快递表格！');history.go(-1);</script>";
		return;
	}
	$sql="update ghstable set paytime='$paytime',goodsname='$goodsname',address='$address',receivename='$receivename',telephone='$telephone',buynum='$buynum',size='$size',danid='$danid',sendname='$sendname',sendphonenum='$sendphonenum',youid='$youid',sendaddress='$sendaddress' where ghsname='$ghsname' and express='$express'";
	echo $sql;
	$re=mysql_query($sql) or die(mysql_error());
	mysql_close();
	echo "<script>alert('保存成功！');history.go(-1);</script>";
?>