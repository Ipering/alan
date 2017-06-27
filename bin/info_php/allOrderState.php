<?php
header("Content-type: text/html; charset=utf-8"); 
//设置时差
date_default_timezone_set('prc');	
//退订
Session_Start();
$F_id = $_SERVER["QUERY_STRING"];//编号
$F_Etime = date('y-m-d H:i:s',time());//获取当前时间

//包含数据库连接文件  
include("../config/config.php");
//操作数据库

	$query2 = "select F_state form from where F_id='$F_id'";
	$result2 = $conn->query($query2);
	if ($result2 = 1) {
		$query = "update form set F_state=5,F_Etime='$F_Etime' where F_id='$F_id'";
	}else{
		$query = "update form set F_state=3,F_Etime='$F_Etime' where F_id='$F_id'";
		}	  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('受理成功！');window.open('../orderList.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('受理失败！');window.open('../orderList.php','_parent')</script>";
    exit();
}
?>