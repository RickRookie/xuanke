<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>浏览已选课程</title>
</head>

<body>
<img border='0' src="bg2.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
}
include("../conn/db_conn.php");
include("../conn/db_func.php");
$StuNo=$_SESSION['username'];
$sql="select * from course,stucou where course.CouNo=stucou.CouNo and StuNo='$StuNo' ";
$result=db_query($sql);
?>
<table width="350" border="0" align="center">
  <tr>
        <td><a href="ShowCourse.php">所有课程</a></td>
        <td><a href="SearchCourse.php">查询课程</a></td>
        <td><a href="showchoosed.php">我的课程</a></td>
		<td ><a href="showgrade.php">我的成绩</a></td>
        <td><a href="../logout.php">退出系统</a></td>
     </tr>
</table>
<table width="643"  align="center" >
  <tr  bgcolor="#0066CC">
    <td width="108"><font color="#FFFFFF">课程编码</font></td>
    <td width="127" align="center"><font color="#FFFFFF">课程名称</font></td>
    <td width="105"><font color="#FFFFFF">课程类别</font></td>
    <td width="56"><font color="#FFFFFF">学分</font></td>
    <td width="83"><font color="#FFFFFF">任课老师</font></td>
    <td width="136"><font color="#FFFFFF">上课时间</font></td>
    <td width="40"><font color="#FFFFFF">操作</font></td
  ></tr>
  <?php

	$number=db_num_rows($result);
	
	
	
	for($i=0;$i<$number;$i++)
	{
		
		$row=db_fetch_array($result);
			if($i%2==0)
			echo "<tr bgcolor='#dddddd'>";
			else
			 echo "<tr>";
			 echo "<td width='80'><a href='CourseDetail.php?CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
			 ?>
             
    <td width="108" align="center"><?php echo $row['CouName'] ?></td>
    <td width="127"><?php echo $row['Kind']  ?></td>
    <td width="105"><?php echo $row['Credit']  ?></td>
    <td width="56"><?php echo $row['Teacher'] ?></td>
    <td width="83"><?php echo $row['SchoolTime']  ?></td>
    <?php
	echo"<td width='40'><a href='delCourse.php?CouNo=".$row['CouNo']."&StuNo=".$row['StuNo']."'>删除</a></td>"
    ?>
	</tr>
    
<?php		
		
	
}
?>

</table>
</body>
</html>