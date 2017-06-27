<?php	
header("Content-type: text/html; charset=utf-8"); 
//支付
Session_Start();
$F_id = $_SERVER["QUERY_STRING"];//编号

//包含数据库连接文件  
include("../config/config.php");
//操作数据库

	$query = "update form set F_state=1 where F_id='$F_id'";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('支付成功！');window.open('../orderState.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('支付失败！');window.open('../orderState.php','_parent')</script>";
    exit();
}
?>