<?php
include("../config/config.php");
//验证权限
Session_Start();
$R_id =  $_SERVER["QUERY_STRING"];
$_SESSION['R_id'] = $R_id;

$query="select * from route where R_id='$R_id'";

        $result=$conn->query($query);

        if ($result) {
          if($result->num_rows>0){//判断结果集中行的数目是否大于0

                  while($row =$result->fetch_array()){//循环输出结果集中的记录
                    $query2="select C_name from tourc where C_id='$row[1]'";
                    $result2=$conn->query($query2);
                    $row2=$result2->fetch_array();
                    $C_name=$row2[0];
                    $URL_if = "../info_php/insertForm.php?".$row[1];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<title></title>
</head>
<body>

<div style="width:1000px;margin:0 auto;">
    <div id="cart">
    <div class="heading">
	<a style="padding:8px;margin-left:-14px;" href="../../index.html"><font size="4">首&nbsp;&nbsp;&nbsp;页</font></a><span style="font-size:20px;color:#fff;">&raquo;</span>
      <a><span id="cart_total"><font size="4">&nbsp;路&nbsp;&nbsp;&nbsp;线</font></span></a></div>
    <div class="content"></div>
  </div>  
</div>

<div class="header">
<div class="logo_img">
</div></div>

<div id="menu">
</div>

<div id="container_bg">
 
<div id="content">
<div class="block-white"> 
<div class="block-content">
           
</div>
<div class="separator"></div>
<div class="block-content">
<div class="product-info">
                                	
<div class="left">                		                			
<div class="image"><a href="#" title="iMac" ><img src="../../images/imac_1-228x228.jpg" title="iMac" alt="iMac" id="image" /></a></div>
<div class="image-additional">
<a href="#" title="iMac"><img src="../../images/imac_3-74x74.jpg" title="iMac" alt="iMac" /></a>
<a href="#" title="iMac"><img src="../../images/imac_2-74x74.jpg" title="iMac" alt="iMac" /></a>
</div>                		                        
</div>
				    			
<div class="right">
<div id="tabs" class="tabs">
<a href="#tab-information" class="selected"><img alt="Information" src="../../images/Info.png" style="margin-top:6px;" /><div></div></a>
<a href="#tab-description"><font size="3">描&nbsp;&nbsp;&nbsp;述</font></a>
</div>
  
<div id="tab-information" class="tab-content">
<div id="information"></div>
			
	
<div class="description">
<span>&raquo;&nbsp;旅游公司:&nbsp;</span><?php echo $C_name ?><br />
<span>&raquo;&nbsp;路线名称:&nbsp;</span><?php echo $row[2] ?><br />
<span>&raquo;&nbsp;途经景点:&nbsp;</span><?php echo $row[3] ?><br />
<span>&raquo;&nbsp;餐饮:&nbsp;</span><?php echo $row[7] ?><br />
<span>&raquo;&nbsp;住宿:&nbsp;</span><?php echo $row[8] ?><br />
<span>&raquo;&nbsp;交通:&nbsp;</span><?php echo $row[9] ?><br />
<span>&raquo;&nbsp;旅游安排:&nbsp;<br /></span><?php echo $row[10] ?><br />
</div>
                     
<div class="price">
<span class="price-new"><font size="3">￥<?php echo $row[6] ?></font></span><br/><br/>
<a href="<?php echo $URL_if; ?>" onclick="return window.confirm('确定提交订单吗？');" role="button" data-toggle="modal" class="button"><span>提交订单</span></a>
</div>
       <?php
                       }
        }
      }else {
        echo "查询失败";
        }
?>


</div>
<div class="price">
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<br>
<br>
<br>

</body>
</html>