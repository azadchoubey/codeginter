<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ajaxmodel extends CI_Model{

public function checklogin($username){

    $query=$this->db->select('*')
    ->$this->db->from('user')
    ->$this->db->where($username)
    ->$this->db->get();

   if(count($query)>0){
        echo "username alredy taken";

   }
else{
    echo " username is avalible";


}
}}








?>