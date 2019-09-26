<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<img border='0' src="bg2.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$StuNo=$_POST[StuNo];
	$CouNo=$_POST[CouNo];
	$SchoolTime = $_POST[CourseTime];
	$TeaNo = $_POST[TeaNo];
	
	$ShowDetail_sql="select * from course,stucou where course.CouNo=stucou.CouNo and StuNo='$StuNo'";
	$ShowDetailResult=db_query($ShowDetail_sql); //判断时间是否冲突
	$number=db_num_rows($ShowDetailResult);
	
	
	$flag = 0;
	$insertCourse="insert into stucou(StuNo,CouNo,TeaNo)values('$StuNo','$CouNo','$TeaNo')";
	for($i =0;$i<$number;$i++)
	{
		$row=db_fetch_array($ShowDetailResult);
		if($SchoolTime == $row[SchoolTime]){
			$flag = 1;
			break;
		}
		
			
	}
	if($flag == 1){
			echo"<script>";
		    echo"alert(\"选课失败，时间冲突\");";
			echo"location.href=\"showchoosed.php\"";	
			echo"</script>";
		} else{
	if(db_num_rows($ShowDetailResult)<10){
		
		$insertCourse_Result=db_query($insertCourse);
		
	  if($insertCourse_Result){
			echo"<script>";
			echo"alert(\"选择课程成功\");";
			echo"location.href=\"showchoosed.php\"";
			echo"</script>";
			} else {
			echo"<script>";
		    echo"alert(\"选择课程失败，请重新选择\");";
			echo"location.href=\"CourseDetail.php\"";	
			echo"</script>";
				}
		}else{
			echo"<script>";
		    echo"alert(\"选课失败，你最多只可选十门课\");";
			echo"location.href=\"showchoosed.php\"";	
			echo"</script>";
			}
		}
			
?>
</body>
</html>