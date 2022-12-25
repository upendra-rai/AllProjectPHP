<?php
class model_home extends CI_Model{

	public function selectproduct(){
         $this->db->select('*');
         $this->db->from('product');
         $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
         
         $data=$this->db->get();
         return $data->result();
    }
	
  public function selectbanner(){
      $this->db->select('*');
      $this->db->from('banner');
      $data=$this->db->get();
      return $data->result();
  }
    public function selectedproduct($number_id){
         $this->db->select('*');
         $this->db->from('product');
       $this->db->where('product_id',$number_id);
         $data=$this->db->get();
        return $data->result();
    }
    public function chaeckout($cart_total,$name,$mobilenumber,$email,$city,$state
,$pincode,$address){
        /*
      
        $delivery_detail=array(
             'name' =>$name,
            'mobile_no' =>$mobilenumber,
            'address'=>$address,
            'delivery_type'=>'now',
            'city'=>$city,
            'state'=$state,
            'pincode'=>$pincode,
        );
        
        $d_detail = json_encode($delivery_detail);
        
        
       
       $arr= array(
        
         'customer_id' => 1,
            'online_order_details' =>0,
            'delivery_details' =>$d_detail,
            'cart_total' =>$cart_total,
            'total_order_price' =>0,
            'order_tax' =>0,
            'delivery_charge' =>0,
            'point_discount' =>0,
            'coupan_discount' =>0,
            
            'paid_amount' =>$cart_total,
            'payment_method' =>0,
            'online_order_date' =>0,
            'delivery_date' =>0,
            'order_status' =>0,
            'delivery_person' =>0,
            'order_updated_at'=>'2020-11-15 17:42:21',
        
        
        );
        
        $this->db->insert('online_orders',$arr);*/
    }
    public function selectcategory_list(){
        $this->db->select('*');
        $this->db->from('category');
        $category = $this->db->get();
        
        $this->db->select('*');
        $this->db->from('sub_category');
        $subcategory = $this->db->get();
        $cat_array = [];
        
        foreach($category->result() as $cat){
            $sub_cat_array = [];
            foreach($subcategory->result() as $sub_cat){
                  if($sub_cat->category_id == $cat->category_id ){
                       array_push($sub_cat_array, $sub_cat);
                      
                     
                  }
            }
            //print_r($sub_cat_array);
            
             $cat->sub_cat = json_encode($sub_cat_array);
            array_push($cat_array,$cat);
        }
        
        //print_r($cat_array);
        
        return $cat_array;
        
        
    }
    public function insert_enquiry($required_number,$budget,$name,$email,$number,$address,$city,$post_code){
       
       $my_data = 'date()';
            
        echo $my_data ;
        $arr = array(
            'required_number' => $required_number,
             'customer_name' => $name,
            'customer_mobile_no' => $number,
             'customer_city' => $city,
            'customer_email' => $email,
             'customer_budget' => $budget,
            'enquiry_type' => 'online',
             'enquiry_source' => '0',
             'enquires_msg' => '',
            //'enquires_create_at' => $required_number,
            
                    
        );
        
       if( $this->db->insert('enquires',$arr)){
          redirect('home/home') ;
       }
        
    }
    
    public function filter_store($category_id,$subcategory_id){
        
         $this->db->select('*');
         $this->db->from('product');
         $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
         if($category_id){
              $this->db->where('product.category_id',$category_id);
         }
         
         if($subcategory_id){
              $this->db->where('product.sub_category_id',$subcategory_id);
         }
          
         $data=$this->db->get();
         return $data->result();
        
    }
}
?>