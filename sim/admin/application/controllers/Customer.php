<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer1 extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_customer');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
      $data["user_data"] = $this->model_category->select_userdata($user_id);
       return $data;
	}
/*##############################################Customer#########################################################################################################Customer#######################################################*/
	public function customer_details(){
		$data['active_menu'] = "customer";
		$data['active_submenu'] = "customer_details";
		$data["customer_list"] = $this->model_customer->customer_details();
		$this->load->view('customer/customer_list', $data);
	
	}
    
    public function add_customer(){
       if($this->input->post('submit')){
           $customer_name=$this->input->post('customer_name');
            $customer_email=$this->input->post('customer_email');
            $customer_alter_email=$this->input->post('customer_alter_email');
            $customer_mobile=$this->input->post('customer_mobile');
            $customer_alter_mobile=$this->input->post('customer_alter_mobile');
            $customer_company_name=$this->input->post('customer_company_name');
            $customer_gst_no=$this->input->post('customer_gst_no');
            $customer_address=$this->input->post('customer_address');
            $customer_pincode=$this->input->post('customer_pincode');
            $customer_state=$this->input->post('customer_state');
            
           
       
          // echo $vendor_name.$vendor_nickname.$vendor_resgister.$cod_available.$vendor_adhar_img;
    $this->model_customer->add_customer($customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state);
 
    }else{
      $this->load->view('/customer/add_customer');    
  }  
        
    }
    public function edit_customer(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	    $customer_name=$this->input->post('customer_name');
            $customer_email=$this->input->post('customer_email');
            $customer_alter_email=$this->input->post('customer_alter_email');
            $customer_mobile=$this->input->post('customer_mobile');
            $customer_alter_mobile=$this->input->post('customer_alter_mobile');
            $customer_company_name=$this->input->post('customer_company_name');
            $customer_gst_no=$this->input->post('customer_gst_no');
            $customer_address=$this->input->post('customer_address');
            $customer_pincode=$this->input->post('customer_pincode');
            $customer_state=$this->input->post('customer_state');
           
         $this->model_customer->edit_customer($edit_id,$customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state);
    }else{
      $data['selected_customer'] = $this->model_customer->selected_customer($edit_id);
      $this->load->view('/customer/add_customer',$data);
     }   
    }
    
    public function delete_customer(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_customer->delete_customer($del_id);
      }
    }
    
    
    
/*##############################################Customer#########################################################################################################Customer#######################################################*/	
}
