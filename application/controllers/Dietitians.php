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

	
	public function logind(){

		// create the data object
		$data = new stdClass();

		$diet_username = $this->input->post('dietname');
		//check if the dietitian is logged in . If yes is stays . If not goes to login page
		if ($this->session->userdata($diet_username) && isset($_SESSION['dietitian_name'])) {
				echo '   is this possible ???';
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/login/logind_success');
			}else{

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('dietname', 'Dietname', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

		
		echo 'i will fuck someone'. $diet_username;

		

				if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('dietitian/login/logind');

			echo CI_VERSION;
		}
		else {
			
			// set variables from the form
			$dusername = $this->input->post('dietname');
			$dpassword = $this->input->post('password');
			
			
			if ($this->dietitian_model->resolve_dietitian_login($dusername, $dpassword)) {
				//echo '  noooooo  !!!';
				$duser_id = $this->dietitian_model->get_dietitian_id_from_username($dusername);
				$duser    = $this->dietitian_model->get_dietitian($duser_id);

				//echo $row['dietitian_id'];

				// set session user datas
				//$_SESSION['dietitian_id']      = (int)$duser->dietitian_id;
				// $_SESSION['diet_name']     = (string)$duser->dietitian_name;
				// $_SESSION['logged_in']    = (bool)true;
				//$_SESSION['is_confirmed'] = (bool)$duser->is_confirmed;

				$newdata = array('dietitian_name' => $dusername );
				$this->session->set_userdata($newdata);
				echo 'the fucking name is  : '. $dusername ;
				// user login ok
				$this->load->view('dietitian/headerd');
				$this->load->view('dietitian/login/logind_success');
				
			}

			
		}
	}

	}

public function logoutd(){
		$user_data = $this->session->all_userdata();
		echo "this logoutd is woriking but not so good    ";
		
		echo $_SESSION['dietitian_name'];
		$this->session->unset_userdata($user_data);
		$this->session->sess_destroy();
		// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			//echo 'THE NAME IS'. $_SESSION['dietitian_name'];
		redirect('dietitians/logind','refresh');
	}

}


?>