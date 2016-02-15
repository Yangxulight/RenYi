<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//预约服务控制器，用来处理预约订单
class Book extends CI_Controller{
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->load->view('book_view');
	}
}
?>