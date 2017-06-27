<?php
	$host = "127.0.0.1";
	$username = "root";
	$password = "0";
	$dbname = "travel";

	$conn = new mysqli($host,$username,$password,$dbname);//mysqli链接数据库的写法
	if (mysqli_connect_errno()){
	die('数据库连接失败!'). mysqli_connect_error();
	}
	mysqli_query($conn,"SET NAMES utf8");
?>
