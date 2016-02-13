<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller{
	public function index(){
	//	$this->load->model('shot_cart');
		//$this->shot_cart->get_shops('00000001');
		$this->load->view('login');
	}
}