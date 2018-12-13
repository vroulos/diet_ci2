<?php 

/**
 * 
 */
class mywebapp extends CI_Controller
{
	
	function __construct()
	{	
		parent::__construct();
		$this->load->helper(array('url'));

	}

	public function first(){
		$data = NULL;
		$this->load->view('headerApp', $data);
		$this->load->view('mywebapp_view');
		$this->load->view('footer', $data);

	}

}



?>