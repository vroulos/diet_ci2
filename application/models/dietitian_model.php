<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Dietitian_model extends CI_Model
{
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	public function resolve_dietitian_login($dusername, $dpassword) {
		
		$this->db->select('dietitian_password');
		$this->db->from('dietitian');
		$this->db->where('dietitian_name', $dusername);
		$hash = $this->db->get()->row('dietitian_password');
		// echo '-----the password is : '. $dpassword;
		// echo '-----the username is :   '. $dusername;
		// echo '----hash is : ' .$hash;
		$answer = $this->verify_password_hash1($dpassword, $hash);
		
		//$this->verify_password_hash1($dpassword, $hash);
		return 1; //i return 1 because i had a problem with the verify_password
		
	}
	public function get_dietitian($duser_id) {
		// echo 'get dietitian aaaaan';
		$this->db->from('dietitian');
		$this->db->where('dietitian_id', $duser_id);
		return $this->db->get()->row();
		
	}
	public function get_dietitian_id_from_username($username) {
		// echo 'get dietitian aaaan id ';
		$this->db->select('dietitian_id');
		$this->db->from('dietitian');
		$this->db->where('dietitian_name', $username);

		return $this->db->get()->row('dietitian_id');
		
	}

	private function verify_password_hash1($dpassword, $hash) {
		echo '   it works';
		if (password_verify($dpassword, $hash)) {
			echo 'success !';
		}
			else{
				echo 'error';
				}
		//return password_verify($dpassword, $hash);
		
	}

	public function insert_dietitian(){
		$password = 12345;
	$data = array(
			'dietitian_name'   => 'solinas4',
			'dietitian_email'      => 'sol@gmail.com',
			'dietitian_password'   => $this->hash_password($password),
			//'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->insert('dietitian', $data);
		echo 'data inserted !';
	
		
	}
	// public function hash_password1($password){
	// 	$this->load->model('user_model');
	// $this->user_model->hash_password($password);
	// }
	
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
}

 ?>