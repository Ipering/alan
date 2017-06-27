<?php	
header("Content-type: text/html; charset=utf-8"); 
//删除景点信息
Session_Start();
$V_id = $_SERVER["QUERY_STRING"];//编号

//包含数据库连接文件  
include("../config/config.php");
//操作数据库
	$query = "delete from viewspot where V_id='$V_id'";
					  
	$result = $conn->query($query);

if ($result){
	echo "<script language=javascript>alert('删除成功！');window.open('../sightlist.php','_parent')</script>";
	$conn->close();  
}else {
	echo mysqli_error($conn);
    echo "<script language=javascript>alert('删除失败！');window.open('../changesight.php','_parent')</script>";
    exit();
}
?>