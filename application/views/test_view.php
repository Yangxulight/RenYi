<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<title>测试专用</title>

  	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$.fn.extend({
	//根据第一个选择的改变，从province这个数据包里头做出第二个选项的内容
  parent_select_change: function(province) {
  	//1.清空二级选项
    $("#child_select").empty();

    var parent = $("#parent_select").val();
    //选项是空
    if (parent == ''){
      return false;
    }
    var cities = null;
    for(var i=0; i < province.length; i++) {

    var p = province[i];	//取出想要的二级选项内容
    if(p.id == parent){
      cities = p.city;
		break;
    }
    }
  //设置二级选项内容
  for(var i=0; i < cities.length; i++) {
    city = cities[i];
    var o = new Option(city.name,city.cid);//new Option(文本,值)
    $("#child_select").append(o);
  }
  },
  //显示一级选项
  show_province_items: function() {
    var resp = [
    {
      "id" : 1,
    "name" : "山西",
    "city" : [{
      "cid" : 1,
      "name" : "太原",
    }, {
      "cid" : 2,
      "name" : "临汾",
    }
    ],
    },
    {
      "id" : 2,
    "name" : "陕西",
    "city" : [{
      "cid" : 3,
      "name" : "榆林",
    }, {
      "cid" : 4,
      "name" : "西安",
    }
    ],
    },
  ];
  
  //以上为模拟数据，可以用getJSON的方式，从服务器端取回来数据
    //$.getJSON("/province", function(resp){
        var html = ""
        var pro = resp
        html += "<option value=''> --请选择-- </option>"
        if(pro){
          for(var i=0; i < pro.length; i++) {
            var p = pro[i];
            html += "<option value='" + p.id + "'>" + p.name + "</option>"
          }
        }
    
    $("#parent_select").empty();
        $("#parent_select").html(function(i,origText){//使用函数来设置内容function(index,oldcontent),规定一个返回被选元素的新内容的函数
          return html;
        });

        $("#parent_select").change(function(){
          $(this).parent_select_change(pro);
        });
    //});
  }
});

$(document).ready(function(){
   $(this).show_province_items(); 
});
</script>

</head>
  
<body>
  <center> 
　<h1>级联列表</h1>
  省：<select id='parent_select' name='province'></select>  市：<select id='child_select' name='city'></select>

  <br>
  </center>
<?php echo form_open("test/form"); ?>
  <div class="row">
  	<div class="col-xs-6">
  		<select class="form-control" name="select1">
  			<option value="值不值">sdfgs</option>
  			<option>sdf</option>
  			<option>3</option>
  			<option>4</option>
  			<option>5</option>
  		</select>	
  	</div>	
  	<div class="col-xs-6">
  		<select class="form-control" name="select2">
  			<option>1</option>
  			<option>2</option>
  			<option>3</option>
  			<option>4</option>
  			<option>5</option>
  		</select>	
  	</div>
  </div>
    <div class="row">
  	<div class="col-xs-6">
  		<select class="form-control" name="select3">
  			<option>1</option>
  			<option>2</option>
  			<option>3</option>
  			<option>4</option>
  			<option>5</option>
  		</select>	
  	</div>	
  	<div class="col-xs-6">
  		<select class="form-control" name="select4">
  			<option>1</option>
  			<option>2</option>
  			<option>3</option>
  			<option>4</option>
  			<option>5</option>
  		</select>	
  	</div>
  </div>
  <div>
  	<button type="submit">提交</button>	
  </div>
  <?php echo form_close(); ?>
</body>
</html>