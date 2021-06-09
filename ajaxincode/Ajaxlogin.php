<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxlogin extends CI_Controller{

    public function index(){
      
        $this->load->view('Ajaxviews/ajaxloginview');

    }
public function ajaxsignup(){

    $this->load->view('Ajaxviews/ajaxloginview');

}

public function ajaxloginpage(){
    if($username=$this->input->post('Username')){
    
        $this->load->model('ajaxmodel');
     $this->ajaxmodel->checklogin($username);


    }
    else{

    }




}


}






?>