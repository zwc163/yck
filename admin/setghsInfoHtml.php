<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员个人中心</title>
<style type="text/css">
<!--
.STYLE1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
</head>
<style type="text/css">
.maindiv{
	position:absolute;
	z-index:2008;
	width: 70%;
	height: 50%;
	float:right;
	left: 196px;
	top: 16px;
}
</style>
<?php 
	require_once "../Classes/myfunction.php";
	checkLogin();
?>
<body>
<style>
.juzhong{ position:relative;margin:0px auto; width:1208px;}
</style>
<div class="juzhong"><img src="../images/1450686271.jpg" width="1208" height="260" /></div>
<div class="juzhong">
<?php 
	require_once '../database.php';
	require_once 'include.php';
?>
<div class="maindiv">
	<font color="#CCCC33"><strong>设置供货商的发件信息</strong></font>&nbsp;&nbsp;&nbsp;<a href="">查看供货商列表</a></br></br>
		<form action="setghsInfo.php" name="setghs" method="post">
		供货商名称：<input type="text" name="ghsname"></br></br>
		发件人姓名：<input type="text" name="sendname"></br></br>
		发件人电话号码：<input type="text" name="sendphonenum"></br></br>
		邮 编：&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="youid"></br></br>
		发件地址：<input type="text" name="sendaddress"></br></br>
		<input type="reset" name="重置" style="margin-left: 73px;"><input type="submit" name="save" value="保存" style="margin-left: 73px;">
	</form>
</div>
</div>
<?php mysql_close();//关闭数据库
?>
</body>
</html>
