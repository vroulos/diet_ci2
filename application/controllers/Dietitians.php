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
	}

	public function insert_diet(){
		$this->dietitian_model->insert_dietitian();
	}

	//here dietitian inserts the foods in food table
	public function insert_food(){

			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('food', 'Food', 'trim|required|min_length[5]|max_length[120]');
			//if form do not run
		if ($this->form_validation->run() == false) {
			$this->load->view('dietitian/headerd');
			$this->load->view('dietitian/login/logind_success');
			echo 'if is running';
		} else{
			//run the insert_food function
			$this->dietitian_model->insert_food();
			//set foodname variable
			$data['foodname'] = "το φαγητό μπήκε στη βάση";


			$this->load->view('dietitian/headerd' , $data);
			$this->load->view('dietitian/login/logind_success' , $data);
		}
		

		
	}

	
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