<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class enquires extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_enquires');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
      $data["user_data"] = $this->model_category->select_userdata($user_id);
       return $data;
	}
     /*##############################################Vendor############################################################################################Vendor##############################################*/
	public function enquires_details(){
		$data['active_menu'] = "enquires";
		$data['active_submenu'] = "enquires_details";
        $data["enquires_list"] = $this->model_enquires->enquires_list();
		$this->load->view('enquires/enquires',$data);
		
    }
	
    
    public function add_enquires(){
       if($this->input->post('submit')){
           $required_number=$this->input->post('required_number');
           $customer_budget=$this->input->post('customer_budget');
           $enquiry_type=$this->input->post('enquiry_type');
           $customer_name=$this->input->post('customer_name');
           $customer_mobile_no=$this->input->post('customer_mobile_no');
           $customer_email=$this->input->post('customer_email');
           $customer_city=$this->input->post('customer_city');
           $enquiry_source=$this->input->post('enquiry_source');
            
           
         
    $this->model_enquires->add_enquires($required_number,$customer_budget,$enquiry_type,$customer_name,$customer_mobile_no,$customer_email,$customer_city,$enquiry_source);
 
    }else{
      //$data["order_list"] = $this->model_enquires->order_list();     
      //$data["payment_method_list"] = $this->model_enquires->payment_method_list();
      $this->load->view('/enquires/add_enquires');    
  }  
        
    }
    
    
    public function delete_enquires(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_enquires->delete_enquires($del_id);
      }
    }
    
    public function contactus(){
		$data['active_menu'] = "enquires";
		$data['active_submenu'] = "contactus";
        $data["contactus_list"] = $this->model_enquires->contactus_list();
		$this->load->view('enquires/contactus',$data);
		
    }
    /*
    public function active_vendor_details(){
        $data["active_vendor_list"] = $this->model_vendor->active_vendor_details();
		$this->load->view('vendor/active_vendor',$data);
        
    }
    public function deactive_vendor_details(){
        $data["active_vendor_list"] = $this->model_vendor->deactive_vendor_details();
		$this->load->view('vendor/active_vendor',$data);
        
    }*/
    
    
    
/*##############################################Vendor##################################################################################################Vendor##################################################*/	
}
