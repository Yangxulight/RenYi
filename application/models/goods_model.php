<?php 
class Goods_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
/*
返回生成商品类型的模型
 */
	public function get_goods_by_type($type){
		$query = $this->db->get_where('fabric_good', array('good_type' => $type));
		return $query->result();
	}

}


 ?>