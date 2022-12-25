<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_customer extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Vendor################################################################################################Vendor##################################################*/
        

	public function customer_details(){
        $this->db->select('*');
		$this->db->from('customer');
		$data = $this->db->get();
		return $data->result();
        
    }
	
	public function add_customer($customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        
        'customer_name' =>$customer_name,
        'customer_email' =>$customer_email,
        'customer_alter_email' =>$customer_alter_email,
        'customer_mobile' =>$customer_mobile,
        'customer_alter_mobile' =>$customer_alter_mobile,
        'customer_company_name' =>$customer_company_name,
        'customer_gst_no' =>$customer_gst_no,
        'customer_address' =>$customer_address,
        'customer_pincode' =>$customer_pincode,
        'customer_state' =>$customer_state,
        'customer_create_at'=>$time_stamp,
     );
    echo $customer_name.$customer_email.$customer_alter_email.$customer_mobile.$customer_alter_mobile.$customer_company_name.$customer_gst_no.$customer_address.$customer_state;
      if($this->db->insert('customer',$data)){
        echo 'success';
          redirect(base_url().'/customer/customer_details');
          
       }else{
          echo 'failed';

       };
  }
    
    public function selected_customer($edit_id){
        $this->db->select('*');
		$this->db->from('customer');
        $this->db->where('customer_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_customer($edit_id,$customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state){
         $this->db->where('customer_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'customer_name' =>$customer_name,
        'customer_email' =>$customer_email,
        'customer_alter_email' =>$customer_alter_email,
        'customer_mobile' =>$customer_mobile,
        'customer_alter_mobile' =>$customer_alter_mobile,
        'customer_company_name' =>$customer_company_name,
        'customer_gst_no' =>$customer_gst_no,
        'customer_address' =>$customer_address,
        'customer_pincode' =>$customer_pincode,
        'customer_state' =>$customer_state,
        'customer_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('customer',$data)){
        echo 'success';
          redirect(base_url().'/customer/customer_details');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_customer($del_id){
        $this->db->where('customer_id',$del_id);
    if($this->db->delete('customer')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
    /*##############################################Vendor###############################################################################################Vendor##########################################*/
    
    
     
}
