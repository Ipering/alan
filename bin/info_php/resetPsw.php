<?php	
header("Content-type: text/html; charset=utf-8"); 
//登录
if(!isset($_POST['resetPsw_submit'])){  
    exit('非法访问!');
}
Session_Start();
$N_id = $_SESSION["N_id"];
$newNpwd = $_POST['newNpwd'];
//echo $N_id;

//包含数据库连接文件  
include("../config/config.php");
//检测用户名及密码是否正确    
//$query = "select * from tourn where root='$N_id'";
//$result = $conn->query($query);
$query = "update tourn set pwd='$newNpwd' where  root='$N_id'";//将密码存入数据库
$result = $conn->query($query);
if($result){
	echo "<script language=javascript>alert('修改成功！');window.open('../resetPsw.php','_parent')</script>";
    $result->close();
	$conn->close();
} else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('该密码不合法！');window.open('../resetPsw.php','_parent')</script>";
    exit();
}
?>