<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customers extends CI_Controller {

	
  public function customers_detail(){
		$data['customer_details'] = $this->customer_model->get1();
		$this->load->view('customer_view',$data);
	}
//`id`, `type`, `created`, `staff_id`, `company`, `namesurname`, `taxoffice`, `taxnumber`, `ssn`, `executive`, `address`, `zipcode`, `country_id`, `state`, `city`, `town`, `phone`, `fax`, `email`, `web`, `risk`, `status_i
  	  public function add(){
 		if($this->input->post('submit')){
  	   $id=$this->input->post('id');
       $type=$this->input->post('type');
       $created=$this->input->post('created');
       $staff_id=$this->input->post('staff_id');
       $company=$this->input->post('company');
       $namesurname=$this->input->post('namesurname');
       $taxoffice=$this->input->post('taxoffice');
       $taxnumber=$this->input->post('taxnumber');
       $executive=$this->input->post('executive');
       $address=$this->input->post('address');
       $zipcode=$this->input->post('zipcode');
       $country_id=$this->input->post('country_id');
       $state=$this->input->post('state');
       $city=$this->input->post('city');
       $town=$this->input->post('town');
       $phone=$this->input->post('phone');
       $email=$this->input->post('email');
       $web=$this->input->post('web');


        $this->customer_model->add($id,$type,$created,$staff_id,$company,$namesurname,$taxoffice,$taxnumber,$executive,$address,$zipcode,$country_id,$state,$city,$town,$phone,$email,$web);
 
    }else{
      $this->load->view('add_customer');    
  }  
 	}
 	public function delete_customer(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->customer_model->delete_data($del_id);
    }
    //echo $id;
   // 
  }
  public function edit(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	   $id=$this->input->post('id');
       $type=$this->input->post('type');
       $created=$this->input->post('created');
       $staff_id=$this->input->post('staff_id');
       $company=$this->input->post('company');
       $namesurname=$this->input->post('namesurname');
       $taxoffice=$this->input->post('taxoffice');
       $taxnumber=$this->input->post('taxnumber');
       $executive=$this->input->post('executive');
       $address=$this->input->post('address');
       $zipcode=$this->input->post('zipcode');
       $country_id=$this->input->post('country_id');
       $state=$this->input->post('state');
       $city=$this->input->post('city');
       $town=$this->input->post('town');
       $phone=$this->input->post('phone');
       $email=$this->input->post('email');
       $web=$this->input->post('web');
       // echo $id.$name.$description.$status_id.$customer_id.$invoice_id;

        $this->customer_model->edit($edit_id,$id,$type,$created,$staff_id,$company,$namesurname,$taxoffice,$taxnumber,$executive,$address,$zipcode,$country_id,$state,$city,$town,$phone,$email,$web);
    }else{
     // echo $edit_id;
      $data['selected_list'] = $this->customer_model->selected_customer($edit_id);
      $this->load->view('edit_customer',$data);
    }   
  }
  	
  
}
