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
		$this->load->database();
		$this->load->helper('captcha');
	}
	
	
	public function index() {
		if (isset($_SESSION['username'])){
			$data = new stdClass;
			$user_id = $_SESSION['user_id'];
			//$notifications = $this->user_model->get_meal_notifiation($user_id);
			$dietitianId = $this->user_model->get_my_dietitian_id($user_id);
			$this->user_model->in_use_secret_key('9epf89wapf89ajf');
									
			
			$this->load->view('header');
			$this->load->view('user/login/login_success', $data);
			$this->load->view('footer');
		}
	}


	//the user sees his program
	public function view_program(){

		$data = NULL;
		if (isset($_SESSION['username'])){

			$name = $_SESSION['username'];
			$user_id = $_SESSION['user_id'];
			
			$dayName = date("l");
			$dayName = strtolower($dayName);
			//echo $dayName;
			//notifications = $this->user_model->get_meal_notifiation($user_id, $dayName);

		// foreach ($notifications as  $value) {
		// 	//echo $value->day;
		// }
			
			$week = $this->session->userdata('week_that_user_see');

			if (!isset($week)) {

				$week = $this->user_model->get_current_week($user_id);

				$array = array(
				'week_that_user_see' => $week
				);

				$this->session->set_userdata( $array );
			}else{
				$week = $this->session->userdata('week_that_user_see');
			}

			if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['chooseNextWeek'])) {
				$week = $this->session->userdata('week_that_user_see');
				(int)$max_week = $this->user_model->get_max_week($user_id);
	
				if ($week < $max_week) {
					$nextWeek = (int)$week +1;
					$this->session->set_userdata('week_that_user_see', $nextWeek);
					$data['program'] = $this->user_model->get_nutricion_program_v2($nextWeek, $name , $user_id);
				}else{
					$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);
				}

				
			}

			else if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['choosePreviousWeek'])) {

				$week = $this->session->userdata('week_that_user_see');
				if ((int)$week > 1 ) {
					
					$previousWeek = (int)$week -1;
					$this->session->set_userdata('week_that_user_see', $previousWeek);

					$data['program'] = $this->user_model->get_nutricion_program_v2($previousWeek, $name , $user_id);
				}else{
					//i not let the week to become less than zero
					$week = 1;
					$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);
				}
				
			}else{
				$data['program'] = $this->user_model->get_nutricion_program_v2($week, $name , $user_id);

			}
			
			$this->load->view('header');
			$this->load->view('user/nutricion_program_view_v2' , $data);
			$this->load->view('footer');
			
		}else{
			redirect('user/login','refresh');
		}
	}

	public function my_meals(){
		if (isset($_SESSION['username'])) {

			$data = null;
			$this->load->model('dietitian_model');
			$data['my_meals'] = $this->dietitian_model->get_my_meals();

			
			$this->load->view('header');
			$this->load->view('dietitian/my_meals_view' , $data);
			$this->load->view('footer');
		}else{
			redirect('user/login','refresh');
		}
	}

	public function search_food(){
		if (isset($_SESSION['username'])) {

			$data = null;
			$search_input = $this->input->get('user_search_input');
			if (isset($search_input)) {
				
				$data['my_meals'] = $this->user_model->search_food($search_input);


				$this->load->view('header');
				$this->load->view('dietitian/my_meals_view', $data);
				$this->load->view('footer');

			}
		}else{
			redirect('user/login','refresh');
		}
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
				//pairnw to istoriko varous 
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
					$userId = $this->session->userdata('user_id');
					//apotikeuo sti vasi to varos
					$this->user_model->add_weight_model($user_weight, $userId);
					// sti $weight vazw to trexon varos
					$data['weight'] = $this->user_model->get_weight();
				}
			}
			$data['weight_history'] = $this->user_model->get_weight_history();
			$this->load->view('header');
			$this->load->view('user/add_personal_data_view' , $data);
			$this->load->view('footer', $data );
		} else {
			redirect('user/login','refresh');
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
			$data['fatPercentageHistory'] = $this->user_model->get_fat_history();
			$this->load->view('header', $data);
			$this->load->view('user/add_personal_data_view', $data);
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
			$data['waistlineValues'] = $this->user_model->get_waistline();	

			$this->load->view('header', $data);
			$this->load->view('user/add_personal_data_view', $data);
			$this->load->view('footer', $data );
		}else{
			redirect('user/login','refresh');
		}

	}


	public function food_feedback(){
		
		

			$reaction = $this->input->post('reaction');
			$meal_id = $this->input->post('meal_id');
			$textReaction = $this->input->post('textreaction');
		
			if (isset($textReaction)) {
				$result = $this->user_model->add_text_reaction($meal_id, $textReaction);
				echo "textReaction";
			}else if (isset($reaction)) {
				$result = $this->user_model->add_reaction($reaction, $meal_id);
				echo "reaction";
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

		}else{
			redirect('user/login','refresh');
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
		}else{
			redirect('user/login','refresh');
		}
	}


	public function delete_note1(){
		if (isset($_SESSION['username'])){

			$note_for_delete = $this->input->post('id');

			if(isset($note_for_delete)){

				$this->user_model->delete_note($note_for_delete);

				$data['notes'] = $this->user_model->get_notes();

				$this->load->view('header', $data);
				$this->load->view('user/user_note_view', $data);
				$this->load->view('footer', $data );
			}else{
				echo "note has deleted";
			}
		}
	}

	public function messages(){

		if (isset($_SESSION['username'])) {
			$customer_name = $_SESSION['username'] ;
	
			$id = $this->input->post('message_id');
			$delete_message = $this->input->post('message_to_delete');
			$answer = $this->input->post('answer');

			$data['answers'] = $this->user_model->get_answers($customer_name);
			

			if (isset($answer)) {
				$this->user_model->send_answer_to_dietitian($answer, $id);
				
			}
			//if the message_to_delete pressed then i delete the message
			else if(isset($delete_message)){
				$this->user_model->delete_message($id);
			}
		// delete the messages
			$data['messages'] = $this->user_model->get_messages($customer_name);
			if (isset($data['messages'])) {

				$this->load->view('header');
				$this->load->view('user/message_user_view' , $data);
				$this->load->view('footer', $data );
			}else{
				$data = null;
				$this->load->view('header');
				$this->load->view('user/message_user_view' , $data);
				$this->load->view('footer', $data );
			}

		}else{

			redirect('user/login','refresh');
		}
	}

	public function video_user_call(){
		if (isset($_SESSION['username'])) {
			$data = null;

				$this->load->view('header');
				$this->load->view('videoCall' , $data);
				$this->load->view('footer', $data );
		}

	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = null;

		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		//here i am using a callback function to check the secret user key
		$this->form_validation->set_rules('password_identity', 'Recognition Password', 'trim|required|min_length[4]|callback_check_pass_recognition['.$this->input->post('email').']');
       
		
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
			$pass_id = $this->input->post('password_identity');
			
			if ($this->user_model->create_user($username, $email, $password)) {

				// user creation ok
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
								if($this->user_model->in_use_secret_key('9epf89wapf89ajf')){
									echo '33333333333';
								}else{
									echo'4444444 false  ';
								}

				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}	
		}		
	}

	//get the password from email and then send it to user
	public function get_unique_password_to_email(){

		$data = null;

		//take the email from user input
		$email = $this->input->post('email');
		//validate the email
		$this->form_validation->set_rules('email','EMAIL','trim|required|valid_email');

		//if the validation is false the print the errors
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();// send error to the view		
							
		} else {
			$new_user_password = $this->user_model->get_user_unique_password($email);
			if (!isset($new_user_password)) {
				echo "the email has not sended";
			}else
			{
				$this->sendMail($email,$new_user_password);

			}
		} 
	}


    public function indexCaptcha(){
	    // If captcha form is submitted
	    if($this->input->post('submit')){
	        $inputCaptcha = $this->input->post('captcha');
	        $sessCaptcha = $this->session->userdata('captchaCode');
	        if($inputCaptcha === $sessCaptcha){
	            redirect('user/register','refresh');
	        }else{
	            echo 'Ο Captcha code δεν ταιριάζει, παρακαλώ δοκιμάστε ξανά.';
	        }
	    }
	    
	    // Captcha configuration
	    $config = array(
	        'img_path'      => 'captcha_images/',
	        'img_url'       => base_url().'captcha_images/',
	        'font_path'     => 'diet_ci2/system/fonts/texb.ttf',
	        'img_width'     => '200',
	        'img_height'    => 50,
	        'word_length'   => 4,
	        'font_size'     => 12,
	    );
	    $captcha = create_captcha($config);
	    
	    // Unset previous captcha and set new captcha word
	    $this->session->unset_userdata('captchaCode');
	    $this->session->set_userdata('captchaCode', $captcha['word']);
	    
	    // Pass captcha image to view
	    $data['captchaImg'] = $captcha['image'];
	    
	    // Load the view
	    $this->load->view('header');
	    $this->load->view('user/captcha/index', $data);
	    $this->load->view('footer');
	}

    
    public function refresh(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     => 'diet_ci2/system/fonts/texb.ttf',
            'img_width'     => '180',
            'img_height'    => 70,
            'word_length'   => 4,
            'font_size'     => 100
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }


	//send the email to the user. Here i am sending him the registration password
	public function sendMail($email, $new_user_password)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'vroulos.michail@gmail.com', // change it to yours
			'smtp_pass' => 'yourpassword', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		//the message that is sent
		$message = 'You are receiving a password . With that you can register in any device you want. Here is this : '.$new_user_password;
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
  		$this->email->from('youremail@gmail.com'); // change it to yours
 		$this->email->to('waharak487@resmail24.com');// change it to yours
 		$this->email->subject('Your registration password');
 		$this->email->message($message);
 		//check if the email is sent
 		if($this->email->send())
 		{
 			echo 'Email sent.';
 		}
 		else
 		{
 			show_error($this->email->print_debugger());
 		}		

 	}

	//elegxei an yparxei o kodikos gia tin tautopoiisi tou pelati
 	public function check_pass_recognition($pass, $user_email){
 		$exist = $this->user_model->check_recognition_pass($pass, $user_email);
 		if($exist > 0 && $exist < 2){
 			return true;
 		}else{
 			$this->form_validation->set_message('check_pass_recognition' , 'The password does not exist. Try again');
 			return false;
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
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if (!isset($_SESSION['username'])) {
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


				$resolve_user_login = $this->user_model->resolve_user_login($username, $password);
				$is_deactivated = $this->user_model->check_user_activation($username);

				if ($resolve_user_login and $is_deactivated == 0) {
					
					$user_id = $this->user_model->get_user_id_from_username($username);
					$user    = $this->user_model->get_user($user_id);

					// set session user datas
					$_SESSION['user_id']      = (int)$user->id;
					$_SESSION['username']     = (string)$user->username;
					$_SESSION['logged_in']    = (bool)true;
					$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
					//$_SESSION['is_admin']     = (bool)$user->is_admin;
					
					// user login ok
					$this->load->view('header');
					$this->load->view('user/login/login_success', $data);
					$this->load->view('footer');

					//redirect to index function 
					//redirect('user/index' , 'refresh');
					
				} else {
					
					// login failed
					if ($is_deactivated == 1) {
						$data->error = 'Δεν έχεις πλέον δικαίωμα πρόσβασης . Επικοινώνισε με τον διαιτολόγο';
					}else{
						$data->error = 'Λάθος κωδικός ή όνομα χρήστη.';
					}
					
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('user/login/login', $data);
					$this->load->view('footer');
					
				}		
			}

		}else{
			redirect('user/index','refresh');
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
