<?php	
header("Content-type: text/html; charset=utf-8"); 
//添加路线信息
if(!isset($_POST['addRoute_submit'])){  
    exit('非法访问!');
}
Session_Start();
$C_id = $_SESSION["C_id"];
$R_name = $_POST['R_name'];//名称
$R_point = $_POST['R_point'];//途经景点
$R_start = $_POST['R_start'];//开始时间
$R_end = $_POST['R_end'];//结束时间
$R_price = $_POST['R_price'];//价格
$R_food = $_POST['R_food'];//餐饮
$R_hotel = $_POST['R_hotel'];//住店
$R_traffic = $_POST['R_traffic'];//交通
$R_plan = $_POST['R_plan'];//计划

  
//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "insert into route(R_id,C_id,R_name,R_point,R_start,R_end,R_price,R_food,R_hotel,R_traffic,R_plan) values('','$C_id',
		'$R_name','$R_point','$R_start','$R_end','$R_price','$R_food','$R_hotel','$R_traffic','$R_plan')";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('添加成功！');window.open('../routeList.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('信息填写不合法，添加失败！');window.open('../routeList.php','_parent')</script>";
    exit();
}
?>