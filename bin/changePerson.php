<?php
//验证权限
include("config/config.php");
Session_Start();
$P_Uname = "";
$P_Uname = $_SESSION["P_Uname"];
if($P_Uname==""){  
    exit('非法访问!');
}
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
                            echo $P_Uname;
                            ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="pLogin.html">登出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="../index.html"><span class="first">个人用户</span> <span class="second">后台管理</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-nav">
                  <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>个人信息管理</div>
                    <ul id="dashboard-menu" class="nav nav-list collapse in">
                        <li class="active"><a href="changePerson.php">个人信息</a></li>
                    </ul>
                    
                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>订单管理</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li ><a href="orderState.php">订单状态</a></li>
                  <li ><a href="historyOrder.php">历史订单</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <script type="text/javascript" src="lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="javascripts/graphDemo.js"></script>

<h1 class="page-title">个人信息管理</h1>

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">个人信息</a></li>
      <li><a href="#profile" data-toggle="tab">修改密码</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <?php
              $query="select * from tourp where P_Uname='$P_Uname'";
              $result=$conn->query($query);
              if ($result) {
                  if($result->num_rows>0){//判断结果集中行的数目是否大于0
                  while($row =$result->fetch_array()){//循环输出结果集中的记录
            ?>
    <form id="tab" action="info_php/changePerson.php" method="post">
        <label>手机号</label>
        <input type="text" class="input-xlarge" name="P_phone" value="<?php echo $row[3] ?>">
        <label>身份证号</label>
        <input type="text" class="input-xlarge" name="P_idcard" value="<?php echo $row[4] ?>">
        <label>真实姓名</label>
        <input type="text" class="input-xlarge" name="P_name" value="<?php echo $row[5] ?>">
        <label>性别</label>
        <input type="text" class="input-xlarge" name="P_sex" value="<?php echo $row[6] ?>">
        <label>年龄</label>
        <input type="text" class="input-xlarge" name="P_age" value="<?php echo $row[7] ?>">
        <div>
        <?php
                                           }
                }
            }else {
                echo "查询失败";
                }
                $result->free();
                $conn->close();
?>
        <input type="submit" class="btn btn-primary" name="changePerson_submit" value="更新" form="tab">
    </div>
    </form>
         </div>
    <div class="tab-pane fade" id="profile">
    <form id="tab2" action="info_php/resetPerson.php" method="post">
        <label>新密码</label>
        <input type="password" class="input-xlarge" name="newPpwd">
        <div>
            <input type="submit" class="btn btn-primary" name="resetPerson_submit" value="修改" form="tab2">
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


