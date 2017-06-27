<?php 
//获取搜索关键字 
include("../config/config.php");
$keyword=@trim($_POST["search_route"]); 

//检查是否为空 
if($keyword==""){ 
  $query="select * from route"; 
}else{

  $query="select * from route where (R_name like '%".$keyword."%') or (R_point like '%".$keyword."%')
          or (R_food like '%".$keyword."%') or (R_hotel like '%".$keyword."%') or (R_traffic like '%".$keyword."%')
          or (R_plan like '%".$keyword."%')";
      }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<title>搜索结果——路线——<?php echo "$keyword" ?></title>
</head>
<body>


<div style="width:1000px;margin:0 auto;">
    <div id="cart">
    <div class="heading">
	<a style="padding:8px;margin-left:-14px;" href="../../index.html"><font size="4">首&nbsp;&nbsp;&nbsp;页</font></a><span style="font-size:20px;color:#fff;">&raquo;</span>
      <a><span id="cart_total"><font size="4">&nbsp;路&nbsp;&nbsp;&nbsp;线</font></span></a></div>
    <div class="content"></div>
  </div>  
	<div id="search">
    <div class="button-search"></div>
        
        <form class="form-inline" method="post" action="route_index.php?page=1">

            <input type="text" name="search_route" placeholder="Search Help..."  onkeydown="this.style.color = '#888';" />
            <!-- <input type="submit" value="GO" /> -->
            
        </form>

      </div>

</div>

<div class="header">
<div class="logo_img">
</div>
</div>

<div id="menu">
</div>

<div style="width:1000px;margin: 0 auto;margin-top:10px;">
<div class="linktree"></div>
<br>  
<br>
<div id="notification"></div>

<div id="content">        


        <div class="product-list">
<?php
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
  $sql = "select * from route where (R_name like '%".$keyword."%') or (R_point like '%".$keyword."%')
          or (R_food like '%".$keyword."%') or (R_hotel like '%".$keyword."%') or (R_traffic like '%".$keyword."%')
          or (R_plan like '%".$keyword."%') limit $page $pageSize";
  $result1 = $conn->query($sql);
  if ($result1) {
    if($result1->num_rows>0){//判断结果集中行的数目是否大于0
      while($row =$result1->fetch_array()){//循环输出结果集中的记录
      $URL_rp = "route_product.php?".$row[0];//获取传递路线id
?>
        	<div class="struct">
          
                	<div class="struct-right"></div>
                    <div class="struct-left"></div>
                    <div class="struct-center">
                    	<div class="line">
                            <a href="#" class="image-link">
                                <div class="image">
                                <img src="../../images/ipod_touch_1-80x80.jpg" title="iPod Touch" alt="iPod Touch" />
                                 </div>
                            </a>
                            
                            <div class="right">
                              <div class="price">
                              ￥<?php echo $row[6]; ?><!-- 价格 -->
                              </div>
                            </div>
                            
                            <div class="name">
                            <a href="<?php echo $URL_rp; ?>">
                            <?php echo $row[2]; ?><!-- 路线名称 -->
                            </a>
                            </div>
                            <div class="description">
                            <?php echo $row[3]; ?><!-- 路线介绍 -->
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
        			</div>

            </div>
                        <?php
          }
        }
      }else {
        echo "查询失败";
        }
        $result->free();
        $conn->close();
?>

</div>

<div class="clearfix"></div>
        
        <div class="column">
          <div class="pagination">
          <div class="results">
          <?php
          if (@$pageval <= 0) {
          $pageval = 1;
        }
        ?>
          <a class="button" href="route_index.php?page=<?php echo $pageval-1?>"><span>上一页</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a class="button" href="route_index.php?page=<?php echo @$pageval+1?>"><span>下一页</span></a>
          </div>  
          </div>
        </div>

              </div>

        
	</div>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


</body>
</html>