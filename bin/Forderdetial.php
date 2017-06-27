<?php
include("config/config.php");
//验证权限
Session_Start();
$C_Uname = "";
$C_Uname = $_SESSION["C_Uname"];
if($C_Uname==""){  
    exit('非法访问!');
}
$F_id =  $_SERVER["QUERY_STRING"];
$_SESSION['F_id'] = $F_id;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.8.1.min.js" type="text/javascript"></script>

    <!-- Demo page code -->
    
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body> 
    
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                            <?php
                            echo $C_Uname;
                            ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="fLogin.html">登出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="../index.html"><span class="first">企业用户</span> <span class="second">后台管理</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-nav">
                  <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>企业信息管理</div>
                    <ul id="dashboard-menu" class="nav nav-list collapse in">
                        <li><a href="changeFirm.php">企业信息</a></li>
                    </ul>
                    
                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>路线管理</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li ><a href="routeList.php">路线信息列表</a></li>
                  <li><a href="addRoute.php">增加路线信息</a></li>
                </ul>

                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-exclamation-sign"></i>订单查看</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                    <li ><a href="orderList.php">订单信息列表</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <script type="text/javascript" src="lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="javascripts/graphDemo.js"></script>

<h1 class="page-title">订单信息管理</h1>
<div class="btn-toolbar">
    <a href="orderList.php" class="btn">返回列表</a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">路线信息</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <?php
              $query="select * from form where F_id='$F_id'";
              $result=$conn->query($query);
              if ($result) {
                  if($result->num_rows>0){//判断结果集中行的数目是否大于0
                  while($row =$result->fetch_array()){//循环输出结果集中的记录
                    $query_p_id = "select P_Uname from tourp where P_id='$row[2]'";
                    $result_p_id= $conn->query($query_p_id);
                    $row_p_Uname = $result_p_id->fetch_array();
            ?>
    <form id="tab" action="#" method="post">
        <label>游客用户名</label>
        <input type="text" class="input-xlarge" disabled="true" value="<?php echo $row_p_Uname[0] ?>">
        <label>旅游路线编号</label>
        <input type="text" class="input-xlarge" disabled="true" value="<?php echo $row[3] ?>">
        <label>旅游路线名称</label>
        <input type="text" class="input-xlarge" disabled="true" value="<?php echo $row[4] ?>">
        <label>订单开始时间</label>
        <input type="text" class="input-xlarge" disabled="true" value="<?php echo $row[5] ?>">
        <label>订单结束时间</label>
        <input type="text" class="input-xlarge" disabled="true" value="<?php echo $row[6] ?>">
        <?php
                                           }
                }
            }else {
                echo "查询失败";
                }
                $result->free();
                $conn->close();
?>
        <div>
    </div>
    </form>
         </div>
  </div>

</div>

    <footer>
        <hr>
    </footer>

    <script src="lib/bootstrap/js/bootstrap.js"></script>
  

  </body>
</html>


