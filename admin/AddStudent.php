<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if(! isset($_SESSION["username"])){ //isset判断变量是否定义，这里是是否有这个session
	header("Location:..//login.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){ //只有admin才有这个权限
		header("Location:..//login.php");
		exit();
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加课程</title>
</head>

<body>
<img border='0' src="咬大3.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<center>
 <table align="center">
     <tr>
        <td><a href="AddTeacher.php">添加老师</a></td>
		 <td><a href="AddStudent.php">添加学生</a></td>
         <td><a href="ShowCourse.php">所有课程</a></td>
         <td><a href="SearchCourse.php">查询课程</a></td>
         <td><a href="AddCourse.php">添加课程</a></td>
         <td><a href="../logout.php">退出系统</a></td>
     </tr>
</table><br>
请输入学生信息
<form method="post" action="AddTeacher1.php" >
<table>
<tr>
<td>学生编号：</td>
<td><input type="text" name="stuNo" size="20"></td>
</tr>

<tr>
<td>学生姓名：</td>
<td><input type="text" name="stuName" size="20"></td>
</tr>

<tr>
<td>院系编号：</td>
<td><input type="text" name="deptNo" size="20" /></td>
</tr>

<tr>
<td>班级：</td>
<td><input type="text" name="classNo" size="20" /></td>
</tr>

<tr>
<td>密码：</td>
<td><input type="text" name="pwd" size="20" /></td>
</tr>


<tr>

</tr>
</table>
<input type="submit" value="确定" name="B1">
<input type="reset" value="重置" name="B2">
</form>
</center>
</body>
</html>