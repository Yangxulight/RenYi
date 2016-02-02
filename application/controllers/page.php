<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 用于展示页面元素的控制器 
*/
class Page extends CI_Controller{ 
	function index(){
		$this->load->model('goods_model');
		echo base_url();
		$cotton = $this->goods_model->get_goods_by_type('cotton');
		$linen = $this->goods_model->get_goods_by_type('linen');
		$page_data = array('cotton'=>$cotton,'linen'=>$linen);
		$this->load->view('index',$page_data);
		// $ = $this->goods_model->get_good_by_type('');
		// $ = $this->goods_model->get_good_by_type('');
		// $ = $this->goods_model->get_good_by_type('');
		// 
		// $ = $this->goods_model->get_good_by_type('');
		// $ = $this->goods_model->get_good_by_type('');

	}
}
