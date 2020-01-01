<?php 

/**
 * 
 */
class Dietitians extends CI_controller
{
	
	function __construct()
	{	
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url'));
		$this->load->model('dietitian_model');	
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('table');
		$this->load->helper('email');
		$this->load->helper('date');


	}

	public function initial(){
		$data = 'lele';

		
		$this->load->view('dietitian/headerd', $data);
		$this->load->view('dietitian/initial_view', $data);
		$this->load->view('footer');
		
	}
    // eisagogi neou diaitologou
	public function insert_diet(){
		$this->dietitian_model->insert_dietitian();
	}

	//here dietitian inserts the foods in food table
	public function insert_food(){

		$data = NULL;
		if (isset($_SESSION['dietitian_name'])){
			if ($_SERVER['REQUEST_METHOD'] == "POST" and $_POST['submit_food']) {
				
				$this->form_validation->set_rules('food', 'Food', 'trim|required|min_length[3]|max_length[20]',
					array('required' => 'πρέπει να συμπληρώσεις το φαγητό'  ));
				$this->form_validation->set_rules('type', 'Type', 'trim|required|min_length[2]|max_length[12]');
				$this->form_validation->set_rules('calories', 'Calories', 'trim|required|min_length[1]|max_length[12]');	
				if ($this->form_validation->run() ) {

					$data['success'] = $this->dietitian_model->add_food_model();
				}
			}
			$this->load->view('dietitian/headerd' , $data);
			$this->load->view('dietitian/login/insert_food_view' , $data );
			$this->load->view('footer');
		}else{
			redirect('dietitians/logind','refresh');
		}


	}

	
	//epilogi pelati kai apothikeysi sto $customer_name ti session tou pelati
	public function customer(){
		if (isset($_SESSION['dietitian_name'])){
			//the customer id
			$customer_id = $this->input->get('id');
			//get the customer using get_customer function 
			$dos = $this->dietitian_model->get_customer($customer_id);
			// row() : This method returns a single result row. It returns the data as object
			$row = $dos->row();
			$customer_name = $row->username;

			$data = array('name' => $customer_name );
			$data['foods'] = $this->dietitian_model->get_foods();
			$this->session->set_userdata('customer_name' , $customer_name);
			$this->session->set_userdata('customer_id' , $customer_id);

			$this->load->view('dietitian/headerd', $data);
			$this->load->view('dietitian/initial_view', $data );
			$this->load->view('footer');
		}else{
			//redirect('dietitians/logind','refresh');
		}
		
	}

	public function deactivate_customer(){
		if (isset($_SESSION['dietitian_name'])) {
			//the customer id
			$customer_id = $this->input->get('id');

			$result = $this->dietitian_model->deactivate_customer($customer_id);
			if ($result) {
				redirect('Dietitians/choose_customer','refresh');
			}

		}
	}

	//activates the user
	public function activate_customer(){
		if (isset($_SESSION['dietitian_name'])) {

			//the customer id
			$customer_id = $this->input->get('id');
			echo $customer_id;

			$result = $this->dietitian_model->activate_customer($customer_id);
			if ($result) {
				redirect('Dietitians/choose_customer','refresh');
			}

		}
	}
	
	//add and display the nutricion program
	public function add_nutricion_program_v2(){
		if (isset($_SESSION['dietitian_name']) AND isset($_SESSION['customer_name'])) {
			$data = null;
			//fortonw to user model gia an xrisimopoiiso ti sunartisi get_nutricion_program()
			$this->load->model('user_model');
			$name = $_SESSION['customer_name'];
			$user_id = $_SESSION['customer_id'];
			$data['weeks'] = $this->dietitian_model->get_weeks($user_id);
			$week = $this->session->userdata('week');
			$duser_id = $_SESSION['dietitian_id'];
			$data['templates'] = $this->dietitian_model->get_templates($duser_id);

			$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);


			//if the dietitian add a meal with pushing the button
			if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit_program']) ){

				if (!empty($this->input->post('week'))) {
					$week = $_POST['week'];
				}else{
					$this->session->set_userdata('week', 1);
				}
				
				$this->session->set_userdata('week', $week);
				
				$day = $_POST['day_of_week'];
				$mealtime = $_POST['mealtime_category'];
				$meal = $_POST['food'];
				
				
				$user_id = $_SESSION['customer_id'];
				$duser_id = $_SESSION['dietitian_id'];

				//add the meal to the the table nutricion_program_v2
				$this->dietitian_model->add_meal($week, $day, $mealtime, $meal, $user_id, $duser_id);



				//save the current customer program and save it to $data
				$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);


				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/add_nutricion_program_view_v2', $data);
				$this->load->view('user/nutricion_program_view_v2', $data);
				$this->load->view('footer');

				
			//add new week to the customer nutricion program
			}else if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['addNewWeek'])){
					
					
				$user_id = $_SESSION['customer_id'];
				//check if exists at least one week
				$week_exist = $this->dietitian_model->week_exist($user_id);

				$result = $this->dietitian_model->get_current_date($user_id);
				if ($result) {
					$current_date = $result->date;
					$current_date_obj = date_create($current_date);
					$date_plus_one_week_obj = date_add($current_date_obj,date_interval_create_from_date_string("7 days"));
					$date_plus_one_week = $date_plus_one_week_obj->format('Y-m-d H:i:s');
				
					$current_week = $result->week;
					$new_week = $current_week+1;						
					$meal = '';
					$this->dietitian_model->add_new_week($new_week, $user_id, $duser_id, $date_plus_one_week, $meal);
					$data['weeks'] = $this->dietitian_model->get_weeks($user_id);
					$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);
				}else{

				}
				

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/add_nutricion_program_view_v2', $data);
				$this->load->view('user/nutricion_program_view_v2', $data);
				$this->load->view('footer');

			}else if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submitTemplate'])){

				$this->session->set_userdata('week', $week);
				$templateName = $this->session->userdata('choosenTemplate');
				$template = $this->dietitian_model->get_current_template($templateName);
				//$week = $this->session->userdata('week');

				$result = $this->dietitian_model->get_current_date($user_id);
				if ($result) {
					$current_date = $result->date;
					$current_date_obj = date_create($current_date);
					$date_plus_one_week_obj = date_add($current_date_obj,date_interval_create_from_date_string("7 days"));
					$date_plus_one_week = $date_plus_one_week_obj->format('Y-m-d H:i:s');


					if (!isset($temlate)) {
						foreach ($template as $value) {
						$meal = $value->food;
						$day = $value->day;
						$mealtime = $value->hour;


						$this->dietitian_model->add_meal_from_template($week, $day, $mealtime, $meal, $user_id, $duser_id, $current_date);
						
					}
				}	
				}
				

				$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/add_nutricion_program_view_v2', $data);
				$this->load->view('user/nutricion_program_view_v2', $data);
				$this->load->view('footer');
				//$this->dietitian_model->load_template();



			}
			else if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['chooseWeek'])){

				$week = $this->input->post('week');
				$this->session->set_userdata('week', $week );
				$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/add_nutricion_program_view_v2', $data);
				$this->load->view('user/nutricion_program_view_v2', $data);
				$this->load->view('footer');

			}else if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['chooseTemplate'])){

				$choosenTemplate = $this->input->post('load_template');
				echo $choosenTemplate;

				$this->session->set_userdata('choosenTemplate', $choosenTemplate );

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/add_nutricion_program_view_v2', $data);
				$this->load->view('user/nutricion_program_view_v2', $data);
				$this->load->view('footer');
							
			}
			else {
				
				
				$week = $this->session->userdata('week');
				
				if (!isset($week) or empty($week)) {

				$week = $this->session->set_userdata('week', 0);
				$day = 'monday';
				$mealtime = 'breakfast';
				$meal = '';	
				$user_id = $_SESSION['customer_id'];
				$duser_id = $_SESSION['dietitian_id'];

				//add the meal to the the table nutricion_program_v2
				$this->dietitian_model->add_meal($week, $day, $mealtime, $meal, $user_id, $duser_id);
					
				}
				
					//get the current customer program and save it to $data
				$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/add_nutricion_program_view_v2', $data);
				$this->load->view('user/nutricion_program_view_v2', $data);
				$this->load->view('footer');
			}
		}else {
			redirect('dietitians/logind','refresh');
		}
	}


	public function add_template(){
		if (isset($_SESSION['dietitian_name'])) {
			$data = null;

				$duser_id = $_SESSION['dietitian_id'];

			$data['templates'] = $this->dietitian_model->get_templates($duser_id);
			

			if ($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['submit_program'])) {

				if (isset($_SESSION['choosenTemplate'])) {
					$templateName = $_SESSION['choosenTemplate'];
					$day = $_POST['day_of_week'];
					$mealtime = $_POST['mealtime_category'];
					$meal = $_POST['food'];

					$this->dietitian_model->add_meal_to_template($templateName, $day, $mealtime, $meal, $duser_id);

					$data['template'] = $this->dietitian_model->get_current_template($templateName);


				
				}
				
				
				
			}else if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['addTemplate'])){

			
					$templateName = $_POST['template_name'];
					$day = $_POST['day_of_week'];
					$mealtime = $_POST['mealtime_category'];
					$meal = $_POST['food'];
					$duser_id = $_SESSION['dietitian_id'];


					 $this->dietitian_model->add_template($templateName, $day, $mealtime, $meal, $duser_id);
					 $data['templates'] = $this->dietitian_model->get_templates($duser_id);

			}else if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['chooseTemplate'])){

				$choosenTemplate = $this->input->post('add_template');
				$this->session->set_userdata('choosenTemplate', $choosenTemplate );
							
			}
				if (isset($_SESSION['choosenTemplate'])) {
						$templateName = $_SESSION['choosenTemplate'];

					$data['template'] = $this->dietitian_model->get_current_template($templateName);

					$this->load->view('dietitian/headerd', $data);
					$this->load->view('dietitian/add_template_view', $data );
					$this->load->view('dietitian/template_view', $data);
					$this->load->view('footer');
				}else{

					$this->load->view('dietitian/headerd', $data);
					$this->load->view('dietitian/add_template_view', $data );
					
					$this->load->view('footer');
				}
			

		}else{
			redirect('dietitians/logind','refresh');
		}
	}





	public function choose_customer(){
		if (isset($_SESSION['dietitian_name'])){

			//fetch all customers and save them in $data table
			$data['users'] = $this->dietitian_model->get_customers();

			$this->load->view('dietitian/headerd' , $data);
			$this->load->view('dietitian/choose_customer_view' , $data);
			$this->load->view('footer');
		}else{
			redirect('dietitians/logind','refresh');
		}
	}

	// inserts the customer's program to database
	public function insert_program(){

		$data = NULL;
		if (isset($_SESSION['dietitian_name'])){

			if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['']))
				$this->form_validation->set_rules('breakfast_monday', 'Breakfast_monday', 'trim|required|min_length[5]|max_length[12]');

			if ($this->form_validation->run() == false) {
				$this->load->view('dietitian/headerd', $data);
				$this->load->view('dietitian/customer_view', $data );
				$this->load->view('footer');

			}
			else{
				$this->dietitian_model->insert_program_model();

				$this->load->view('dietitians/headerd', $data);
				$this->load->view('dietitians/customer_view', $data );
				$this->load->view('footer');
			}	
		}else{
			redirect('dietitians/logind','refresh');
		}
	}

	public function send_message(){
		//check if dietitian has choose a customer to proccess
		if(isset($_SESSION['customer_name']) && $_SESSION['dietitian_name']){

			//get the reanswer of dietitian to the user
			$response = $this->input->post('reanswer');
			//the message id of the comversation
			$message_id = $this->input->post('message_id');
			

			$username = $_SESSION['customer_name'];
			$this->load->model('user_model');

			//get the messages from database and store them in the $data
			$data['messages'] = $this->user_model->get_messages($username);
			$data['answers'] = $this->user_model->get_answers($username);

			

			//if the dietitian reanswer to user 
			if (isset($response)) {
				$reanswer = $this->user_model->reanswer_to_user($response, $message_id);

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/send_message_view', $data);
				$this->load->view('footer');
			}else{
				//if yes 
			$this->form_validation->set_rules('send_message', 'Send_message', 'trim|required|min_length[5]|max_length[12000]');

		
			// if form is not submited the displays the views
			if ($this->form_validation->run() == false){
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/send_message_view', $data);
				$this->load->view('footer');

			//if form submited send the message
			}else{
				$result = $this->dietitian_model->send_message_model();

				if($result){
					$this->session->set_flashdata('success', 'Το μήνυμα στάλθηκε');
				}else{
					$this->session->set_flashdata('error', 'Αποτυχία αποστολής');
				}

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/send_message_view', $data);
				$this->load->view('footer');
			}
			}
			
		}else{
			redirect('dietitians/logind','refresh');
		}
	}
	//o dietologos vlepei tin proodo varous toy pelati se grafima 
	public function customer_progress(){
		if (isset($_SESSION['dietitian_name'])){

			//olo to istoriko varous
			$data['weight_history'] = $this->dietitian_model->get_weight_history();

			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/customer_progress_view' , $data);
			$this->load->view('footer');
		}else{
			//redirect to login page
			redirect('dietitians/logind','refresh');
		}
	}
	


	public function create_customer_secret_key(){
		$data = NULL;
		if(isset($_SESSION['dietitian_name'])){




			if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['submit_register_password'])){
				$register_password = $this->input->post('register_password');
				$user_email = $this->input->post('user_email');

				$this->form_validation->set_rules('register_password' , 'κωδικός ταυτοποίησης' , 'trim|required|min_length[6]|callback_check_password');
				//i also use callback function to check if the email already exists in database
				$this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email|callback_check_if_user_email_exists');

				if($this->form_validation->run() ){
					
					$this->dietitian_model->insert_new_register_password($register_password, $user_email);
				}
				
			}


			$data['password'] = $this->dietitian_model->get_register_passwords();

			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/create_customer_secret_key_view' , $data);
			$this->load->view('footer', $data );
		}else{
			//redirect to login page
			redirect('dietitians/logind','refresh');
		}
	}

	public function check_if_user_email_exists($user_email){
		if ($this->dietitian_model->if_user_email_exists($user_email)) {
			$this->form_validation->set_message('check_if_user_email_exists' , 'The email already exists. Use different!');
			return false;
		}else{
			
			return true;
		}
	}

	public function my_meals(){
		if (isset($_SESSION['dietitian_name'])) {
			$data = null;
			$data['my_meals'] = $this->dietitian_model->get_my_meals();

			$meal_id = $this->input->post('meal_id');
			if ($_SERVER['REQUEST_METHOD'] == "POST" AND isset($meal_id)) {
				$this->dietitian_model->delete_food($meal_id);
				
				
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/my_meals_view', $data);
				$this->load->view('footer');
			}else{
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/my_meals_view', $data);
				$this->load->view('footer');
			}

		}else{
			//redirect to login page
			redirect('dietitians/logind','refresh');
		}
}


	//search for dietitians and display nane and email if exists
	public function search(){

		if (isset($_SESSION['dietitian_name'])) {
			$to_search = $this->input->get('search_something');
			if (isset($to_search)) {

				$data['search_result'] = $this->dietitian_model->search_anything($to_search);
				$data['users'] = $this->dietitian_model->search_customer($to_search);


				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/choose_customer_view' , $data);
				$this->load->view('footer');
			}else{
				echo "why is not set?";
			}
		}else{
			//redirect to login page
			redirect('dietitians/logind','refresh');
		}		
	}

	//fetch the dietitian informations and it can proccess them . Change usename , email etc.
	public function settings(){
		if (isset($_SESSION['dietitian_name'])) {
			$old_dietitian_name = $_SESSION['dietitian_name'];

			$data['dietitian_profile_info'] = $this->dietitian_model->get_dietitian_info($old_dietitian_name);

			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_info_submit'])) {

				$newName = $_POST['newDietitianName'];
				$newEmail = $_POST['newEmail'];
				$newAge = $_POST['newAge'];
				$newMobile = $_POST['newMobile'];
				echo $newName."</br>";
				echo $newAge;

				$this->form_validation->set_rules('newDietitianName', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
				$this->form_validation->set_rules('newEmail', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('newMobile', 'Phone', 'trim|required|min_length[5]|max_length[12]');
				$this->form_validation->set_rules('newAge', 'fieldlabel', 'trim|required|min_length[1]|max_length[2]');

				if ($this->form_validation->run() == false) {
					$this->load->view('dietitian/headerd');
					$this->load->view('dietitian/settings_view', $data);
					$this->load->view('footer');
				} else {
					//adds the new information to the database
					$this->dietitian_model->update_dietitian_info($old_dietitian_name, $newName,$newEmail, $newMobile, $newAge);
					
					

					//get the updated profile information from database. Run the function with new Name
					$data['dietitian_profile_info'] = $this->dietitian_model->get_dietitian_info($newName);

					$this->load->view('dietitian/headerd');
					$this->load->view('dietitian/settings_view' , $data);
					$this->load->view('footer');
				}
			}else{
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/settings_view' , $data);
				$this->load->view('footer');
			}

		}else{
			//redirect to login page
			redirect('dietitians/logind','refresh');
		}
	}

	public function check_password($password){
		$result = $this->dietitian_model->check_password_id($password);

		if($result){
			$this->form_validation->set_message('check_password' , 'Ο κωδικός υπάρχει ήδη');

			return false;
		}else{
			return true;
		}
	}


	//login dietitian
	public function logind(){

		// create the data object
		$data = new stdClass();

		$diet_username = $this->input->post('dietname');
		//check if the dietitian is logged in . If yes is stays . If not goes to login page
		if ($this->session->userdata($diet_username) && $_SESSION['dietitian_name'] = $diet_username) {
			
			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/login/logind_success');
			$this->load->view('footer');
		}else{

			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('dietname', 'Dietname', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

			if ($this->form_validation->run() == false) {

			// validation not ok, send validation errors to the view
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/login/logind');
				$this->load->view('footer');	
			}
			else {
				// set variables from the form
				$dusername = $this->input->post('dietname');
				$dpassword = $this->input->post('password');

				if ($this->dietitian_model->resolve_dietitian_login($dusername, $dpassword)) {

					$duser_id = $this->dietitian_model->get_dietitian_id_from_username($dusername);
					$duser    = $this->dietitian_model->get_dietitian($duser_id);
					//
					$newdata = array('dietitian_name' => $dusername,
									 'dietitian_id' => $duser_id );
					//set the session variables
					$this->session->set_userdata($newdata);
					
				// user login ok
					$this->load->view('dietitian/headerd');
					$this->load->view('dietitian/login/logind_success');
					$this->load->view('footer');	

				}else{
					redirect('dietitians/logind','refresh');
				}
			}
		}
	}


// logout dietitian
	public function logoutd(){
		//collect all session data
		$user_data = $this->session->all_userdata();

		//destroy all dietitian session data
		$this->session->unset_userdata($user_data);
		// destroy session
		$this->session->sess_destroy();
		// remove session datas
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		//redirect to login page
		redirect('dietitians/logind','refresh');
	}
}


?>