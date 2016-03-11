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
 <!--  扩展级联插件 -->
  <script>
  	$.fn.extend({
  		category_select_change:function (data){

  			$("#item").empty();
  			var category_value = $("#category").val();
  			if(category_value == ''){
  				return false;
  			}
  			var items = null;
  			//取出选中项目
  			for(var i = 0;i < data.length;i++){
  				var tmp = data[i];
  				if(tmp.value == category_value){
  					items = tmp.item;
  					break;
  				}
  			}
  			//设置项目内容
  			for(var i = 0; i < items.length;i++){
  				item = items[i];
  				var o = new Option(item.value,item.value);
  				$("#item").append(o);
  			}
  		},
  		show_item:function (){
  			var data = [
  			{
  				"name":"服装",
  				"value":"cloth",
  				"item":[{
  					"name":"西装礼服",
  					"value":"西装礼服",
  				},
  				{
  					"name":"大衣外套",
  					"value":"大衣外套",
  				},
  				{
  					"name":"T恤裙装",
  					"value":"T恤裙装",
  				},
  				{
  					"name":"内衣睡衣",
  					"value":"内衣睡衣",
  				},
  				]
  			},
  			{
  				"name":"服饰",
  				"value":"trappings",
  				"item":[{
  					"name":"皮具箱包",
  					"value":"皮具箱包",
  				},
  				{
  					"name":"鞋子靴子",
  					"value":"鞋子靴子",
  				},
  				{
  					"name":"纽扣首饰",
  					"value":"纽扣首饰",
  				},
  				]
  			},
  			{
  				"name":"家居",
  				"value":"home",
  				"item":[{
  					"name":"床上用品",
  					"value":"床上用品",
  				},
  				{
  					"name":"家居软装",
  					"value":"家居软装",
  				},
  				]
  			},
  			{
  				"name":"其他",
  				"value":"其他",
  				"item":[{
  					"name":"玩具布偶",
  					"value":"玩具布偶",
  				},
  				{
  					"name":"其他",
  					"value":"其他",
  				},]
  			},]
  //以上为模拟数据，可以用getJSON的方式，从服务器端取回来数据
    //$.getJSON("/province", function(resp){
  			var html = "";
  			var categorys = data;
  			html += "<option value=''> --请选择-- </option>";
  			if(categorys){
  				for(var i = 0;i < categorys.length;i++){
  					var category_option = categorys[i];
  					html += "<option value='" + category_option.value +"'>" + category_option.name + "</option>";
  				}
  			}
  			$("#category").empty();
  			// $("#category").html(function (index,oldcontent){
  			// 	return html;
  			// });
  			$("#category").html(html);

  			$("#category").change(function(){
  				$(this).category_select_change(categorys);
  			})
  		}
  	});
  	
  	$(document).ready(function() {
  		$(this).show_item();	
  	});	
  </script>
</head>
<body>
<header id="header" class="">
<h1>预约订单服务	</h1>
</header><!-- /header -->
<?php echo form_open('Book/create_book'); ?>
	<div class="row">
		<div class="col-xs-6">
		<!-- 种类选择 -->
			<select class="form-control" name="category" id="category" >
			</select>		
		</div>	
		<div class="col-xs-6">
	<!-- 具体物件选择 -->
			<select class="form-control" name="item" id="item" >
			</select>	
		</div>	
	</div>
	<div class="row">
		<div class="col-xs-6">
	<!-- 	三级项目 -->
			<select class="form-control" name="detail" id="detail">
      <option value="大衣外套">大衣外套</option>
      <option value="衬衫">衬衫</option>
			</select>		
		</div>	
		<div class="col-xs-6">
	<!-- 	服务内容 (四级项目)-->
  
			<select class="form-control" name="service" id="content" >
      <option value="dry_clean">干洗</option>
      <option value="iron">烫整</option>
      <option value="mend">修补</option>
      <option value="other">其他</option>
			</select>	
		</div>	
	</div>

	<!-- 选择方式 -->
<div class="form_group form-control" >
	
<label class="radio-inline">
  <input type="radio" name="on_door_take" id="inlineRadio2" value="上门取送">上门取送 
</label>
<label class="radio-inline">
  <input type="radio" name="on_door_maintain" id="inlineRadio3" value="上门保养">上门保养 
</label>
</div>

<!-- 在线咨询 -->
<div>
	
</div>
<!-- 预约时间段插件 -->
<div class="form-group">
	<label >预约时段</label>	
	<input type="date" name="date" value="" placeholder="">
	<select name="time"  name="time">
		<option value="9:00-12:00">9:00-12:00</option>
		<option value="14:00-17:00">14:00-17:00</option>
		<option value="19:00-21:00">19:00-21:00</option>
	</select>	

</div>

<!-- 详细地址 -->
<div class="form-group">
    <label for="address">详细地址</label>
    <input type="text" class="form-control" id="address"  name="address" placeholder="省、市、区、街道以及详细地址">
 </div>

<!-- 称呼以及联系方式 -->
<div class="form_group">
<label >联系人信息</label>	
 <div class="row">
 	<div class="col-xs-4">
 		<input type="text" class="form-control" id="user"  name="receiver" placeholder="您的称呼">	
 	</div>	
 	<div class="col-xs-8">
 		<input type="text" class="form-control" id="contact"  name="contact" placeholder="联系方式">	
 	</div>
 </div>
</div>

<!-- 在线预估价格 -->
<div class="form_group">
<div class="row">
  <div class="col-xs-4">
  <h4>预估价格:</h4>
   </div> 
    <div class="col-xs-4">
   <!--  显示的的input，不能操作修改 -->
    <input type="text" name="" value="0.0" placeholder="预估价格" disabled>

 <!--    不显示的Input ,只用来传值 -->
  <input type="text" name="price" value="0.0" placeholder="预估价格" class="hidden">     
   </div> 
</div>
</div>
<div class="form_group">
    <label for="notes">备注</label>
	<textarea class="form-control" name="notes" rows="3" placeholder="如有特殊要求，请写在这里哦~"></textarea>	
</div>

<div class="row">
  <div class="col-xs-3">
    <button class="btn btn-default" type="submit">提交</button> 
   </div> 
   <div class="col-xs-6">
      <a class="btn btn-default" href="<?php echo site_url('page') ?>" role="button">取消</a>
   </div>
</div>
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
