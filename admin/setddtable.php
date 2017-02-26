<?php
//设置供货商订单表顺序
	header("Content-Type:text/html;charset=utf-8");
	$plateformname=$_POST['plateformname'];
	$paytime=$_POST['paytime'];
	$goodsname=$_POST['goodsname'];
	$address=$_POST['address'];
	$receivename=$_POST['receivename'];
	$telephone=$_POST['telephone'];
	$buynum=$_POST['buynum'];
	$size=$_POST['size'];
	$danid=$_POST['danid'];
	$money=$_POST['money'];
	$sendname=$_POST['sendname'];
	$sendphonenum=$_POST['sendphonenum'];
	$youid=$_POST['youid'];
	$sendaddress=$_POST['sendaddress'];
	require_once '../database.php';
	$sql="select * from plateformtable where plateformname='$plateformname'";
	$re=mysql_query($sql) or die(mysql_error());
	$n = mysql_num_rows($re);
	if(!$n)
	{
		$sql="insert into plateformtable(plateformname,paytime,goodsname,address,receivename,telephone,buynum,size,danid,money,sendname,sendphonenum,youid,sendaddress) values('$plateformname','$paytime','$goodsname','$address','$receivename','$telephone','$buynum','$size','$danid','$money','$sendname','$sendphonenum','$youid','$sendaddress')";
	}
	else
	{
	 $sql="update plateformtable set paytime='$paytime',goodsname='$goodsname',address='$address',receivename='$receivename',telephone='$telephone',buynum='$buynum',size='$size',danid='$danid',money='$money',sendname='$sendname',sendphonenum='$sendphonenum',youid='$youid',sendaddress='$sendaddress' where plateformname='$plateformname'";
	}echo $sql;
	$re=mysql_query($sql) or die(mysql_error());//执行sql语句
	echo "<script>alert('保存成功！');history.go(-1);</script>";
	 mysql_close();//关闭数据库
?>