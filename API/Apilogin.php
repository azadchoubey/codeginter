<?php 

    class Apilogin extends CI_Controller {
            public function index() {
                    if(isset($_POST['Submit'])){
                    $username= $this->input->post('username');
                    $password= $this->input->post('password');
                        $key='azad1234245';    
                        $this->load->model('ajaxmodel');
                         $responce =$this->ajaxmodel->tokenwithlogin( $username,$password, $key);
                         $ar=json_decode($responce,true);     
                         if($ar['code']<=3){
                            $data=array('result'=>$ar) ;    
                            $this->load->view('finalview/login',$data);      
                        }elseif($ar['code']==4){
                            $data=array('result'=>$responce) ;    
                            $this->load->view('finalview/show',$data);      
                        }
        
                    }   
                    else{
                        $this->load->view('finalview/login');
                    }
            }
                      public function apilogin(){
                header("Content-type:application/json");
            
                if(isset($_POST['key'])){
                            $key=$this->input->post('key');
                                $this->load->model('ajaxmodel');
                                $responce =$this->ajaxmodel->token( $key);
                                echo $responce ;
                    }
                    else{
                            echo json_encode(['code'=>4,'message'=>"Opreation failed due to parameter missing"]);
                    }
            }
                public function adduser(){
                        if(isset($_POST['Submit'])){
                            $username= $this->input->post('username');
                            $password= $this->input->post('password');
                                $key='azad1234245';    
                                $this->load->model('ajaxmodel');
                                 $responce =$this->ajaxmodel->adduserapi( $username,$password, $key);
                                 $ar=json_decode($responce,true);     
                                 if($ar['code']<=3){
                                    $data=array('insert'=>$ar) ;    
                                    $this->load->view('finalview/show',$data);      
                                }elseif($ar['code']==4){
                                    $data=array('insert'=>$responce) ;    
                                    $this->load->view('finalview/show',$data);      
                                }
                                   
                        }else{
                            $this->load->view('finalview/show');      
                        }


                }

    }








?>