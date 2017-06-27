<?php	
header("Content-type: text/html; charset=utf-8"); 
//注册
if(!isset($_POST['fReg_submit'])){  
    exit('非法访问!');
}  
$C_name = $_POST['C_name'];//用户名
$C_firmName = $_POST['C_firmName'];//公司名
$C_man = $_POST['C_man'];//法人
$C_add = $_POST['C_add'];//地址
$C_contant = $_POST['C_contant'];//公司介绍
$C_regPwd = $_POST['C_regPwd'];//密码
  
//包含数据库连接文件  
include("../config/config.php");
//操作数据库
$query = "insert into tourc(C_id,C_Uname,C_pwd,C_name,C_man,C_address,C_introduce) values('','$C_name','$C_regPwd','$C_firmName','$C_man','$C_add','$C_contant')";
					  
	$result = $conn->query($query);

if ($result){
		 
	echo "<script language=javascript>alert('注册成功！');window.open('../fLogin.html','_parent')</script>";
		
    $result->close();
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('注册失败！');window.open('../fRegister.html','_parent')</script>";
    exit();
}
?>