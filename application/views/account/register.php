<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo validation_errors(); ?>
<?php echo form_open('account/register') ?>
  <form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">用户注册</legend>
      </div>
    
    <div class="control-group">
          <!-- Username input-->
          <label class="control-label" for="input01">用户名</label>
          <div class="controls">
            <input type="text" placeholder="请输入用户名" name="username" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">密码</label>
          <div class="controls">
            <input type="password" placeholder="请输入密码" name="password" class="input-xlarge">
            <p class="help-block">为了保证安全，请输入至少6位字符长度</p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">密码确认</label>
          <div class="controls">
            <input type="password" placeholder="请再次确认你的密码" name="password_confirm" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">地址</label>
          <div class="controls">
            <input type="text" placeholder="请输入你所在详细地址" name="address" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">联系方式</label>
          <div class="controls">
            <input type="text" placeholder="请输入你的联系方式" name="contact" class="input-xlarge">
            <p class="help-block">请填写真实的手机号码</p>
          </div>
        </div>
    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
          	<div class="row">
          		<div class="col-xs-4">
          			 <button class="btn btn-success">提交</button>	
          		</div>
          		<div class="col-xs-4">
          		    <button class="btn btn-default">取消</button>	
          		</div>	
          	</div>
           
          </div>       
 
        </div>
  </form>

<?php echo form_close() ?>
</body>
</html>