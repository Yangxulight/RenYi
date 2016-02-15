<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>购物车</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">  
  <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<header id="header" class="">
<!--     <a href="index.html">
          <span class="glyphicon glyphicon-home"></span>
    </a>
    <a class="pull-right" href="personal.html" title=""><span class="glyphicon glyphicon-user"></span></a> -->
    <p class="text-center">我的购物车</p>
</header>
<div class="container">
	<?php foreach($data as $row){ ?>
    <div class="row">
        <div class="col-xs-4">
            <img src="<?php echo base_url().$row->good_img ?>" alt="" class="img-responsive">  
         </div> 
         <div class="col-xs-8">
           <div class="row">
               <div class="col-xs-8">
                  <p class="text-left"><?php echo $row->good_name;?></p>
                  <small>￥<?php echo $row->good_price; ?></small> 
                  <small><?php echo $row->good_desc; ?></small>
               </div>
               <div class="col-xs-4">
                  <div class="row">
                     <input type="text" name="" size="4" id="" value="<?php echo $row->good_num; ?>" placeholder="">        
                  </div>
                      <!--  添加商品 -->
                  <div class="row">
                  <a href="" title=""><button type="button" class="btn">删除</button></a>
                  </div>
               </div>            
            </div>
         </div>
    </div>
    <?php } ?>
</div>
<nav >
	<ul class="nav nav-tabs navbar-fixed-bottom navbar-inverse">
		<li><a href=<?php echo site_url('page'); ?> title="">商城</a></li>
		<li><a href=<?php echo site_url('order'); ?> title="我的订单">订单</a></li>
		<li><a href=<?php echo site_url('shop_cart'); ?> title="购物车">购物车<span class="badge pull-right">3</span></a></li>
		<li><a href=<?php echo site_url('book'); ?> title="预约服务">预约服务</a></li>
	</ul>
</nav>
</body>
</html>
