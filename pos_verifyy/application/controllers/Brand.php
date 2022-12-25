<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class brand extends CI_Controller {

	
  public function Brand_details(){
    $this->load->model('model_brand');
		$data['brand_list'] = $this->model_brand->getbrand();
		$this->load->view('/Brand/brand_list',$data);
	}

  	  public function add_brand(){
 		if($this->input->post('submit')){
  	   $title=$this->input->post('title');
       $is_active=$this->input->post('is_active');
       $img_name = $this->input->post('image_name');
       if(!$img_name){
         $img_name = '';
       }

       $this->load->model('model_brand');
        $this->model_brand->add_brand($title,$is_active,$img_name);
 
    }else{
      $this->load->view('/Brand/add_brand');    
  }  
 	}
 	public function delete_brand(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_brand');
      $this->model_brand->delete_data($del_id);
    }
    //echo $id;
   // 
  }
  public function edit_brand(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	    $title=$this->input->post('title');
       $is_active=$this->input->post('is_active');
       $img_name = $this->input->post('image_name');

       $this->load->model('model_brand');
        $this->model_brand->edit_customer($edit_id,$title,$is_active,$img_name);
    }else{
     // echo $edit_id;
      $this->load->model('model_brand');
      $data['brand_selected'] = $this->model_brand->selected_brand($edit_id);
      $this->load->view('/Brand/add_brand',$data);
    }   
  }


  //*********************************Payment Details*************************************************************************************************************************************************************


public function payment_details(){
    $this->load->model('model_brand');
    $data['payment_details'] = $this->model_brand->getpayment();
    $this->load->view('/Brand/payment_list',$data);
  }
 public function add_payment(){

//supplier_id`, ` `supplier_name`, `supplier_mobile_no`, `supplier_email_id`, `supplier_address`,

    if($this->input->post('submit')){
       $payment_type_name=$this->input->post('payment_type_name');
      
       $this->load->model('model_brand');
        $this->model_brand->add_payment($payment_type_name);
 
    }else{
      $this->load->view('/Brand/add_payment');    
  }  
  }

  public function edit_payment(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
        $payment_type_name=$this->input->post('payment_type_name');
       

       $this->load->model('model_brand');
        $this->model_brand->edit_payment($edit_id,$payment_type_name);
    }else{
     // echo $edit_id;
      $this->load->model('model_brand');
      $data['selected_list'] = $this->model_brand->selected_payment($edit_id);
      $this->load->view('/Brand/edit_payment',$data);
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
