<?php 
class Account_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();

	}
	public function password_check($username,$password)
	{
		$q = $this->db
					->where('user_name',$username)
					->where('user_password',sha1($password))
					->limit(1)
					->get('users');
		if($q->num_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	//添加用户
	public function add_user($username,$password,$address,$contact)
	{
		$data = array('user_name'=>$username,
			'user_password'=>sha1($password),
			'user_address'=>$address,
			'user_contact'=>$contact,
			'user_balance'=>0.0,
			'user_level'=>1);
		$this->db->insert('users',$data);
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	//查询用户名是否重复
	public function is_username_exists($username){
		$this->db->where('user_name',$username);
		$query = $this->db->get('users');
		return $query->num_rows()? TRUE:FALSE;
	}

	public function get_user_info($username)
	{
		$this->db->where('user_name',$username);
		$query = $this->db->get('users');
		return $query->row_array(1);
	}
	public function edit_user_info($username,$address,$contact){
		$this->db->where('user_name',$username);
		$data = array(
			'user_address' => $address,
			'user_contact' => $contact);
		$this->db->update('users',$data);	
	}

} ?>