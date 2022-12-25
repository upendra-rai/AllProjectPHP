<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_report extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Employee##############################################################################################Category####################################################*/
        

	public function sales_report($name,$mobile_no,$status){
        $this->db->select('*,product.product_id AS my_product_id');
		$this->db->from('product');
         $this->db->join('category','category.category_id = product.category_id','left');
         $this->db->join('vendor','vendor.vendor_id = product.vendor_id','left');
        $this->db->join('brand','brand.brand_id = product.product_type_id','left');
        $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
        
        if($name != ''){
         $this->db->like('vendor.vendor_name',$name);
         }  
    
       if($mobile_no != ''){
         $this->db->like('product.product_current_no',$mobile_no); 
        }
        if($status != ''){
         $this->db->where('customer.customer_status',$status);
        
    }
        
		$data = $this->db->get();
		return $data->result();
    }
    
    
    
    public function customer_report($name,$mobile_no,$status){
         $this->db->select('*');
		$this->db->from('customer');
         
        if($name != ''){
         $this->db->like('customer.customer_name',$name);
         }  
    
       if($mobile_no != ''){
         $this->db->like('customer.customer_mobile',$mobile_no); 
        }
        if($status != ''){
         $this->db->where('customer.customer_status',$status);
        
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

    
	public function profit_list(){
        $this->db->select('*');
		$this->db->from('sales');
        $this->db->join('customer_details','customer_details.customer_id=sales.customer_id','left');
        $this->db->join('staff_member','staff_member.staff_id=sales.user_id','left');
        $this->db->join('product','product.product_id=sales.user_id','left');
         $this->db->join('vendor','vendor.vendor_id=sales.user_id','left');
        $this->db->join('online_orders','online_orders.online_order_id=sales.user_id','left');
		$data = $this->db->get();
		return $data->result();
    }
    
    /*##############################################Category############################################################################################Category##########################################*/
    
    
     
}
