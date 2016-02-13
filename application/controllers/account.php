<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
用户管理控制器，用来进行登陆页面，注册页面的调用。
 */

class Account extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('account_model');
        $this->load->library('form_validation');
		session_start();
	}
	public function index(){
		echo sha1('password');
		//先判断是否已经登陆了
		if(isset($_SESSION['username']))
		{
			redirect('page');
		}
		/*设置登陆的表单规则
		 */
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		if($this->form_validation->run() == TRUE)
		{//form_validation passed,then get from the db;
			if($this->account_model->password_check($this->input->post('username'),
				$this->input->post('password'))){
				$_SESSION['username'] = $this->input->post('username');
				redirect('page');
			}

		}
		
		$this->load->view('account/login_view');
	}

	public function logout(){
		//销毁会话
		session_destroy();
		//返回登陆页面
		$this->load->view('account/login_view');
	}

	public function register(){
		//设置表单验证规则
		$this->form_validation->set_error_delimiters('<span class="error">,</span>');
		$this->form_validation->set_rules('username','Username','required|min_length[3]|is_unique[users.user_name]');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		$this->form_validation->set_rules('password_confirm','Password confirm','required|matches[password]');
		$this->form_validation->set_rules('address','Address','');
		$this->form_validation->set_rules('contact','Contact','required|exact_length[11]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('account/register');
		}
		else{//验证通过，那么就把信息插入数据库
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$address=$this->input->post('address');
			$contact=$this->input->post('contact');
			if($this->account_model->add_user($username,$password,$address,$contact))
			{
				$_SESSION['username'] = $this->input->post('username');
				redirect('page');	
			}else
			{//添加用户信息
				$data['message']="你的注册信息有误，请重新检查.";
				$this->load->view('account/note',$data);
			}
		}
	}
}