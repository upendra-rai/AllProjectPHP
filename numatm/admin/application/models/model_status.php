<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_status extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
 /*##########################################Employee##############################################################################################Category####################################################*/
 

    public function pending_upload(){
      $this->db->select('*,product.product_id AS my_product_id');
  $this->db->from('product');
       $this->db->join('category','category.category_id = product.category_id','left');
       $this->db->join('vendor','vendor.vendor_id = product.vendor_id','left');
      $this->db->join('brand','brand.brand_id = product.product_type_id','left');
      $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
  $data = $this->db->get();
  return $data->result();   
  }


    public function aprove_number($product_array){ 
     foreach(json_decode($product_array) as $row){
         $this->db->set('product_status','active');
        $this->db->where('product_id',$row->product_id);
         $this->db->update('product');
 
     }
        echo 'success';
    }
    public function category_list(){
        $this->db->select('*');
		$this->db->from('category');
		$data = $this->db->get();
		return $data->result();
    }
    public function subcategory_list(){
        $this->db->select('*');
		$this->db->from('sub_category');
		$data = $this->db->get();
		return $data->result();
    }
    public function vendor_list(){
        $this->db->select('*');
		$this->db->from('vendor');
		$data = $this->db->get();
		return $data->result();
    }
    public function number_list(){
        $this->db->select('*');
		$this->db->from('brand');
		$data = $this->db->get();
		return $data->result();
    }
	
	public function add_product($category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        
        'category_id' =>$category_id,
        'sub_category_id' =>$sub_category_id,
        'product_type' =>$product_type,
        'product_type_id' =>$product_type_id,
        'current_number' =>$product_current_no,
        'product_vanity_no' =>$product_vanity_no,
        'product_rate' =>$product_rate,
        'vendor_id' =>$vendor_id,
        'vendor_rate' =>$vendor_rate,
        'product_cod_available' =>$product_cod_available,
        'discount_percentage' =>$discount_percentage,
        'flat_discount' =>$flat_discount,
        'product_create_at'=>$time_stamp,
     );
    //echo $customer_name.$customer_email.$customer_alter_email.$customer_mobile.$customer_alter_mobile.$customer_company_name.$customer_gst_no.$customer_address.$customer_state;
      if($this->db->insert('product',$data)){
        echo 'success';
          redirect(base_url().'/management/number_details');
          
       }else{
          echo 'failed';

       };
  }
    
    public function selected_product($edit_id){
        $this->db->select('*');
		$this->db->from('product');
        $this->db->where('product_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_product($edit_id,$category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount){
         $this->db->where('product_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
       'category_id' =>$category_id,
        'sub_category_id' =>$sub_category_id,
        'product_type' =>$product_type,
        'product_type_id' =>$product_type_id,
        'current_number' =>$product_current_no,
        'product_vanity_no' =>$product_vanity_no,
        'product_rate' =>$product_rate,
        'vendor_id' =>$vendor_id,
        'vendor_rate' =>$vendor_rate,
        'product_cod_available' =>$product_cod_available,
        'discount_percentage' =>$discount_percentage,
        'flat_discount' =>$flat_discount,
        'product_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('product',$data)){
        echo 'success';
          redirect(base_url().'/management/number_details');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_product($del_id){
        $this->db->where('product_id',$del_id);
    if($this->db->delete('product')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
    /*##############################################Category############################################################################################Category##########################################*/
    
    
     
}
