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


	//delete a specific food from database
	public function delete_food($meal_id){

		echo $meal_id;
		$query = $this->db->query("DELETE FROM food WHERE id = '$meal_id' ");
		
	}


	public function get_weeks($userId){
		$query = $this->db->query("SELECT * FROM nutricion_program_v2 WHERE user_id = '$userId' GROUP BY week ");

		if ($query) {
			return $query->result();
		}else{
			return false;
		}
	}


	public function add_meal($week, $day, $mealtime, $meal, $user_id , $dietitian_id){

		$query = $this->db->query("INSERT INTO nutricion_program_v2(week,day, hour, food, dietitian_id, user_id ) values ('$week','$day', '$mealtime', '$meal', '$dietitian_id', '$user_id') ON DUPLICATE KEY UPDATE food = '$meal' ");

		if ($this->db->affected_rows() > 0) {
			
		}
	}

		public function add_meal_from_template($week, $day, $mealtime, $meal, $user_id , $dietitian_id, $date){
	
		$query = $this->db->query("INSERT INTO nutricion_program_v2(week,day, hour, food, dietitian_id, user_id ,date) values ('$week','$day', '$mealtime', '$meal', '$dietitian_id', '$user_id', '$date') ON DUPLICATE KEY UPDATE food = '$meal' ");

		if ($this->db->affected_rows() > 0) {
			return true;
		}else {
			return false;
		}
	}

	public function add_new_week($newWeek, $userId, $dietitian_id, $newdate, $meal){

		$query = $this->db->query("INSERT INTO nutricion_program_v2(week, day, hour, food, dietitian_id, user_id, date) values ('$newWeek','monday', 'breakfast', '$meal', '$dietitian_id', '$userId', '$newdate' )");


	}

	public function add_template($templateName, $day, $mealtime, $meal, $duser_id){

		$query = $this->db->query("INSERT INTO templates (day, hour, dietitian_id, food, template_name) values ('$day', '$mealtime', '$duser_id', '$meal', '$templateName') ON DUPLICATE KEY UPDATE food = '$meal' ");

		if ($this->db->affected_rows() > 0 ) {
			return true;

		}else{
			return false;
		}
	}


	public function get_templates($dietitian_id){

		$query = $this->db->query("SELECT template_name FROM templates GROUP BY template_name");
		
		if ($this->db->affected_rows() > 0 ) {
			return $query->result();

		}else{
			return false;
		}
	}


	public function get_current_template($templateName){

		//select the row with user max user id . that row has the current nutricion program
		$query = $this->db->query("SELECT day, hour, food FROM templates where template_name = '$templateName'  ORDER BY FIELD(day, 'monday','tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'), FIELD(hour, 'breakfast', 'lunch', 'dinner')");

			$affected_rows = $this->db->affected_rows();
		if ($affected_rows > 0) {
			//returns the query result as an array of objects, or an empty array on failure
			return $query->result();
		}else{
			return false;
		}
	}

	public function add_meal_to_template($templateName, $day, $mealtime, $meal, $duser_id){

		$query = $this->db->query("INSERT INTO templates (day, hour, dietitian_id, food, template_name) values ('$day', '$mealtime', '$duser_id', '$meal', '$templateName') ON DUPLICATE KEY UPDATE food = '$meal' ");

		if ($this->db->affected_rows() > 0 ) {
			return true;

		}else{
			return false;
		}
	}



	public function get_current_date($user_id, $week){
		$query = $this->db->query("SELECT  week, date from nutricion_program_v2 WHERE user_id = '$user_id' and week = '$week' order by week desc LIMIT 1 ");

		if ($this->db->affected_rows() > 0 ) {
			return $query->row();
		}else{
			return false;
		}
	}

		public function get_latest_date($user_id){
		$query = $this->db->query("SELECT  date from nutricion_program_v2 WHERE user_id = '$user_id'  order by week desc LIMIT 1 ");

		if ($this->db->affected_rows() > 0 ) {
			return $query->row();
		}else{
			return false;
		}
	}

		public function get_latest_week($user_id){
		$query = $this->db->query("SELECT  week from nutricion_program_v2 WHERE user_id = '$user_id' order by week desc LIMIT 1 ");

		if ($this->db->affected_rows() > 0 ) {
			return $query->row();
		}else{
			return false;
		}
	}



	//check if the dietitian has create a week program for this user
	public function week_exist($user_id){
		$query = $this->db->query("SELECT week FROM nutricion_program_v2 WHERE user_id = '$user_id' ");

		if ($this->db->affected_rows() > 0 ) {
			return true;
		}else{
			return false;
		}
	}

	public function get_the_date_of_the_week($week){
		$query = $this->db->query("SELECT week , date FROM nutricion_program_v2 WHERE week ='$week' ");

		if ($this->db->affected_rows() > 0 ) {
			echo ' lelele do metro ::  '.$query->row()->date."     -------   ";
			return $query->row();
		}else{
			return false;
		}

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

    //search the dietitians in the database
	public function search_anything($name){
		$query = $this->db->query("SELECT `dietitian_id`, `dietitian_name`, `dietitian_email`, `dietitian_password`, `dietitian_age`, `dietitian_mobile` FROM `dietitian` WHERE dietitian_name =  '$name' ");
		if ($query) {
		
			return $query->result();
		}
	}

	public function search_customer($input){
		$query = $this->db->query("SELECT * FROM users WHERE (username LIKE '%$input%') ");

		if ($query) {
			return $query->result();
		}
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

		return ($this->db->affected_rows() > 0) ? TRUE : false;
	}


	//fernei olo to istoriko varous
	public function get_weight_history(){
		$user = $_SESSION['customer_name'];
		$query = $this->db->query("SELECT * FROM personal_data where customer = '$user' ");
		
		if ($this->db->affected_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
		
	}

	public function get_dietitian_info($dietitian){
		$query = $this->db->query("SELECT * FROM dietitian WHERE dietitian_name = '$dietitian' ");
		if ($query) {
			return $query->row();
		}
	}

	//get all meals from database
	public function get_my_meals(){
		$query = $this->db->query("SELECT * FROM food");
		if ($query) {
			return  $query->result();
		}
	}

	public function update_dietitian_info($oldName, $newName, $newEmail, $newMobile, $newAge){

		$query = $this->db->query("UPDATE dietitian SET dietitian_name = '$newName', dietitian_email = '$newEmail', dietitian_mobile = '$newMobile', dietitian_age = '$newAge' where dietitian_name = '$oldName';");
		if ($query) {
			//update the session variable with new dietitian name
			$_SESSION['dietitian_name'] = $newName;
			
		}
	}

		public function get_register_passwords(){
		$query = $this->db->query("SELECT * FROM user_secret_key");

		$affected_rows = $this->db->affected_rows();
		
		if ($affected_rows > 0)

		return $query->result();
	}
	//vazei o diaitologos ston pinaka user_secret_key to kodiko pou epithimei . An valei to idio email tote kanei update ton kodiko
	public function insert_new_register_password($password, $user_email){
		
		$query = $this->db->query("INSERT INTO user_secret_key(password_id, user_email) values('$password', '$user_email' ) ON DUPLICATE KEY UPDATE password_id = '$password'");
			
	}

	public function if_user_email_exists($email){
		$query = $this->db->query("SELECT * FROM users WHERE email = '$email'");
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return false;
		}
	}

	public function check_password_id($password){

		//select all password to see if already exist below
		$query = $this->db->query("SELECT * FROM user_secret_key where password_id = '$password' ");
		$affected_rows = $this->db->affected_rows();
		
		//if the password is already in the database we do not insert it
		if ($affected_rows > 0) {
			return TRUE;
		}else{
			return false;
		}		
	}

	//deactivated the customer 
	public function deactivate_customer($id){
		$query = $this->db->query("UPDATE users SET is_deactivated = 1 WHERE id = '$id' ");

		$result = $this->db->affected_rows();
		echo "affected rows ".$result;

		if ($query) {
			return TRUE;
		}else{
			return false;
		}

	}

	public function activate_customer($id){
		$query = $this->db->query("UPDATE users SET is_deactivated = 0 WHERE id = '$id' ");

		if ($query) {
			return TRUE;
		}else{
			return false;
		}
	}
}

?>