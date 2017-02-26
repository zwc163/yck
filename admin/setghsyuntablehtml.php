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
	require_once '../Classes/myfunction.php';
	checkLogin();
?>
<body>
<style>
.juzhong{ position:relative;margin:0px auto; width:1208px;}
</style>
<div class="juzhong"><img src="../images/1450686271.jpg" width="1208" height="260" /></div>
<div class="juzhong">
<?php 
	require_once 'include.php';
?>
<div class="maindiv">
	<font color="#CCCC33"><strong>保存供货商运单表格顺序</strong></font></br>
		<form action="setghsyuntable.php" name="setghs" method="post">
		供货商名称：&nbsp;<input type="text" name="ghsname"></br></br>
		平台订单号所在列：<input type="text" name="danid">（此编号与平台上的订单编号对应,如在第一列，请输入A）</br></br>
		快递单号所在列：&nbsp;<input type="text" name="yundanid"></br>
		快递公司所在列：&nbsp;<input type="text" name="yundanid">（没有该列请输入ZZ）</br>			
		</br>
		<input type="reset" name="重置" style="margin-left: 73px;"><input type="submit" name="save" value="保存" style="margin-left: 73px;"></br></br>
	</form>
</div>
</div>
</body>
</html>
