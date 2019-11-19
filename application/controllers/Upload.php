<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
                $this->load->helper('directory'); //load directory helper

    }

    public function index(){
        if (isset($_SESSION['username'])){

            $this->load->view('header');
            $this->load->view('upload/upload_form', array('error' => ' ' ));
            $this->load->view('footer');
        }else{
            redirect('user/login','refresh');
        }
    }

    public function do_upload(){

        $user_id = $_SESSION['user_id'];
            // Define path where file will be uploaded to
            //   User ID is set as directory name
        $folderPath = "/uploads/$user_id";
        $exist = is_dir('uploads/images/'.$user_id);

        if (!$exist) {
            mkdir('./uploads/images/'.$user_id, 0777, true);
        }

        if(isset($_SESSION['username'])){
            $config['upload_path']          = './uploads/images/'.$user_id;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;
            $config['max_width']            = 4000;
            $config['max_height']           = 4000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                if ($error == null) {
                    $this->display_images();
                }else{
                    $this->load->view('header');
                    $this->load->view('upload/display_images', $error);
                    $this->load->view('footer');
                    echo "this is when userfile do not uploaded";
                }             
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('header');
                $this->load->view('upload/upload_success', $data);
                $this->load->view('footer');
                echo "when all is ok";
            }       
        }
    }

    public function display_images(){
        if (isset($_SESSION['username'])){
        
            $data = NULL;
            $user_id = $_SESSION['user_id'];
            $dir = "uploads/images/".$user_id; // Your Path to folder
            $map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

            $data = array('map' =>$map );
            $data['dir'] = $dir;

            $this->load->view('header');
            $this->load->view('upload/display_images', $data);
            $this->load->view('footer');

        }else{
            redirect('user/login','refresh');
        }
    }

                public function display_single_image(){
                    if (isset($_SESSION['username'])) { 
                    }
                }

    public function delete_image(){
        //echo '<script>console.log("is inside delete_image")</script>';
        if (isset($_SESSION['username'])){

            $path = $this->input->post('path');
            $formPath = $this->input->post('k');
            echo $formPath;
            //echo $path;
            //echo '<script>console.log("Your stuff here")</script>';
            //$data = null;
            // $user_id = $_SESSION['user_id'];
            if (isset($path)) {
                echo $path;
                 //$file = $_POST['path'];

                if ($_POST['action'] == "remove_file") {
                    //echo "strag";
                    if (file_exists($path)) {
                        unlink($path);
                        echo "<br>";
                         echo "file is deleted";
                   
                    }else{
                        echo "file does not exists";
                    }
                } 
            }
            else{
                echo "this is error";
            }
        }else{
            redirect('user/display_images','refresh');
        }
    }


    function get_image(){

        $filename = 'http://localhost/diet_ci2/uploads/4';

        if (!file_exists($filename)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($filename));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filename));
            ob_clean();
            flush();
            readfile($filename);
            exit;
        }
    }
}
            ?>