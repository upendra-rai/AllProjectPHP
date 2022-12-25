<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_report extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Employee##############################################################################################Category####################################################*/
        

	public function sales_report(){
        $this->db->select('*,product.product_id AS my_product_id');
		$this->db->from('product');
         $this->db->join('category','category.category_id = product.category_id','left');
         $this->db->join('vendor','vendor.vendor_id = product.vendor_id','left');
        $this->db->join('brand','brand.brand_id = product.product_type_id','left');
        $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
		$data = $this->db->get();
		return $data->result();
    }
    
    
    
    public function customer_report($customer_name,$mobile_no,$customer_status){
         $this->db->select('*');
		$this->db->from('customer');
        
        if($customer_name != ''){
            $this->db->like('customer.customer_name',$customer_name);
        }
        if($mobile_no != ''){
            $this->db->like('customer.customer_mobile',$mobile_no);
        }
        if($customer_status != ''){
            $this->db->like('customer.customer_status',$customer_status);
        }
		$data = $this->db->get();
		return $data->result();
        
    }
	
    public function vendor_report($name,$mobile_no,$status){
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
	
    
    public function selected_employee1($edit_id){
        $this->db->select('*');
		$this->db->from('employee');
        $this->db->where('employee_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }

    
   
    
    /*##############################################Category############################################################################################Category##########################################*/
    
    
     
}
