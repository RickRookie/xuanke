<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成修改课程操作程序</title>
</head>

<body>
<img border='0' src="咬大3.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:index.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
	header("Location:../login.php");
	exit();
		}
include("../conn/db_conn.php");
include("../conn/db_func.php");
$CouNo=$_POST['CouNo'];
$CouName=$_POST['CouName'];
$Kind=$_POST['Kind'];
$Credit=$_POST['Credit'];
$Teacher=$_POST['Teacher'];
$SchoolTime=$_POST['SchoolTime'];
$LimitNum=$_POST['LimitNum'];

$ModifyCourse_SQL="update Course set CouNo='$CouNo',CouName='$CouName',Kind='$Kind',Credit='$Credit',Teacher='$Teacher',SchoolTime='$SchoolTime',LimitNum='$LimitNum' where CouNo='$CouNo'";
$ModifyCourse_Result=db_query($ModifyCourse_SQL);
//echo $ModifyCourse_Result;exit;
if($ModifyCourse_Result){
	echo"<script>";
	echo"alert(\"课程信息修改成功\");";
	echo"location. href=\"ShowCourse.php\"";
	echo"</script>";
	}else{
	echo"<script>";
	echo"alert(\"课程信息修改失败，请重新修改\");";
	echo"location='javascript:history.go(-1)'";
	echo"</script>";
		}
?>
</body>
</html>