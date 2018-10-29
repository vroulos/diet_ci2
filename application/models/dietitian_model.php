<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Dietitian_model extends CI_Model
{
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	public function resolve_dietitian_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('dietitians');
		$this->db->where('dietitian_name', $username);
		$hash = $this->db->get()->row('dietitian_password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	public function get_dietitian($user_id) {
		
		$this->db->from('dietitians');
		$this->db->where('dietitian_id', $duser_id);
		return $this->db->get()->row();
		
	}
	
}

 ?>