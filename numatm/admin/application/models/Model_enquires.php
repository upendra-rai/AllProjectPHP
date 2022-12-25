<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_enquires extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Vendor################################################################################################Vendor##################################################*/
        

	public function enquires_list(){
        $this->db->select('*');
		$this->db->from('enquires');
        $this->db->where('enquiry_type','online_enquiry');
		$data = $this->db->get();
		return $data->result();
        
    }
   
	public function add_enquires($required_number,$customer_budget,$enquiry_type,$customer_name,$customer_mobile_no,$customer_email,$customer_city,$enquiry_source){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        'required_number' =>$required_number,
        'customer_budget' =>$customer_budget,
        'enquiry_type' =>'online_enquiry',
        'customer_name' =>$customer_name,
        'customer_mobile_no' =>$customer_mobile_no,
        'customer_email'=>$customer_email,
        'customer_city' =>$customer_city,
        'enquiry_source' =>$enquiry_source,
        'enquires_create_at'=>$time_stamp,
     );
    echo $required_number.$customer_budget.$enquiry_type.$customer_name.$customer_mobile_no.$customer_email.$customer_city.$enquiry_source.$time_stamp;
      if($this->db->insert('enquires',$data)){
        echo 'success';
          redirect(base_url().'/enquires/enquires_details');
          
       }else{
          echo 'failed';

       };
  }
    public function delete_enquires($del_id){
        $this->db->where('enquires_id',$del_id);
    if($this->db->delete('enquires')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
        public function contactus_list(){
        $this->db->select('*');
		$this->db->from('enquires');
        $this->db->where('enquiry_type','contact_enquiry');
		$data = $this->db->get();
		return $data->result();  
    }
    /*
    public function selected_vendor($edit_id){
        $this->db->select('*');
		$this->db->from('vendor');
        $this->db->where('vendor_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_vendor($edit_id,$vendor_name,$vendor_nickname,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img){
         $this->db->where('vendor_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'vendor_name' =>$vendor_name,
        'vendor_nickname' =>$vendor_nickname,
        'vendor_email_id' =>$vendor_email_id,
        'vendor_password' =>$vendor_password,
        'vendor_address' =>$vendor_address,
        'vendor_area' =>$vendor_area,
        'vendor_mobile' =>$vendor_mobile,
        'vendor_website' =>$vendor_website,
        'vendor_paytm_number' =>$vendor_paytm_number,
        'vendor_gpay_number' =>$vendor_gpay_number,
        'vendor_bank_name' =>$vendor_bank_name,
        'vendor_account_name' =>$vendor_account_name,
        'vendor_account_number' =>$vendor_bank_account,
        'vendor_branch_location' =>$vendor_branch_location,
        'vendor_ifsc_code' =>$vendor_ifsc_code,
        'vendor_priority' =>$vendor_priority,
        'vendor_register' =>$vendor_resgister,
        'cod_available' =>$cod_available,
        'vendor_adhar_img' =>$vendor_adhar_img,
        'vendor_create_at'=>$time_stamp,

     );
   
      if($this->db->update('vendor',$data)){
        echo 'success';
          redirect(base_url().'/vendor/vendor_details');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_enquires($del_id){
        $this->db->where('payment_id',$del_id);
    if($this->db->delete('payments')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    public function active_vendor_details(){
        $this->db->select('*');
		$this->db->from('vendor');
        $this->db->where('vendor.vendor_status','active');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function deactive_vendor_details(){
        $this->db->select('*');
		$this->db->from('vendor');
        $this->db->where('vendor.vendor_status','deactive');
		$data = $this->db->get();
		return $data->result();
    }*/
    
    /*##############################################Vendor###############################################################################################Vendor##########################################*/
    
    
     
}
