<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller {

	
  public function customer_details(){
    $this->load->model('model_customer');
		$data['customer_details'] = $this->model_customer->get();
		$this->load->view('/Customer/customer_list',$data);
	}

  	  public function add_customer(){
 		if($this->input->post('submit')){
  	   $name=$this->input->post('name');
       $company_name=$this->input->post('company_name');
       $email=$this->input->post('email');
       $phone_number=$this->input->post('phone_number');
       $tax_no=$this->input->post('tax_no');
       $address=$this->input->post('address');
       $city=$this->input->post('city');
       $deposit=$this->input->post('deposit');

       $this->load->model('model_customer');
        $this->model_customer->add_customer($name,$company_name,$email,$phone_number,$tax_no,$address,$city,$deposit);
 
    }else{
      $this->load->view('/Customer/add_customer');    
  }  
 	}
 	public function delete_customer(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_customer');
      $this->model_customer->delete_data($del_id);
    }
    //echo $id;
   // 
  }
  public function edit_customer(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	    $name=$this->input->post('name');
       $company_name=$this->input->post('company_name');
       $email=$this->input->post('email');
       $phone_number=$this->input->post('phone_number');
       $tax_no=$this->input->post('tax_no');
       $address=$this->input->post('address');
       $city=$this->input->post('city');
       $deposit=$this->input->post('deposit');

       $this->load->model('model_customer');
        $this->model_customer->edit_customer($edit_id,$name,$company_name,$email,$phone_number,$tax_no,$address,$city,$deposit);
    }else{
     // echo $edit_id;
      $this->load->model('model_customer');
      $data['selected_list'] = $this->model_customer->selected_customer($edit_id);
      $this->load->view('/Customer/edit_customer',$data);
    }   
  }


  //*********************************Supplier Details******************************
public function supplier_details(){
    $this->load->model('model_customer');
    $data['customer_details'] = $this->model_customer->getsupplier();
    $this->load->view('/Customer/supplier_list',$data);
  }
 public function add_supplier(){

//supplier_id`, ` `supplier_name`, `supplier_mobile_no`, `supplier_email_id`, `supplier_address`,

    if($this->input->post('submit')){
       $supplier_name=$this->input->post('supplier_name');
       $supplier_mobile_no=$this->input->post('supplier_mobile_no');
       $supplier_email_id=$this->input->post('supplier_email_id');
       $supplier_address=$this->input->post('supplier_address');

       $this->load->model('model_customer');
        $this->model_customer->add_supplier($supplier_name,$supplier_mobile_no,$supplier_email_id,$supplier_address);
 
    }else{
      $this->load->view('/Customer/add_supplier');    
  }  
  }

  public function edit_supplier(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
        $supplier_name=$this->input->post('supplier_name');
       $supplier_mobile_no=$this->input->post('supplier_mobile_no');
       $supplier_email_id=$this->input->post('supplier_email_id');
       $supplier_address=$this->input->post('supplier_address');

       $this->load->model('model_customer');
        $this->model_customer->edit_supplier($edit_id,$supplier_name,$supplier_mobile_no,$supplier_email_id,$supplier_address);
    }else{
     // echo $edit_id;
      $this->load->model('model_customer');
      $data['selected_list'] = $this->model_customer->selected_supplier($edit_id);
      $this->load->view('/Customer/edit_supplier',$data);
    }   
  }
    public function delete_supplier(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_customer');
      $this->model_customer->delete_supplier($del_id);
    }
    //echo $id;
   // 
  }
  	
  
}
