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
		
	}

	public function insert_diet(){
		$this->dietitian_model->insert_dietitian();
	}

	//here dietitian inserts the foods in food table
	public function insert_food(){

		//fetch all customers and save them in $data table
		$data['users'] = $this->dietitian_model->get_customers();


		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('food', 'Food', 'trim|required|min_length[5]|max_length[120]');
			//if form do not run
		if ($this->form_validation->run() == false) {
			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/login/insert_food_view', $data);
			echo 'if is running';
		} else{
			//run the insert_food function
			$this->dietitian_model->insert_food_model();
			//set foodname variable
			$data['foodname'] = "το φαγητό μπήκε στη βάση";


			$this->load->view('dietitian/headerd' , $data);
			$this->load->view('dietitian/login/insert_food_view' , $data , $users);
		}
		
	}

	


	public function customer(){
		
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


		
	}

	public function add_nutricion_program(){
		$data['foods'] = $this->dietitian_model->get_foods();


		$this->load->view('dietitian/headerd', $data);
		$this->load->view('dietitian/add_nutricion_program_view', $data );
	}

	public function choose_customer(){
		//fetch all customers and save them in $data table
		$data['users'] = $this->dietitian_model->get_customers();

		$this->load->view('dietitian/headerd' , $data);
		$this->load->view('dietitian/choose_customer_view' , $data);


	}

	// inserts the customer's program to database
	public function insert_program(){

		$data = 'fdsaf';
		$this->form_validation->set_rules('breakfast_monday', 'Breakfast_monday', 'trim|required|min_length[5]|max_length[12]');

		if ($this->form_validation->run() == false) {
			$this->load->view('dietitian/headerd', $data);
			$this->load->view('dietitian/customer_view', $data );

		}
		else{
			$this->dietitian_model->insert_program_model();

			$this->load->view('dietitians/headerd', $data);
			$this->load->view('dietitians/customer_view', $data );
		}	
	}

	public function send_message(){
		//check if dietitian has choose a customer to proccess
		if(isset($_SESSION['customer_name'])){
			//if yes 
		$this->form_validation->set_rules('send_message', 'Send_message', 'trim|required|min_length[5]|max_length[12000]');
		// if form is not submited the displays the views
		if ($this->form_validation->run() == false){
			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/send_message_view');

		//if form submited send the message
		}else{
		 //$message = $this->input->post('send_message');
		// echo $message;
			$this->dietitian_model->send_message_model();
			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/send_message_view');
		}
	}else{

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
		}else{

			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('dietname', 'Dietname', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

			if ($this->form_validation->run() == false) {

			// validation not ok, send validation errors to the view
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/login/logind');
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



					$newdata = array('dietitian_name' => $dusername );
					$this->session->set_userdata($newdata);
					
				// user login ok
					$this->load->view('dietitian/headerd');
					$this->load->view('dietitian/login/logind_success');
					echo 'nooowerrr';

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