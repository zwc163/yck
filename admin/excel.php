<?php 
header('Content-type: text/html; charset=utf-8');
header("Content-type:application/vnd.ms-excel;charset=UTF-8"); 
header("Content-Disposition:filename=room.xls"); //输出的表格名称
echo "用户名\t";
echo "姓名\t";echo "身份证号\t";echo "宾馆名称\t";echo "房间类型\t";echo "备注\t";echo "所在单位\t";echo "入住日期\t";echo "离开日期\t\n";
//这是表格头字段 加\T就是换格,加\T\N就是结束这一行,换行的意思

require_once '../database.php';
$sql="select * from usertable";

$result=mysql_query($sql);

while($row=mysql_fetch_array($result)){
echo $row[username]."\t";
echo $row[tourname]."\t";echo $row[tourid]."\t";
echo $row[roomname]."\t";echo $row[roomtype]."\t";echo $row[tourname2]."\t";echo $row[tourcompany]."\t";
echo $row[startdate]."\t";echo $row[enddate]."\t\n";
}
?>
