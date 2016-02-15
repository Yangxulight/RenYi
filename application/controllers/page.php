<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 用于展示页面元素的控制器 
*/
class Page extends CI_Controller{ 
	function __construct(){
		parent::__construct();
		session_start();
		if(!isset($_SESSION['username'])){
			redirect('account');
		}
	}
	public function index(){
		$this->load->model('goods_model');
		$cotton = $this->goods_model->get_goods_by_type('cotton');
		$linen = $this->goods_model->get_goods_by_type('linen');
		//
		//后面还要加入各种分类的商品的信息查询操作。 
		$page_data = array('cotton'=>$cotton,'linen'=>$linen);
		$this->load->view('page_view',$page_data);
	
	}
	public function test(){
		$this->load->view('person');
	}

}
