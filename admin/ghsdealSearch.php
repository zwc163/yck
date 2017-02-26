<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单查询</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<style type="text/css">
<!--
.STYLE1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<script type="text/javascript"> 
function changeValue(obj)
{
    obj.value="处理中...";
}
 </script>
</head>
<?php 
header("Content-Type:text/html;charset=utf-8");
	require_once '../Classes/myfunction.php';
	checkLogin();
?>
<body>
<div class="juzhong"><img src="../images/1450686271.jpg" width="1208" height="260" /></div>
<div class="juzhong">
<?php require_once '../database.php';
		require_once 'include.php';
		include '../Classes/userTYPE.php';
?>
<div class="maindiv">
<?php 
//$username=$_SESSION['username'];
$ghsname=$_SESSION['ghsname'];
$type=$_SESSION['type'];
if($type==GUANLI)
{	
	$sql="select ghsname from ghstable";
	$re=mysql_query($sql) or die(mysql_error());
	$r=0;
	while($row=mysql_fetch_array($re))
	{
		$ghsna[$r]=$row['ghsname'];
		$r++;	
	}
	echo '<font color="#CCCC33"><strong>下载供货商订单</strong></font>';
	echo '
<form action="ghsdown.php?do=1" method="post">
	供货商名称：<select name="ghsname">';
		for($i=0;$i<$r;$i++)
		{
			echo "<option value ='$ghsna[$i]'>'$ghsna[$i]'</option>";
		}
	echo '</select> <input type="submit" name="btn" value="提交" onclick="changeValue(this)">
</form>';
}
else
{
	$sql="select * from gonghuoshang where ghsname ='$ghsname'";
	$re=mysql_query($sql) or die(mysql_error());//执行sql语句
	$num=0;
	while ( $row=mysql_fetch_array($re)) {
		$goodsname[$num]=$row['goodsname'];
		$num++;
	}
	if($num)
	{
		for ($i=0; $i <$num ; $i++) { 
			$sql="select * from fahuotable where downflag = '0' and goodsname ='$goodsname[$i]'";
			$re=mysql_query($sql) or die(mysql_error());//执行sql语句
			$n = mysql_num_rows($re);
			if($n)
			{
				echo '<a href="ghsdown.php?do=0&&ghsname="'.$ghsname.'>下载订单</a>';
				break;
			}else {echo "您目前还没有订单！";return;}
		}
	}else{echo "您还没有设置商品！";}
}
?></div>
</div>
<?php mysql_close();//关闭数据库
?>
</body>
</html>