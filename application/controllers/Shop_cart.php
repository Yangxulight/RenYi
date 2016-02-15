<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_cart extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('Shop_cart_model');
		$this->load->model('Goods_model');
	}
	//显示用户商品
	public function index()
	{
		$username = $_SESSION['username'];
		$result= $this->Shop_cart_model->get_cart_good($username);
		$data = array('data'=>$result); 
		$this->load->view('shop_cart_view',$data);
	}
	//添加商品到用户购物车
	public function add_good(){

		$good_id = $_POST['good_id'];
		$num = $_POST['num'];
		$username = $_SESSION['username'];
		$this->Shop_cart_model->add_good($good_id,$num,$username);
	}
}
?>