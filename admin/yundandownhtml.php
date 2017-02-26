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
	require_once '../Classes/myfunction.php';
	checkLogin();
?>
<body>
<div class="juzhong"><img src="../images/1450686271.jpg" width="1208" height="260" /></div>
<div class="juzhong">
<?php 
		require_once '../database.php';
		require_once 'include.php';
		include '../Classes/userTYPE.php';
		$sql="select plateformname from plateformtable";
		$re=mysql_query($sql) or die(mysql_error());
		$r=0;
	while($row=mysql_fetch_array($re))
	{
		$plateformname[$r]=$row['plateformname'];
		$r++;	
	}

?>
<div class="maindiv">
<font color="#CCCC33"><strong>下载平台运单</strong></font>
<form action="yundandown.php" method="post">
	平台名称：<!--<input type="text" name="plateformname">-->
	<select name="plateformname">  
	<?php
		for($i=0;$i<$r;$i++)
		{
			echo "<option value ='$plateformname[$i]'>'$plateformname[$i]'</option>";
		}
	?>
</select> 
	<input type="submit" name="btn" value="提交" onclick="changeValue(this)">
</form>
</div>
</div>
<?php mysql_close();//关闭数据库
?>
</body>
</html>