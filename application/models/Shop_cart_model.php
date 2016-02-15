<?php 

class Shop_cart_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	// 返回购物车商品
	public function get_cart_good($username){
		$this->db->select('f.good_name,f.good_desc,f.good_price,f.good_img,c.good_num,c.user_name',false);
		$this->db->from('fabric_good as f');
		$this->db->join('cart_good as c','f.good_id = c.good_id');
		$result = $this->db->where('user_name',$username)->get()->result();
		return $result;
	}
	// 添加商品到购物车
	public function add_good($good_id,$num,$username){
		$q = $this->db
					->where('user_name',$username)
					->where('good_id',$good_id)
					->limit(1)
					->get('cart_good');
		if($q->num_rows()>0)
		{//先前已经加入购物车了,那就添加上之前的数量
			$result = $q->result();
			$num += $result['good_num'];
			$this->db
					->where('user_name',$username)
					->where('good_id',$good_id);
			$data=array('good_num'=>$num);
			$this->db->update('cart_good',$data);
		}else{//否则直接把相应的数量加入购物车
			$data = array('user_name'=>$username,
					 'good_id'=>$good_id,
					 'good_num'=>$num);
			$this->db->insert('cart_good',$data);
		}
	}
} 
?>