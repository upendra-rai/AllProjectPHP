<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class status extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_status');
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
	public function pending_upload(){
		$data['active_menu'] = "status";
		$data['active_submenu'] = "pending_upload";
		$data["pending_list"] = $this->model_status->pending_upload();
		$this->load->view('status/pending_upload', $data);
	}
    
  public function upc_details(){
		$data['active_menu'] = "status";
		$data['active_submenu'] = "upc_details";
		$data["pending_list"] = $this->model_status->pending_upload();
		$this->load->view('status/upc_details', $data);
	}
   
    
    public function add_upc(){
        if($this->input->post('submit')){
  	       $from_amount=$this->input->post('from_amount');
            $to_amount=$this->input->post('to_amount');
            $commission_percent=$this->input->post('commission_percent');
            $commission_rs=$this->input->post('commission_rs');
  
    $this->model_master->add_commission($from_amount,$to_amount,$commission_percent,$commission_rs);
 
    }else{
            $data['active_menu'] = "status";
		$data['active_submenu'] = "upc_details";
      $this->load->view('/status/add_upc');    
  }  
        
    }
    
    public function update_number(){
        if($this->input->post('submit')){
  	       $from_amount=$this->input->post('from_amount');
            $to_amount=$this->input->post('to_amount');
            $commission_percent=$this->input->post('commission_percent');
            $commission_rs=$this->input->post('commission_rs');
  
    $this->model_status->update_number($from_amount,$to_amount,$commission_percent,$commission_rs);
 
    }else{
            $data['active_menu'] = "status";
		$data['active_submenu'] = "update_number";
      $this->load->view('/status/number_update');    
  }  
        
    }
    
    
    
/*##############################################Vendor##################################################################################################Vendor##################################################*/	
}
