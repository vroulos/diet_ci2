<?php 

/**
 * 
 */
class Getimage extends CI_controller
{
	
function __construct()
	{	
		parent::__construct();
		
	}

	function get_image(){
		$_GET['imgid'] = 1;
		echo 'o no';
		 //code to authenticate user goes here then...
        header("Content-type: image/jpeg");
        if(file_exists('http://localhost/diet_ci2/uploads/images/4')){
            $img_handle = imagecreatefromjpeg('http://localhost/diet_ci2/uploads/images'.$_GET['imgid'] ) or die(""); 
            ImageJpeg($img_handle);
        }
	}
}
 ?>