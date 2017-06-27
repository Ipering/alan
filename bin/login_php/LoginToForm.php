<?php	
header("Content-type: text/html; charset=utf-8"); 
//登录下订单 
if(!isset($_POST['pLogin2_submit'])){  
    exit('非法访问!');
}
$P_Uname = $_POST['P_Uname'];//获取编号
$P_pwd = $_POST['P_pwd'];//获取密码
$R_id =  $_SERVER["QUERY_STRING"];//路线编号
  
//包含数据库连接文件  
include("../config/config.php");
//检测用户名及密码是否正确    
$query = "select * from tourp where P_Uname='$P_Uname' and P_pwd='$P_pwd'";//验证编号、密码
$result = $conn->query($query);

if($result->num_rows>0){
    //登录成功 
    session_start();
    $_SESSION['P_Uname'] = $P_Uname;
	echo "<script language=javascript>alert('登录成功！');window.open('../search/route_product.php?".$R_id."','_parent')</script>";
    $result->close();
	$conn->close();  
} else {
	echo "<script language=javascript>alert('账户或密码错误！请重新输入。');window.open('../search/route_product.php?".$R_id."','_parent')</script>";
    exit();
}  
?>