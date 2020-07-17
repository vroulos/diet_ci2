<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_model extends CI_Model
{
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	public function resolve_admin_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		$ifPasswordIsVerified = $this->verify_password_hash($password, $hash);
		return $ifPasswordIsVerified;
		
	}

	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}

	public function create_admin($username, $email, $password){
		$query = $this->db->query("INSERT INTO admin (username, email, password) values ('$username', '$email', $this->hash_password($dpassword)) ");

		return $query;
	}

	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}

		public function create_admin1($username, $email, $password) {
		
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password)
			// 'created_at' => date('Y-m-j H:i:s'),
			// 'dietitianId' => 1
		);
		//$this->db->select('dietitianId')->from('dietitian')->where('dietitianId', 1);
		return $this->db->insert('admin', $data);
		
	}

		public function get_admin_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('admin');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}

		public function get_admin($user_id) {
		
		$this->db->from('admin');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	public function get_all_dietitians(){
		$query = $this->db->query("SELECT * FROM dietitian");
		if($this->db->affected_rows() > 0){
			return $query->result();
		}
		

	}

	public function get_users_of_this_dietitian($id){
		$query = $this->db->query("SELECT * FROM users where dietitianId = $id ");
	
		return $query->result();
	}


}