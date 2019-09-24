<?php 

/**
 * 
 */
class Dietitians extends CI_controller
{
	
	function __construct()
	{	
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('dietitian_model');	
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('table');
		$this->load->helper('email');
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
			redirect('dietitians/logind','refresh');
		}
		
	}
	// prosthiki programmatos gia pelati
	public function add_nutricion_program(){
		$data = NULL;
		if (isset($_SESSION['dietitian_name'])){
			if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['program_submit'])){
				
				$this->form_validation->set_rules('breakfast_monday', 'πρωινό Δευτέρας', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('lunch_monday', 'Lunch_monday', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('dinner_monday', 'Dinner_monday', 'trim|required|min_length[2]|max_length[22]');

				$this->form_validation->set_rules('breakfast_tuesday', 'Breakfast_tuesday', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('lunch_tuesday', 'fieldlabel', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('dinner_tuesday', 'Dinner tuesday', 'trim|required|min_length[2]|max_length[22]');

				$this->form_validation->set_rules('breakfast_wendsday', 'breakfast_wendsday', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('lunch_wendsday', 'fieldlabel', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('dinner_wendsday', 'Dinner wendsday', 'trim|required|min_length[2]|max_length[22]');

				$this->form_validation->set_rules('breakfast_thursday', 'fieldlabel', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('lunch_thursday', 'fieldlabel', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('dinner_thursday', 'Dinner thursday', 'trim|required|min_length[2]|max_length[22]');

				$this->form_validation->set_rules('breakfast_friday', 'fieldlabel', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('lunch_friday', 'fieldlabel', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('dinner_friday', 'Dinner friday', 'trim|required|min_length[2]|max_length[22]');

				$this->form_validation->set_rules('breakfast_saturday', 'saturday break', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('lunch_saturday', 'saturday launch', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('dinner_saturday', 'Dinner saturday', 'trim|required|min_length[2]|max_length[22]');

				$this->form_validation->set_rules('breakfast_sunday', 'su break', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('lunch_sunday', '', 'trim|required|min_length[2]|max_length[22]');
				$this->form_validation->set_rules('dinner_sunday', 'Dinner sunday', 'trim|required|min_length[2]|max_length[22]');

				if($this->form_validation->run() ){
					$this->dietitian_model->insert_program_model();
				}
			}
			$data['foods'] = $this->dietitian_model->get_foods();

			$this->load->view('dietitian/headerd', $data);
			$this->load->view('dietitian/add_nutricion_program_view', $data );
			$this->load->view('footer');

			//$this->output->set_output(json_encode($data));
		}else {
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
			//if yes 
			$this->form_validation->set_rules('send_message', 'Send_message', 'trim|required|min_length[5]|max_length[12000]');
		// if form is not submited the displays the views
			if ($this->form_validation->run() == false){
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/send_message_view');
				$this->load->view('footer');

		//if form submited send the message
			}else{
		 //$message = $this->input->post('send_message');
		// echo $message;
				$this->dietitian_model->send_message_model();
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/send_message_view');
				$this->load->view('footer');
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
		}
	}
// o diaitologos vlepi to trexon programa tou pelati
	public function customer_nutricion_program(){
		$data = NULL;
		$datakia = NULL;
		//check if dietitian has logged in
		if(isset($_SESSION['dietitian_name'])){

			//fortonw to user model gia an xrisimopoiiso ti sunartisi get_nutricion_program()
			$this->load->model('user_model');

			$name = $_SESSION['customer_name'];
			$user_id = $_SESSION['customer_id'];
			//save the current customer program and save it to $data
			$data = $this->user_model->get_nutricion_program($name , $user_id);

			//rows of the query
			$affected_rows = $this->db->affected_rows();
			//check if query returns
			if ($affected_rows > 0){
				//pernaw sto array to programma
				$datakia = array(
					'monday_morning' => $data->row(0)->monday_break,
					'monday_launch' => $data->row(1)->monday_lau ,
					'monday_dinner' => $data->row(2)->monday_din,

					'tuesday_morning' =>$data->row(3)->tuesday_break,
					'tuesday_launch' =>$data->row(4)->tuesday_lau,
					'tuesday_dinner' =>$data->row(5)->tuesday_din,

					'wendsday_morning' =>$data->row(6)->wendsday_break,
					'wendsday_launch' =>$data->row(7)->wendsday_lau,
					'wendsday_dinner' =>$data->row(8)->wendsday_din,

					'thursday_morning' =>$data->row(9)->thursday_break,
					'thursday_launch' =>$data->row(10)->thursday_lau,
					'thursday_dinner' =>$data->row(11)->thursday_din,

					'friday_morning' =>$data->row(12)->friday_break,
					'friday_launch' =>$data->row(13)->friday_lau,
					'friday_dinner' =>$data->row(14)->friday_din,

					'saturday_morning' =>$data->row(15)->saturday_break,
					'saturday_launch' =>$data->row(16)->saturday_lau,
					'saturday_dinner' =>$data->row(17)->saturday_din,

					'sunday_morning' =>$data->row(18)->sunday_break,
					'sunday_launch' =>$data->row(19)->sunday_lau,
					'sunday_dinner' =>$data->row(20)->sunday_din

				);
		//num_rows return the number of lines in the query
				$datakia['rows'] = $data->num_rows();




				$this->load->view('dietitian/headerd');
			//i am using the nutricion program view second time
				$this->load->view('user/nutricion_program_view' , $datakia);
				$this->load->view('footer', $data );
			}else{
				$this->load->view('header');
				$this->load->view('footer', $data );
			}

		}
	}

	public function create_customer_identity(){
		$data = NULL;
		if(isset($_SESSION['dietitian_name'])){

			if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['submit_register_password'])){

				$register_password = $this->input->post('register_password');

				$this->form_validation->set_rules('register_password' , 'κωδικός ταυτοποίησης' , 'trim|required|min_length[6]|callback_check_password');

				if($this->form_validation->run() ){
					
					$this->dietitian_model->insert_new_register_password($register_password);
				}
				

			}


			$data['password'] = $this->dietitian_model->get_register_passwords();
			

			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/create_customer_identity_view' , $data);
			$this->load->view('footer', $data );
		}
	}

	//search for dietitians and display nane and email if exists
	public function search(){

		if (isset($_SESSION['dietitian_name'])) {
			$to_search = $this->input->get('search_something');
			if (isset($to_search)) {

				$data['search_result'] = $this->dietitian_model->search_anything($to_search);

				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/search_result_view' , $data);
				$this->load->view('footer');
			}else{
				echo "why is not set?";
			}
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
					$newdata = array('dietitian_name' => $dusername );
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