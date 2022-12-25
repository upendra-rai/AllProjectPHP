<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_admin extends CI_Model {

	function __construct(){
		parent::__construct();
	}
    
        
	public function user_data($uid){
		$data = $this->db->get_where('team_member', array(
				'user_id' => '1'
			));
		return $data->result();
	}


	public function login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$check = $this->db->get_where('admin_details', array(
					'email_address' => $email,
					'password' => $password,
					'id' => 1
				));
		if($check->num_rows() == 1){
			$arr = array(
					'logged_in' => 'messcafe_login',
					'uid' => $check->result()[0]->id
				);
			$this->session->set_userdata($arr);
			redirect('./dashboard');
		} else {
			return '<div id="notification" class="alert alert-danger">Invalid credentials.</div>';
		}		
	}


   public function update_my_profile($fname,$email){
        
        $arr = array(
            'name' => $fname,
            'email' => $email,
 
        );
        
        $this->db->where('user_id','1');
        if($this->db->update('team_member',$arr)){
            
            echo "success";
            
        }else{
            
            echo "fail";
        };
    }
      
    
     public function change_pass($n_pass){
        
        $arr = array(
           'password' => $n_pass,
        );
        
        $this->db->where('user_id','1');
        if($this->db->update('team_member',$arr)){
            
            echo "success";
            
        }else{
            
            echo "fail";
        };
    }

}