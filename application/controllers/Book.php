<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//预约服务控制器，用来处理预约订单
class Book extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		session_start();
		if(!isset($_SESSION['username'])){
			redirect('account');
		}
		$this->load->model('Order_model');
	}
	public function index(){
		$this->load->view('book_view');
	}

	public function create_book(){
		$username = $_SESSION['username'];
		$item = $_POST['item'];
		$detail = $_POST['detail'];
		$service = $_POST['service'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$address = $_POST['address'];
		$receiver = $_POST['receiver'];
		$contact = $_POST['contact'];
		$price = $_POST['price'];
		$notes = $_POST['notes'];
		$state = 1;
		echo $detail;
		$data = array('item_name'=>$item,
			'detail'=>$detail,
			'service'=>$service,
			'date'=>$date,
			'time'=>$time,
			'contact'=>$contact,
			'user_name'=>$username,
			'receiver'=>$receiver,
			'address'=>$address,
			'price'=>$price,
			'notes'=>$notes,
			'state'=>$state
			);
		if($this->Order_model->create_book_order($data))
		{
			redirect('page');
		}else
		{
			redirect('book');
		}

	}
}
?>