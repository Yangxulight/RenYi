<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Shop_cart_model');
	}
	public function index(){
	//	$this->load->model('shot_cart');
		//$this->shot_cart->get_shops('00000001');
		// $q = $this->db
		// 			->where('user_name','yangxulight')
		// 			->where('user_password',sha1('light3768'))
		// 			->limit(1)
		// 			->get('users');
		// var_dump($q->result());
		// $this->Shop_cart_model->add_good(10101011,12,'mama');
		$this->db->select('f.good_name,f.good_desc,f.good_price,f.good_img,c.good_num',false);
		$this->db->from('fabric_good as f');
		$this->db->join('cart_good as c','f.good_id = c.good_id');
		$result = $this->db->where('user_name','yangxulight')->get()->result();
		var_dump($result);
	}
}