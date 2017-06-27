<?php	
header("Content-type: text/html; charset=utf-8"); 
//登录  
if(!isset($_POST['login_submit'])){  
    exit('非法访问!');
}  
$N_id = $_POST['N_id'];//获取编号
$N_pwd = $_POST['N_pwd'];//获取密码
  
//包含数据库连接文件  
include("../config/config.php");
//检测用户名及密码是否正确    
$query = "select * from tourn where root='$N_id' and pwd='$N_pwd'";//验证编号、密码
$result = $conn->query($query);

if($result->num_rows>0){
    //登录成功 
    session_start();
    $_SESSION['N_id'] = $N_id;
	echo "<script language=javascript>alert('登录成功！');window.open('../index.php','_parent')</script>";
    $result->close();
	$conn->close();
} else {
	echo "<script language=javascript>alert('账户或密码错误！请重新输入。');window.open('../login.html','_parent')</script>";
    exit();
}
?>