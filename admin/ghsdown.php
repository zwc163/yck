<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员个人中心</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<style type="text/css">
<!--
.STYLE1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
</head>
<?php 
	require_once '../Classes/myfunction.php';
	checkLogin();
	error_reporting( E_ALL&~E_NOTICE );
	//供货商下载订单
?>
<body>
<div class="juzhong"><img src="../images/1450686271.jpg" width="1208" height="260" /></div>
<div class="juzhong">
<?php require_once '../database.php';
		require_once 'include.php';
		require_once 'writeExcel.php';
?>
<div class="maindiv">
<?php 
//$username=$_SESSION['username'];
 $dotype=$_GET['do'];
if($dotype==1)
{
	$ghsname=$_POST['ghsname'];
}else
{
	$ghsname=$_GET['ghsname'];
}
//$info=getghsInfo($ghsname);
// echo "zheli".$info[0]."</br>";
// echo $info[1]."</br>";
// echo $info[2]."</br>";
$sql="select * from goodsname where ghsname ='$ghsname'";
$re=mysql_query($sql) or die(mysql_error());//执行sql语句
$num=0;
$lastexpress="";
while ( $row=mysql_fetch_array($re)) {
	$temp=$row['express'];
	if($lastexpress!=$temp)
	{
		$express[$num]=$temp;
		$num++;
		$lastexpress=$temp;
	}
}//echo $num;
if($num)
{
	$r=0;
	for ($i=0; $i <$num ; $i++) { 
		$sql="select * from fahuotable where downflag = '0' and ghsname ='$ghsname' and express='$express[$i]' order by goodsname";
		echo $sql;
		$re=mysql_query($sql) or die(mysql_error());//执行sql语句
		$n = mysql_num_rows($re);
		$p=0;
		if($n)
		{
			while($row=mysql_fetch_array($re))
			{
				$dataset[$r][$p]=$row['paytime'];
				$p=$p+1;
				$dataset[$r][$p]=$row['receivename'];
				$p=$p+1;
					$dataset[$r][$p]=$row['address'];
				$p=$p+1;	
					$dataset[$r][$p]=$row['telephone'];
				$p=$p+1;
					$dataset[$r][$p]=$row['goodsname'];
				$p=$p+1;
					$dataset[$r][$p]=$row['buynum'];
				$p=$p+1;
					$dataset[$r][$p]=$row['size'];
				$p=$p+1;
					$dataset[$r][$p]=$row['danid'];
				// $p=$p+1;
				// 	$dataset[$r][$p]=$row['plateformname'];
				// $p=$p+1;
				// 	$dataset[$r][$p]=$row['express'];
				$p=$p+1;
						$dataset[$r][$p]=$row['sendname'];
				$p=$p+1;
						$dataset[$r][$p]=$row['sendphonenum'];
				$p=$p+1;
						$dataset[$r][$p]=$row['youid'];
				$p=$p+1;
						$dataset[$r][$p]=$row['sendaddress'];
				$p=$p+1;
				$r+=1;$p=0;
			}
			$filename=writetoexcel($dataset,$ghsname,$r,$express[$i]);
			echo '<a href="'.$filename.'">'.$filename.'</a></br>';
		}
	}//end of for
	if($r==0){echo "您目前还没有订单！";return;}
}else{echo "您还没有设置商品！";return;}
for ($i=0; $i <$num ; $i++) { 
$sql="update fahuotable set downflag = '1' where ghsname ='$ghsname'";
$re=mysql_query($sql) or die(mysql_error());//执行sql语句
}

 echo "请务必立即点击下载</br>";
// echo '<a href="'.$filename.'.xls">'.$filename.'xls"'.'</a>';
//echo "<script>window.location.href='$filename';</script>";
?></div>
</div>
<?php mysql_close();//关闭数据库
?>
</body>
</html>