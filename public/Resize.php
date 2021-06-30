<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resize extends CI_Controller{

public function index(){
  
    $this->load->library('image_lib');
    $this->load->view('resizeview/resizeimage',array('error' => ' ' ));

}
public function do_upload()
{


  

    switch ($this->input->post('Width')){
        case "320":
        $Height=200;  
         break;   
         case "640":
            $Height=480;  
             break;   
             case "800":
                $Height=600;  
                 break;   
                 case "1024":
                    $Height=768;  
                     break;   
                     case "1280":
                        $Height=768;  
                         break;   
            
                         case "1600":
                            $Height=1200;  
                    break;  
                    default:
                    $Height=0;    
    }



   $Width= $this->input->post('Width');
  
   $this->load->helper('file');    
if(isset($_FILES['image'])){

   $files = $_FILES;    
        $cpt = count($_FILES['image']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['image']['name']= $files['image']['name'][$i];
            $_FILES['image']['type']= $files['image']['type'][$i];
            $_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
            $_FILES['image']['error']= $files['image']['error'][$i];
            $_FILES['image']['size']= $files['image']['size'][$i];

        $config['upload_path']          = "upload/";
        $config['allowed_types']        = 'jpg|jpeg|png|gif'; 
   
        $config['overwrite']        = true;
     
     
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('resizeview/result', $error);

        }
        else
        {
            $data = array('result' => $this->upload->data());
            
            $path=$data['result']['full_path'];

                $config['image_library'] = 'GD2';
                $config['source_image'] =  $path; 
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $Width;
                $config['height'] = $Height;
                $config['file_permissions'] = 0777;
               
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);

                    $this->image_lib->resize();
                   
                    $this->load->view('resizeview/result', $data);
                   
        }
}
}else{
    return redirect('resize/resize');

}

}public function pdftojpg(){

  

    if(isset($_FILES['pdf'])){
        $config['upload_path']          = "upload/pdftojpg";
        $config['allowed_types']        = 'pdf'; 
        $config['file_permissions'] = 0777;
        $config['overwrite']        = true;
        $this->load->library('upload', $config);
       
     
        if ( ! $this->upload->do_upload('pdf'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('resizeview/pdftojpg', $error);

        }
        else
        {
            $data = array('result' => $this->upload->data());

            $pdfPath = $config['upload_path'] . '/' .$this->upload->data('file_name');
           
          
            $jpg="upload/jpg/".microtime(true).".jpg";
 
               //make sure that apache has permissions to write in this folder! (common problem)
            
            //execute ImageMagick command 'convert' and convert PDF to JPG with applied settings
            exec('magick convert -density 300 -colorspace RGB -trim "'.$pdfPath.'" -quality 100 -background white -alpha remove "'.$jpg.'"', $output, $return_var);
            
         echo $return_var;
            if($return_var == 0) {      
                        //if exec successfuly converted pdf to jpg
                        echo 
                        '<div class="contanier text-center mt-5"> <img src = "'.base_url('ci/'.  $jpg ).'" width="720" height="800" > </div>';
            }
            else echo "Conversion failed.<br />".$output;
    
            
           
            $this->load->view('resizeview/pdftojpg',  $data);
      
}





}   else{

    $this->load->view('resizeview/pdftojpg');
}


}}