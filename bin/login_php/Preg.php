<?php	
header("Content-type: text/html; charset=utf-8"); 
//注册
if(!isset($_POST['pReg_submit'])){  
    exit('非法访问!');
}
$P_name = $_POST['P_name'];//用户名
$P_phone = $_POST['P_phone'];//手机
$P_idcard = $_POST['P_idcard'];//身份证
$P_realName = $_POST['P_realName'];//真实姓名
$P_sex = $_POST['P_sex'];//性别
$P_age = $_POST['P_age'];//年龄
$P_regPwd = $_POST['P_regPwd'];//密码
  
//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "insert into tourp(P_id,P_Uname,P_pwd,P_phone,P_idcard,P_name,P_sex,P_age) values('','$P_name','$P_regPwd','$P_phone','$P_idcard','$P_realName','$P_sex','$P_age')";
					  
	$result = $conn->query($query);

if ($result){
		 
	echo "<script language=javascript>alert('注册成功！');window.open('../pLogin.html','_parent')</script>";
		
    $result->close();
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('注册失败！');window.open('../pRegister.html','_parent')</script>";
    exit();
}
?>