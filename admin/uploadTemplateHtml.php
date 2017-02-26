<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传给供货商的订单</title>
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
	width:70%;
	height: 80%;
	float:right;
	left: 196px;
	top: 16px;
}
</style>
<script type="text/javascript"> 
function changeValue(obj)
{
    obj.value="处理中...";
}
 </script>
<?php 
	require_once '../Classes/myfunction.php';
	checkLogin();
?>
<body>
<style>
.juzhong{ position:relative;margin:0px auto; width:1208px;}
</style>
<div class="juzhong"><img src="../images/1450686271.jpg" width="1208" height="280" /></div>
<div class="juzhong">
<?php 
//	require_once '../database.php';
		require_once 'include.php';
?>
<div class="maindiv"><center>保存供货商订单表格信息 <a href="setghstablehtml.php">设置供货商表格顺序</a></center>
	<form method="post" action="../upload/uploadTemplateTable.php" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1024000">
		<fieldset>
			请输入供货商名称：
			<p><input name="ghsname" type="text" size="80" class="field" id="name" maxlength="50" placeholder=" 请输入供货商名称"></p>
			请输入快递名称：
			<p><input name="express" type="text" size="80" class="field" id="name" maxlength="50" placeholder=" 请输入快递名称"></p>			
			<p><input name="uploadfile" type="file" class="field1" id="email" placeholder="EMAIL"></p>
			<!--<p><textarea name="message" id="message" placeholder="MESSAGE"></textarea> </p>-->		
			<input type="reset" name="btnReset" style="margin-left:120px ;" class="field" value="重置">
			<input type="submit" name="btnPostFile" class="Button" style="margin-left: 173px;" value="上传" onclick="changeValue(this)">
		</fieldset>
	</form></div>
</div>
<?php //mysql_close();//关闭数据库
?>
		<footer>
		<center>
        	<div>	
                <p>Copyright © 2016<a href="" target="_blank" title="">游鲜生</a>
                </p>
			</div></center>
		</footer>
</body>
</html>
