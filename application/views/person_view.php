<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>个人中心</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('#edit_btn').click(function(event) {
				$('#show_info').attr('class', 'hidden');
				$('#edit_info').attr('class','show');
			});
			$('#cancel_btn').click(function(event) {
				$('#show_info').attr('class','show');
				$('#edit_info').attr('class','hidden');
			});
		});
	</script>
</head>
<body>
<header id="header" class="">
	<h1>个人中心 </h1>	
</header><!-- /header -->

<div class="container">
<!-- 	信息展示 -->
	<div class="show" id="show_info">
	<div class="row">
			<div class="col-xs-4">
				<h4>用户名:</h4><p></p>	
			</div>	
			<div class="col-xs-4">
				<h4><?php echo $user_name; ?></h4>	
			</div>
		</div>	
		<div class="row">

			<div class="col-xs-4">
				<h4>联系地址:</h4><p></p>
			</div>
			<div class="col-xs-4">
				<h4><?php echo $user_address; ?></h4>	
			</div>	
		</div>
		<div class="row">

			<div class="col-xs-4">
				<h4>联系方式:</h4><p></p>
			</div>
			<div class="col-xs-4">
				<h4><?php echo $user_contact; ?></h4>	
			</div>	
		</div>
		<div class="row">

			<div class="col-xs-4">
				<h4>小钱包余额:</h4><p></p>
			</div>
			<div class="col-xs-4">
				<h4><?php echo $user_balance; ?></h4>	
			</div>	
		</div>
		<div class="row">

			<div class="col-xs-4">
				<h4>用户等级:</h4><p></p>
			</div>
			<div class="col-xs-4">
				<h4><?php echo $user_level; ?></h4>	
			</div>	
		</div>
			<!-- 	控制按钮 -->
	<div class="row">
		<div class="col-xs-4">
			<div class="controls">
			<button id="edit_btn" class="btn btn-success">修改</button>
			</div>					
		</div>	
<!-- 		<div class="col-xs-4">
			<div class="controls">
				<button id="cancel_btn" class="btn btn-success">取消</button>
			</div>					
		</div> -->	
	</div>
	</div>
<!-- 	信息展示结束 -->

		<!-- 修改信息 -->
		<div class="hidden" id="edit_info">
			<div class="error">
					<?php echo validation_errors(); ?>	
			</div>
		<!-- 	<form class="form-horizontal"> -->
		<?php echo form_open('Person/edit_info'); ?>
				<fieldset>
				
					<div class="control-group">
						<!-- Text input-->
						<label class="control-label" for="input01">联系地址</label>
						<div class="controls">
							<input type="text" name="address" placeholder="请输入详细的省、市、区、街道" class="input-xlarge">
							<p class="help-block">为了保证您的利益，请填写正确地址。</p>
						</div>
					</div>

					<div class="control-group">

						<!-- Text input-->
						<label class="control-label" for="input01">联系方式</label>
						<div class="controls">
							<input type="text" name="contact" placeholder="请输入手机号码或者固定电话" class="input-xlarge">
							<p class="help-block">为了保证您的利益，请填写正确号码</p>
						</div>
					</div>
						<!-- 	控制按钮 -->
					<div class="row">
						<div class="col-xs-4">
							<div class="controls">
							<button type="submit" class="btn btn-success">提交</button>
							</div>					
						</div>	
						<div class="col-xs-4">
							<div class="controls">
								<a href="<?php echo site_url('person'); ?>" title=""><button id="cancel_btn" class="btn btn-success">取消</button></a>
							</div>					
						</div>	
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>


</div>
<nav >
	<ul class="nav nav-tabs navbar-fixed-bottom navbar-inverse">
		<li><a href=<?php echo site_url('page') ?> title="">商城</a></li>
		<li><a href=<?php echo site_url('order'); ?> title="我的订单">订单</a></li>
		<li><a href=<?php echo site_url('shop_cart'); ?> title="购物车">购物车<span class="badge pull-right">3</span></a></li>
		<li><a href=<?php echo site_url('book') ?> title="预约服务">预约服务</a></li>
	</ul>
</nav>
</body>
</html>