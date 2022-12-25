<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment1 extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_payment');
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
	public function payment_details(){
		$data['active_menu'] = "payment";
		$data['active_submenu'] = "payment_details";
        $data["payment_list"] = $this->model_payment->payment_details();
		$this->load->view('payment/payment_list', $data);
		
    }
	
    
    public function add_payment(){
       if($this->input->post('submit')){
           $r_status=$this->input->post('payment_type');
           $order_id=$this->input->post('order_id');
           $transction_id=$this->input->post('transction_id');
           $amount=$this->input->post('amount');
           $payment_method=$this->input->post('payment_method');
           $payment_status=$this->input->post('payment_status');
           $payment_note=$this->input->post('payment_note');
           
         
    $this->model_payment->add_payment($r_status,$order_id,$transction_id,$amount,$payment_method,$payment_status,$payment_note);
 
    }else{
      $data["order_list"] = $this->model_payment->order_list();     
      $data["payment_method_list"] = $this->model_payment->payment_method_list();
      $this->load->view('/payment/add_payment',$data);    
  }  
        
    }
    
    
    public function delete_payment(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_payment->delete_payment($del_id);
      }
    }
    public function active_vendor_details(){
        $data["active_vendor_list"] = $this->model_vendor->active_vendor_details();
		$this->load->view('vendor/active_vendor',$data);
        
    }
    public function deactive_vendor_details(){
        $data["active_vendor_list"] = $this->model_vendor->deactive_vendor_details();
		$this->load->view('vendor/active_vendor',$data);
        
    }
    
    
    
/*##############################################Vendor##################################################################################################Vendor##################################################*/	
}
