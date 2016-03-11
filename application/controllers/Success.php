<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
成功控制器，用来管理成功的跳转页面
 */

class Success extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		if(!isset($_SESSION['username'])){
			redirect('account');
		}
	}

	public function index(){
		$this->load->view('successview',$message);
	}

	public function order(){
		$message = array('message'=>'订单提交成功');
		$this->load->view('success_view',$message);
	}

}