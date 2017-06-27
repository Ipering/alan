<?php	
header("Content-type: text/html; charset=utf-8"); 
//修改密码
if(!isset($_POST['resetFirm_submit'])){  
    exit('非法访问!');
}
Session_Start();
$C_Uname = $_SESSION["C_Uname"];
$newCpwd = $_POST['newCpwd'];
//echo $N_id;

//包含数据库连接文件 
include("../config/config.php");

$query = "update tourc set C_pwd='$newCpwd' where C_Uname='$C_Uname'";//将密码存入数据库
$result = $conn->query($query);
if($result){
	echo "<script language=javascript>alert('修改成功！');window.open('../changeFirm.php','_parent')</script>";
    $result->close();
	$conn->close();
} else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('该密码不合法！');window.open('../changeFirm.php','_parent')</script>";
    exit();
}
?>