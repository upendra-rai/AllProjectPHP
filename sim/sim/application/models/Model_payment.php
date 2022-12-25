<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_payment extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Vendor################################################################################################Vendor##################################################*/
        

	public function payment_details(){
        $this->db->select('*');
		$this->db->from('payments');
        $this->db->join('payment_method','payment_method.payment_method_id=payments.payment_method','left');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function payment_method_list(){
        $this->db->select('*');
		$this->db->from('payment_method');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function order_list(){
        $this->db->select('*');
		$this->db->from('online_orders');
		$data = $this->db->get();
		return $data->result();
        
    }
	
	public function add_payment($r_status,$order_id,$transction_id,$amount,$payment_method,$payment_status,$payment_note){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        'payment_type' =>$r_status,
        'order_id' =>$order_id,
        'transction_id' =>$transction_id,
        'amount' =>$amount,
        'payment_method' =>$payment_method,
        'payment_status'=>$payment_status,
        'payment_note' =>$payment_note,
        'payment_create_at'=>$time_stamp,
     );
    //echo $payment_type.$order_id.$transction_id.$amount.$payment_method.$payment_note;
      if($this->db->insert('payments',$data)){
        echo 'success';
          redirect(base_url().'/payment/payment_details');
          
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
    
    public function delete_payment($del_id){
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
    }
    
    /*##############################################Vendor###############################################################################################Vendor##########################################*/
              
    
     
}
