<?php	
header("Content-type: text/html; charset=utf-8"); 
//添加景点信息
if(!isset($_POST['addsight_submit'])){  
    exit('非法访问!');
}
$V_name = $_POST['V_name'];//名称
$V_add = $_POST['V_add'];//位置
$V_price = $_POST['V_price'];//价格
$V_cont = $_POST['V_cont'];//游玩项目
$V_intro = $_POST['V_intro'];//介绍
 
$V_cont = nl2br($V_cont);  

//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "insert into viewspot(V_id,V_name,V_address,V_content,V_introduce,V_price) values('','$V_name','$V_add','$V_cont','$V_intro','$V_price')";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('添加成功！');window.open('../sightlist.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('信息填写不合法，添加失败！');window.open('../sightlist.php','_parent')</script>";
    exit();
}
?>