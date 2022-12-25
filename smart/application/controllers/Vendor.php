<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vendor extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_vendor');
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
	public function vendor_details(){
		$data['active_menu'] = "vendor";
		$data['active_submenu'] = "vendor_details";
        if($this->input->post('submit')){
        $name = $this->input->post('vendor_name');
        $mobile_no = $this->input->post('vendor_mobile');
        $status = $this->input->post('vendor_status');
        
   
        $data["r_status"] =  $status;
        $data["vendor_list"] = $this->model_vendor->vendor_details($name,$mobile_no,$status);
		$this->load->view('vendor/vendor_list', $data);
         }else{
        
        $name = '';
        $mobile_no = '';
        $status = '';
      
     $data["vendor_list"] = $this->model_vendor->vendor_details($name,$mobile_no,$status);
		$this->load->view('vendor/vendor_list', $data);
    }
		
    }
	
    
    public function add_vendor(){
       if($this->input->post('submit')){
           $vendor_name=$this->input->post('vendor_name');
           $vendor_nickname=$this->input->post('vendor_nickname');
           $vendor_email_id=$this->input->post('vendor_email_id');
           $vendor_password=$this->input->post('vendor_password');
           $vendor_address=$this->input->post('vendor_address');
           $vendor_area=$this->input->post('vendor_area');
           $vendor_mobile=$this->input->post('vendor_mobile');
           $vendor_website=$this->input->post('vendor_website');
           $vendor_paytm_number=$this->input->post('vendor_paytm_number');
           $vendor_gpay_number=$this->input->post('vendor_gpay_number');
           $vendor_bank_name=$this->input->post('vendor_bank_name');
           $vendor_account_name=$this->input->post('vendor_account_name');
           $vendor_bank_account=$this->input->post('vendor_account_number');
           $vendor_branch_location=$this->input->post('vendor_branch_location');
           $vendor_ifsc_code=$this->input->post('vendor_ifsc_code');
           $vendor_priority=$this->input->post('vendor_priority');
           $vendor_resgister=$this->input->post('vendor_register');
           $cod_available=$this->input->post('cod_available');
           $vendor_adhar_img=$this->input->post('vendor_adhar_img');
           
       
          // echo $vendor_name.$vendor_nickname.$vendor_email_id.$vendor_password.$vendor_address.$vendor_area.$vendor_mobile.$vendor_website.$vendor_paytm_number.$vendor_gpay_number.$vendor_bank_name.$vendor_account_name.$vendor_bank_account.$vendor_branch_location.$vendor_ifsc_code.$vendor_priority.$vendor_resgister.$cod_available.$vendor_adhar_img;
    $this->model_vendor->add_vendor($vendor_name,$vendor_nickname,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img);
 
    }else{
      $this->load->view('/vendor/add_vendor');    
  }  
        
    }
    public function edit_vendor(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	    $vendor_name=$this->input->post('vendor_name');
           $vendor_nickname=$this->input->post('vendor_nickname');
           $vendor_email_id=$this->input->post('vendor_email_id');
           $vendor_password=$this->input->post('vendor_password');
           $vendor_address=$this->input->post('vendor_address');
           $vendor_area=$this->input->post('vendor_area');
           $vendor_mobile=$this->input->post('vendor_mobile');
           $vendor_website=$this->input->post('vendor_website');
           $vendor_paytm_number=$this->input->post('vendor_paytm_number');
           $vendor_gpay_number=$this->input->post('vendor_gpay_number');
           $vendor_bank_name=$this->input->post('vendor_bank_name');
           $vendor_account_name=$this->input->post('vendor_account_name');
           $vendor_bank_account=$this->input->post('vendor_account_number');
           $vendor_branch_location=$this->input->post('vendor_branch_location');
           $vendor_ifsc_code=$this->input->post('vendor_ifsc_code');
           $vendor_priority=$this->input->post('vendor_priority');
           $vendor_resgister=$this->input->post('vendor_register');
           $cod_available=$this->input->post('cod_available');
           $vendor_adhar_img=$this->input->post('vendor_adhar_img');
           
         $this->model_vendor->edit_vendor($edit_id,$vendor_name,$vendor_nickname,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img);
    }else{
      $data['selected_vendor'] = $this->model_vendor->selected_vendor($edit_id);
      $this->load->view('/vendor/add_vendor',$data);
     }   
    }
    
    public function delete_vendor(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_vendor->delete_vendor($del_id);
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
    
    public function vendor_number_delete(){
        $data["name_list"] = $this->model_vendor->name_list();
		$this->load->view('vendor/number_delete_list',$data);
    }
    public function delete_number(){
        $vendor_id = $this->uri->segment(3);
        $this ->model_vendor->delete_number($vendor_id);
    }
    public function vendor_pirority(){
    $data["pirority_list"] = $this->model_vendor->pirority_list();
    $this->load->view('vendor/vendor_pirority',$data);
    }
    
    
    
    
/*##############################################Vendor##################################################################################################Vendor##################################################*/	
}
