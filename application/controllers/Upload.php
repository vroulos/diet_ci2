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

        public function do_upload()
        {

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

                    $this->load->view('header');
                    $this->load->view('upload/upload_form', $error);
                    $this->load->view('footer');
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());



                    $this->load->view('header');
                    $this->load->view('upload/upload_success', $data);
                    $this->load->view('footer');
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
                    echo '<script>console.log("is inside delete_image")</script>';
                    if (isset($_SESSION['username'])){
                        echo '<script>console.log("Your stuff here")</script>';
                        $data = null;
                        $user_id = $_SESSION['user_id'];
                        $file = $_POST['path'];

                       if ($_POST['action'] == "remove_file") {
                            echo "strag";
                           if (file_exists($file)) {
                               unlink($file );
                               echo "file is deleted";
                               
                           }
                       }
                       
                        
                        
                        // if ( !file_exists( $file ) && !is_dir( $file ) ) {
                        //     echo "the file do not exists";
                        //         //mkdir( $dir );     
                        //         echo "the file do not exist";  
                        //     }else if (!unlink($file)) {
                        //         echo "error deleting the file";
                        //     }else{
                        //         echo "file deleted";
                        //     }

                            $this->load->view('header');
                            //$this->load->view('upload/display_images', $data);
                            $this->load->view('footer');
                        

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

        // $_GET['imgid'] = 'Fast-food.jpg';
        //  //code to authenticate user goes here then...
        // echo 'fuck them all';
        //  header("Content-type: image/jpeg");
        //  if(file_exists('http://localhost/diet_ci2/uploads/images/4'.$_GET['imgid'])){
        //     echo 'file exists';
        //     $img_handle = imagecreatefromjpeg('http://localhost/diet_ci2/uploads/images/4'.$_GET['imgid'] ) or die(""); 
        //     ImageJpeg($img_handle);
        //  }
                }
            }
            ?>