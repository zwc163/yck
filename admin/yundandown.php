<?php
	header("Content-Type:text/html;charset=utf-8");
	$plateformname=$_POST['plateformname'];
	echo $plateformname;
	require_once '../database.php';
	$sql="select * from yundan where downflag=0";
	$re=mysql_query($sql) or die(mysql_error());
	$r=0;
	$num=0;
	while($row=mysql_fetch_array($re))
	{
		$danid[$r][0]=$row['danid'];
		$danid[$r][1]=$row['yundanid'];
		$r++;	
	}	
	if($r==0)
	{
		echo "没有新运单";
		echo "<script>alert('没有新运单');history.go(-1);</script>";  
		return;
	}else
	{
		for($i=0;$i<$r;$i++)
		{
			$sql="select * from fahuotable where danid=".$danid[$i][0]." and plateformname='$plateformname'";
		//	echo $sql."</br>";
			$re=mysql_query($sql) or die(mysql_error());
			$n = mysql_num_rows($re);
			if($n)
			{
				$dataset[$num][0]=$danid[$i][0];
				$dataset[$num][1]=$danid[$i][1];
				$num++;
			}			
		}
	}
	if($num==0)
	{
		echo "该平台没有新运单";
		echo "<script>alert('该平台没有新运单');history.go(-1);</script>";  
	}else
	{
		require_once "..\Classes\PHPExcel.php";
		date_default_timezone_set('Asia/Shanghai');
		$time=date("y-m-d-h-m-s");
		$filename='down/'.$time.$plateformname."运单";
		 $objPHPExcel = new PHPExcel();
		$objSheet = $objPHPExcel->getActiveSheet();        //选取当前的sheet对象
		 $objSheet->setTitle('yundan'); 
		 $objSheet->setCellValue("A"."1","订单编号");$objSheet->setCellValue("B"."1","快递单号");
		 $rownum=2;
		 for($i=0;$i<$num;$i++)
		 {
	 		$objSheet->setCellValue("A".$rownum,$dataset[$i][0]);
	 		$objSheet->setCellValue("B".$rownum,$dataset[$i][1]);
	 		$rownum++;
		 }
		 	 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');   //设定写入excel的类型
		 $filename=$filename.'.xls';
		 $filename=iconv("UTF-8","gb2312", $filename);
		 $objWriter->save($filename);      //保存文件
		 $filename=iconv("gb2312","UTF-8", $filename);
		 echo "<a href='$filename'>'$filename'</a>";
		 for($i=0;$i<$num;$i++)
		 {
		 	$sql="update yundan set downflag='1' where danid=".$dataset[$i][0];
		 	//echo $sql;
		 	$re=mysql_query($sql) or die(mysql_error());
		 }
	}
	mysql_close();
?>