<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<img border='0' src="咬大3.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$StuNo=$_GET[StuNo];
	$CouNo=$_GET[CouNo];
	$Grade = $_GET[Grade];
	
	
	$InsertGrade_sql="Update  stucou set Grade = '$Grade' where StuNo = '$StuNo' and CouNo = '$CouNo' ";
	$insertGrade_Result=db_query($InsertGrade_sql); 
	
		
	  if($insertGrade_Result){
			echo"<script>";
			echo"alert(\"录入成绩成功\");";
			echo"location.href=\"InputGrade.php?CouNo=$CouNo\"";
			echo"</script>";
			} else {
			echo"<script>";
		    echo"alert(\"录入成绩失败\" +'$CouNo');";
			echo"location.href=\"InputGrade.php?CouNo=$CouNo\"";	
			echo"</script>";
				}
		
	
			
?>
</body>
</html>