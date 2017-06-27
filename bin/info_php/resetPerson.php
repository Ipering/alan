<?php	
header("Content-type: text/html; charset=utf-8"); 
//修改密码
if(!isset($_POST['resetPerson_submit'])){  
    exit('非法访问!');
}
Session_Start();
$P_Uname = $_SESSION["P_Uname"];
$newPpwd = $_POST['newPpwd'];
//echo $N_id;

//包含数据库连接文件  
include("../config/config.php");

$query = "update tourp set P_pwd='$newPpwd' where P_Uname='$P_Uname'";//将密码存入数据库
$result = $conn->query($query);
if($result){
	echo "<script language=javascript>alert('修改成功！');window.open('../changePerson.php','_parent')</script>";
    $result->close();
	$conn->close();
} else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('该密码不合法！');window.open('../changePerson.php','_parent')</script>";
    exit();
}
?>