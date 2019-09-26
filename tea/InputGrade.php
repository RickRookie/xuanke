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
$cur_q=parse_url($_SERVER["REQUEST_URI"],PHP_URL_QUERY);
parse_str($cur_q,$myArray);
$CouNo_grade = $myArray['CouNo'];
//echo"<script>";
				//echo"alert(\"修改失败，请重新修改\" + '$CouNo_grade');";
				//echo"location='javascript:history.go(-1)'";
				//echo"</script>";

if(! isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$TeaNo=$_SESSION['username']; //取得当前老师教该课的学生
	$ShowCourse_sql="select * from student where StuNo in (select StuNo from stucou,teacher where stucou.TeaNo = teacher.TeaNo 
	and CouNo = '$CouNo_grade')
	 ";
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
         <td width="80" align="center"><font color="#FFFFFF">学生编码</font></td>
         <td width="220" align="center"><font color="#FFFFFF">学生姓名</font></td>
         <td width="80"><font color="#FFFFFF" align="center">院系</font></td>
         <td width="50"><font color="#FFFFFF" align="center">班级</font></td>
         <td width="100"><font color="#FFFFFF" align="center">分数</font></td>
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
		//global $StuNo = $row['StuNo'];
		if($i>=$p && $i < $check){
			if($i%2 ==0)
			  echo"<tr bgcolor='#DDDDDD'>";
		else
			  echo"<tr>";
			  echo"<td width='220'>".$row['StuNo']."</td>";
			  echo"<td width='80'>".$row['StuName']."</td>";
			  echo"<td width='50'>".$row['DepartNo']."</td>";
			  echo"<td width='80'>".$row['ClassNo']."</td>";
			  $StuNo = $row['StuNo'];
			  echo"<td width='20' >  <form method = \"get\" action = \"InputGrade1.php\">
			  <input type=\"text\" name = \"Grade\" />
			  <input type = \"hidden\" name = \"CouNo\" value = \"$CouNo_grade\">
			  <input type = \"hidden\" name = \"StuNo\" value = \"$StuNo\">
			   <input type=\"submit\" value=\"确定\">
			   </form>
			  </td>";
			  
			  echo"</tr>";
			 $stu[$i] = $row['StuNo'];
			 
			  //db_query($InsertGrade_sql);
			  
			  
		 }
		}
		 
	}
?>
    <script>
function mail()
{
    var patten2= new RegExp(/^[0-9|A-z|_]{1,17}[@][0-9|A-z]{1,3}.(com)$/)
    var mail = document.getElementById("2").value;
    if(patten2.test(mail))
      {
         // alert("输入正确");
          //window.location.href="http://www.baidu.com";
		  <?php
		  //$InsertGrade_sql = "insert into stucou (Grade) values(_POST['Grade']) where StuNo = '$row['StuNo']' and
			   //    CouNo = '$CouNo_grade'";
		  ?>
      }
    else
      {
          alert("输入错误");
      }
}
</script>    
</body>
</html>