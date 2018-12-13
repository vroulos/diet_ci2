<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
	}
	
	
	public function index() {

		$data = new stdClass;
		
		$this->load->view('header');
		$this->load->view('user/login/login_success', $data);
		$this->load->view('footer');

		
	}
	//the user sees his program
	public function view_program(){

		if (isset($_SESSION['username'])){

			$data = $this->user_model->get_foods();

			$datakia = array('monday_launch' => $data->row(0)->monday_lau ,
				'monday_morning' => $data->row(1)->monday_break,
				'monday_dinner' => $data->row(2)->monday_din,
						  // 'tuesday_morning' =>$data->row(3)->foodname,
						  // 'tuesday_launch' =>$data->row(4)->foodname,
						  // 'tuesday_dinner' =>$data->row(5)->foodname,
						  // 'wendsday_morning' =>$data->row(6)->foodname,
						  // 'wendsday_launch' =>$data->row(7)->foodname,
						  // 'wendsday_dinner' =>$data->row(8)->foodname,
			);
		//num_rows return the number of lines in the query
			$rows = $data->num_rows();
			echo $rows;


			$this->load->view('header');
			$this->load->view('user/nutricion_program_view' , $datakia);
			$this->load->view('footer', $data );
		}else{
			redirect('user/login','refresh');
		}

		//$this->user_model->get_foods();
	}
	// o pelatis prosthetei to varos tou
	public function add_weight(){
		//check if the user has logged in
		if (isset($_SESSION['username']))
		{
			$data = NULL;
			//an patiso to koumpi me onoma weightHistory tha emfanisei to istoriko varous
			if (isset($_POST['weightHistory']))
			{
				//apothikeuo to istoriko varous 
				$data['weight_history'] = $this->user_model->get_weight_history();

			}
			//an patiso to koumpi ypovoli 
			elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addWeight']))
			{	//set rules for the input data
				$this->form_validation->set_rules
				('weight', 'Weight', 'trim|required|min_length[2]|max_length[2]',
					array(
						'required'      => 'You have not provided a valid %s.',
						'min_length'    => 'The %s you have provided is too low.',
						'max_length'    => 'I don\'t think you are THAT fat.'
					)
				);
				// Run validation and add weight if everything is ok
				if ($this->form_validation->run()){
					//pairnw to varos apo pou vazei o xristis
					$user_weight = $this->input->post('weight');
					//apotikeuo sti vasi to varos
					$this->user_model->add_weight_model($user_weight);
					// sti $weight vazw to trexon varos
					$data['weight'] = $this->user_model->get_weight();
				}
			}
			$this->load->view('header');
			$this->load->view('user/add_weight_view' , $data);
			$this->load->view('footer', $data );
		}
	}
	//prosthetei kai emfanizei to pososto lipous
	public function add_percent_fat(){
		$data = NULL;

		if (isset($_SESSION['username'])){
			//an patithei to koumpi istoriko varous
			if(isset($_POST['fatHistory'])){
				

					$data['fatPercentageHistory'] = $this->user_model->get_fat_history();
			}
			elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addFat'])){
				echo 'add fat is ok';
				$this->form_validation->set_rules
				('fat', 'Weight', 'trim|required|min_length[1]|max_length[3]',
					array(
						'required'      => 'You have not provided a valid %s.',
						'min_length'    => 'The %s you have provided is too low.',
						'max_length'    => 'I don\'t think you are THAT fatty.'
					)
				);

				if ($this->form_validation->run()) {

					$fat = $this->input->post('fat');
					$this->user_model->add_fat($fat);

				} 
				
			}
			$this->load->view('header', $data);
			$this->load->view('user/add_percent_fat', $data);
			$this->load->view('footer', $data );
		}else{
			redirect('user/login','refresh');
		}
	}

	//prosthetei tin perifereia mesis 
	public function add_waistline(){
			$data = NULL;
		if(isset($_SESSION['username'])){
			
			if(isset($_POST['waistlineHistory'])){

				$data['waistlineValues'] = $this->user_model->get_waistline();
				
			}
			elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addWaistline'])){
				$this->form_validation->set_rules('waistline', 'Waistline', 'trim|required|min_length[2]|max_length[3]',
					 array('required'      => 'You have not provided a valid %s.',
						'min_length'    => 'The %s you have provided is too low.',
						'max_length'    => 'I don\'t think you are THAT fatty.' 
					)
					);
			
				if ($this->form_validation->run()) {
					$waistline = $this->input->post('waistline');

					$this->user_model->add_waistline($waistline);

				}
			}
			$this->load->view('header1', $data);
			$this->load->view('user/waistline_view', $data);
			$this->load->view('footer', $data );
		}else{
			redirect('user/login','refresh');
		}
	
	}

	// display and add the user notes
	public function add_user_note(){
		$data = NULL;

		if (isset($_SESSION['username'])){

			if ($_SERVER['REQUEST_METHOD'] = "POST" and isset($_POST['add_note'])){

				$this->form_validation->set_rules('add_note', 'πεδίο', 'trim|required|min_length[5]|max_length[1500]',
					array(
						'required'      => 'Γράψε και κάτι στο %s.',
						'min_length'    => 'The %s you have provided is too low.',
						'max_length'    => 'I don\'t think you are so many thinks to write.'
					)
				);
				//an einai ola kala me tin forma trexo
				if ($this->form_validation->run()) {
					//the form is running			
					$note = $this->input->post('add_note');

					$this->user_model->add_note($note);
				} 
			}

			$data['notes'] = $this->user_model->get_notes();
			$this->load->view('header');
			$this->load->view('user/user_note_view' , $data);
			$this->load->view('footer', $data );

		}
	}

	public function delete_note(){
		if (isset($_SESSION['username'])){


			$note_for_delete = $this->input->post("note_to_delete");

			if(isset($note_for_delete)){

				$this->user_model->delete_note($note_for_delete);


				$data['notes'] = $this->user_model->get_notes();

				$this->load->view('header', $data);
				$this->load->view('user/user_note_view', $data);
				$this->load->view('footer', $data );
			}
		}
	}

	public function messages(){
		//get the user message form database
		$this->user_model->get_messages();

		//$message_to_delete = $this->db->input('post');
		$id = $this->input->post('message_to_delete');
		if(isset($id)){
			$this->user_model->delete_message($id);
		}
		

		//echo $message_to_delete;
		// delete the messages

		$data['messages'] = $this->user_model->get_messages();
		$this->load->view('header');
		$this->load->view('user/message_user_view' , $data);
		$this->load->view('footer', $data );
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->create_user($username, $email, $password)) {
				
				// user creation ok
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}

	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		//if (!isset($_SESSION['username'])) {
		if ($this->form_validation->run() == false) {
			
				// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/login/login');
			$this->load->view('footer');
		}

		else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);

				
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;

				echo 'i session einai'. $_SESSION['username'] ;
				
				// user login ok
				$this->load->view('header');
				$this->load->view('user/login/login_success', $data);
				$this->load->view('footer');

				//redirect to index function 
				redirect('user/index' , 'refresh');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/login/login', $data);
				$this->load->view('footer');
				
			}
			
		}

		
	}


	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('footer');
			redirect('User/login' , 'refresh');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('User/login' , 'refresh');
			
		}
		
	}
	
}
