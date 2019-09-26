<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教师端页面</title>
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
	$TeaNo=$_SESSION['username'];
	$ShowCourse_sql="select * from course where CouNo  in(select CouNo from course where TeaNo='$TeaNo')ORDER BY CouNo";
	$ShowCourseResult=db_query($ShowCourse_sql);
?>
<table align="center">
     <tr>
         <td><a href="MyStudent.php">我的学生</a></td>
         <td><a href="SearchCourse.php">查询课程</a></td>
         <td><a href="MyCourse.php">我的课程</a></td>
         <td><a href="../logout.php">退出系统</a></td>
     </tr>
</table>
<table width="620" border="0" align="center" cellpadding="0" cellspacing="1">
     <tr bgcolor="#0066CC">
         <td width="80" align="center"><font color="#FFFFFF">课程编码</font></td>
         <td width="220" align="center"><font color="#FFFFFF">课程名称</font></td>
         <td width="80"><font color="#FFFFFF" align="center">课程类型</font></td>
         <td width="50"><font color="#FFFFFF" align="center">学分</font></td>
         <td width="80"><font color="#FFFFFF" align="center">任课教师</font></td>
         <td width="100"><font color="#FFFFFF" align="center">上课时间</font></td>
         <td width="100"><font color="#FFFFFF" align="center">操作</font></td>
     </tr>
<?php
if(db_num_rows($ShowCourseResult)>0){
	$number=db_num_rows($ShowCourseResult);
	if(empty($_GET['p']))
	$p=0;
	else {$p=$_GET['p'];}	
	$check=$p +10;
	for($i=0;$i<$number;$i++){
		$row=db_fetch_array($ShowCourseResult);
		if($i>=$p && $i < $check){
			if($i%2 ==0)
			  echo"<tr bgcolor='#DDDDDD'>";
		else
			  echo"<tr>";
			  echo"<td width='80' align='center'><a href='CourseDetail.php?CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
			  echo"<td width='220'>".$row['CouName']."</td>";
			  echo"<td width='80'>".$row['Kind']."</td>";
			  echo"<td width='50'>".$row['Credit']."</td>";
			  echo"<td width='80'>".$row['Teacher']."</td>";
			  echo"<td width='100'>".$row['SchoolTime']."</td>";
			  echo"<td width='40'><a href='InputGrade.php?CouNo=".$row['CouNo']."'>录成绩</a></td>";
			  echo"</tr>";
			  //$_SESSION['CouNo_Grade'] = $row['CouNo'];
			  $j=$i+1; 
			  
		 }
		}
	}
?>
</table>
<br>
<center>点击课程编码链接可以查看课程信息</center>
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