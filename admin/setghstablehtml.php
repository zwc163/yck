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
	require_once '../database.php';
	require_once 'include.php';
	if(!empty($_GET['ghsname']))
		$ghsname=$_GET['ghsname'];
	if(!empty($_GET['express']))
		$express=$_GET['express'];
?>
<div class="maindiv">
	<font color="#CCCC33"><strong>保存供货商表格顺序</strong></font></br>
		<form action="setghstable.php" name="setghs" method="post">
		供货商名称：&nbsp;<input type="text" name="ghsname" value="<?php if(!empty($ghsname)) echo $ghsname;?>"></br>
		快递名称：&nbsp;<input type="text" name="express" value="<?php if(!empty($express)) echo $express;?>"></br>
		支付时间所在列：<input type="text" name="paytime"><font color="#FF0000">（如在第A列，请输入A,如没有该列，请输入ZZ）</font></br></br>
		商品名称所在列：&nbsp;<input type="text" name="goodsname"></br>
		收件人所在列：<input type="text" name="receivename" ></br></br>
		收件地址所在列：<input type="text" name="address"></br></br>
		手机号码所在列：<input type="text" name="telephone"></br></br>
		购买数量所在列：<input type="text" name="buynum"></br></br>
		规格所在列：&nbsp;<input type="text" name="size"></br></br>
		订单号所在列：<input type="text" name="danid"></br>
		发件人姓名列：<input type="text" name="sendname"></br></br>
		发件人地址列：<input type="text" name="sendaddress"></br></br>
		发件人邮编列：<input type="text" name="youid"></br></br>		
		发件人电话号码列：<input type="text" name="sendphonenum"></br></br>					
		</br>
		<input type="reset" name="重置" style="margin-left: 73px;"><input type="submit" name="save" value="保存" style="margin-left: 73px;"></br></br>
	</form>
</div>
</div>
<?php mysql_close();//关闭数据库
?>
</body>
</html>
