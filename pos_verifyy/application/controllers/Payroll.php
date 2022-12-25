<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payroll extends CI_Controller {

	
  public function payroll_details(){
    $this->load->model('model_payroll');
		$data['payroll_details'] = $this->model_payroll->get();
		$this->load->view('/HRM/Payroll/payroll_list',$data);
	}

  	  public function add_payroll(){
 		if($this->input->post('submit')){
  	   $employee_id=$this->input->post('employee_id');
       $account_id=$this->input->post('account_id');
       $amount=$this->input->post('amount');
       $paying_method=$this->input->post('paying_method');
       $note=$this->input->post('note');
       

       $this->load->model('model_payroll');
        $this->model_payroll->add_payroll($employee_id,$account_id,$amount,$paying_method,$note);
 
    }else{
      $this->load->view('/HRM/Payroll/add_payroll');    
  }  
 	}
 	public function delete_payroll(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_payroll');
      $this->model_payroll->delete_data($del_id);
    }
    //echo $id;
   // 
  }
  public function edit_payroll(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	     $employee_id=$this->input->post('employee_id');
       $account_id=$this->input->post('account_id');
       $amount=$this->input->post('amount');
       $paying_method=$this->input->post('paying_method');
       $note=$this->input->post('note');
       

       $this->load->model('model_payroll');
        $this->model_payroll->edit_payroll($edit_id,$employee_id,$account_id,$amount,$paying_method,$note);
    }else{
     // echo $edit_id;
      $this->load->model('model_payroll');
      $data['selected_list'] = $this->model_payroll->selected_payroll($edit_id);
      $this->load->view('/HRM/Payroll/edit_payroll',$data);
    }   
  }
  	
  
}
