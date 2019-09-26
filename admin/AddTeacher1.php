<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成添加教师的程序</title>
</head>

<body>
<img border='0' src="咬大3.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:index.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
	header("Location:..//login.php");
	exit();
		}
include("../conn/db_conn.php");
include("../conn/db_func.php");
$teaNo=$_POST['teaNo'];
$teaName=$_POST['teaName'];
$deptNo=$_POST['deptNo'];
$pwd=$_POST['pwd'];
$AddCourse_SQL="insert into teacher values('$teaNo','$deptNo','$teaName','$pwd')";
$AddCourse_Result=db_query($AddCourse_SQL);


if($AddCourse_Result){
	echo"<script>";
	echo"alert(\"添加教师成功\");";
	echo"location. href=\"ShowCourse.php\"";
	echo"</script>";
	}else{
	echo"<script>";
	echo"alert(\"添加教师失败，请重新添加\");";
	echo"location. href=\"AddTeacher.php\"";
	echo"</script>";
		}
?>
</body>
</html>