<?php
	$DB_HOST	= "localhost";	  //数据库主机位置
	$DB_LOGIN	= "root";	  //数据库的使用账号
	$DB_PASSWORD	= "7758";	  //数据库的使用密码
	$DB_NAME	= "xuanke";           //数据库名称

	$con = mysql_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD);
	mysql_select_db($DB_NAME);
    mysql_query( "SET NAMES 'UTF8' ");	
?>