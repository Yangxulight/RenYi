<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//订单控制器，用来处理订单
class Order extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		session_start();
		if(!isset($_SESSION['username'])){
			redirect('account');
		}
		$this->load->model('Order_model');
		$this->load->library('form_validation');
	}
	public function index(){
	//	echo "订单页面";
		$username = $_SESSION['username'];
		$book = $this->Order_model->get_book_order($username);
		$order = $this->Order_model->get_order($username);
		$Orders = array('book'=>$book,
						'order'=>$order);
		$this->load->view('order_view',$Orders);
	}

	public function order_form(){

		// 设置表单规则 
		$this->form_validation->set_rules('receiver','收件人','required|max_length[25]');
		$this->form_validation->set_rules('contact','联系电话','reuqired|max_length[20]');
		$this->form_validation->set_rules('address','联系地址','reuqired');
		$this->form_validation->set_rules('payment','支付方式','reuqired');

		if($this->form_validation->run() == FALSE)
		{
			$username = $_SESSION['username'];
		 	$this->load->model('Shop_cart_model');
		 	$current_datetime = date("Y-m-d h:i:s");
		 	$data = $this->Shop_cart_model->get_cart_good_by_username($username);
			$pass = array('data'=>$data,
							'order_date'=>$current_datetime);
			$this->load->view('order_form_view',$pass);
		}
		else
		{
			$this->create_order();
		}
	}

	public function create_order(){
		// $this->load->model('Shop_cart_model');
		// $username = $_SESSION['username'];
		// $current_datetime = date("Y-m-d h:i:s");
		// $data = $this->Shop_cart_model->get_cart_good_by_username($username);
		// $data['order_date'] = $current_datetime;
		// var_dump($data);

		if($this->form_validation->run() == FALSE)
		{
			$this->order_form();
		}
		else {
			$username = $_SESSION['username'];
			$receiver = $_POST['receiver'];
			$contact = $_POST['contact'];
			$payment = $_POST['payment'];
			$adderss = $_POST['address'];
			$order_date = $_POST['order_date'];
			$order_content = $_POST['order_content'];
			$order_message = $_POST['order_message'];
			$order_quanity = $_POST['order_quanity'];
			$order_amount = $_POST['order_amount'];
			$data = array('user_name'=>$username,
						'receiver'=>$receiver,
						'contact'=>$contact,
						'payment'=>$payment,
						'address'=>$address,
						'order_date'=>$order_date,
						'order_content'=>$order_content,
						'order_message'=>$order_message,
						'order_quanity'=>$order_quanity,
						'order_amount'=>$order_amount);
			//订单新建成,删除购物车的东西
			if($this->Order_model->create_order($data))
			{
				$this->load->model('Shop_cart_model');
				//完全清空购物车
				$this->Shop_cart_model->empty_shop_cart('username');
			}
			else
			{
				$message = array('message'=>'订单提交出错了');
				$this->load->view('error/order_submit_error',$message);
			}
		}
	}
}
?>