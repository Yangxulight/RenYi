<?php 
class Order_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//预约订单创建
	public function create_book_order($data)
	{
		$this->db->insert('booking_order',$data);
		return true;
	}

	public function get_book_order($username){
		$query = $this->db->get_where('booking_order',array('user_name'=>$username));
		return $query->result_array();
	}
	//商品订单
	public function get_order($username){
		return 'order';
	}
	
	public function create_order($data){
		if($this->db->insert('orders',$data))
			return ture;
		else
			return false;
	}
} ?>