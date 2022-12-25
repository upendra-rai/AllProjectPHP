<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_employee extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Employee##############################################################################################Category####################################################*/
        

	public function employee_details(){
        $this->db->select('*');
		$this->db->from('employee');
		$data = $this->db->get();
		return $data->result();    
    }
	
	public function add_employee($employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        'employee_login_id' =>$employee_login_id,
        'employee_password' =>$employee_password,
        'employee_first_name' =>$employee_first_name,
        'employee_last_name' =>$employee_last_name,
        'employee_contact_number' =>$employee_contact_number,
        'employee_email_id' =>$employee_email_id,
        'employee_profile' =>$employee_profile,
        'employee_create_at'=>$time_stamp,
     );
      if($this->db->insert('employee',$data)){
        echo 'success';
          redirect(base_url().'/employee/employee_details');
          
       }else{
          echo 'failed';

       };
  }
    
    public function selected_employee($edit_id){
        $this->db->select('*');
		$this->db->from('employee');
        $this->db->where('employee_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
   public function edit_employee($edit_id,$employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile){
        
         $this->db->where('employee_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
       'employee_login_id' =>$employee_login_id,
        'employee_password' =>$employee_password,
        'employee_first_name' =>$employee_first_name,
        'employee_last_name' =>$employee_last_name,
        'employee_contact_number' =>$employee_contact_number,
        'employee_email_id' =>$employee_email_id,
        'employee_profile' =>$employee_profile,
        'employee_upadated_at'=>$time_stamp,
        

     );
        echo $employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile;
   
      if($this->db->update('employee',$data)){
        echo 'success';
          redirect(base_url().'/employee/employee_details');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_employee($del_id){
        $this->db->where('employee_id',$del_id);
    if($this->db->delete('employee')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
    /*##############################################Category############################################################################################Category##########################################*/
    
    
     
}
