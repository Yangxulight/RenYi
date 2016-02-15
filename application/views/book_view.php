<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>预约服务</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">  
  <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
预约服务
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
