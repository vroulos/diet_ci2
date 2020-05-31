<?php 

/**
 * 
 */
class AdminPanel extends CI_controller
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

	// public function login(){
	// 	$data = 'lele';

		
	// 	$this->load->view('headerPanel', $data);
	// 	$this->load->view('admin/admin_login', $data);
	// 	$this->load->view('footer');
			public function login() {
	// }

	
		
		// create the data object
		$data = new stdClass();
		$this->load->model('admin_model');
		$this->admin_model->create_admin1('admin', 'admin@gmail.com', '123456');
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if (!isset($_SESSION['username'])) {
			if ($this->form_validation->run() == false) {
				
				// validation not ok, send validation errors to the view
				$this->load->view('headerPanel');
				$this->load->view('admin/admin_login');
				$this->load->view('footer');
			}

			else {
				
				// set variables from the form
				$username = $this->input->post('username');
				$password = $this->input->post('password');


				$resolve_user_login = $this->admin_model->resolve_admin_login($username, $password);
				// $is_deactivated = $this->user_model->check_user_activation($username);

				// if ($resolve_user_login and $is_deactivated == 0) {
					
					$admin_id = $this->admin_model->get_admin_id_from_username($username);
					$admin    = $this->admin_model->get_admin($admin_id);

					// set session user datas
					$_SESSION['admin_id']      = (int)$admin->id;
					$_SESSION['username-admin']     = (string)$admin->username;
					// $_SESSION['logged_in']    = (bool)true;
					// $_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
					//$_SESSION['is_admin']     = (bool)$user->is_admin;
					
					// user login ok
					redirect('adminPanel/admin_panel','refresh');
					//redirect to index function 
					//redirect('user/index' , 'refresh');
					
				// } else {
					
				// 	// login failed
				// 	if ($is_deactivated == 1) {
				// 		$data->error = 'Δεν έχεις πλέον δικαίωμα πρόσβασης . Επικοινώνισε με τον διαιτολόγο';
				// 	}else{
				// 		$data->error = 'Λάθος κωδικός ή όνομα χρήστη.';
				// 	}
					
					
				// 	// send error to the view
				// 	$this->load->view('headerPanel');
				// 	$this->load->view('admin/admin_login', $data);
				// 	$this->load->view('footer');
					
				// }		
			}

		}else{
			redirect('adminPanel/admin_panel','refresh');
		}					
	}


	public function admin_panel(){
		if(isset($_SESSION['username-admin'])){
			$data = "my data";
		$this->load->view('headerPanel');
		$this->load->view('admin/admin_panel_view', $data);
		$this->load->view('footer');
		}else{
			redirect('adminPanel/login','refresh');
		}
	}
		

	public function adminLogout(){
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
		redirect('adminPanel/login','refresh');
	}
}


?>