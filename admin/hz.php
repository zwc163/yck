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
$sql="select * from filetable where type=3 order by fileid asc limit ".$start.",".$end;
//echo $sql;
$re=mysql_query($sql) or die(mysql_error());//执行sql语句
$num = mysql_num_rows($re);

echo "<font color='#CC3300'>已上传的回执单：</font></br>";
		if(!$num)  
		{  
			echo "";   
		}  
		else  
		{  		
			echo "<font color='#CC3300'>用户名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;文件名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></br>";		
			while( $row = mysql_fetch_array($re) )
			{
			echo $row[username].'&nbsp;&nbsp;&nbsp;';
			echo "<a href=../upload/".$row[filepath].'>';
			echo $row[filename];echo "</a>  ";
			$temp=base64_encode($row[fileid]);
			echo "<a href=../rmove.php?id=".$temp.'>';
			echo "删 除</a></br></br>";			
			} 
		}
			echo "第&nbsp;&nbsp;";
			echo "<a href=hz.php?page=1>";
			echo " 1 </a>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href=hz.php?page=2>";
			echo " 2 </a>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "页  当前第".$page.'页';;
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