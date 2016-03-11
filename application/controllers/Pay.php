<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
支付控制器，用来管理支付过程的，后期完善，先跳过验证直接跳转到订单页面
 */
class Pay extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		if(!isset($_SESSION['username'])){
			redirect('account');
		}
	}

	public function index(){
		//支付成功以后
		if(true){
			redirect('Success/order');
		}
	}
}