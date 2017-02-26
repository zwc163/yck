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
	session_start();
	if($_SESSION['is_login']==0||$_SESSION['is_login']==""||$_SESSION['username']!="hxadmin")
	echo "<script>alert('您没有登陆！'); window.location.href='../login.html';</script>";   
?>
<body>

<div class="juzhong"><img src="../images/1450686271.jpg" width="1208" height="280" /></div>
<div class="juzhong">
<?php require_once '../database.php';
		require_once 'include.php';
?>

<div class="maindiv">
<?php 
$page=trim($_GET[page]);
if(!$page)
{
	$page=1;
}
$username=$_SESSION['username'];
$start=(($page-1)*15);
$end=($page*15);
$sql="select * from usertable where isroom=1 order by id asc limit ".$start.",".$end;
$re=mysql_query($sql) or die(mysql_error());//执行sql语句
$num = mysql_num_rows($re);

echo "<font color='#CC3300'>已预定宾馆列表：</font></br>";
		if(!$num)  
		{  
			echo "";   
		}  
		else  
		{  		
			echo "<font color='#CC3300'>姓名
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;宾馆信息
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;身份证号
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;入住日期
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;离开日期
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;备注
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;所在单位</font></br>";		
			while( $row = mysql_fetch_array($re) )
			{
			echo "<a href=personinfo.php?user=".$row[username].'>';
			echo $row[tourname]."</a> &nbsp; ";
			echo $row[roomname]."-";
			echo $row[roomtype]."&nbsp;";
			echo $row[tourid]."&nbsp;";
			echo $row[startdate]."&nbsp;";
			echo $row[enddate]."&nbsp;";
			echo $row[tourname2]."&nbsp;";
			echo $row[tourcompany]."&nbsp;";
			echo "</br></br>";
			} 
		}
			echo "第&nbsp;&nbsp;";
			echo "<a href=personroomlist.php?page=1>";
			echo " 1 </a>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href=personroomlist.php?page=2>";
			echo " 2 </a>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href=personroomlist.php?page=3>";
			echo " 3 </a>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "页  当前第".$page.'页 每页15个&nbsp;&nbsp;&nbsp;&nbsp;';
			echo "<a href=excel.php targe target=\"_blank\">导出为excel</a>";
			
		echo '<center>
                <p>Copyright © 2016<a href="http://hgxy.hunnu.edu.cn//index.asp" target="_blank" title="湖南师范大学">湖南师范大学化学化工学院</a>               
                </p>
	</center>';

?></div>
</div>
<?php mysql_close();//关闭数据库
?>
</body>
</html>