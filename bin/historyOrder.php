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
                        <li><a href="changePerson.php">个人信息</a></li>
                    </ul>
                    
                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>订单管理</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li><a href="orderState.php">订单状态</a></li>
                  <li class="active"><a href="historyOrder.php">历史订单</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <script type="text/javascript" src="lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="javascripts/graphDemo.js"></script>

<h1 class="page-title">订单信息管理</h1>
<div class="well search-well">

        <form class="form-inline" method="post" action="historyOrder.php">

            <input class="input-xlarge" placeholder="Search Help..." id="appendedInputButton" type="text" name="search_ho">
            <input type="submit" value="GO" />
            
        </form>

    </div>
<div class="row-fluid">
    <div class="block">
        <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">历史订单列表</div>
        <div id="tablewidget" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>订单编号</th>
                  <th>路线名称</th>
                  <th>开始时间</th>
                  <th>结束时间</th>
                  <th>状态</th>
                  <th style="width: 26px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query2="select * from tourp where P_Uname='$P_Uname'";
                $result2=$conn->query($query2);
                $row2 =$result2->fetch_array();
                $P_id=$row2[0];

                $keyword=@trim($_POST["search_ho"]);

                //检查是否为空 
              if($keyword==""){ 
              $query="select * from form where (P_id='$P_id') and (F_state>2)";
              }
              else{
                  $query="select * from form where (P_id='$P_id') and (R_name like '%".$keyword."%') and (F_state>2)";
                }

        $result=$conn->query($query);
        $count = $result->num_rows;
        //定义每一页多少数据
        $pageSize = 5;
        //判断page是否存在，若不存在默认为1
        if (@$_GET[page]) {
          $pageval = @$_GET[page];
          $page = ($pageval-1)*$pageSize;
          $page.=',';
        } else {
          @$page.='0,';
        }
        if($keyword==""){ 
              $sql="select * from form where (P_id='$P_id') and (F_state>2) limit $page $pageSize";
              }
              else{
                  $sql="select * from form where (P_id='$P_id') and (R_name like '%".$keyword."%') and (F_state>2) limit $page $pageSize";
                }
        $result1=$conn->query($sql);
        if ($result1) {
          if($result1->num_rows>0){//判断结果集中行的数目是否大于0
                  while($row =$result1->fetch_array()){//循环输出结果集中的记录
      ?>
                <tr>
                
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[4]; ?></td>
                  <td><?php echo $row[5]; ?></td>
                  <td><?php echo $row[6]; ?></td>
                  <td>
                  <?php
                  //订单状态 未支付(0),【已支付】未受理(1),退单中(2),退单成功(3),退单失败(4),预约成功(5)
                  switch ($row[7]) {
                    case '0':
                      echo "未支付";
                      break;
                    case '1':
                      echo "未受理";
                      break;
                    case '2':
                      echo "退单中";
                      break;
                    case '3':
                      echo "退单成功";
                      break;
                    case '4':
                      echo "退单失败";
                      break;
                    case '5':
                      echo "预约成功";
                      break;

                    default:
                      echo "获取状态失败！";
                      break;
                  }
                    ?>
                  </td>
        
                  <?php $URL_pod = "Porderdetial.php?".$row[0];
          ?>
                  
                  <td>
              <a href="<?php echo $URL_pod; ?>"><i class="icon-pencil"></i></a>

              </td>
                </tr>
                <?php
                       }
        }
      }else {
        echo "查询失败";
        }
        $result->free();
        $conn->close();
?>
              </tbody>
            </table>
        </div>
    </div>
    <div class="pagination">
    <ul>
        <?php
          if (@$pageval <= 0) {
          $pageval = 1;
        }
        ?>
        <li><a href="historyOrder.php?page=<?php echo $pageval-1?>">Prev</a></li>
        <li><a href="historyOrder.php?page=<?php echo @$pageval+1?>">Next</a></li>
    </ul>
</div>

</div>

    <footer>
        <hr>
    </footer>

    <script src="lib/bootstrap/js/bootstrap.js"></script>
  

  </body>
</html>


