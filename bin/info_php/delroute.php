<?php	
header("Content-type: text/html; charset=utf-8"); 
//删除路线信息
Session_Start();
$R_id = $_SERVER["QUERY_STRING"];//编号

//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "delete from route where R_id='$R_id'";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('删除成功！');window.open('../routelist.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('删除失败！');window.open('../routelist.php','_parent')</script>";
    exit();
}
?>