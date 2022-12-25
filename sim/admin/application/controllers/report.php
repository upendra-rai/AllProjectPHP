<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_report');
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
	public function sales_report(){
		$data['active_menu'] = "report";
		$data['active_submenu'] = "sales_report";
		$data["sales_list"] = $this->model_report->sales_report();
		$this->load->view('report/sales_report', $data);
	}
    
    
    	public function customer_report(){
		$data['active_menu'] = "report";
		$data['active_submenu'] = "customer_report";
            if($this->input->post('submit')){
                $customer_name = $this->input->post('customer_name');
                $mobile_no = $this->input->post('customer_mobile');
                $customer_status = $this->input->post('customer_status');
                
                $data["customer_status"] = $customer_status;
                $data["customer_list"] = $this->model_report->customer_report($customer_name,$mobile_no,$customer_status);
                $this->load->view('report/customer_report', $data);
            }else{
            $customer_name ='';
            $mobile_no = '';
            $customer_status = '';
            
        $data["customer_list"] = $this->model_report->customer_report($customer_name,$mobile_no,$customer_status);
		$this->load->view('report/customer_report', $data);
	      }
     }
    
       public function vendor_report(){
		$data['active_menu'] = "report";
		$data['active_submenu'] = "vendor_report";
        if($this->input->post('submit')){
        $name = $this->input->post('vendor_name');
        $mobile_no = $this->input->post('vendor_mobile');
        $status = $this->input->post('vendor_status');
        
   
        $data["r_status"] =  $status;
        $data["vendor_list"] = $this->model_report->vendor_report($name,$mobile_no,$status);
		$this->load->view('report/vendor_report', $data);
         }else{
        
        $name = '';
        $mobile_no = '';
        $status = '';
      
     $data["vendor_list"] = $this->model_report->vendor_report($name,$mobile_no,$status);
		$this->load->view('report/vendor_report', $data);
    }
		
    }
    
    
    
/*##############################################Vendor##################################################################################################Vendor##################################################*/	
}
