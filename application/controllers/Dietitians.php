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


	//login dietitian
	public function logind(){

		// create the data object
		$data = new stdClass();

		$diet_username = $this->input->post('dietname');
		//check if the dietitian is logged in . If yes is stays . If not goes to login page
		if ($this->session->userdata($diet_username) && isset($_SESSION['dietitian_name'])) {
			
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

				echo 'false validation if is running';
				//echo CI_VERSION;
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