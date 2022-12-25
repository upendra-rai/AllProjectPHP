<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_vendor extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Vendor################################################################################################Vendor##################################################*/
        

	public function vendor_details($name,$mobile_no,$status){
        $this->db->select('*');
		$this->db->from('vendor');
        
        if($name != ''){
         $this->db->like('vendor.vendor_name',$name);
         }
    
       if($mobile_no != ''){
         $this->db->like('vendor.vendor_mobile',$mobile_no); 
        }
        if($status != ''){
         $this->db->where('vendor.vendor_status',$status);
        
    }
		$data = $this->db->get();
		return $data->result();
        
    }
	
	public function add_vendor($vendor_name,$vendor_nickname,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img){
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
    //echo $vendor_name.$vendor_nickname.$vendor_email_id.$vendor_password.$vendor_address.$vendor_area.$vendor_mobile.$vendor_website.$vendor_paytm_number.$vendor_gpay_number.$vendor_bank_name.$vendor_account_name.$vendor_bank_account.$vendor_branch_location.$vendor_ifsc_code.$vendor_priority.$vendor_resgister.$cod_available.$vendor_adhar_img;
      if($this->db->insert('vendor',$data)){
        echo 'success';
          redirect(base_url().'/vendor/vendor_details');
          
       }else{
          echo 'failed';

       };
  }
    
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
    
    public function delete_vendor($del_id){
        $this->db->where('vendor_id',$del_id);
    if($this->db->delete('vendor')){
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
    }
    public function name_list(){
         $this->db->select('*');
		$this->db->from('vendor');
		$data = $this->db->get();
		return $data->result();
    }
    public function delete_number($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
    if($this->db->delete('vendor')){
        echo 'success';
                redirect(base_url().'/vendor/vendor_number_delete');
           }else{
              echo 'failed';
           }
    }
    public function pirority_list(){
        $this->db->select('*');
		$this->db->from('vendor');
		$data = $this->db->get();
		return $data->result();
    }
    /*##############################################Vendor###############################################################################################Vendor##########################################*/
    
    
     
}
