<?php 

class Shop_cart_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}


	public function get_shops($user_id){
		$query = $this->db->get_where('shop_carts', array('user_id' => $user_id));
		$cart_id = $query->result()->cart_id;
		var_dump($cart_id);
		$cart_good = $this->db->get_where('cart_good',array('cart_id' => $cart_id));
		echo "<br>";
		var_dump($cart_good);
		return $query->result();	
	}
} 
?>