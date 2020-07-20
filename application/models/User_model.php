<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($username, $email, $password, $dietitianId) {
		
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
			'dietitianId' => $dietitianId
		);
		//$this->db->select('dietitianId')->from('dietitian')->where('dietitianId', 1);
		return $this->db->insert('users', $data);
		
	}

	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		$ifPasswordIsVerified = $this->verify_password_hash($password, $hash);
		return $ifPasswordIsVerified;
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */

	
    
	// 	private function hash_password($password) {
		
	// 	return password_hash($password, PASSWORD_BCRYPT);
		
	// }

	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}

	public function get_nutricion_program($name, $user_id){
		
		
		//select the row with user max user id . that row has the current nutricion program
		$query = $this->db->query("SELECT * FROM nutricion_program where user_id = '$user_id' ORDER BY id DESC LIMIT 1");

		return $query;
	}

	//return the current date . After the controller loads the proper nutricion program
	public function get_current_week($user_id){
		// $query = $this->db->query("SELECT week FROM nutricion_program_v2 WHERE date BETWEEN CURDATE() AND CURDATE() + 7 ");
		$query = $this->db->query("SELECT week, date FROM nutricion_program_v2 where (DATE(date) <= DATE(now())) and (user_id = $user_id)  order by week desc limit 1" );


		if ($this->db->affected_rows() > 0) {	
		//echo "week is : ". $query->row()->week;		
			return $query->row()->week;
		}else{
			return 122;
			
		}
		
	}

		public function get_current_date($user_id){
		// $query = $this->db->query("SELECT week FROM nutricion_program_v2 WHERE date BETWEEN CURDATE() AND CURDATE() + 7 ");
		$query = $this->db->query("SELECT week, date FROM nutricion_program_v2 where (date BETWEEN NOW() and NOW() + INTERVAL 7 DAY) and (user_id = $user_id)");


		if ($this->db->affected_rows() > 0) {		
			return $query->row()->date;
		}else{
			return 122;
			
		}
		
	}

		public function get_nutricion_program_v2($week, $name, $user_id){
		
		
		//select the row with user max user id . that row has the current nutricion program
		$query = $this->db->query("SELECT id, week, day, hour, food, date FROM nutricion_program_v2 where user_id = '$user_id' and week = '$week' ORDER BY FIELD(day, 'monday','tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'), FIELD(hour, 'breakfast', 'lunch', 'dinner')");

		$affected_rows = $this->db->affected_rows();
		if ($affected_rows > 0) {
			//returns the query result as an array of objects, or an empty array on failure
			return $query->result();
		}else{
			return false;
		}
		
	}


	public function add_reaction($reaction, $meal_id){
		
		$query = $this->db->query("INSERT INTO feedback1 (reaction, meal_id) values ('$reaction', (SELECT id FROM nutricion_program_v2 WHERE id = '$meal_id')) ON DUPLICATE KEY UPDATE reaction = '$reaction' ");

		if ($this->db->affected_rows() > 0) {
			echo"naiiii";
			return true;
		}else{
			echo "noooo";
			return false;
		}

	}


		public function add_text_reaction($meal_id, $textReaction){
		
		$query = $this->db->query("INSERT INTO feedback1 (meal_id, text_reaction) values ('$meal_id', '$textReaction') ON DUPLICATE KEY UPDATE text_reaction = '$textReaction' ");

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}

	}


	public function check_reaction($food_id){
		$query = $this->db->query("SELECT * FROM feedback1 WHERE meal_id = '$food_id' ");

		if ($this->db->affected_rows() > 0) {
			
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_max_week($user_id){

		$this->db->select_max('week');
		$query = $this->db->get('nutricion_program_v2');
		$this->db->where('user_id', $user_id);

		if ($this->db->affected_rows() > 0) {
			
			return $query->row()->week;
		}else{
			return false;
		}

		

	}


	public function search_food($food){
		$query = $this->db->query("SELECT * FROM food 
			WHERE (foodname LIKE '%$food%')
			 or (food_type LIKE '%$food%') ");

		if ($query) {
			return $query->result();
		}
	}

	public function get_messages($customer_name){

		$query = $this->db->query("SELECT * FROM messages where customer = '$customer_name' ORDER BY date_sent DESC");

		$affected_rows = $this->db->affected_rows();
		
		if ($affected_rows) {
			return $query->result();
		}else{
			return null;
		}
		

	}

	public function get_answers($customer_name){
		$query = $this->db->query("SELECT user_answers.answer, user_answers.message_id, user_answers.who_send_it 
			FROM user_answers 
			INNER JOIN messages 
			ON user_answers.message_id = messages.id");

		$affected_rows = $this->db->affected_rows();

		if ($affected_rows) {
			return $query->result();
		}else{
			return null;
		}
	}

	public function delete_message($id){

		$this->db->query("DELETE FROM messages where id = '$id'");

	}

	public function add_weight_model($weight , $userId){
		if (isset($_SESSION['username'])){
		$cust = $_SESSION['username'];
		// $this->db->query("insert INTO personal_data(customer, date) values('$cust', 'CURRENT_TIMESTAMP()')");
		$this->db->query("INSERT INTO personal_data(customer, date, weight, userId ) values('$cust', NOW(), '$weight', (SELECT id FROM users WHERE id = '$userId')) ");
	}else{
		redirect('user/login','refresh');
	}
		// header("location: index");
		// exit;
	}


	public function send_answer_to_dietitian($answer, $message_id){
		$query = $this->db->query("INSERT INTO user_answers(answer , message_id ) values ('$answer', '$message_id')");
	}


	public function reanswer_to_user($reanswer, $message_id){
		$query = $this->db->query("INSERT INTO user_answers(answer , message_id , who_send_it) values ('$reanswer', '$message_id', 'dietitian')");
	}


	public function get_weight(){
		if (isset($_SESSION['username'])){
			$user = $_SESSION['username'];

			 $query = $this->db->query("SELECT weight FROM personal_data where customer = '$user' ORDER BY id DESC LIMIT 1");

			 $number_of_rows = $this->db->affected_rows();

			return $query->result();
		}
	}

	public function get_weight_history(){
		$user = $_SESSION['username'];

		$query = $this->db->query("SELECT AVG(weight) as weightAverage, DATE(date) as date FROM personal_data where customer = '$user' GROUP BY DATE(date)");
		return $query->result();
	}

	public function add_note($note){

		$user_id = $_SESSION['user_id'];
		$user = $_SESSION['username'];
		$query = $this->db->query("insert INTO user_notes(note, user_id) values('$note', (SELECT id FROM users WHERE username = '$user')) ");


			}

	// public function get_meal_notifiation($user_id, $dayName){
	// 	$query = $this->db->query("SELECT * FROM nutricion_program_v2 WHERE  (user_id = '$user_id' &&  day ='$dayName' ) ");

	// 	$affected_rows = $this->db->affected_rows();
	// 	if ($affected_rows >0) {
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }		

	public function get_notes(){
		$user_id = $_SESSION['user_id'];
		$user = $_SESSION['username'];

		$query = $this->db->query("SELECT * FROM user_notes WHERE user_id = '$user_id' ORDER BY date_inserted DESC");
		
		return $query->result();
	}		

	public function delete_note($id){
		$query = $this->db->query("DELETE FROM user_notes WHERE id = '$id' ");

	}

	public function add_fat($fat){

		$user = $_SESSION['username'];
		$user_id = $_SESSION['user_id'];

		$query = $this->db->query("INSERT INTO fat_percentage (fat_percent, date, user_id ) values('$fat', NOW(), (SELECT id from users where id = '$user_id'))");

	}

	public function get_fat_history(){
		//save the user id from session variable to take the values only from user that is //logged in
		$user_id = $_SESSION['user_id'];

		$query = $this->db->query("SELECT DATE(date) as date, AVG(fat_percent) as averageFat  FROM fat_percentage WHERE user_id = '$user_id' GROUP BY DATE(date)");
		
		return $query->result();
	}

	//add the user waistline to database
	public function add_waistline($waistline){
		$user_id = $_SESSION['user_id'];	
	    

		$query = $this->db->query("INSERT INTO waistline (user_waistline, date, user_id) values('$waistline', NOW(), (SELECT id FROM users WHERE id = '$user_id')) ");
	}

	//get the average waistline of the user daily
	public function get_waistline(){

		$user_id = $_SESSION['user_id'];

		$query = $this->db->query("SELECT date, AVG(user_waistline) AS averageW FROM `waistline` WHERE user_id = '$user_id' GROUP BY DATE(date)");

		return $query->result();
	}


	//check if the secret key is ok
	public function check_recognition_pass($pass, $email){
		$query = $this->db->query("SELECT * FROM user_secret_key where (password_id = '$pass') and (user_email = '$email') " ); 
		// echo "the user email is : ". $email."<br>";
		// echo "the user password is : ". $pass."<br>";

		$rec_pass_exist = $this->db->affected_rows($query);

		return $rec_pass_exist;
	}
	// otan o pelatis oloklirosei tin eggrafi diagrafetai o kodikos pistopoiisis
	public function in_use_secret_key($password_id){
		
		// $query = $this->db->query("INSERT INTO user_secret_key(in_use) values ('$number') WHERE user_email = 'neosPelatis@email.com' ");
		$query = $this->db->query("INSERT INTO user_secret_key(in_use, dietitian_id) VALUES (1, (SELECT dietitian_id FROM dietitian WHERE dietitian_id =1))");

		if($this->db->affected_rows() > 0){
			print "trela ";
			return true;
		}else{
			//echo " no trela";
			return false;
		}
		//$this->db->query("UPDATE user_secret_key SET user_id = '1' where username = '$username' ");
	}

	public function get_user_unique_password($email){
		 //$query = $this->db->query("SELECT password_id FROM user_secret_key WHERE user_email = '$email'");

		$this->db->select('password_id');
		$this->db->from('user_secret_key');
		$this->db->where('user_email' , $email);
		
		return $this->db->get()->row('password_id');
	}

	public function get_my_dietitian_id($userId){
		$query = $this->db->query("SELECT dietitianId FROM users WHERE id = '$userId' ");

		if($this->db->affected_rows() > 0){
			return $query->row()->dietitianId;
		}
	}


	function get_my_dietitian_id_from_pass_id($pass_id){
		$query = $this->db->query("SELECT dietitian_id FROM user_secret_key WHERE password_id = '$pass_id' ");

		if($this->db->affected_rows() > 0){
			return $query->row()->dietitian_id;
		}
	}


	public function check_user_activation($username){
		
		$query = $this->db->query("SELECT * FROM users WHERE username = '$username' ");

		if($this->db->affected_rows() > 0){
			return $query->row()->is_deactivated;
		}
		

	}

	public function increase_customer_number($dietitianId, $userEmail){
		$query = $this->db->query("UPDATE  dietitian SET number_of_customers = number_of_customers + 1 WHERE dietitian_id = '$dietitianId' ");
	}

	public function save_my_data($weight, $gender, $height, $age, $user_id){
		
		$query = $this->db->query("INSERT INTO user_personal_information (weight, height, gender, age, user_info_Id) VALUES ('$weight', '$height', '$gender', '$age', '$user_id')  ");

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			echo "nooo my" .$user_id;
		}
	}

	public function check_user_my_data($user_id){
		$query = $this->db->query("SELECT * FROM user_personal_information WHERE user_info_id = '$user_id' ");

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function get_my_data($user_id){
		$query = $this->db->query("SELECT * FROM user_personal_information WHERE user_info_id = '$user_id' ");

		if($this->db->affected_rows() > 0){
			return $query->row();
		}
	}

}