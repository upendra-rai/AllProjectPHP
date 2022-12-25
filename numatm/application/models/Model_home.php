<?php
class model_home extends CI_Model{

	public function selectproduct(){
         $ip_address = $this->input->ip_address();
        
         $this->db->select('*, product.product_id as my_product_id');
         $this->db->from('product');
         $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
          $this->db->join('cart_details','cart_details.product_id = product.product_id','left');
       
         $item_data=$this->db->get();
        
        
         $this->db->select('*');
         $this->db->from('cart_details');
         $this->db->where('ip_address',$ip_address);
         $cart_data = $this->db->get();
         
        /*if($cart_data->num_rows() > 0){
            $my_arr = [];
            foreach($cart_data->result() as $cart_row){
                
                 foreach($item_data->result() as  $item_row){
                     
                      if($item_row->product_id == $cart_row->product_id ){
                          
                          $item_row->cart_item = 'yes';
                          
                      }
                     
                     array_push($my_arr,$item_row);
                 }
                
                
                
            }
            
            return $my_arr;
            
        }else{
            return $item_data->result();
        }*/
        return $item_data->result();
        
         
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
    
     public function selected_cart_product($number_id){
         $this->db->select('*');
         $this->db->from('product');
       $this->db->where('product.product_id',$number_id);
           $this->db->join('user_likes','user_likes.product_id=product.product_id','left');
         $data=$this->db->get();
        return $data->result();
    }
    
    public function checkout($cart_total,$name,$mobilenumber,$email,$city,$state
,$pincode,$address){
        $date=new DateTime();
        $datetime = $date->format('Y-m-d H:i:s');
        
        $cus_id = $this->session->userdata('customerlogin_id');

        if($cus_id) {
        $ip_address = $this->input->ip_address();
        $this->db->select('*');
        $this->db->from('cart_details');
        $this->db->where('ip_address',$ip_address);
        $this->db->join('product','product.product_id  = cart_details.product_id');
        $cartdata = $this->db->get();
       
      
        $delivery_detail=array(
             'name' =>$name,
            'mobile_no' =>$mobilenumber,
            'address'=>$address,
            'delivery_type'=>'now',
            'city'=>$city,
            'state'=>$state,
            'pincode'=>$pincode,
        );
        
        $d_detail = json_encode($delivery_detail);
        
        
       
       $arr= array(
        
            'customer_id' => $cus_id,
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
            'order_updated_at'=> $datetime,
        
        
        );
        
        if($this->db->insert('online_orders',$arr)){
            
            $online_order_id = $this->db->insert_id();
            
            
            foreach($cartdata->result() as $prow){
              
                 $arr2 = array(
                    'online_order_id' => $online_order_id,
                    'product_id' => $prow->product_id,
                    'product_qty' => 1,
                    'product_price' =>  $prow->product_rate,
                );
            
                $this->db->insert('order_item_details',$arr2);
                
                
            }
            
            $this->db->where('ip_address',$ip_address);
            $this->db->delete('cart_details');
            redirect('customer/order_confirmation/'.$online_order_id);
        }
            
        }else{
             redirect('home');
        }
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
    public function add_customer($name,$email,$mobileno,$password,$address){
      // echo $name.$email.$mobileno.$password.$address;
        $date=new DateTime();
        $datetime = $date->format('Y-m-d H:i:s');
        $check_number = $this->db->get_where('customer',array('customer_mobile'=>$mobileno));
        if($check_number->num_rows() > 0){
            return 'already_exists';
        }else{
            
       
        $arr=array(
            'customer_name'=>$name,
            'customer_email'=>$email,
            'customer_alter_email'=>$email,
            'customer_mobile'=>$mobileno,
            'customer_alter_mobile'=>$mobileno,
            'customer_company_name'=>0,
            'customer_gst_no'=>0,
            'customer_address'=>$address,
            'customer_pincode'=>0,
            'customer_state'=>0,
            'customer_status'=>'active',
            'customer_create_at'=>$datetime,
            'customer_updated_at'=>$datetime,
           
        );
        if($this->db->insert('customer',$arr)){
            $customer_id=$this->db->insert_id();
            
            $arr2 = array(
             'customer_id'=>$customer_id,
                'balance_amount'=>0,
            );
             if($this->db->insert('current_balance',$arr2)){
                 $this->session->set_userdata('customerlogin_id',$customer_id);
                 redirect('customer/my_profile');     
             }else{
                 redirect('home');    
             }
            
        }else{
            redirect('home');    
        }
        }
        
    }
    public function selected_customer($customer_id){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer.customer_id',$customer_id);
        $this->db->join('current_balance','current_balance.customer_id=customer.customer_id');
        $data = $this->db->get();
        return $data->result();
        
    }
    public function select_order($customer_id){
         $this->db->select('*');
        $this->db->from('online_orders');
        $this->db->where('customer_id',$customer_id);
        $this->db->join('product','product.product_id=online_orders.product_id');
        $data = $this->db->get();
        return $data->result();
        
    }
    public function select_customer_payments($customer_id){
          $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('customer_id',$customer_id);
        $this->db->join('payment_method','payment_method.payment_method_id=payments.payment_method');
        $data = $this->db->get();
        return $data->result();
    }
    public function selected_coupan($customer_id){
        $this->db->select('*');
        $this->db->from('customer_promo_code');
        $this->db->where('customer_id',$customer_id);
        $this->db->join('promo_code','promo_code.promo_id=customer_promo_code.promo_code_id');
        $data = $this->db->get();
        return $data->result();
    }
    public function selected_notification($customer_id){
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('customer_id',$customer_id);
        $data = $this->db->get();
        return $data->result();
    }
    public function select_notification($notification_id){
        $this->db->set('notification_status','read');
        $this->db->where('notification_id',$notification_id);
        $this->db->update('notification');
        
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('notification_id',$notification_id);
        $data = $this->db->get();
        return $data->result();
    }
    public function unread_notification($customer_id){
        
         $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('customer_id',$customer_id);
         $this->db->where('notification_status','unread');
        $data = $this->db->get();
        return $data->result();
    }
    public function login($username,$password){
         $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_mobile',$username);
         $this->db->where('customer_password',$password);
        $data = $this->db->get();
      if($data->num_rows() ==1){
           $customer_id=$data->result()[0]->customer_id;
            $this->session->set_userdata('customerlogin_id',$customer_id);
            redirect('customer/my_profile');
      }else{
          return 'wrong_user';
      }
    }
    public function change_password($current_password,$new_password,$customer_id){
    echo $current_password.$new_password;
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_id',$customer_id);
        $this->db->where('customer_password',$current_password);
         $data = $this->db->get();
         if($data->num_rows() ==1){
             $this->db->set('customer_password',$new_password);
              $this->db->where('customer_id',$customer_id);
             if($this->db->update('customer')){
                  return 'success';
             }
             
         }else{
             return 'wrong_password';
         }
    }
    
    
    public function add_to_cart($product_id,$ip_address){
         $date=new DateTime();
        $datetime = $date->format('Y-m-d H:i:s');
        $arr = array(
        
              'ip_address' => $ip_address,
              'product_id' => $product_id,
              'cart_date' => $datetime,
              
        );
        
        
        if($this->db->insert('cart_details',$arr)){
            
            echo 'success';
        }else{
            echo 'failed';
        }
        
    }
    
    
    public function selectcart(){
        $ip_address = $this->input->ip_address();
        $this->db->select('*');
        $this->db->from('cart_details');
        $this->db->where('ip_address',$ip_address);
        $this->db->join('product','product.product_id  = cart_details.product_id');
            $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
        $data = $this->db->get();
        return $data->result();
        
    }
    
    
    public function count_cart($ip_address){
        
        $this->db->select('*');
        $this->db->from('cart_details');
        $this->db->where('ip_address',$ip_address);
        $data = $this->db->get();
        echo count($data->result());
        
    }
    public function select_order_confirmation($order_id){
        $customer_id = $this->session->userdata('customerlogin_id');
        if($customer_id){
             $this->db->select('*');
        $this->db->from('online_orders');
          $this->db->join('order_item_details','order_item_details.online_order_id  = online_orders.online_order_id');
         $this->db->join('product','product.product_id  = order_item_details.product_id');
        $this->db->where('online_orders.online_order_id',$order_id);
             $this->db->where('online_orders.customer_id',$customer_id);
        $data = $this->db->get();
       return $data->result();
        }else{
            redirect('home');
        }
        
    }
    public function remove_cart($cart_id){
         $this->db->where('cart_id',$cart_id);
        $this->db->delete('cart_details');
        redirect('cart');
    }
}
?>