<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员页面</title>
</head>

<body>
<img border='0' src="咬大3.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<?php
session_start();
if(! isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$teaNo=$_SESSION['username'];
	$ShowTea_sql="select * from teacher";
	$ShowTeaResult=db_query($ShowTea_sql);
?>
<table align="center">
     <tr>
		 <td><a href="ShowTeacher.php">所有老师</a></td>
		 <td><a href="ShowStudent.php">所有学生</a></td>
		 <td><a href="AddTeacher.php">添加老师</a></td>
		 <td><a href="AddStudent.php">添加学生</a></td>
         <td><a href="ShowCourse.php">所有课程</a></td>
         <td><a href="SearchCourse.php">查询课程</a></td>
         <td><a href="AddCourse.php">添加课程</a></td>
         <td><a href="../logout.php">退出系统</a></td>
     </tr>
</table>
<table width="620" border="0" align="center" cellpadding="0" cellspacing="1">
     <tr bgcolor="#0066CC">
         <td width="100" align="center"><font color="#FFFFFF">教师编号</font></td>
         <td width="80" align="center"><font color="#FFFFFF">教师姓名</font></td>
         <td width="80"><font color="#FFFFFF" align="center">院系编号</font></td>
         <td width="50"><font color="#FFFFFF" align="center">密码</font></td>
         <td width="150"><font color="#FFFFFF" align="center">教师操作</font></td>
     </tr>
<?php
if(db_num_rows($ShowTeaResult)>0){
	$number=db_num_rows($ShowTeaResult);
	if(empty($_GET['p']))
	$p=0;
	else {$p=$_GET['p'];}	
	$check=$p +10;
	for($i=0;$i<$number;$i++){
		$row=db_fetch_array($ShowTeaResult);
		if($i>=$p && $i < $check){
			if($i%2 ==0)
			  echo"<tr bgcolor='#DDDDDD'>";
		else
			  echo"<tr>";
			  //echo"<td width='220' align='center'><a href='TeacherDetai.php?teaNo=".$row['teaNo']."'>".$row['teaNo']."</a></td>";
			  echo"<td width='80'>".$row['TeaNo']."</td>";
			  echo"<td width='80'>".$row['TeaName']."</td>";  //大小写要与数据库中的字段一致
			  echo"<td width='50'>".$row['DepartNo']."</td>";
			  echo"<td width='80'>".$row['Pwd']."</td>";
			  echo"<td width='20'><a href='Modifyteacher.php? teaNo=".$row['TeaNo']."'>修改</a></td>";
			  echo"<td width='40'><a href='Deleteteacher1.php? teaNo=".$row['TeaNo']."'>删除</a></td>";
			  echo"</tr>";
			  $j=$i+1; 
		 }
		}
	}
?>
</table>
<br>
<center>点击课程编码链接可以查看课程细节</center>
<br>
<table width="400" border="0" align="center">
  <tr>
      <td align="center"><a href="ShowCourse.php? p=0">第一页</a></td>
      <td align="center">
	  <?php
	  if($p>9){
		  $last=(floor($p/10)*10)-10;
		  echo"<a href='ShowCourse.php? p=$last'>上一页</a>";
		  }
		  else
		    echo"上一页";
      ?>
      </td>
      <td align="center">
      <?php
	  if($i>9 and $number>$check)
	     echo"<a href='ShowCourse.php?p=$j'>下一页</a>";
	  else
	     echo"下一页";
      ?>
      </td>
      <td align="center">
      <?php
      if($i>9)
      {
      $final=floor($number/10)*10;
      echo"<a href='ShowCourse.php? p=$final'>最后一页</a>";
      }
      else
        echo"最后一页";
		?>
       
      </td>
  </tr>
</table>           
</body>
</html>