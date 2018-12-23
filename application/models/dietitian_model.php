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
		
		$answer = $this->verify_password_hash1($dpassword, $hash);
		
		//$this->verify_password_hash1($dpassword, $hash);
		return $answer; //i return 1 because i had a problem with the verify_password
		
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
		
		return password_verify( $dpassword, $hash);
		
	}

	public function insert_dietitian(){
		$dpassword = "12345";
		$data = array(
			'dietitian_name'   => 'solinas4',
			'dietitian_email'      => 'sol@gmail.com',
			'dietitian_password'   => $this->hash_password1($dpassword),
			//'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->insert('dietitian', $data);
		echo 'data inserted !';
		
		
	}
	private function hash_password1($dpassword) {
		
		return password_hash($dpassword, PASSWORD_BCRYPT);
		
	}
	

	//add food to the table food
	public function add_food_model(){
		$food = $this->input->post('food');
		$type = $this->input->post('type');
		$calories = $this->input->post('calories');

		$this->db->query("insert into food(foodname, food_type, calories_per_100) values('$food', '$type', '$calories')");

		//Displays the number of affected rows, when doing “write” type queries
		$number = $this->db->affected_rows();

		return $number;
	}
	
	public function get_customers(){
		$query = $this->db->query("SELECT * FROM users");

		return $query->result();

	}

	public function get_customer($customer_id){


		$id = $customer_id;
		$query = $this->db->query("SELECT username FROM users WHERE id = '$id' ");

		return $query;

	}

	public function get_foods(){
		$query = $this->db->query("SELECT * FROM food");
		return $query->result();
	}

	public function insert_program_model(){
		$breakf_mond = $this->input->post('breakfast_monday');
		$lunch_mond = $this->input->post('lunch_monday');
		$dinner_mond = $this->input->post('dinner_monday');

		$breakf_tue = $this->input->post('breakfast_tuesday');
		$l_tue = $this->input->post('lunch_tuesday');
		$d_tue = $this->input->post('dinner_tuesday');

		$b_wen = $this->input->post('breakfast_wendsday');
		$l_wen = $this->input->post('lunch_wendsday');
		$d_wen = $this->input->post('dinner_wendsday');

		$b_thu = $this->input->post('breakfast_thursday');
		$l_thu = $this->input->post('lunch_thursday');
		$d_thu = $this->input->post('dinner_thursday');

		$b_fri = $this->input->post('breakfast_friday');
		$l_fri = $this->input->post('lunch_friday');
		$d_fri = $this->input->post('dinner_friday');

		$b_sat = $this->input->post('breakfast_saturday');
		$l_sat = $this->input->post('lunch_saturday');
		$d_sat = $this->input->post('dinner_saturday');

		$b_sun = $this->input->post('breakfast_sunday');
		$l_sun = $this->input->post('lunch_sunday');
		$d_sun = $this->input->post('dinner_sunday');
		//echo $dinner_mond;
		$customer_name = $_SESSION['customer_name'];

		$this->db->query("INSERT INTO food(foodname) values('$breakf_mond')");

		//insert the program to database
		$this->db->query("INSERT INTO nutricion_program(monday_break , customer_name, monday_lau, monday_din, tuesday_break, tuesday_lau, tuesday_din,     wendsday_break, wendsday_lau, wendsday_din,        thursday_break, thursday_lau, thursday_din,       friday_break, friday_lau, friday_din,     saturday_break, saturday_lau,saturday_din,        sunday_break , sunday_lau, sunday_din, user_id) values('$breakf_mond' , '$customer_name' , '$lunch_mond', '$dinner_mond', '$breakf_tue','
			$l_tue', '$d_tue', '$b_wen',  '$l_wen','$d_wen',  '$b_thu', '$l_thu', '$d_thu',  '$b_fri', '$l_fri', '$d_fri',  '$b_sat',  '$l_sat', '$d_sat',  '$b_sun', '$l_sun', '$d_sun',  (SELECT id FROM users WHERE username = '$customer_name' ))
			");

		$row_affected = $this->db->affected_rows();

		
}

	public function send_message_model(){
		$message = $this->input->post('send_message');
		$customer = $_SESSION['customer_name'];

		$this->db->query("INSERT INTO messages(customer , message) values('$customer', '$message')");
	}
	//fernei olo to istoriko varous
	public function get_weight_history(){
		$user = $_SESSION['customer_name'];
		$query = $this->db->query("SELECT * FROM personal_data where customer = '$user' ");
		return $query->result();
	}

		public function get_register_passwords(){
		$query = $this->db->query("SELECT * FROM pass_identit");

		$affected_rows = $this->db->affected_rows();
		
		if ($affected_rows > 0)

		return $query->result();
	}
	//vazei o diaitologos ston pinaka pass_identit to kodiko pou epithimei 
	public function insert_new_register_password($password){
		
		$this->db->query("INSERT INTO pass_identit(password_id ) values('$password' )");
			
	}

	public function check_password_id($password){

		//select all password to see if already exist below
		$query = $this->db->query("SELECT * FROM pass_identit where password_id = '$password' ");

		$affected_rows = $this->db->affected_rows();
		echo $affected_rows;
		
		//if the password is already in the database we do not insert it
		if ($affected_rows > 0) {
			return TRUE;
		}else{
			return false;
		}		
	}
}

?>