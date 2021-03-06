<?php
include("config/config.php");
//验证权限
Session_Start();
$N_id = $_SESSION["N_id"];
if($N_id!="root"){  
    exit('非法访问!');
}
$V_id =  $_SERVER["QUERY_STRING"];
$_SESSION['V_id'] = $V_id;
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
                            echo $N_id;
                            ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="resetPsw.php">密码设置</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="login.php">登出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="../index.html"><span class="first">旅游局</span> <span class="second">后台管理</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-nav">
                  <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>账户管理</div>
                    <ul id="dashboard-menu" class="nav nav-list collapse in">
                        <li><a href="index.php">账户信息</a></li>
                    </ul>
                    
                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>景点管理</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li><a href="sightlist.php">景点信息列表</a></li>
                  <li><a href="addsight.php">增加景点信息</a></li>
                </ul>

                <div class="nav-header" data-toggle="collapse" data-target="#settings-menu"><i class="icon-exclamation-sign"></i>企业管理</div>
                <ul id="settings-menu" class="nav nav-list collapse in">
                  <li><a href="firmlist.php">企业信息列表</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <script type="text/javascript" src="lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="javascripts/graphDemo.js"></script>

<h1 class="page-title">修改景点信息</h1>
<div class="btn-toolbar">
    <a href="sightlist.php" class="btn">返回列表</a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">景点信息</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <?php
              $query="select * from viewspot where V_id='$V_id'";
			  $result=$conn->query($query);
			  if ($result) {
				  if($result->num_rows>0){//判断结果集中行的数目是否大于0
                  while($row =$result->fetch_array()){//循环输出结果集中的记录
			?>
    <form id="tab" action="info_php/changesight.php" method="post">
        <label>名称</label>
        <input type="text" class="input-xlarge" name="V_name" value="<?php echo $row[1] ?>">
        <label>位置</label>
        <input type="text" class="input-xlarge" name="V_add" value="<?php echo $row[2] ?>">
        <label>价格</label>
        <input type="text" class="input-xlarge" name="V_price" value="<?php echo $row[5] ?>">
        <label>游玩项目</label>
        <textarea rows="3" class="input-xlarge" name="V_cont">
        <?php echo $row[3] ?>
        </textarea>
        <label>介绍</label>
        <textarea rows="3" class="input-xlarge" name="V_intro">
        <?php echo $row[4] ?>
        </textarea>
    </form>
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
        <input form="tab" type="submit" name="changesight_submit" class="btn btn-primary" value="更新">
    </div>
      </div>
  </div>

</div>

    <footer>
        <hr>
    </footer>

    <script src="lib/bootstrap/js/bootstrap.js"></script>
  

  </body>
</html>


