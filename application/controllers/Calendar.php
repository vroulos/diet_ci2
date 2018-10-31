<?php 
/**
 * 
 */
class Calendar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('calendar');
		
	}

	public function show(){
		
	echo $this->calendar->generate();
	}
}

 ?>