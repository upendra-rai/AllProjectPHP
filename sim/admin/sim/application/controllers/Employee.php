<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employeeqq1 extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_employee');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
      $data["user_data"] = $this->model_category->select_userdata($user_id);
       return $data;
	}
/*##############################################Employee#################################################################################################Employee##############################################*/
	public function employee_details(){
		$data['active_menu'] = "employee";
		$data['active_submenu'] = "employee_details";
		$data["employee_list"] = $this->model_employee->employee_details();
		$this->load->view('employee/employee_list', $data);
	}
    
    public function add_employee(){
       if($this->input->post('submit')){
           $employee_login_id=$this->input->post('employee_login_id');
           $employee_password=$this->input->post('employee_password');
           $employee_first_name=$this->input->post('employee_first_name');
           $employee_last_name=$this->input->post('employee_last_name');
           $employee_contact_number=$this->input->post('employee_contact_number');
           $employee_email_id=$this->input->post('employee_email_id');
           $employee_profile=$this->input->post('employee_profile');
           
           
$this->model_employee->add_employee($employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile);
 
    }else{
      $this->load->view('/employee/add_employee');    
  }  
        
    }
    public function edit_employee(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	       $employee_login_id = $this->input->post('employee_login_id');
           $employee_password = $this->input->post('employee_password');
           $employee_first_name = $this->input->post('employee_first_name');
           $employee_last_name = $this->input->post('employee_last_name');
           $employee_contact_number = $this->input->post('employee_contact_number');
           $employee_email_id = $this->input->post('employee_email_id');
           $employee_profile = $this->input->post('employee_profile');
           echo //$employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile;
 $this->model_employee->edit_employee($edit_id,$employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile);
    }else{
      $data['selected_employee'] = $this->model_employee->selected_employee($edit_id);
      $this->load->view('/employee/add_employee',$data);
     }   
    }
    
    public function delete_employee(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_employee->delete_employee($del_id);
      }
    }
    
    
    
/*##############################################Vendor##################################################################################################Vendor##################################################*/	
}
