<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');  
class ajaxmodel extends CI_Model{

public function checklogin($username){

    $q=$this->db->where(['Username'=>$username])
               ->get('user');
if($q->num_rows()>0){ 
    
  return true;

}else{

    return false;

}
}
}







?>