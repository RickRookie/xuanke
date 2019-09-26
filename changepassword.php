<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
</head>
<body>
<?php
session_start();
include("conn/db_conn.php");
include("conn/db_func.php");
$role=$_POST['role'];
$username=$_POST['username'];
$userpwd=$_POST['userpwd'];
$newpwd=$_POST['newpwd'];
if($role=="admin")
{
	$ChkLogin="select * from admin where aid='$username' and apwd='$userpwd'";
	}
	else if ($role == "teacher") {
		$ChkLogin="select * from teacher where TeaNo='$username' and Pwd='$userpwd'";
	} else {
		$ChkLogin="select * from student where StuNo='$username' and Pwd='$userpwd'";
}
		$ChkLoginResult=db_query($ChkLogin);
		$number=db_num_rows($ChkLoginResult);
        $row=db_fetch_array($ChkLoginResult);
		if($number>0){
			if($role=="admin"){
				$_SESSION["username"]=$username;
				$_SESSION["role"]="admin";
				$Changepassword_SQL="update admin set apwd='$newpwd' where aid='$username'";
				$Changepassword_Result=db_query($Changepassword_SQL);
				if($Changepassword_Result){
				echo"<script>";
				echo"alert(\"密码修改成功\");";
				echo"location. href=\"login.php\"";
				echo"</script>";
				}else{
				echo"<script>";
				echo"alert(\"修改失败，请重新修改\");";
				echo"location='javascript:history.go(-1)'";
				echo"</script>";
		}
				
				}  else if($role=="teacher") {
					$_SESSION["username"]=$username;
				    $_SESSION["role"]="teacher";
					$Changepassword_SQL="update teacher set Pwd='$newpwd' where TeaNo='$username'";
				$Changepassword_Result=db_query($Changepassword_SQL);
				if($Changepassword_Result){
				echo"<script>";
				echo"alert(\"密码修改成功\");";
				echo"location. href=\"login.php\"";
				echo"</script>";
				}else{
				echo"<script>";
				echo"alert(\"修改失败，请重新修改\");";
				echo"location='javascript:history.go(-1)'";
				echo"</script>";
				}
				}				else{
					$_SESSION["username"]=$username;
					$Changepassword_SQL="update student set Pwd='$newpwd' where StuNo='$username'";
					$Changepassword_Result=db_query($Changepassword_SQL);
					if($Changepassword_Result)
					{
					echo"<script>";
					echo"alert(\"密码修改成功\");";
					echo"location. href=\"login.php\"";
					echo"</script>";
						}
						else{
						echo"<script>";
						echo"alert(\"修改失败，请重新修改\");";
						echo"location='javascript:history.go(-1)'";
						echo"</script>";
						}
					//header("Location:stu/login.php");
					//echo "123";
						
			}
		}else{
				echo"<script>";
				echo"alert(\"用户名或者密码错误，请重新输入\");";
				echo"location.href=\"modifypassword.php\"";
				echo"</script>";
				}
?>
</body>
</html>