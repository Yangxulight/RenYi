<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>紝衣工作室</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<style type="text/css" media="screen">
	.high{
		z-index: 9999;
	}	
	</style>
	<script>
		$(document).ready(function (){
			$(".btn").click(function() {
				var num = $(this).parent().prev().val();//获取输入框内容
				var good_id = $(this).parent().prev().attr("id");
				var send_url = "<?php echo site_url("shop_cart/add_good"); ?>";
				$.post(send_url,{
					"good_id":good_id,
			 		"num":num
				},
				function(data,status){
					alert("Data: " + data+"\nStatus: " + status);
				})
				// $.ajax({
				// 	type:"POST",
				// 	url:send_url,
				// 	data:{
				// 		"good_id":good_id,
				// 		"num":num
				// 	},
				// 	dataType:"text",
				// 	async:false,
				// 	success:function(back){
				// 		alert(back);
				// 	}
				// });
			});
		});
	</script>
</head>
<body>
<!-- 用户名显示 -->
<div class="row">
	<div class="col-xs-6">
	<a href="<?php echo site_url("Person");?>" title=""><?php echo $_SESSION['username']; ?>
</a>
	</div>
	<div class="col-xs-6">
		<a href="<?php echo site_url("account/logout"); ?>" title="">退出</a>	
	</div>
</div>
<div class="container">
	<div class="jumbotron">
		<h1 class="text-center">紝衣工作室</h1>	
		<p class="lead">这里后期改为自动滚动的gallery</p>
	</div>
	<div class="tabbable">
		<ul class="nav nav-tabs">
				<li class="acitve"><a href="#tab1" data-toggle="tab" title="">面料定制</a></li>
				<li ><a href="#tab2" title="" data-toggle="tab">面料购买</a></li>
				<li><a href="#tab3" title="" data-toggle="tab">在线教程</a></li>
			</ul>

			<div class="tab-content">
			<div class="tab-pane fade acitve" id="tab1">
					这里放定制的表单
					<div class="form" id="design">
						<form >
							<input type="text" name="" value="" placeholder="你想要的款式">
							<input type="submit" name="" value="提交">	
						</form>	
					</div>
				</div>	
				<!--面料购买-->
				<div class="tab-pane fade" id="tab2">
					<div class="tabbable tabs-left">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#fabric1" title="" data-toggle="tab">棉布</a></li>
							<li><a href="#fabric2" title="" data-toggle="tab">麻布</a></li>
							<li><a href="#fabric3" title="" data-toggle="tab">丝绸</a></li>
							<li><a href="#fabric4" title="" data-toggle="tab">呢绒</a></li>
							<li><a href="#fabric5" title="" data-toggle="tab">皮革</a></li>
							<li><a href="#fabric6" title="" data-toggle="tab">化纤</a></li>
							<li><a href="#fabric7" title="" data-toggle="tab">混纺</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade acitve" id="fabric1">
							<?php foreach($cotton as $row){ ?>
							<div class="row">
								<div class="col-xs-4">
								<img src="<?php echo base_url().$row->good_img ?>" class="img-responsive">
								</div>
								<div class="col-xs-8">
									<div class="row">
											<div class="col-xs-8">
												<p class="text-left"><?php echo $row->good_name ?></p>
												<small>￥<?php echo $row->good_price?></small>	
												<small><?php echo $row->good_desc ?></small>
											</div>
											<div class="col-xs-4">


											<!-- 	添加商品 -->
												<div class="row">
												<input type="text" name="" size="4" id=<?php echo $row->good_id ?> value="1" placeholder="">
													<a href="#" title=""><button type="button" class="btn">+</button></a>
												</div>
											</div>						
									</div>

								</div>
							</div>
							<?php } ?>
							</div>
							<div class="tab-pane" id="fabric2">
								
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab3">
					后期放入保养的规则
				</div>
			</div>
		</div>

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