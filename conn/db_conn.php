<?php
	$DB_HOST	= "localhost";	  //���ݿ�����λ��
	$DB_LOGIN	= "root";	  //���ݿ��ʹ���˺�
	$DB_PASSWORD	= "7758";	  //���ݿ��ʹ������
	$DB_NAME	= "xuanke";           //���ݿ�����

	$con = mysql_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD);
	mysql_select_db($DB_NAME);
    mysql_query( "SET NAMES 'UTF8' ");	
?>