<?php	
header("Content-type: text/html; charset=utf-8"); 
//登录  
if(!isset($_POST['fLogin_submit'])){  
    exit('非法访问!');
}  
$C_Uname = $_POST['C_Uname'];//获取编号
$C_pwd = $_POST['C_pwd'];//获取密码
  
//包含数据库连接文件  
include("../config/config.php");
//检测用户名及密码是否正确    
$query = "select * from tourc where C_Uname='$C_Uname' and C_pwd='$C_pwd'";//验证编号、密码
$result = $conn->query($query);

if($result->num_rows>0){
    //登录成功 
    session_start();
    $_SESSION['C_Uname'] = $C_Uname;
	echo "<script language=javascript>alert('登录成功！');window.open('../changeFirm.php','_parent')</script>";
    $result->close();
	$conn->close();  
} else {
	echo "<script language=javascript>alert('账户或密码错误！请重新输入。');window.open('../fLogin.html','_parent')</script>";
    exit();
}  
?>