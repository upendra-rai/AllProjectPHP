<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
  
   public function login($user_name,$password){


           $this->db->select('*');
           $this->db->from('user');
           $this->db->where('username',$user_name);
           $this->db->where('userpassword',$password);
           $data = $this->db->get();
   
          if($data->num_rows() == 1){
              
               $user_id = $data->result()[0]->user_id;

              $arr = array(

                     'user_login' => 'true',
                     'user_id' =>  '8',

               );

                session_start();
                $this->session->set_userdata($arr);


                if($this->session->userdata('user_login')){
                         redirect(base_url().'/octopus');
                }else{
                           redirect(base_url().'/login/login');

                }

                

          }else{

           redirect(base_url().'/login/login');
          }


   }
	
	
}

