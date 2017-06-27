<?php
header("Content-type: text/html; charset=utf-8"); 	
//更新用户信息
if(!isset($_POST['changeFirm_submit'])){  
    exit('非法访问!');
}
Session_Start();
$C_Uname = $_SESSION["C_Uname"];//用户名

$C_name = $_POST['C_name'];//公司名
$C_man = $_POST['C_man'];//法人代表
$C_add = $_POST['C_add'];//地址
$C_intro = $_POST['C_intro'];//介绍

//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "update tourc set C_name='$C_name',C_man='$C_man',C_address='$C_add',C_introduce='$C_intro' where C_Uname='$C_Uname'";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('修改成功！');window.open('../changeFirm.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('信息填写不合法，修改失败！');window.open('../changeFirm.php','_parent')</script>";
    exit();
}
?>