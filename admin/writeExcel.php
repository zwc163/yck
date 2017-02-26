<?php
function getSendInfo($ghsname)
{
	$sql="select * from gonghuoshang where ghsname='$ghsname'";
	$re=mysql_query($sql) or die(mysql_error());//执行sql语句
	$row=mysql_fetch_array($re);
	$info[0]=$row['sendname'];
	$info[1]=$row['sendphonenum'];
	$info[2]=$row['youid'];
	$info[3]=$row['sendaddress'];
	return $info;
}
function getghsHead($ghsname)
{
	$sql="select * from ghstable where ghsname='$ghsname'";
	$re=mysql_query($sql) or die(mysql_error());//执行sql语句
	$row=mysql_fetch_array($re);
	$head[0][0]=$row['a1'];
		$head[0][1]=$row['a2'];
		$head[0][2]=$row['a3'];
			$head[0][3]=$row['a4'];
			$head[0][4]=$row['a5'];
				$head[0][5]=$row['a6'];
				$head[0][6]=$row['a7'];
					$head[0][7]=$row['a8'];
					$head[0][8]=$row['a9'];
						$head[0][9]=$row['a10'];
	$head[0][10]=$row['a11'];
	$head[0][11]=$row['a12'];
	$head[0][12]=$row['a13'];
	$head[0][13]=$row['a14'];
	$head[0][14]=$row['a15'];
	$head[0][15]=$row['a16'];
	$head[0][16]=$row['a17'];
	$head[0][17]=$row['a18'];
	$head[0][18]=$row['a19'];
	$head[0][19]=$row['a20'];
	$head[0][20]=$row['a21'];
	$head[0][21]=$row['a22'];
	$head[0][22]=$row['a23'];
	$head[0][23]=$row['a24'];
	$head[0][24]=$row['a25'];
	$head[0][25]=$row['a26'];
	$head[0][26]=$row['a27'];
	$head[0][27]=$row['a28'];
	$head[0][28]=$row['a29'];
	$head[0][29]=$row['a30'];
	$head[1][0]=$row['paytime'];//所在列号
	$head[1][1]=$row['receivename'];
	$head[1][2]=$row['address'];
	$head[1][3]=$row['telephone'];
	$head[1][4]=$row['goodsname'];
	$head[1][5]=$row['buynum'];
	$head[1][6]=$row['size'];
	$head[1][7]=$row['danid'];
	$head[1][8]=$row['sendname'];
	$head[1][9]=$row['sendphonenum'];
	$head[1][10]=$row['youid'];
	$head[1][11]=$row['sendaddress'];	
	return $head;
}
function writetoexcel($dataset,$ghsname,$rownum,$express)
{
	require_once "..\Classes\PHPExcel.php";
	date_default_timezone_set('Asia/Shanghai');
	$time=date("y-m-d-h-m-s");
	$filename='down/'.$time.$ghsname;
	 $objPHPExcel = new PHPExcel();
	$objSheet = $objPHPExcel->getActiveSheet();        //选取当前的sheet对象
	 $objSheet->setTitle('fahuoibiao');                      //对当前sheet对象命名

	 //取巧模式：利用fromArray()填充数据
	 $head=getghsHead($ghsname);
	 for($i=0;$i<count($head[0]);$i++)
	 {
	 	$columnName = PHPExcel_Cell::stringFromColumnIndex($i);
	 	$objSheet->setCellValue($columnName."1",$head[0][$i]);//写入表头
	 }
	 $i=0;$row=2;
	 echo $rownum."</br>";
	for($i=0;$i<$rownum;$i++)
	{
		for($j=0;$j<12;$j++)
		{
	 //	$columnName = PHPExcel_Cell::stringFromColumnIndex($head[1][$j]);
	 	if($head[1][$j]!='ZZ')
	 	{
	 		//echo $dataset[$i][$j];
	 	$objSheet->setCellValue($head[1][$j].$row,$dataset[$i][$j]);
	 	}	
	 	}$row++;echo $row;
	}
//	 $objSheet->fromArray($dataset);  //利用fromArray()直接一次性填充数据
	 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');   //设定写入excel的类型
	 $filename=$filename.$express.'.xls';
	 $filename=iconv("UTF-8","gb2312", $filename);
	 $objWriter->save($filename);      //保存文件
	 $filename=iconv("gb2312","UTF-8", $filename);
	 
	 return $filename;
}
?>