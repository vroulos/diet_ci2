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
	}



	public function logind(){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('dietname', 'Dietname', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('dietitian/login/logind');

			echo CI_VERSION;
		}
		else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
			
			}
		}

	}

}


?>