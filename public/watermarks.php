<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Watermarks extends CI_Controller{

 public function index()
{
   $this->load->library('image_lib');
   $this->load->view('info');
}
    public function submit(){
        if(isset($_POST['submit'])){
            $string = $_POST['caption'];
            $file_name = 'upload/'.$_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            move_uploaded_file($file_tmp,$file_name);  
      
            $config['image_library'] = 'GD2';

                $config['source_image'] = $file_name;
                $config['wm_text'] = $string;
                $config['wm_type'] = 'text';
                $config['wm_font_size'] = 16;
                $config['wm_vrt_alignment'] = 'bottom ';
                $config['wm_hor_alignment'] = 'right'; 
                $this->load->library('image_lib', $config);

                $this->image_lib->watermark();
 
        }
       
 
      



}}

?>