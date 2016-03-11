<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- 显示个人的订单信息，包括服务预约订单还有普通的订单 -->
<!DOCTYPE html>
<html>
<head>
  <title>我的订单</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">  
  <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <style>
  	#box{
  		margin: 5px;
  		padding: 
  	}
  	.item{
  		border: 1px solid;
  		padding: 5px;
  		border-radius: 5%;
  	}

  </style>
</head>
<body>

<h1>我的订单</h1>
<div class="accordion" id="box">
   <!--  未完成的订单 -->
   <div class="accordion-group">
   	<div class="accordion-heading">
   		<button type="button" class="btn btn-default"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#incomplete_order">
   			未完成订单
   		</a>
   		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></button> 

   	</div>

   	<div id="incomplete_order" class="accordion-body collapse in">
   		<div class="accordion-inner">
   			<div class="content">
   				<div class="item">
   					<table>
   						<tbody>
   							<tr>
   								<th>订单号码:</th>
   								<td>132123</td>
   							</tr>
   							<tr>
   								<th>收件人:</th>
   								<td>杨先生</td>
   							</tr>
   							<tr>
   								<th>订单内容:</th>
   								<td>我的东西，多少个，多少钱</td>
   							</tr>
   							<tr>
   								<th>收件地址:</th>
   								<td>我的地址再哪里阿斯达撒的多少多少的</td>
   							</tr>
   							<tr>
   								<th>联系方式:</th>
   								<td>1231322313</td>
   							</tr>
   							<tr>
   								<th>订单状态:</th>
   								<td>正在发货</td>
   							</tr>
   						</tbody>
   					</table>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
<!--   未完成的订单 end -->

<!-- 预约服务订单 -->
  <div class="accordion-group">
    <div class="accordion-heading">
     <button type="button" class="btn btn-default"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#book_order">
      预约订单
      </a><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button> 
    </div>
    <div id="book_order" class="accordion-body collapse">
      <div class="accordion-inner">
      	<div class="content">
      		<?php foreach ($book as $row) {	 ?>
      	 	<div class="item">
      	 		<table>
     	 			<tbody>
      	 				<tr>
      	 					<th>订单号码:</th>
      	 					<td><?php echo $row['booking_order_id']; ?></td>
      	 				</tr>
      	 				<tr>
      	 					<th>服务内容:</th>
      	 					<td><?php echo $row['item_name'].",".$row['detail'].",".$row['service']; ?></td>
      	 				</tr>
      	 				<tr>
      	 					<th>服务方式:</th>
      	 					<td>上门取送</td>
      	 				</tr>
      	 				<tr>
      	 					<th>预约人:</th>
      	 					<td><?php echo $row['receiver']; ?></td>
      	 				</tr>
      	 				<tr>
      	 					<th>联系方式:</th>
      	 					<td><?php echo $row['contact'] ?></td>
      	 				</tr>
      	 				<tr>
      	 					<th>联系地址:</th>
      	 					<td><?php echo $row['address']; ?></td>
      	 				</tr>
      	 				<tr>
      	 					<th>订单状态:</th>
      	 					<td><?php if($row['state'] == 1)
      	 								echo "正在接单";
      	 							else if($row['state'] == 2)
      	 								echo "正在路上";
      	 							else if($row['state'] == 3)
      	 								echo "已经完成";
      	 							else
      	 								echo "出错，请联系客服";
      	 					 ?></td>
      	 				</tr>
      	 			</tbody>
      	 		</table>	
      	 	</div>
      	 	<?php } ?>

      	 </div> 
      </div>
    </div>
  </div>
<!--   预约服务订单 end -->
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
