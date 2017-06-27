<?php	
header("Content-type: text/html; charset=utf-8"); 
//更新用户信息
if(!isset($_POST['changePerson_submit'])){  
    exit('非法访问!');
}
Session_Start();
$P_Uname = $_SESSION["P_Uname"];//用户名

$P_phone = $_POST['P_phone'];//手机
$P_idcard = $_POST['P_idcard'];//身份证
$P_name = $_POST['P_name'];//姓名
$P_sex = $_POST['P_sex'];//性别
$P_age = $_POST['P_age'];//年龄

//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "update tourp set P_phone='$P_phone',P_idcard='$P_idcard',P_name='$P_name',P_sex='$P_sex',P_age='$P_age' where P_Uname='$P_Uname'";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('修改成功！');window.open('../changePerson.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('信息填写不合法，修改失败！');window.open('../changePerson.php','_parent')</script>";
    exit();
}
?>