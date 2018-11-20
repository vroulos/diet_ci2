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
		
		$this->load->view('mywebapp_view');

	}

}



?>