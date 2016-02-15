<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//订单控制器，用来处理订单
class Order extends CI_Controller{
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
	//	echo "订单页面";
		$this->load->view('order_view');
	}
}
?>