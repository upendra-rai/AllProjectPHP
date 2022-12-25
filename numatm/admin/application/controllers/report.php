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
        if($this->input->post('submit')){
        $name = $this->input->post('vendor_name');
        $mobile_no = $this->input->post('product_current_no');
        $status = $this->input->post('customer_status');
        
          //echo $name;
        $data["r_status"] =  $status;
        $data["sales_list"] = $this->model_report->sales_report($name,$mobile_no,$status);
		$this->load->view('report/sales_report', $data);
         }else{
        
        $name = '';
        $mobile_no = '';
        $status = '';
		
		$data["sales_list"] = $this->model_report->sales_report($name,$mobile_no,$status);
		$this->load->view('report/sales_report', $data);
	   }
    }
    
    
    	public function customer_report(){
		$data['active_menu'] = "report";
		$data['active_submenu'] = "customer_report";
            if($this->input->post('submit')){
        $name = $this->input->post('customer_name');
        $mobile_no = $this->input->post('customer_mobile');
        $status = $this->input->post('customer_status');
        
   
        $data["r_status"] =  $status;
        $data["customer_list"] = $this->model_report->customer_report($name,$mobile_no,$status);
		$this->load->view('report/customer_report', $data);
         }else{
        
        $name = '';
        $mobile_no = '';
        $status = '';
		$data["customer_list"] = $this->model_report->customer_report($name,$mobile_no,$status);
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
    public function profit_details(){
		$data['active_menu'] = "report";
		$data['active_submenu'] = "profit_details";
        $data["profit_list"] = $this->model_report->profit_list();
		$this->load->view('profit/profit_list',$data);
		
    }
    
    
    
/*##############################################Vendor##################################################################################################Vendor##################################################*/	
}
