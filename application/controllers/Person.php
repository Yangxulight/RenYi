<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
个人信息控制器，用来管理用户的个人信息，提供修改还有查询的功能，
管理的页面是person_view;
 */

class Person extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('account_model');
		$this->load->library('form_validation');
		//先判断是否已经登陆，没有的话链接到登陆页面
		if(isset($_SESSION['username']) == FALSE){
			redirect('account');
		}
	}

	public function index(){
		$username = $_SESSION['username'];
		$data = $this->account_model->get_user_info($username);
		$this->load->view('person_view',$data);

	}

	public function edit_info(){
		//设置表单也验证规则
		$this->form_validation->set_rules('address','地址','required|min_length[8]');
		$this->form_validation->set_rules('contact','联系方式','required|min_length[7]');

		if($this->form_validation->run() == TRUE){
			// 验证通过
			$username = $_SESSION['username'];
			$address = $this->input->post('address');
			$contact = $this->input->post('contact');
			$this->account_model->edit_user_info($username,$address,$contact);
			redirect('person');	
		}
		else
			redirect('person');

	}
}