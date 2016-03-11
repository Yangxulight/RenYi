<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- 订单提交确认信息的表单,用来生成订单 -->
<!DOCTYPE html>
<html>
<head>
<title>订单提交</title>

  	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo validation_errors(); ?>

<?php echo form_open('Order/create_order'); ?>
<!--   <form class="form-horizontal">
 -->    <fieldset>
      <div id="legend" class="">
        <legend class="">订单信息</legend>
      </div>


    <div class="control-group">

          <!-- 收件人-->
          <label class="control-label" for="receiver">收件人</label>
          <div class="controls">
            <input type="text" placeholder="请填写收件人的名字" name="receiver" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">
    	<!-- 联系电话 -->	
    	<label class="control-label" for="contact">联系电话</label>
    	<div class="controls">
    		<input type="tel" name="contact" value="" placeholder="请填写正确的联系电话">	
    	</div>
    </div>


    <div class="control-group">

          <!-- 联系地址`-->
          <label class="control-label" for="address">联系地址</label>
          <div class="controls">
            <input type="text" placeholder="请填写正确的联系地址" name="address" class="input-xlarge">
            <p class="help-block">省、市、区、街道以及详细地址</p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="notes">备注信息</label>
          <div class="controls">
            <textarea  placeholder="有特殊要求的写在这里哦~" name="order_message"  rows="3" style="width: 70%"></textarea>
            <p class="help-block"></p>
          </div>
        </div>


        <!-- 基本信息 -->
        <div class="content">
        	<div class="row">
        		<div class="col-xs-4">
        			<label>订单日期</label>
        		</div>
        		<div class="col-xs-8">
        			<p><?php echo $order_date; ?></p>		
        		</div>	
        		<input type="text" name="order_date" class="hidden" value="<?php echo $order_date; ?>" placeholder="" >
        	</div>
        	<div class="row">
        		<div class="col-xs-4">
        			<label>订单内容:</label>
        		</div> 
        		<div class="col-xs-8">
        			<p>	
        				<?php 
        				$order_content = "";
        				foreach ($data as $row) {
        					$order_content = $order_content.$row['good_name'] .","."￥".$row['good_price'].","." x".$row['good_num'].",";
        				} 
        				echo $order_content;?>

        			</p>
        			<!-- 	隐藏的传输input，发送订单内容 -->
        			<input type="text" name="order_content" class="hidden" value="<?php echo $order_content; ?>" placeholder=""  >
        		</div>			
        	</div>



        	<div class="row">
        		<div class="col-xs-4">
        			<label>订单总额:</label>
        		</div>	
        		<div class="col-xs-8">
        			<?php $order_amount = 0;
        			foreach ($data as $row) {
        				$order_amount += $row['good_price'] * $row['good_num'];
        			} ?>
        			<p><?php echo "￥".$order_amount; ?></p>
        			<input type="text" name="order_amount" value=<?php echo $order_amount; ?> class="hidden" placeholder="" > 
        		</div>
        	</div>

        </div> 
   			
        <div class="control-group">
        	<div class="row">
        		<div class="col-xs-4">
        			<label>支付方式</label>
        		</div>        
        		<div class="col-xs-8">
        			<label class="radio-inline">
        				<input type="radio" name="payment"  value="支付宝" checked>支付宝 
        			</label>
        			<label class="radio-inline">
        				<input type="radio" name="payment"  value="账户余额">账户余额 
        			</label>	
        		</div>	
        	</div>


        </div>

       <div class="row">
       		<div class="col-xs-3 col-xs-offset-3">
       			<button type="summit" class="btn btn-success">提交</button>	
       		</div>	
       		<div class="col-xs-3">
       			<button type="" class="btn btn-default"><a href=<?php echo site_url('shop_cart'); ?> title="">取消</a></button>	
       		</div>
       </div>

    </fieldset>
<!--   </form>
 -->

<?php echo form_close(); ?>

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