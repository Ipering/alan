<?php	
header("Content-type: text/html; charset=utf-8"); 
//更新景点信息
if(!isset($_POST['changesight_submit'])){  
    exit('非法访问!');
}
Session_Start();
$V_id = $_SESSION["V_id"];//编号
$V_name = $_POST['V_name'];//名称
$V_add = $_POST['V_add'];//位置
$V_price = $_POST['V_price'];//价格
$V_cont = $_POST['V_cont'];//游玩项目
$V_intro = $_POST['V_intro'];//介绍

//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "update viewspot set V_name='$V_name',V_address='$V_add',V_content='$V_cont',V_introduce='$V_intro',V_price='$V_price' where V_id='$V_id'";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('修改成功！');window.open('../sightlist.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('信息填写不合法，修改失败！');window.open('../changesight.php','_parent')</script>";
    exit();
}
?>