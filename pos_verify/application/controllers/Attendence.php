<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class attendence extends CI_Controller {

	
  public function attendence_details(){
    $this->load->model('model_attendence');
		$data['attendence_details'] = $this->model_attendence->get();
		$this->load->view('/HRM/Attendence/attendence_list',$data);
	}

  	  public function add_attendence(){
 		if($this->input->post('submit')){
  	   $employee_id=$this->input->post('employee_id');
       $date=$this->input->post('date');
       $checkin=$this->input->post('checkin');
       $checkout=$this->input->post('checkout');
       $note=$this->input->post('note');
      

       $this->load->model('model_attendence');
        $this->model_attendence->add_attendence($employee_id,$date,$checkin,$checkout,$note);
 
    }else{
      $this->load->view('/HRM/Attendence/add_attendence');    
  }  
 	}
 	public function delete_attendence(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_attendence');
      $this->model_attendence->delete_data($del_id);
    }
    //echo $id;
   // 
  }
  public function edit_attendence(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	   $employee_id=$this->input->post('employee_id');
       $date=$this->input->post('date');
       $checkin=$this->input->post('checkin');
       $checkout=$this->input->post('checkout');
       $note=$this->input->post('note');

       $this->load->model('model_attendence');
        $this->model_attendence->edit_attendence($edit_id,$employee_id,$date,$checkin,$checkout,$note);
    }else{
     // echo $edit_id;
      $this->load->model('model_attendence');
      $data['selected_list'] = $this->model_attendence->selected_attendence($edit_id);
      $this->load->view('/HRM/Attendence/edit_attendence',$data);
    }   
  }
  	
  
}
