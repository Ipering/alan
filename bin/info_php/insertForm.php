<?php	
header("Content-type: text/html; charset=utf-8"); 
//设置时差
date_default_timezone_set('prc');
//包含数据库连接文件 
include("../config/config.php");
//添加订单信息
Session_Start();
$C_id =  $_SERVER["QUERY_STRING"];//公司编号
$R_id = $_SESSION["R_id"];//路线编号

$P_Uname = "";
$P_Uname = @$_SESSION["P_Uname"];//用户名

$P_id = "";
$P_id = @$_SESSION["P_id"];//用户编号

$F_Stime = date('y-m-d H:i:s',time());//获取当前时间
$F_Etime = "";//订单结束时间设为NULL
$F_state = 0;//状态都为未支付
//搜索路线名称
$query_R_name = "select R_name from route where R_id = '$R_id'";
$result_R_name = $conn->query($query_R_name);
$row_R_name = $result_R_name->fetch_array();

$R_name = $row_R_name[0];//获取路线名称

if($P_id==""){
	if ($P_Uname=="") {
		$URL_LTF = "../login_php/LoginToForm.php?".$R_id;
		echo "<script language=javascript>";
		echo 'setTimeout("showPopup()",0)';
		echo "</script>";
	}else{
		$query_P_id = "select P_id from tourP where P_Uname = '$P_Uname'";
		$result_P_id = $conn->query($query_P_id);
		$row_P_id = $result_P_id->fetch_array();

		$P_id = $row_P_id[0];//获取用户编号
		$query = "insert into form(F_id,C_id,P_id,R_id,R_name,F_Stime,F_Etime,F_state) values('','$C_id',
		'$P_id','$R_id','$R_name','$F_Stime','$F_Etime','$F_state')";
					  
		$result = $conn->query($query);

		if ($result){
			echo "<script language=javascript>alert('提交订单成功！');window.open('../changePerson.php','_parent')</script>";
			$conn->close();  
		}else {
			echo mysqli_error($conn);
    		echo "<script language=javascript>alert('提交订单失败！');window.open('../changePerson.php','_parent')</script>";
    		exit();
		}
	}
}
else{
//操作数据库
	$query = "insert into form(F_id,C_id,P_id,R_id,R_name,F_Stime,F_Etime,F_state) values('','$C_id',
		'$P_id','$R_id','$R_name','$F_Stime','$F_Etime','$F_state')";
					  
	$result = $conn->query($query);

	if ($result){
		echo "<script language=javascript>alert('提交订单成功！');window.open('../search/route_index.php','_parent')</script>";
		$conn->close();  
	}else {
		echo mysqli_error($conn);
    	echo "<script language=javascript>alert('提交订单失败！');window.open('../search/route_index.php','_parent')</script>";
    	exit();
	}
}
?>


<html>
<head> 
<title></title> 
<META http-equiv=Content-Type content="text/html; charset=utf-8"> 
<style> 
#popDiv { 
position: absolute; 
visibility: hidden; 
overflow: hidden; 
border: 2px solid #000000; 
background-color: #FFFFFF;  
padding: 3px; 
} 

#popTitle { 
background: #000000; 
height: 20px; 
line-height: 20px; 
padding: 3px; 
} 

#popForm { 
padding: 2px; 
} 

.title_left { 
color: #FFFFFF;
font-weight: bold; 
padding-left: 5px; 
float: left; 
} 

.title_right { 
float: right; 
} 

#popTitle .title_right a { 
color: #FFFFFF; 
text-decoration: none; 
} 

#popTitle .title_right a:hover { 
text-decoration: underline; 
color: #FFFFFF; 
} 
</style> 
<script> 
function showPopup() {//弹出层 
var objDiv = document.getElementById("popDiv"); 
objDiv.style.top = "100px";//设置弹出层距离上边界的距离 
objDiv.style.left = "500px";//设置弹出层距离左边界的距离 
objDiv.style.width = "300px";//设置弹出层的宽度 
objDiv.style.height = "200px";//设置弹出层的高度 

objDiv.style.visibility = "visible"; 
} 
function hidePopup() {//关闭层 
var objDiv = document.getElementById("popDiv"); 
objDiv.style.visibility = "hidden"; 
} 
</script> 
</head> 
<body> 
<div id="popDiv"> 
<div id="popTitle"> <!-- 标题div --> 
<span class="title_left">登录</span> <span class="title_right"><a 
href="#" onclick="hidePopup();">X</a> </span> 
</div> 
<div id="popForm" align="center"> <!-- 表单div --> 
<form name='login' action='<?php echo $URL_LTF; ?>' method='post'>
        <label></label>
        <p>账号<input type='text' name='P_Uname' id='P_Uname'></p>
        <label></label>
        <p>密码<input type='password' name='P_pwd' id='P_pwd'></p>
        <p>
        <input type='submit' name='pLogin2_submit' value='登录'>
        <input type='button' onclick="hidePopup()" value='取消'>
        </p>
        <label><a href='../pRegister.html'>还未注册？</a></label>
</div> 
</div> 
</body>
</html>