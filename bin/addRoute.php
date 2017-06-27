<?php
include("config/config.php");
//验证权限
Session_Start();
$C_id = "";
$C_Uname = $_SESSION["C_Uname"];
if($C_Uname==""){  
    exit('非法访问!');
}
$query="select * from tourc where C_Uname='$C_Uname'";
              $result=$conn->query($query);
              $row =$result->fetch_array();
              $C_id=$row[0];
              $_SESSION['C_id'] = $C_id;
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
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-datetimepicker.min.css">

    <script src="lib/jquery-1.8.1.min.js" type="text/javascript"></script>
    <script src="lib/bootstrap/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="lib/bootstrap/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

    <!-- Demo page code -->
    
    <script type="text/javascript">
    function checkAdd(routeForm){
        if(document.all.R_name.value==""){  
        alert("对不起，旅游路线不能为空值!");  
        routeForm.R_name.focus();
        return false;
       }else if(document.all.R_point.value==""){  
        alert("对不起，途径景点不能为空值!");
        routeForm.R_point.focus();
        return false;  
       } else if(document.all.R_start.value==""){  
        alert("对不起，旅游开始时间不能为空值!");
        routeForm.R_start.focus();
        return false;  
       } else if(document.all.R_end.value==""){  
        alert("对不起，旅游结束时间不能为空值!");
        routeForm.R_end.focus();
        return false;  
       } else if(document.all.R_price.value==""){  
        alert("对不起，价格不能为空值!");
        routeForm.R_price.focus();
        return false;  
       } else if(document.all.R_food.value==""){  
        alert("对不起，餐饮不能为空值!");
        routeForm.R_food.focus();
        return false;  
       } else if(document.all.R_hotel.value==""){  
        alert("对不起，住宿不能为空值!");
        routeForm.R_hotel.focus();
        return false;  
       } else if(document.all.R_traffic.value==""){  
        alert("对不起，交通不能为空值!");
        routeForm.R_traffic.focus();
        return false;  
       } else if(document.all.R_plan.value==""){  
        alert("对不起，旅行安排不能为空值!");
        routeForm.R_plan.focus();
        return false;  
       }else{
        return true;
    }
    }
</script>

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
                            <i class="icon-user"></i> <?php
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
                  <li class="active"><a href="addRoute.php">增加路线信息</a></li>
                </ul>

                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-exclamation-sign"></i>订单查看</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                    <li ><a href="orderList.php">订单信息列表</a></li>
                    <li><a href="FhistoryOrder.php">历史订单列表</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <script type="text/javascript" src="lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="javascripts/graphDemo.js"></script>

<h1 class="page-title">路线信息管理</h1>
<div class="btn-toolbar">
    <input form="tab" type="submit" name="addRoute_submit" class="btn btn-primary" value="保存">
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">路线信息</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" action="info_php/addRoute.php" method="post" name="routeForm" onsubmit="return checkAdd(this);">
        <label>旅游路线名称</label>
        <input type="text" class="input-xlarge" name="R_name">
        <label>途径景点</label>
        <textarea rows="3" class="input-xlarge" name="R_point">
        </textarea>
        <label>旅游开始时间</label>
        <div class="control-group">
            <div class="controls input-append date R_start" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
                <input size="16" type="text" name="R_start" readonly>
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
            </div>
            <input type="hidden" id="dtp_input1" value="" /><br/>
        </div>
        <label>旅游结束时间</label>
        <div class="control-group">
            <div class="controls input-append date R_end" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
                <input size="16" type="text" name="R_end" readonly>
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
            </div>
            <input type="hidden" id="dtp_input1" value="" /><br/>
        </div>
        <label>价格</label>
        <input type="text" class="input-xlarge" name="R_price">
        <label>餐饮</label>
        <input type="text" class="input-xlarge" name="R_food">
        <label>住宿</label>
        <input type="text" class="input-xlarge" name="R_hotel">
        <label>交通</label>
        <input type="text" class="input-xlarge" name="R_traffic">
        <label>旅游安排</label>
        <textarea rows="3" class="input-xlarge" name="R_plan">
        </textarea>
    </form>
         </div>
 
  </div>

</div>
<script type="text/javascript">
    $('.R_start').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.R_end').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>
    <footer>
        <hr>
    </footer>

    <script src="lib/bootstrap/js/bootstrap.js"></script>
  

  </body>
</html>


