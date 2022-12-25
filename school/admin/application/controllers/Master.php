<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_master');
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
		$data['active_menu'] = "master";
		$data['active_submenu'] = "customer_details";
		$data["customer_list"] = $this->model_master->customer_details();
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
    $this->model_master->add_customer($customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state);
 
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
           
         $this->model_master->edit_customer($edit_id,$customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state);
    }else{
      $data['selected_customer'] = $this->model_master->selected_customer($edit_id);
      $this->load->view('/customer/add_customer',$data);
     }   
    }
    
    public function delete_customer(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_customer($del_id);
      }
    }
    
    
    
/*##############################################Customer#########################################################################################################Customer#######################################################*/	/*##############################################Employee#################################################################################################Employee##############################################*/
	public function employee_details(){
		$data['active_menu'] = "master";
		$data['active_submenu'] = "employee_details";
		$data["employee_list"] = $this->model_master->employee_details();
		$this->load->view('employee/employee_list', $data);
	}
    
    public function add_employee(){
       if($this->input->post('submit')){
  	       $employee_login_id = $this->input->post('employee_login_id');
           $employee_password = $this->input->post('employee_password');
           $employee_first_name = $this->input->post('employee_first_name');
           $employee_last_name = $this->input->post('employee_last_name');
           $employee_contact_number = $this->input->post('employee_contact_number');
           $employee_email_id = $this->input->post('employee_email_id');
           $employee_profile = $this->input->post('employee_profile');
           
           
$this->model_master->add_employee($employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile);
           
 
    }else{
      $data["employee_profile_list"] = $this->model_master->employee_profile_list();
      $this->load->view('/employee/add_employee',$data);    
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
           //echo $employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile;
 $this->model_master->edit_employee($edit_id,$employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile);
    }else{
         $data["employee_profile_list"] = $this->model_master->employee_profile_list();
      $data['selected_employee'] = $this->model_master->selected_employee($edit_id);
      $this->load->view('/employee/add_employee',$data);
     }   
    }
    
    public function delete_employee(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_employee($del_id);
      }
    }
    
    
    
/*##############################################Employee##################################################################################################Employee##################################################*/
            //=========********===========********========******========//
            // ************ Category section ***********//
            //=========********===========********========******========//

    
    
            //=========********===========********========******========//
            // ************ End Category section ***********//
            //=========********===========********========******========//
    
    
    
    public function payment_method(){
		$data['active_menu'] = "master";
		$data['active_submenu'] = "payment_method";
		$data["payment_method_list"] = $this->model_master->payment_method();
		$this->load->view('category/payment_method_list', $data);
	
	}
    
    public function add_payment_method(){
         if($this->input->post('submit')){
  	   $payment_method_name=$this->input->post('payment_method_name');
  
    $this->model_master->add_payment_method($payment_method_name);
 
    }else{
     $data["employee_list"] = $this->model_master->payment_method();
      $this->load->view('/category/add_payment_method');    
      }
        
    }
    public function edit_payment_method(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	  $payment_method_name=$this->input->post('payment_method_name');
    $this->model_master->edit_payment_method($edit_id,$payment_method_name);
    }else{
      $data['selected_payment_method'] = $this->model_master->selected_payment_method($edit_id);
      $this->load->view('/category/add_payment_method',$data);
      }  
        
    }
    public function delete_payment_method(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_payment_method($del_id);
    }
    }
    
    
    
    
             //=========********===========********========******========//
             // ************ Brand section ***********//
             //=========********===========********========******========//

    public function brand(){
		$data['active_menu'] = "master";
		$data['active_submenu'] = "brand";
		$data["brand_list"] = $this->model_master->select_brand();
		$this->load->view('category/brand', $data);
	
	}
    
    public function add_brand(){
        if($this->input->post('submit')){
  	   $brand_name=$this->input->post('brand_name');
  
    $this->model_master->add_brand($brand_name);
 
    }else{
      $this->load->view('/category/add_brand');    
      }       
    }
    public function edit_brand(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	   $brand_name=$this->input->post('brand_name');
        $this->model_master->edit_brand($edit_id,$brand_name);
    }else{
      $data['selected_brand'] = $this->model_master->selected_brand($edit_id);
      $this->load->view('/category/add_brand',$data);
      }      
    }
    public function delete_brand(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_brand($del_id);
    }
    }
             //=========********===========********========******========//
             // ************ End Brand section ***********//
             //=========********===========********========******========//
    
             //=========********===========********========******========//
             // ************ commission section ***********//
             //=========********===========********========******========//
    
    public function commission(){
		$data['active_menu'] = "master";
		$data['active_submenu'] = "commission";
		$data["commission_list"] = $this->model_master->select_commission();
		$this->load->view('category/commission_list', $data);
	
	}
    public function add_commission(){
        if($this->input->post('submit')){
  	       $from_amount=$this->input->post('from_amount');
            $to_amount=$this->input->post('to_amount');
            $commission_percent=$this->input->post('commission_percent');
            $commission_rs=$this->input->post('commission_rs');
  
    $this->model_master->add_commission($from_amount,$to_amount,$commission_percent,$commission_rs);
 
    }else{
      $this->load->view('/category/add_commission');    
  }  
        
    }
    public function edit_commission(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	    $from_amount=$this->input->post('from_amount');
            $to_amount=$this->input->post('to_amount');
            $commission_percent=$this->input->post('commission_percent');
            $commission_rs=$this->input->post('commission_rs');
    $this->model_master->edit_commission($edit_id,$from_amount,$to_amount,$commission_percent,$commission_rs);
    }else{
      $data['selected_commission'] = $this->model_master->selected_commission($edit_id);
      $this->load->view('/category/add_commission',$data);
      }       
    }
    
     public function delete_commission(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_commission($del_id);
     }
    }
             //=========********===========********========******========//
             // ************ End commission section ***********//
             //=========********===========********========******========//
    
    
    
             //=========********===========********========******========//
             // ************ profile details section ***********//
             //=========********===========********========******========//
    
    public function profile_details(){
        $data['active_menu'] = "master";
		$data['active_submenu'] = "profile_details";
		$data["profile_list"] = $this->model_master->profile_details();
		$this->load->view('category/profile_type_list',$data);
        
    }
    public function add_profile(){
        if($this->input->post('submit')){
  	   $profile_type_name=$this->input->post('profile_type_name');
  
    $this->model_master->add_profile($profile_type_name);
 
    }else{
      $this->load->view('/category/add_profile_type');     
      }       
    }
    public function edit_profile(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
         
  	   $profile_type_name=$this->input->post('profile_type_name');
         
        $this->model_master->edit_profile($edit_id,$profile_type_name);
    }else{
      $data['selected_profile'] = $this->model_master->selected_profile($edit_id);
      $this->load->view('/category/add_profile_type',$data);
      }  
        
    }
    public function delete_profile(){
         if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_profile($del_id);
         }
    }
             //=========********===========********========******========//
             // ************ End profile details section ***********//
             //=========********===========********========******========//
    
             //=========********===========********========******========//
             // ************ product details section ***********//
             //=========********===========********========******========//

public function product_details(){
        $data['active_menu'] = "master";
		$data['active_submenu'] = "profile_details";
		$data["product_list"] = $this->model_master->product_details();
		$this->load->view('category/product_type_list',$data);
        
    }
    public function add_product(){
        if($this->input->post('submit')){
  	   $product_type_name=$this->input->post('product_type_name');
  
    $this->model_master->add_product($product_type_name);
 
    }else{
      $this->load->view('/category/add_product_type');     
      }       
    }
    public function edit_product(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
         
  	   $product_type_name=$this->input->post('product_type_name');
         
        $this->model_master->edit_product($edit_id,$product_type_name);
    }else{
      $data['selected_product'] = $this->model_master->selected_product($edit_id);
      $this->load->view('/category/add_product_type',$data);
      }  
        
    }
    public function delete_product(){
         if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_product($del_id);
         }
    }
    
            //=========********===========********========******========//
             // ************ Service Provider section ***********//
             //=========********===========********========******========//
    
    
    public function service_provider(){
		$data['active_menu'] = "master";
		$data['active_submenu'] = "service_provider";
		$data["service_provider_list"] = $this->model_master->service_provider();
		$this->load->view('service_provider/service_provider_list', $data);
	
	}
    public function add_service_provider(){
        if($this->input->post('submit')){
  	       $service_provider_name=$this->input->post('service_provider_name');
            $service_provider_code=$this->input->post('service_provider_code');
            
  
    $this->model_master->add_service($service_provider_name,$service_provider_code);
 
    }else{
      $this->load->view('/service_provider/add_service_provider');    
  }  
        
    }
    public function edit_service_provider(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	     $service_provider_name=$this->input->post('service_provider_name');
            $service_provider_code=$this->input->post('service_provider_code');
         
    $this->model_master->edit_service($edit_id,$service_provider_name,$service_provider_code);
    }else{
      $data['selected_service_provider'] = $this->model_master->selected_service($edit_id);
      $this->load->view('/service_provider/add_service_provider',$data);
      }       
    }
    
     public function delete_service_provider(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_service_provider($del_id);
     }
    }   
             //=========********===========********========******========//
             // ************End Service Provider section ***********//
             //=========********===========********========******========//

	           //=========********===========********========******========//
             // ************ Service Area Code Service ***********//
             //=========********===========********========******========//
    
    
    public function service_area_code(){
		$data['active_menu'] = "master";
		$data['active_submenu'] = "service_area_code";
		$data["service_area_list"] = $this->model_master->service_area_code();
		$this->load->view('service_provider/service_area_list', $data);
	
	}
    public function add_service_area(){
        if($this->input->post('submit')){
  	       $service_area_name=$this->input->post('service_area_name');
            $service_area_code=$this->input->post('service_area_code');
            $expiry_date=$this->input->post('expiry_date');
  
    $this->model_master->add_service_area($service_area_name,$service_area_code,$expiry_date);
    }else{
      $this->load->view('/service_provider/add_service_area');    
  }  
        
    }
    public function edit_service_area(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	        $service_area_name=$this->input->post('service_area_name');
            $service_area_code=$this->input->post('service_area_code');
            $expiry_date=$this->input->post('expiry_date');
         
    $this->model_master->edit_service_area($edit_id,$service_area_name,$service_area_code,$expiry_date);
    }else{
      $data['selected_service_area'] = $this->model_master->selected_service_area($edit_id);
      $this->load->view('/service_provider/add_service_area',$data);
      }       
    }
    
     public function delete_service_area(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_service_area($del_id);
     }
    }   
             //=========********===========********========******========//
             // ************End Service Area Code section ***********//
             //=========********===========********========******========//
    
    
             //=========********===========********========******========//
             // ************GST Code section ***********//
             //=========********===========********========******========//
    
        public function service_area_code1(){
		$data['active_menu'] = "master";
		$data['active_submenu'] = "service_area_code";
		$data["service_area_list"] = $this->model_master->service_area_code();
		$this->load->view('service_provider/service_area_list', $data);
	
	}
    public function gst_details(){
        if($this->input->post('submit')){
  	       $gst_value=$this->input->post('gst_value');
            $this->model_master->add_gst($gst_value);
            $this->load->view('/payment/gst_details');
    }else{
            $data['active_menu'] = "master";
		$data['active_submenu'] = "gst_details";
            $data["gst_list"] = $this->model_master->gst_details();
      $this->load->view('/payment/gst_details',$data);    
  }  
        
    }
    public function edit_gst(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	        $gst_value=$this->input->post('gst_value');
         
    $this->model_master->edit_gst($edit_id,$gst_value);
    }else{
         $data['active_menu'] = "master";
		$data['active_submenu'] = "gst_details";
         $data["gst_list"] = $this->model_master->gst_details();
      $data['selected_gst'] = $this->model_master->selected_gst($edit_id);
      $this->load->view('/payment/gst_details',$data);
      }       
    }
    
     public function delete_gst(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_master->delete_gst($del_id);
     }
    }
    public function phpinfo(){
        echo phpinfo;
    }
             //=========********===========********========******========//
             // ************ End GST Code section ***********//
             //=========********===========********========******========//
}
