<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');  
class ajaxmodel extends CI_Model{

public function checkuser($username,$Password){

  $q=$this->db->where(['Username'=>$username,'Password'=>$Password])
  ->get('user_login');
if($q->num_rows()>0){ 
foreach ($q->result_array() as $query){

}
return json_encode($query['id']);

}else{

return json_encode(false);
}}
public function checklogin($username,$Password){

  $q=$this->db->where(['Username'=>$username])
  ->get('user');


if($q->num_rows()>0){ 
    foreach ($q->result_array() as $query){
      if(password_verify($Password,$query['Password']))
      return true;
      else{
        return false;

      }
    } 

}else{

return 2;

}}
public function adduser($username,$Password){
  $data = array('Username' => $username, 'Password' => $Password);


 if(!$this->db->insert('user_login', $data)){
    
      return false;
    } else{

      return true;
    }
 }
 public function tokenwithlogin($username,$password,$key){
        $query = $this->db->where(['Token'=>$key])
                         ->get('token');
                    if($query->num_rows()>0){
                        foreach ($query->result_array() as $list){

                        }    
                        if($list['status']==1){
                          $q=$this->db->where(['Username'=>$username,'Password'=>$password])
                                                  ->get('user_login');
                                                                    if($q->num_rows()>0){ 
                                                                      $q = $this->db->get('user_login');
                                                                   if($q->num_rows()>0){ 
                                                                  foreach ($q->result_array() as $query){
                                                                  $arr[]=$query;
                                                                        }
                                                                        return json_encode(['code'=>4, $arr]);
                                                                      
                                                                      }else{
                                                                      
                                                                        return json_encode(['code'=>3, 'message'=>'No Records Found']);
                                                                      }
                                                    
                                                    }else{
                                                    
                                                      return json_encode(['code'=>3, 'message'=>'Invaild Login Details']);
                                                    }
                         
                                                  }else{
                                                        return json_encode(['code'=>1, 'message'=>'Api Key Deactivated']);
                                                  }
                                                  }else{
                                                        return json_encode(['code'=>2, 'message'=>'Invaild Api Key']);
                                                  }
}
    public function token($key){
                                  $query = $this->db->where(['Token'=>$key])
                                  ->get('token');
                            if($query->num_rows()>0){
                                foreach ($query->result_array() as $list){

                                }    
                                if($list['status']==1){
                                  $q = $this->db->get('user_login');
                                 if($q->num_rows()>0){ 
                                   foreach ($q->result_array() as $query){
                                            $arr[]=$query;
                                   }
                                   return json_encode($arr);
                                 
                                 }else{
                                 
                                   return json_encode(['code'=>3, 'message'=>'No Records Found']);
                                 }
      
                               }else{
                                     return json_encode(['code'=>1, 'message'=>'Api Key Deactivated']);
                               }
                               }else{
                                     return json_encode(['code'=>2, 'message'=>'Invaild Api Key']);
                               }


    }
    public function adduserapi($username,$password,$key){
                                        $query = $this->db->where(['Token'=>$key])
                                                                            ->get('token');
                                      if($query->num_rows()>0){
                                      foreach ($query->result_array() as $list){

                                         }    
                                      if($list['status']==1){
                                        $data = array('id'=>NULL,'Username'=>$username,'Password'=>$password);
                                        $str = $this->db->insert('user_login', $data);
                                        if( $str){
                                                      return json_encode(['code'=>4, 'message'=>'Data  insert successful']);
                                        }else{
                                          return json_encode(['code'=>3, 'message'=>'Data not insert']);
                                          }    
                               }else{
                                                return json_encode(['code'=>1, 'message'=>'Api Key Deactivated']);
                                          }
                                        }else{
                                                  return json_encode(['code'=>2, 'message'=>'Invaild Api Key']);
                                        }


                                        }
                                      }













?>